<x-layout-dashboard>
    <x-slot:title>
        Détails du Compte
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                        Détails du compte
                    </h1>
                    <p class="mt-2 text-secondary-600">
                        Consultez les informations et l'historique de <span class="font-semibold text-primary-600">"{{ $account->name }}"</span>
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <!-- Back Button -->
                    <a href="{{ route('account.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Retour
                    </a>

                    @can('update', $account)
                        <!-- Edit Account -->
                        <a href="{{ route('account.edit', $account->id) }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-warning-500 to-warning-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-warning-600 hover:to-warning-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-warning-400 focus:ring-offset-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>

                        <!-- Add Movement -->
                        <a href="{{ route('movement.create', $account->id) }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Nouvelle transaction
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Account Details Card -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10 mb-8">
            <!-- Header Section -->
            <div class="flex items-center mb-6">
                <div class="p-3 rounded-xl bg-gradient-to-br from-primary-100 to-primary-200 mr-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-secondary-800">{{ $account->name }}</h3>
                    <p class="text-sm text-secondary-600 mt-1">Compte bancaire • Créé le {{ $account->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <!-- Balance & Currency -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-success-100 to-success-200">
                            <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Solde actuel</span>
                    </div>
                    <p class="text-2xl font-bold text-secondary-900">
                        {{ number_format($account->balance, 2) }} {{ strtoupper($account->currency) }}
                    </p>
                </div>
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-info-100 to-info-200">
                            <svg class="w-5 h-5 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Devise</span>
                    </div>
                    <p class="text-2xl font-bold text-secondary-900">
                        {{ strtoupper($account->currency) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-xl bg-gradient-to-br from-secondary-100 to-secondary-200">
                        <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-secondary-800">
                        Historique des transactions récentes
                    </h4>
                </div>
                <a href="{{ route('movements.export.csv') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-success-500 to-success-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-success-600 hover:to-success-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-success-400 focus:ring-offset-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Exporter en CSV
                </a>
            </div>

            @if ($movements->isEmpty())
                <div class="flex flex-col items-center justify-center py-12 glass-morphism rounded-xl border border-white/10">
                    <div class="p-4 rounded-xl bg-gradient-to-br from-secondary-100 to-secondary-200 mb-4">
                        <svg class="w-8 h-8 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-secondary-600 text-lg font-medium mb-2">Aucune transaction récente</p>
                    <p class="text-secondary-500 text-sm">Commencez par ajouter votre première transaction</p>
                </div>
            @else
                <div class="space-y-3">
                    @foreach ($movements as $movement)
                        <a href="{{ route('movement.show', $movement->id) }}"
                           class="glass-morphism rounded-xl p-4 border border-white/10 hover:border-white/30 transition-all duration-300 transform hover:scale-[1.02] group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 rounded-xl {{ $movement->nature === 'income' ? 'bg-gradient-to-br from-success-100 to-success-200' : 'bg-gradient-to-br from-danger-100 to-danger-200' }}">
                                        <svg class="w-5 h-5 {{ $movement->nature === 'income' ? 'text-success-600' : 'text-danger-600' }}"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="{{ $movement->nature === 'income'
                                                        ? 'M5 10l7-7m0 0l7 7m-7-7v18'
                                                        : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-secondary-900 group-hover:text-primary-600 transition-colors">{{ $movement->label }}</p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <p class="text-xs text-secondary-500">
                                                {{ $movement->created_at->format('d/m/Y H:i') }}
                                            </p>
                                            @if($movement->category)
                                                <span class="px-2 py-1 text-xs font-medium bg-white/50 text-secondary-600 rounded-lg">
                                                    {{ $movement->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold {{ $movement->nature === 'income' ? 'text-success-600' : 'text-danger-600' }}">
                                        {{ $movement->nature === 'income' ? '+' : '-' }}
                                        {{ number_format($movement->amount, 2) }} {{ strtoupper($movement->currency) }}
                                    </p>
                                    <p class="text-xs text-secondary-500 mt-1">
                                        {{ $movement->nature === 'income' ? 'Revenu' : 'Dépense' }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout-dashboard>
