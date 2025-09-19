<x-layout-dashboard>
    <x-slot:title>Comptes</x-slot:title>

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

        <!-- Enhanced Header Section -->
        <div class="glass-morphism rounded-3xl p-6 mb-8 border border-white/10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-bold text-secondary-900 mb-2">
                        Gestion des comptes
                    </h2>
                    <p class="text-secondary-600">Organisez et surveillez tous vos comptes financiers en un seul endroit</p>
                </div>
                <a href="{{ route('account.create') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter un compte
                </a>
            </div>
        </div>
        </div>

        <!-- Enhanced Accounts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:w-4/5 md:mx-auto">
            @forelse ($accounts as $account)
                <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group border border-white/10">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-primary-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <a href="{{ route('account.show', $account->id) }}" class="relative block">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-600 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                                </svg>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-success-500 rounded-full"></div>
                                <span class="text-xs text-secondary-600">Actif</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-secondary-900 mb-1 group-hover:text-primary-600 transition-colors duration-300">
                                {{ $account->name }}
                            </h3>
                            <p class="text-sm text-secondary-600">Compte {{ $account->type ?? 'personnel' }}</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-secondary-500 mb-1">Solde actuel</p>
                                <p class="text-2xl font-bold text-secondary-900">
                                    {{ number_format($account->balance, 2) }}
                                    <span class="text-sm font-medium text-secondary-600">{{ strtoupper($account->currency) }}</span>
                                </p>
                            </div>
                            <svg class="h-5 w-5 text-secondary-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>

                        <!-- Account stats -->
                        <div class="mt-4 pt-4 border-t border-white/10">
                            <div class="flex justify-between text-xs text-secondary-500">
                                <span>Dernière activité</span>
                                <span>{{ $account->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <!-- Enhanced Empty State -->
                <div class="col-span-full">
                    <div class="glass-morphism rounded-3xl p-12 text-center border border-white/10">
                        <div class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-secondary-800 mb-2">Aucun compte trouvé</h3>
                        <p class="text-secondary-600 mb-8 max-w-md mx-auto">
                            Commencez par créer votre premier compte pour organiser vos finances et suivre vos transactions.
                        </p>
                        <a href="{{ route('account.create') }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Créer mon premier compte
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout-dashboard>
