<x-layout-dashboard>
    <x-slot:title>
        Vos transactions
    </x-slot:title>

    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- En-tête -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
            <h2 class="text-2xl font-bold text-black-800">Faites place à vos finances</h2>
            <a href="{{ route('movement.index') }}"
                class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 border border-gray-200">
            <form method="POST" action="{{ route('movement.store') }}" class="space-y-6 font-semibold">
                @csrf

                <!-- Nom de la transaction -->
                <div>
                    <label for="label" class="block text-sm font-medium text-gray-700 mb-1">Nom de la transaction</label>
                    <input type="text" id="label" name="label" required
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black-800 sm:text-sm"
                        placeholder="Ex: Compte courant">
                    @error('label')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nature de la transaction -->
                <div>
                    <label for="nature" class="block text-sm font-medium text-gray-700 mb-1">Nature de la transaction</label>
                    <select id="nature" name="nature" required
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">Sélectionner une nature</option>
                        <option value="income">Revenu</option>
                        <option value="expense">Dépense</option>
                    </select>
                    @error('nature')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Montant -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Montant</label>
                        <div class="relative">
                            <input type="number" id="amount" name="amount" step="0.01" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-3"
                                placeholder="Ex: 1500.00">
                        </div>
                        @error('amount')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Ex: Salaire de janvier"></textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Compte & Catégorie -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Compte -->
                    <div>
                        <label for="account_id" class="block text-sm font-medium text-gray-700 mb-1">Compte</label>
                        <select id="account_id" name="account_id" required
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Sélectionner un compte</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                        @error('account_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select id="category_id" name="category_id"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-6">
                    <a href="{{ route('account.index') }}"
                        class="inline-flex justify-center items-center gap-2 rounded-md border border-slate-300 bg-white px-5 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition w-full sm:w-auto text-center">
                        Annuler
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center items-center gap-2 rounded-md bg-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition w-full sm:w-auto text-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Ajouter la transaction
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const natureSelect = document.getElementById('nature');
        const categorySelect = document.getElementById('category_id');

        natureSelect.addEventListener('change', function() {
            if (this.value === 'income') {
                categorySelect.value = '';
                categorySelect.disabled = true;
                categorySelect.required = false;
            } else {
                categorySelect.disabled = false;
                categorySelect.required = true;
            }
        });
    </script>
</x-layout-dashboard>
