<x-layout-dashboard>
    <x-slot:title>
        Nouveau Compte
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                        Créer un nouveau compte
                    </h1>
                    <p class="mt-2 text-secondary-600">
                        Ajoutez un compte bancaire, carte de crédit ou portefeuille pour suivre vos finances
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

        <!-- Enhanced Form -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <form method="POST" action="{{ route('account.store') }}" class="space-y-8">
                @csrf

                <!-- Account Name Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-primary-100 to-primary-200">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
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
                                <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                value="{{ old('name') }}"
                                placeholder="Ex: Compte Courant Banque Populaire, Carte Visa..."
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                            >
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Financial Information Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-success-100 to-success-200">
                            <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Informations financières</h3>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Initial Balance -->
                        <div>
                            <label for="balance" class="block text-sm font-medium text-secondary-700 mb-2">
                                Solde initial *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <input
                                    type="number"
                                    id="balance"
                                    name="balance"
                                    step="0.01"
                                    required
                                    value="{{ old('balance') }}"
                                    placeholder="0.00"
                                    class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                                >
                            </div>
                            @error('balance')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Currency -->
                        <div>
                            <label for="currency" class="block text-sm font-medium text-secondary-700 mb-2">
                                Devise *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                                    </svg>
                                </div>
                                <select
                                    id="currency"
                                    name="currency"
                                    required
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner une devise</option>
                                    <option value="eur" {{ old('currency') == 'eur' ? 'selected' : '' }}>🇪🇺 EUR (€) - Euro</option>
                                    <option value="usd" {{ old('currency') == 'usd' ? 'selected' : '' }}>🇺🇸 USD ($) - Dollar Américain</option>
                                    <option value="tnd" {{ old('currency') == 'tnd' ? 'selected' : '' }}>🇹🇳 TND (د.ت) - Dinar Tunisien</option>
                                    <option value="gbp" {{ old('currency') == 'gbp' ? 'selected' : '' }}>🇬🇧 GBP (£) - Livre Sterling</option>
                                    <option value="cad" {{ old('currency') == 'cad' ? 'selected' : '' }}>🇨🇦 CAD (C$) - Dollar Canadien</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            @error('currency')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Enhanced Action Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-6 border-t border-white/10">
                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Créer le compte
                    </button>

                    <!-- Cancel Button -->
                    <a
                        href="{{ route('account.index') }}"
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-6 py-3 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler
                    </a>
                </div>
            </form>
        </div>

        <!-- Help Section -->
        <div class="mt-8 glass-morphism rounded-2xl p-6 border border-white/10">
            <div class="flex items-start gap-4">
                <div class="p-3 rounded-xl bg-gradient-to-br from-info-100 to-info-200">
                    <svg class="w-5 h-5 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-secondary-800 mb-2">💡 Conseils pour créer un compte</h4>
                    <ul class="text-sm text-secondary-600 space-y-1">
                        <li>• <strong>Nom du compte :</strong> Utilisez un nom descriptif (ex: "Compte Courant BNP", "Carte Crédit Visa")</li>
                        <li>• <strong>Solde initial :</strong> Entrez le solde actuel de votre compte au moment de la création</li>
                        <li>• <strong>Devise :</strong> Choisissez la devise principale de ce compte</li>
                        <li>• Vous pourrez modifier ces informations plus tard si nécessaire</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout-dashboard>
