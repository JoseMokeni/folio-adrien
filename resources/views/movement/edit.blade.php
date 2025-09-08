<x-layout-dashboard>
    <x-slot:title>
        Modifier la Transaction
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-warning-600 to-warning-800 bg-clip-text text-transparent">
                        Modifier la transaction
                    </h1>
                    <p class="mt-2 text-secondary-600">
                        Modifiez les détails de <span class="font-semibold text-primary-600">"{{ $movement->label }}"</span>
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
            <form method="POST" action="{{ route('movement.update', $movement->id) }}" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Transaction Details Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-xl bg-gradient-to-br from-warning-100 to-warning-200">
                            <svg class="w-5 h-5 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-secondary-800">Détails de la transaction</h3>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Transaction Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-secondary-700 mb-2">
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
                                    id="name"
                                    name="name"
                                    required
                                    value="{{ old('name', $movement->label) }}"
                                    placeholder="Ex: Courses Carrefour, Salaire janvier..."
                                    class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                                >
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
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
                                    value="{{ old('amount', $movement->amount) }}"
                                    placeholder="0.00"
                                    class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                                >
                            </div>
                            @error('amount')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>
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
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm resize-none"
                            >{{ old('description', $movement->description) }}</textarea>
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

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Nature -->
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
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner le type</option>
                                    <option value="income" {{ (old('nature', $movement->nature) === 'income') ? 'selected' : '' }}>💰 Revenu</option>
                                    <option value="expense" {{ (old('nature', $movement->nature) === 'expense') ? 'selected' : '' }}>💸 Dépense</option>
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

                        <!-- Account -->
                        <div>
                            <label for="account" class="block text-sm font-medium text-secondary-700 mb-2">
                                Compte *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                </div>
                                <select
                                    id="account"
                                    name="account"
                                    required
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner un compte</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}" {{ (old('account', $movement->account_id) == $account->id) ? 'selected' : '' }}>
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
                            @error('account')
                                <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-secondary-700 mb-2">
                                Catégorie
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a.997.997 0 01-1.414 0l-7-7A1.997 1.997 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <select
                                    id="category"
                                    name="category"
                                    class="block w-full pl-10 pr-8 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 shadow-soft backdrop-blur-sm focus:border-warning-400 focus:ring-2 focus:ring-warning-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm appearance-none"
                                >
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category', $movement->category_id) == $category->id) ? 'selected' : '' }}>
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
                            @error('category')
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
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-warning-500 to-warning-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-warning-600 hover:to-warning-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-warning-400 focus:ring-offset-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer les modifications
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
                    <h4 class="font-semibold text-secondary-800 mb-2">💡 Conseils pour modifier votre transaction</h4>
                    <ul class="text-sm text-secondary-600 space-y-1">
                        <li>• Modifiez le montant si vous avez fait une erreur de saisie</li>
                        <li>• Changez la catégorie pour une meilleure classification</li>
                        <li>• Ajoutez une description pour vous rappeler du contexte</li>
                        <li>• Vérifiez que le compte sélectionné est correct</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout-dashboard>
