<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CSVExportController extends Controller
{
    //
    public function exportMovementsCSV()
    {
        $accountId = request()->query('account_id');
        // Récupérer les transactions de l'utilisateur connecté
        if (!$accountId) {
            $movements = Movement::where('user_id', Auth::id())->get();
        } else {
            $movements = Movement::where('user_id', Auth::id())
                ->where('account_id', $accountId)
                ->get();
        }

        // Nom du fichier CSV
        $fileName = 'transactions.csv';

        // En-têtes HTTP pour forcer le téléchargement
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        ];

        // Créer un callback qui va écrire le contenu du CSV
        $callback = function () use ($movements) {
            $file = fopen('php://output', 'w');

            // Ajouter les en-têtes des colonnes
            fputcsv($file, ['Libellé', 'Description', 'Montant', 'Nature', 'Date']);

            // Ajouter chaque ligne
            foreach ($movements as $movement) {
                fputcsv($file, [
                    $movement->label,
                    $movement->description,
                    number_format($movement->amount, 2),
                    ucfirst($movement->nature),
                    $movement->created_at->format('d/m/Y')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
