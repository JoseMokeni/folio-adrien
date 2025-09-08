<x-layout-dashboard>
    <x-slot:title>
        Comptes
    </x-slot:title>

    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- En-tête -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
                Ajouter un nouveau compte
            </h2>
            <a href="{{ route('account.index') }}"
               class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm sm:text-base font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 border border-gray-200">
            <form method="POST" action="{{ route('account.store') }}" class="space-y-6 font-semibold">
                @csrf

                <!-- Nom du compte -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nom du compte
                    </label>
                    <input type="text" id="name" name="name" required
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-800 sm:text-base text-sm"
                        placeholder="Ex: Compte courant">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Solde initial & Devise -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Solde initial -->
                    <div>
                        <label for="balance" class="block text-sm font-medium text-gray-700 mb-1">
                            Solde initial
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">€</span>
                            <input type="number" id="balance" name="balance" step="0.01" required
                                class="block w-full pl-7 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base text-sm"
                                placeholder="Ex: 1500.00">
                        </div>
                        @error('balance')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Devise -->
                    <div>
                        <label for="currency" class="block text-sm font-medium text-gray-700 mb-1">
                            Devise
                        </label>
                        <select id="currency" name="currency" required
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base text-sm">
                            <option value="">Sélectionner une devise</option>
                            <option value="eur">EUR (€)</option>
                            <option value="usd">USD ($)</option>
                            <option value="tnd">TND (د.ت)</option>
                            <option value="gbp">GBP (£)</option>
                            <option value="cad">CAD (C$)</option>
                        </select>
                        @error('currency')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-4 pt-6">
                    <a href="{{ route('account.index') }}"
                        class="inline-flex justify-center items-center gap-2 rounded-md border border-slate-300 bg-white px-5 py-2 text-sm sm:text-base font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition">
                        Annuler
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center items-center gap-2 rounded-md bg-emerald-500 px-5 py-2 text-sm sm:text-base font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Ajouter le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
