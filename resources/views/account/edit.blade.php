<x-layout-dashboard>
    <x-slot:title>
        Comptes
    </x-slot:title>

    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- En-tête -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
                Modifier le compte
            </h2>
            <a href="{{ route('account.index') }}"
               class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm sm:text-base font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>

        <!-- Formulaire d'édition -->
        <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 border border-gray-200">
            <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-6">
                Modifier les informations du compte
                <span class="text-indigo-600">"{{ $account->name }}"</span>
            </h3>

            <form method="POST" action="{{ route('account.update', $account->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nom du compte -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom du compte</label>
                    <input type="text" name="name" id="name" required
                           value="{{ $account->name }}"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base text-sm text-gray-800">
                </div>

                <!-- Solde -->
                <div>
                    <label for="balance" class="block text-sm font-medium text-gray-700 mb-1">Solde actuel</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">€</span>
                        <input type="number" name="balance" id="balance" step="0.01" required
                               value="{{ $account->balance }}"
                               class="block w-full pl-7 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base text-sm text-gray-800">
                    </div>
                </div>

                <!-- Devise -->
                <div>
                    <label for="currency" class="block text-sm font-medium text-gray-700 mb-1">Devise</label>
                    <select name="currency" id="currency"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base text-sm">
                        <option value="eur" @if(strtolower($account->currency) === 'eur') selected @endif>EUR (€)</option>
                        <option value="usd" @if(strtolower($account->currency) === 'usd') selected @endif>USD ($)</option>
                        <option value="gbp" @if(strtolower($account->currency) === 'gbp') selected @endif>GBP (£)</option>
                        <option value="cad" @if(strtolower($account->currency) === 'cad') selected @endif>CAD (C$)</option>
                        <option value="mad" @if(strtolower($account->currency) === 'mad') selected @endif>MAD (د.م)</option>
                        <option value="tdn" @if(strtolower($account->currency) === 'tdn') selected @endif>TDN (ت.د.ن)</option>
                    </select>
                </div>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center justify-end gap-4 pt-6">

                    <!-- Enregistrer -->
                    <button type="submit"
                            class="inline-flex justify-center items-center gap-2 rounded-md bg-amber-500 px-5 py-2 text-sm sm:text-base font-semibold text-white shadow-sm hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer les modifications
                    </button>

                    <!-- Annuler -->
                    <a href="{{ route('account.index') }}"
                       class="inline-flex justify-center items-center gap-2 rounded-md border border-slate-300 bg-white px-5 py-2 text-sm sm:text-base font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition">
                        Annuler
                    </a>

                    <!-- Supprimer -->
                    <form action="{{ route('account.destroy', $account->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex justify-center items-center gap-2 rounded-md bg-rose-500 px-5 py-2 text-sm sm:text-base font-semibold text-white shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 transition"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Supprimer
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
