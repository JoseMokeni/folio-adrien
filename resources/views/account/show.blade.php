<x-layout-dashboard>
    <x-slot:title>
        Comptes
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Détails du compte
            </h2>
            <div class="flex flex-wrap items-center gap-3">

                <!-- Back Button -->
                <a href="{{ route('account.index') }}"
                   class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour
                </a>

                @can('update', $account)
                    <!-- Edit Account -->
                    <a href="{{ route('account.edit', $account->id) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5h2m2 0h2a2 2 0 012 2v2m0 2v2m0 2v2a2 2 0
                                     01-2 2h-2m-2 0h-2m-2 0H7a2 2 0
                                     01-2-2v-2m0-2v-2m0-2V7a2 2
                                     0 012-2h2" />
                        </svg>
                        Modifier
                    </a>

                    <!-- Add Movement -->
                    <a href="{{ route('movement.create', $account->id) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        Ajouter un mouvement
                    </a>
                @endcan
            </div>
        </div>

        <!-- Account Details Card -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <!-- Header Section -->
            <div class="flex items-center mb-6">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 7h.01M7 3h5c.512 0
                                 1.024.195 1.414.586l7
                                 7a2 2 0 010 2.828l-7
                                 7a2 2 0 01-2.828
                                 0l-7-7A2 2 0
                                 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">{{ $account->name }}</h3>
            </div>

            <!-- Balance & Currency -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Solde actuel</span>
                    <p class="text-lg font-semibold text-gray-900 mt-1">
                        {{ number_format($account->balance, 2) }} {{ strtoupper($account->currency) }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Devise</span>
                    <p class="text-lg font-semibold text-gray-900 mt-1">
                        {{ strtoupper($account->currency) }}
                    </p>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="mt-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                    <h4 class="text-lg font-semibold text-gray-800">
                        Historique des transactions récentes
                    </h4>
                    <a href="{{ route('movements.export.csv') }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-green-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        Exporter en CSV
                    </a>
                </div>

                @if ($movements->isEmpty())
                    <div class="flex flex-col items-center justify-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21
                                     12a9 9 0 11-18 0 9 9 0
                                     0118 0z"/>
                        </svg>
                        <p class="text-gray-600 text-sm">Aucune transaction récente.</p>
                    </div>
                @else
                    <div class="divide-y divide-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                        @foreach ($movements as $movement)
                            <a href="{{ route('movement.show', $movement->id) }}"
                               class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition">
                                <div class="flex items-center gap-4">
                                    <div class="p-2 rounded-full {{ $movement->nature === 'income' ? 'bg-emerald-100' : 'bg-rose-100' }}">
                                        <svg class="w-6 h-6 {{ $movement->nature === 'income' ? 'text-emerald-600' : 'text-rose-600' }}"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="{{ $movement->nature === 'income'
                                                        ? 'M5 10l7-7m0 0l7 7m-7-7v18'
                                                        : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $movement->label }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ $movement->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-sm font-bold {{ $movement->nature === 'income' ? 'text-emerald-600' : 'text-rose-600' }}">
                                    {{ $movement->nature === 'income' ? '+' : '-' }}
                                    {{ number_format($movement->amount, 2) }} {{ strtoupper($movement->currency) }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout-dashboard>
