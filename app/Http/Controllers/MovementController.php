<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Account;
use App\Models\Category;
use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function index()
    {
        $movements = Movement::where('user_id', Auth::id())->with('account', 'category')->latest()->get();
        return view('movement.index', compact('movements'));
    }

    public function create()
    {
        $this->authorize('create', Movement::class);

        return view('movement.create', [
            'accounts'   => Account::where('user_id', Auth::id())->get(),
            'categories' => Category::whereNull('user_id')
                                     ->orWhere('user_id', Auth::id())->get(),
        ]);
    }

    public function store(StoreMovementRequest $request)
    {
        $data = $request->validated();

        // Vérification du solde avant de créer la transaction
        $account = Account::findOrFail($data['account_id']);
        if ($data['nature'] === 'expense' && $data['amount'] > $account->balance) {
            return back()->with('error', 'Solde insuffisant pour cette dépense.');
        }

        // Création du mouvement
        $movement = Movement::create([
            'label'       => $data['label'],
            'description' => $data['description'],
            'amount'      => $data['amount'],
            'nature'      => $data['nature'],
            'user_id'     => Auth::id(),
            'account_id'  => $data['account_id'],
            'category_id' => $data['category_id'] ?? null,
        ]);

        // Mise à jour du solde
        $account->balance += $data['nature'] === 'income' ? $data['amount'] : -$data['amount'];
        $account->save();

        return redirect()->route('movement.index')->with('success', 'Transaction effectuée avec succès.');
    }

    public function show(Movement $movement)
    {
        $this->authorize('view', $movement);
        $account = $movement->account;
        return view('movement.show', compact('movement', 'account'));
    }

    public function edit(Movement $movement)
    {
        $this->authorize('update', $movement);

        $accounts   = Account::where('user_id', Auth::id())->get();
        $categories = Category::where('user_id', Auth::id())->get();

        return view('movement.edit', compact('movement', 'accounts', 'categories'));
    }

    public function update(UpdateMovementRequest $request, Movement $movement)
    {
        $data = $request->validated();

        $oldAmount = $movement->amount;
        $oldNature = $movement->nature;

        // Restaurer le solde avant modification
        $oldAccount = $movement->account;
        $oldAccount->balance += $oldNature === 'income' ? -$oldAmount : $oldAmount;
        $oldAccount->save();

        // Vérifier le nouveau compte
        $newAccount = Account::findOrFail($data['account_id']);
        if ($data['nature'] === 'expense' && $data['amount'] > $newAccount->balance) {
            return back()->with('error', 'Solde insuffisant pour cette dépense.');
        }

        // Mettre à jour la transaction
        $movement->update([
            'label'       => $data['label'],
            'description' => $data['description'],
            'amount'      => $data['amount'],
            'nature'      => $data['nature'],
            'account_id'  => $data['account_id'],
            'category_id' => $data['category_id'],
        ]);

        // Mettre à jour le solde du nouveau compte
        $newAccount->balance += $data['nature'] === 'income' ? $data['amount'] : -$data['amount'];
        $newAccount->save();

        return redirect()->route('movement.index')->with('success', 'Transaction mise à jour avec succès.');
    }

    public function destroy(Movement $movement)
    {
        $this->authorize('delete', $movement);

        // Restaurer le solde avant suppression
        $account = $movement->account;
        $account->balance += $movement->nature === 'income' ? -$movement->amount : $movement->amount;
        $account->save();

        $movement->delete();

        return redirect()->route('movement.index')->with('success', 'Transaction supprimée avec succès.');
    }
}
