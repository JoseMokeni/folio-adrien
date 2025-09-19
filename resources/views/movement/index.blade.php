<x-layout-dashboard>
    <x-slot:title>Transactions</x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Enhanced Statistics Cards -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Transactions du mois -->
            <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-primary-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-secondary-600">Transactions</p>
                        <p class="text-2xl font-bold text-secondary-900">{{ $movements->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Revenus -->
            <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-success-500/10 to-success-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gradient-to-br from-success-500 to-success-600 flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-secondary-600">Revenus</p>
                        <p class="text-2xl font-bold text-success-600">
                            {{ $movements->where('nature', 'income')->count() }}
                        </p>
                        <p class="text-xs text-secondary-500 mt-1">transactions</p>
                    </div>
                </div>
            </div>

            <!-- Dépenses -->
            <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-danger-500/10 to-danger-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gradient-to-br from-danger-500 to-danger-600 flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-secondary-600">Dépenses</p>
                        <p class="text-2xl font-bold text-danger-600">
                            {{ $movements->where('nature', 'expense')->count() }}
                        </p>
                        <p class="text-xs text-secondary-500 mt-1">transactions</p>
                    </div>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="card-hover glass-morphism rounded-3xl p-6 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-accent-500/10 to-accent-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gradient-to-br from-accent-500 to-accent-600 flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-secondary-600">Catégories</p>
                        <p class="text-2xl font-bold text-accent-600">
                            {{ $movements->whereNotNull('category_id')->pluck('category_id')->unique()->count() }}
                        </p>
                        <p class="text-xs text-secondary-500 mt-1">utilisées</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Alert -->
        @if (session('success'))
            <div class="animate-fade-in flex items-center p-4 mb-6 text-success-800 glass-morphism rounded-2xl border border-success-200/50 shadow-soft">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <span class="font-semibold">Parfait !</span>
                    <p class="text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Enhanced Transactions List -->
        <div class="glass-morphism rounded-3xl overflow-hidden shadow-glass border border-white/10">
            <div class="px-6 py-6 border-b border-white/10 bg-gradient-to-r from-white/5 to-white/0">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-secondary-800 mb-2">Toutes les transactions</h2>
                        <p class="text-sm text-secondary-600">Gérez et suivez tous vos mouvements financiers</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('movements.export.csv') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Exporter CSV
                        </a>
                        <a href="{{ route('movement.create') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Nouvelle transaction
                        </a>
                    </div>
                </div>
            </div>

            <div class="divide-y divide-white/5">
                @forelse ($movements as $movement)
                    <div class="group hover:bg-white/5 transition-all duration-300">
                        <a href="{{ route('movement.show', $movement->id) }}"
                           class="flex flex-col lg:flex-row items-start lg:items-center justify-between px-6 py-6 gap-4">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="p-3 rounded-2xl transition-all duration-300 group-hover:scale-110 {{ $movement->nature === 'income' ? 'bg-gradient-to-br from-success-500 to-success-600' : 'bg-gradient-to-br from-danger-500 to-danger-600' }} shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($movement->nature === 'income')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                        @endif
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-1">
                                        <p class="font-semibold text-secondary-900">{{ $movement->label }}</p>
                                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $movement->nature === 'income' ? 'bg-success-100 text-success-700' : 'bg-danger-100 text-danger-700' }}">
                                            {{ $movement->nature === 'income' ? 'Revenu' : 'Dépense' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-secondary-600">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                                            </svg>
                                            {{ $movement->account->name }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $movement->created_at->format('d M Y') }}
                                        </span>
                                        @if($movement->category)
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            {{ $movement->category->name }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right">
                                    <span class="text-xl font-bold {{ $movement->nature === 'income' ? 'text-success-600' : 'text-danger-600' }}">
                                        {{ $movement->nature === 'income' ? '+' : '-' }}{{ number_format($movement->amount, 2) }} €
                                    </span>
                                    <p class="text-xs text-secondary-500 mt-1">{{ strtoupper($movement->account->currency) }}</p>
                                </div>
                                <svg class="h-5 w-5 text-secondary-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center">
                        <div class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-secondary-800 mb-2">Aucune transaction trouvée</h3>
                        <p class="text-secondary-600 mb-8 max-w-md mx-auto">Vous n'avez pas encore enregistré de transactions. Commencez par créer votre première transaction pour suivre vos finances.</p>
                        <a href="{{ route('movement.create') }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Créer ma première transaction
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout-dashboard>
