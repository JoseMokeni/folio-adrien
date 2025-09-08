<x-layout-dashboard>
    <x-slot:title>
        Comptes
    </x-slot:title>

    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- En-tête de la page -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
            <h2 class="text-2xl font-bold text-black-800">Modifier votre transaction</h2>
            <a href="{{ route('movement.index') }}"
               class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>

        <!-- Formulaire d'édition -->
        <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-6">
                Modifier les informations de ma transaction <span class="text-indigo-600">"{{ $movement->label }}"</span>
            </h3>

            <form method="POST" action="{{ route('movement.update', $movement->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nom de la transaction -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la transaction</label>
                    <input type="text" name="name" id="name" required
                           value="{{ $movement->label }}"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Montant -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Montant</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">€</span>
                        <input type="number" name="amount" id="amount" step="0.01" required
                               value="{{ $movement->amount }}"
                               class="block w-full pl-7 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="3" placeholder="Ajouter une description (optionnel)"
                              class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $movement->description }}</textarea>
                </div>

                <!-- Nature, Compte & Catégorie -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <!-- Nature -->
                    <div>
                        <label for="nature" class="block text-sm font-medium text-gray-700 mb-1">Nature</label>
                        <select name="nature" id="nature" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Sélectionner une nature</option>
                            <option value="income" {{ $movement->nature === 'income' ? 'selected' : '' }}>Revenu</option>
                            <option value="expense" {{ $movement->nature === 'expense' ? 'selected' : '' }}>Dépense</option>
                        </select>
                    </div>

                    <!-- Compte -->
                    <div>
                        <label for="account" class="block text-sm font-medium text-gray-700 mb-1">Compte</label>
                        <select name="account" id="account" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Sélectionner un compte</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}" {{ $movement->account_id === $account->id ? 'selected' : '' }}>
                                    {{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select name="category" id="category" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $movement->category_id === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-4">
                    <button type="submit"
                            class="inline-flex justify-center items-center gap-2 rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition w-full sm:w-auto text-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer les modifications
                    </button>

                    <a href="{{ route('movement.index') }}"
                       class="inline-flex justify-center items-center gap-2 rounded-md border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition w-full sm:w-auto text-center">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
