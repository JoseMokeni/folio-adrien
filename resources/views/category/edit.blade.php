<x-layout-dashboard>
    <x-slot:title>Modifier la catégorie</x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Enhanced Header -->
        <div class="glass-morphism rounded-3xl p-6 mb-8 border border-white/10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-2xl bg-gradient-to-br from-accent-500 to-accent-600 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-secondary-900">Modifier la catégorie</h2>
                        <p class="text-secondary-600">Personnalisez le nom de votre catégorie</p>
                    </div>
                </div>
                <a href="{{ route('category.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour aux catégories
                </a>
            </div>
        </div>

        <!-- Enhanced Edit Form -->
        <div class="glass-morphism rounded-3xl overflow-hidden shadow-glass border border-white/10">
            <div class="px-6 py-6 border-b border-white/10 bg-gradient-to-r from-white/5 to-white/0">
                <h3 class="text-xl font-semibold text-secondary-800 flex items-center gap-3">
                    <div class="p-2 rounded-xl bg-gradient-to-br from-accent-100 to-accent-200">
                        <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    Catégorie : <span class="text-accent-600">"{{ $category->name }}"</span>
                </h3>
                <p class="text-sm text-secondary-600 mt-2">Modifiez les informations de cette catégorie</p>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('category.update', $category->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Enhanced Category Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-secondary-800 mb-3">
                            Nom de la catégorie
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                placeholder="Ex : Nourriture et Boissons, Transport, Loisirs..."
                                required
                                value="{{ old('name', $category->name) }}"
                                class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm"
                            >
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-danger-600 bg-danger-50 rounded-lg px-3 py-2 border border-danger-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-6 border-t border-white/10">
                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-success-500 to-success-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-success-600 hover:to-success-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-success-400 focus:ring-offset-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Enregistrer les modifications
                        </button>

                        <!-- Cancel Button -->
                        <a
                            href="{{ route('category.index') }}"
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
        </div>

        <!-- Additional Info Card -->
        <div class="mt-8 glass-morphism rounded-2xl p-6 border border-white/10">
            <div class="flex items-start gap-4">
                <div class="p-3 rounded-xl bg-gradient-to-br from-warning-100 to-warning-200">
                    <svg class="w-5 h-5 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-secondary-800 mb-2">💡 Conseils pour les catégories</h4>
                    <ul class="text-sm text-secondary-600 space-y-1">
                        <li>• Utilisez des noms clairs et descriptifs</li>
                        <li>• Évitez les noms trop génériques ou trop spécifiques</li>
                        <li>• Une bonne catégorie vous aide à analyser vos dépenses</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout-dashboard>
