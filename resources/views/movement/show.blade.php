<x-layout-dashboard>
    <x-slot:title>
        Détails de la Transaction
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->

        <div class="mb-8">
            <div class="glass-morphism rounded-3xl p-6 mb-8 border border-white/10">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                            Détails de la transaction
                        </h1>
                        <p class="mt-2 text-secondary-600">
                            Consultez les informations détaillées de votre transaction
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('movement.index') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-4 py-2.5 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20 backdrop-blur-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Retour aux transactions
                        </a>
                    </div>

                    @can('update', $movement)
                        <a href="{{ route('movement.edit', $movement->id) }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-warning-500 to-warning-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-warning-600 hover:to-warning-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-warning-400 focus:ring-offset-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifier
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Transaction Details Card -->
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <!-- Header Section -->
            <div class="flex items-center mb-8">
                <div
                    class="p-3 rounded-xl bg-gradient-to-br from-{{ $movement->nature === 'income' ? 'success' : 'danger' }}-100 to-{{ $movement->nature === 'income' ? 'success' : 'danger' }}-200 mr-4">
                    <svg class="w-6 h-6 text-{{ $movement->nature === 'income' ? 'success' : 'danger' }}-600"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="{{ $movement->nature === 'income' ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-secondary-800">{{ $movement->label }}</h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span
                            class="px-3 py-1 text-sm font-medium rounded-full {{ $movement->nature === 'income' ? 'bg-success-100 text-success-800' : 'bg-danger-100 text-danger-800' }}">
                            {{ $movement->nature === 'income' ? '💰 Revenu' : '💸 Dépense' }}
                        </span>
                        <span class="text-sm text-secondary-500">
                            • {{ $movement->created_at->format('d/m/Y à H:i') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Amount -->
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-primary-100 to-primary-200">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Montant</span>
                    </div>
                    <p class="text-2xl font-bold text-{{ $movement->nature === 'income' ? 'success' : 'danger' }}-600">
                        {{ $movement->nature === 'income' ? '+' : '-' }}{{ number_format($movement->amount, 2) }}
                        {{ strtoupper($movement->account->currency) }}
                    </p>
                </div>

                <!-- Account -->
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-secondary-100 to-secondary-200">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Compte</span>
                    </div>
                    <p class="text-lg font-semibold text-secondary-900">
                        {{ $movement->account->name }}
                    </p>
                    <p class="text-sm text-secondary-500 mt-1">
                        {{ strtoupper($movement->account->currency) }}
                    </p>
                </div>

                <!-- Category -->
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-info-100 to-info-200">
                            <svg class="w-5 h-5 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a.997.997 0 01-1.414 0l-7-7A1.997 1.997 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Catégorie</span>
                    </div>
                    <p class="text-lg font-semibold text-secondary-900">
                        {{ $movement->category->name ?? 'Aucune catégorie' }}
                    </p>
                    @if (!$movement->category)
                        <p class="text-sm text-warning-600 mt-1">
                            Non classifiée
                        </p>
                    @endif
                </div>

                <!-- Date -->
                <div class="glass-morphism rounded-xl p-6 border border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-warning-100 to-warning-200">
                            <svg class="w-5 h-5 text-warning-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-secondary-600">Date de création</span>
                    </div>
                    <p class="text-lg font-semibold text-secondary-900">
                        {{ $movement->created_at->format('d/m/Y') }}
                    </p>
                    <p class="text-sm text-secondary-500 mt-1">
                        {{ $movement->created_at->format('H:i') }}
                    </p>
                </div>

                <!-- Description (spans 2 columns) -->
                @if ($movement->description)
                    <div class="glass-morphism rounded-xl p-6 border border-white/10 sm:col-span-2">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 rounded-lg bg-gradient-to-br from-purple-100 to-purple-200">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-secondary-600">Description</span>
                        </div>
                        <p class="text-lg text-secondary-900 leading-relaxed">
                            {{ $movement->description }}
                        </p>
                    </div>
                @endif
            </div>

            @if (!$movement->description)
                <!-- Empty state for description -->
                <div class="mt-6 glass-morphism rounded-xl p-6 border border-white/10 border-dashed">
                    <div class="flex items-center justify-center py-4">
                        <div class="text-center">
                            <div
                                class="p-3 rounded-xl bg-gradient-to-br from-secondary-100 to-secondary-200 mx-auto w-fit mb-3">
                                <svg class="w-6 h-6 text-secondary-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <p class="text-secondary-500 text-sm">Aucune description ajoutée</p>
                            @can('update', $movement)
                                <p class="text-secondary-400 text-xs mt-1">Modifiez la transaction pour ajouter une
                                    description</p>
                            @endcan
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        @can('update', $movement)
            <div class="mt-8 glass-morphism rounded-2xl p-6 border border-white/10">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-xl bg-gradient-to-br from-primary-100 to-primary-200">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-secondary-800">Actions rapides</h4>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('movement.edit', $movement->id) }}"
                        class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-warning-500 to-warning-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-warning-600 hover:to-warning-700 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Modifier cette transaction
                    </a>
                    <a href="{{ route('movement.create') }}"
                        class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Nouvelle transaction
                    </a>
                </div>
            </div>
        @endcan
    </div>
</x-layout-dashboard>
