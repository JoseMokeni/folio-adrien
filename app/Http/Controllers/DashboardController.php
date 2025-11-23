<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $movements = Movement::where('user_id', Auth::id())
            ->with('account', 'category')
            ->latest()
            ->get();

        $totalIncome = $movements->where('nature', 'income')->sum('amount');
        $totalExpense = $movements->where('nature', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        return view('dashboard', compact('movements', 'totalIncome', 'totalExpense', 'balance'));
    }
}
