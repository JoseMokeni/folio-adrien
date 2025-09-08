<x-layout-dashboard>
    <x-slot:title>Vos Transactions</x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 mb-8">
            <!-- Transactions du mois -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Transactions ce mois</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $movements->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Revenus & Dépenses can be uncommented and styled similarly -->
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="flex items-center p-4 mb-6 text-emerald-800 bg-emerald-50 rounded-xl border border-emerald-200 shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Transactions List -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <h2 class="text-xl font-bold text-gray-800">Transactions récentes</h2>
                <a href="{{ route('movement.create') }}"
                    class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition w-full sm:w-auto justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouvelle transaction
                </a>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse ($movements as $movement)
                    <a href="{{ route('movement.show', $movement->id) }}"
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-6 py-4 hover:bg-gray-50 transition gap-3">
                        <div class="flex items-center gap-4">
                            <div
                                class="p-2 rounded-full {{ $movement->nature === 'income' ? 'bg-emerald-100' : 'bg-rose-100' }}">
                                <svg class="w-6 h-6 {{ $movement->nature === 'income' ? 'text-emerald-600' : 'text-rose-600' }}"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $movement->nature === 'income' ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $movement->label }}</p>
                                <p class="text-xs text-gray-500">{{ $movement->account->name }}</p>
                            </div>
                        </div>
                        <span
                            class="text-sm font-bold {{ $movement->nature === 'income' ? 'text-emerald-600' : 'text-rose-600' }}">
                            {{ $movement->nature === 'income' ? '+' : '-' }}{{ number_format($movement->amount, 2) }}
                            {{ strtoupper($movement->account->currency) }}
                        </span>
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @empty
                    <div class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune transaction</h3>
                        <p class="mt-1 text-sm text-gray-500">Commencez par créer une nouvelle transaction.</p>
                        <div class="mt-6">
                            <a href="{{ route('movement.create') }}"
                                class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition w-full sm:w-auto justify-center">
                                + Nouvelle transaction
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout-dashboard>
