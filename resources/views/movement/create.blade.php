<x-layout-dashboard>
    <x-slot:title>
        Nouvelle Transaction
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                        Nouvelle transaction
                    </h1>
                    <p class="mt-2 text-secondary-600">
                        Enregistrez un revenu ou une dépense dans votre portefeuille
                    </p>
                </div>
                <a href="{{ route('movement.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20 backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour aux transactions
                </a>
            </div>
        </div>

        <!-- Enhanced Form -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <form method="POST" action="{{ route('movement.store') }}" class="space-y-8">
                @csrf

                <!-- Transaction Details Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-primary-100 to-primary-200">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Détails de la transaction</h3>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Transaction Name -->
                        <div>
                            <label for="label" class="block text-sm font-medium text-secondary-700 mb-2">
                                Nom de la transaction *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a.997.997 0 01-1.414 0l-7-7A1.997 1.997 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="label"
                                    name="label"
                                    required
                                    value="{{ old('label') }}"
                                    placeholder="Ex: Courses Carrefour, Salaire janvier, Achat essence..."
                                    class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                                >
                            </div>
                            @error('label')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Transaction Nature -->
                        <div>
                            <label for="nature" class="block text-sm font-medium text-secondary-700 mb-2">
                                Type de transaction *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                    </svg>
                                </div>
                                <select
                                    id="nature"
                                    name="nature"
                                    required
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner le type</option>
                                    <option value="income" {{ old('nature') == 'income' ? 'selected' : '' }}>💰 Revenu (Entrée d'argent)</option>
                                    <option value="expense" {{ old('nature') == 'expense' ? 'selected' : '' }}>💸 Dépense (Sortie d'argent)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            @error('nature')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-secondary-700 mb-2">
                            Montant *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                            <input
                                type="number"
                                id="amount"
                                name="amount"
                                step="0.01"
                                required
                                value="{{ old('amount') }}"
                                placeholder="0.00"
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                            >
                        </div>
                        @error('amount')
                            <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-secondary-700 mb-2">
                            Description (optionnel)
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                            </div>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="Ajoutez des détails sur cette transaction..."
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm resize-none"
                            >{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Account & Category Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-secondary-100 to-secondary-200">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Compte et catégorie</h3>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Account -->
                        <div>
                            <label for="account_id" class="block text-sm font-medium text-secondary-700 mb-2">
                                Compte *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                </div>
                                <select
                                    id="account_id"
                                    name="account_id"
                                    required
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner un compte</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>
                                            {{ $account->name }} ({{ strtoupper($account->currency) }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            @error('account_id')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-secondary-700 mb-2">
                                Catégorie <span id="category-required-indicator" class="text-danger-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a.997.997 0 01-1.414 0l-7-7A1.997 1.997 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <select
                                    id="category_id"
                                    name="category_id"
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-secondary-500" id="category-help">
                                <span id="expense-help">Obligatoire pour les dépenses</span>
                                <span id="income-help" class="hidden">Optionnel pour les revenus</span>
                            </p>
                            @error('category_id')
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
                        Enregistrer la transaction
                    </button>

                    <!-- Cancel Button -->
                    <a
                        href="{{ route('movement.index') }}"
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
                    <h4 class="font-semibold text-secondary-800 mb-2">💡 Guide des transactions</h4>
                    <ul class="text-sm text-secondary-600 space-y-1">
                        <li>• <strong>Revenus :</strong> Salaires, primes, cadeaux, remboursements... (catégorie optionnelle)</li>
                        <li>• <strong>Dépenses :</strong> Achats, factures, loisirs... (catégorie obligatoire pour l'analyse)</li>
                        <li>• <strong>Montant :</strong> Entrez toujours le montant positif, le type détermine le sens</li>
                        <li>• <strong>Compte :</strong> Choisissez le compte bancaire ou portefeuille concerné</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const natureSelect = document.getElementById('nature');
        const categorySelect = document.getElementById('category_id');
        const categoryRequiredIndicator = document.getElementById('category-required-indicator');
        const expenseHelp = document.getElementById('expense-help');
        const incomeHelp = document.getElementById('income-help');

        function updateCategoryRequirement() {
            if (natureSelect.value === 'income') {
                categorySelect.required = false;
                categoryRequiredIndicator.style.display = 'none';
                expenseHelp.classList.add('hidden');
                incomeHelp.classList.remove('hidden');
            } else if (natureSelect.value === 'expense') {
                categorySelect.required = true;
                categoryRequiredIndicator.style.display = 'inline';
                expenseHelp.classList.remove('hidden');
                incomeHelp.classList.add('hidden');
            } else {
                categorySelect.required = true;
                categoryRequiredIndicator.style.display = 'inline';
                expenseHelp.classList.remove('hidden');
                incomeHelp.classList.add('hidden');
            }
        }

        natureSelect.addEventListener('change', updateCategoryRequirement);

        // Set initial state based on old value
        @if(old('nature'))
            updateCategoryRequirement();
        @endif
    </script>
</x-layout-dashboard>
