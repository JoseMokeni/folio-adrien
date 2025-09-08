<x-layout-dashboard>
    <x-slot:title>Catégories</x-slot:title>

    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Enhanced Alert Messages -->
        @if (session('success'))
            <div class="animate-fade-in flex items-center p-4 mb-6 text-success-800 glass-morphism rounded-2xl border border-success-200/50 shadow-soft">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9
                                 10.586 7.707 9.293a1 1 0 00-1.414
                                 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <span class="font-semibold">Parfait !</span>
                    <p class="text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="animate-fade-in flex items-center p-4 mb-6 text-danger-800 glass-morphism rounded-2xl border border-danger-200/50 shadow-soft">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-danger-500 to-danger-600 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0
                                 00-1.414 1.414L8.586 10l-1.293
                                 1.293a1 1 0 101.414 1.414L10
                                 11.414l1.293 1.293a1 1 0
                                 001.414-1.414L11.414 10l1.293-1.293a1
                                 1 0 00-1.414-1.414L10 8.586
                                 8.707 7.293z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <span class="font-semibold">Erreur !</span>
                    <p class="text-sm mt-1">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Enhanced Header Section with Quick Add Form -->
        <div class="glass-morphism rounded-3xl p-6 mb-8 border border-white/10">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-secondary-900 mb-2">
                        Gestion des catégories
                    </h2>
                    <p class="text-secondary-600 mb-6">Organisez vos transactions avec des catégories personnalisées</p>

                    <!-- Quick Add Form -->
                    <form method="POST" action="{{ route('category.store') }}" class="flex flex-col sm:flex-row gap-3">
                        @csrf
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <input type="text" name="name" placeholder="Nom de la nouvelle catégorie" required
                                   class="block w-full pl-10 pr-4 py-3 bg-white/50 rounded-xl border border-white/20 text-secondary-900 placeholder-secondary-500 shadow-soft backdrop-blur-sm focus:border-primary-400 focus:ring-2 focus:ring-primary-400/30 focus:bg-white/70 transition-all duration-300 sm:text-sm">
                        </div>
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2 sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Enhanced Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($categories as $category)
                <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group border border-white/10">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500/10 to-accent-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 rounded-2xl bg-gradient-to-br from-accent-500 to-accent-600 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            @if (Auth::id() == $category->user_id)
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-success-500 rounded-full"></div>
                                    <span class="text-xs text-secondary-600">Propriétaire</span>
                                </div>
                            @else
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-secondary-400 rounded-full"></div>
                                    <span class="text-xs text-secondary-600">Partagée</span>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-secondary-900 mb-1 group-hover:text-accent-600 transition-colors duration-300">
                                {{ $category->name }}
                            </h3>
                            <p class="text-sm text-secondary-600">Catégorie {{ Auth::id() == $category->user_id ? 'personnelle' : 'partagée' }}</p>
                        </div>

                        @if (Auth::id() == $category->user_id)
                            <div class="flex items-center gap-2 pt-4 border-t border-white/10">
                                <a href="{{ route('category.edit', $category->id) }}"
                                   class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-3 py-2 text-xs font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Modifier
                                </a>
                                <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-danger-100 hover:bg-danger-200 px-3 py-2 text-xs font-medium text-danger-700 shadow-soft hover:shadow-md transition-all duration-300 border border-danger-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="pt-4 border-t border-white/10">
                                <div class="text-center">
                                    <span class="inline-flex items-center gap-2 rounded-xl bg-secondary-100 px-3 py-2 text-xs font-medium text-secondary-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        Lecture seule
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Enhanced Empty State -->
                <div class="col-span-full">
                    <div class="glass-morphism rounded-3xl p-12 text-center border border-white/10">
                        <div class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-secondary-800 mb-2">Aucune catégorie trouvée</h3>
                        <p class="text-secondary-600 mb-8 max-w-md mx-auto">
                            Commencez par créer votre première catégorie pour organiser vos transactions par type.
                        </p>
                        <div class="text-sm text-secondary-500">
                            <p>💡 Utilisez le formulaire ci-dessus pour ajouter une nouvelle catégorie</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Enhanced Pagination -->
        @if($categories->hasPages())
            <div class="mt-8 glass-morphism rounded-2xl p-4 border border-white/10">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</x-layout-dashboard>
