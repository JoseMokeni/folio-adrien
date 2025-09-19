<x-layout-dashboard>
    <x-slot:title>
        Modifier le Compte
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="mb-8">
            <div class="glass-morphism rounded-3xl p-6 mb-8 border border-white/10">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-warning-600 to-warning-800 bg-clip-text text-transparent">
                            Modifier le compte
                        </h1>
                        <p class="mt-2 text-secondary-600">
                            Modifiez les informations de <span
                                class="font-semibold text-primary-600">"{{ $account->name }}"</span>
                        </p>
                    </div>
                    <a href="{{ route('account.index') }}"
                        class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Retour aux comptes
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Form -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <form method="POST" action="{{ route('account.update', $account->id) }}" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Account Information Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-warning-100 to-warning-200">
                            <svg class="w-5 h-5 text-warning-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Informations du compte</h3>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-secondary-700 mb-2">
                            Nom du compte *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <input type="text" id="name" name="name" required
                                value="{{ old('name', $account->name) }}"
                                placeholder="Ex: Compte Courant Banque Populaire, Carte Visa..."
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm">
                        </div>
                        @error('name')
                            <p
                                class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">
                                {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Financial Information Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-success-100 to-success-200">
                            <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Informations financières</h3>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Balance -->
                        <div>
                            <label for="balance" class="block text-sm font-medium text-secondary-700 mb-2">
                                Solde actuel *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <input type="number" id="balance" name="balance" step="0.01" required
                                    value="{{ old('balance', $account->balance) }}" placeholder="0.00"
                                    class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm">
                            </div>
                            @error('balance')
                                <p
                                    class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Currency -->
                        <div>
                            <label for="currency" class="block text-sm font-medium text-secondary-700 mb-2">
                                Devise *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                    </svg>
                                </div>
                                <select id="currency" name="currency" required
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none">
                                    <option value="eur"
                                        {{ old('currency', strtolower($account->currency)) === 'eur' ? 'selected' : '' }}>
                                        🇪🇺 EUR (€) - Euro</option>
                                    <option value="usd"
                                        {{ old('currency', strtolower($account->currency)) === 'usd' ? 'selected' : '' }}>
                                        🇺🇸 USD ($) - Dollar Américain</option>
                                    <option value="tnd"
                                        {{ old('currency', strtolower($account->currency)) === 'tnd' ? 'selected' : '' }}>
                                        🇹🇳 TND (د.ت) - Dinar Tunisien</option>
                                    <option value="gbp"
                                        {{ old('currency', strtolower($account->currency)) === 'gbp' ? 'selected' : '' }}>
                                        🇬🇧 GBP (£) - Livre Sterling</option>
                                    <option value="cad"
                                        {{ old('currency', strtolower($account->currency)) === 'cad' ? 'selected' : '' }}>
                                        🇨🇦 CAD (C$) - Dollar Canadien</option>
                                    <option value="mad"
                                        {{ old('currency', strtolower($account->currency)) === 'mad' ? 'selected' : '' }}>
                                        🇲🇦 MAD (د.م) - Dirham Marocain</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('currency')
                                <p
                                    class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Enhanced Action Buttons -->
                <div
                    class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-6 border-t border-white/10">
                    <!-- Submit Button -->
                    <button type="submit"
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-warning-500 to-warning-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-warning-600 hover:to-warning-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-warning-400 focus:ring-offset-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer les modifications
                    </button>

                    <!-- Cancel Button -->
                    <a href="{{ route('account.index') }}"
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-6 py-3 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler
                    </a>
                </div>
            </form>
        </div>

        <!-- Danger Zone -->
        <div
            class="mt-8 glass-morphism rounded-2xl p-6 border border-danger-200/30 bg-gradient-to-br from-danger-50/30 to-danger-100/30">
            <div class="flex items-start gap-4">
                <div class="p-3 rounded-xl bg-gradient-to-br from-danger-100 to-danger-200">
                    <svg class="w-5 h-5 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-danger-800 mb-2">⚠️ Zone de danger</h4>
                    <p class="text-sm text-danger-700 mb-4">
                        La suppression de ce compte est irréversible. Toutes les transactions associées seront également
                        supprimées.
                    </p>
                    <form action="{{ route('account.destroy', $account->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('⚠️ ATTENTION\n\nÊtes-vous absolument sûr de vouloir supprimer ce compte ?\n\n• Toutes les transactions liées seront supprimées\n• Cette action est irréversible\n• Les données ne pourront pas être récupérées\n\nTapez \"SUPPRIMER\" pour confirmer')"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-danger-500 to-danger-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-danger-600 hover:to-danger-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-danger-400 focus:ring-offset-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Supprimer définitivement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-dashboard>
