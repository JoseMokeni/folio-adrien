<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Movement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccountController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $accounts = Account::where('user_id', Auth::id())->get();
        return view('account.index', compact('accounts')); // return the index view

        // flow: Get from database, assign to an array, render view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return the create view
        $this->authorize('create', Account::class);
        return view('account.create');
        // display create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        // handles create form submission

        $data = $request->validated();

        $account = Account::create([
            'name' => $data['name'],
            'balance' => $data['balance'],
            'currency' => $data['currency'],
            'user_id' => Auth::id(), // Assuming you want to associate the account with the authenticated user
        ]);

        $movement = Movement::create([
            'label'       => 'Initial Deposit',
            'description' => 'Initial deposit for account ' . $data['name'],
            'amount'      => $data['balance'],
            'nature'      => 'income',
            'user_id'     => Auth::id(),
            'account_id'  => $account->id,
            'category_id' => null, // Assuming no category for initial deposit
        ]);

        return redirect()->route('account.index')->with('success', 'Compte créé avec succès.');

        // flow: Validate request and the create
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // display a single account
        $this->authorize('view', $account);
        $movements = $account->movements()->latest()->take(5)->get();
        return view('account.show', compact('account', 'movements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
        $this->authorize('update', $account);
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //

        $this->authorize('update', $account);

        $data = $request->validated();

        $account->update([
            'name' => $data['name'],
            'balance' => $data['balance'],
            'currency' => $data['currency'],
            'user_id' => Auth::id(), // Assuming you want to associate the account with the authenticated user
        ]);

        return redirect()->route('account.index')->with('success', 'Compte mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //delete the account

        $user = Auth::user();
        if ($user->can('delete', $account)) {
            $account->delete();
            return redirect()->route('account.index')->with('success', 'Compte supprimé avec succès.');
        }

        return redirect()->route('account.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce compte.');
    }
}
