<x-layout-dashboard>
    <x-slot:title>
        Transactions
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- En-tête de la page -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-3">
            <h2 class="text-2xl font-bold text-black-800">Détails de votre transaction</h2>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('movement.index') }}"
                    class="inline-flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition justify-center w-full sm:w-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour
                </a>

                @can('update', $movement)
                    <a href="{{ route('movement.edit', $movement->id) }}"
                        class="inline-flex items-center gap-2 rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition justify-center w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m2 0h2a2 2 0 012
                                         2v2m0 2v2m0 2v2a2 2 0
                                         01-2 2h-2m-2 0h-2m-2
                                         0H7a2 2 0 01-2-2v-2m0-2v-2m0-2V7a2
                                         2 0 012-2h2" />
                        </svg>
                        Modifier
                    </a>
                @endcan
            </div>
        </div>

        <!-- Carte de détails de la transaction -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <div class="flex flex-col sm:flex-row items-start sm:items-center mb-6 gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0
                                 1.024.195 1.414.586l7
                                 7a2 2 0 010 2.828l-7
                                 7a2 2 0 01-2.828
                                 0l-7-7A2 2 0
                                 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">{{ $movement->label }}</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Montant</span>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ number_format($movement->amount, 2) }} {{ strtoupper($movement->account->currency) }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Description</span>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $movement->description }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Nature de la transaction</span>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $movement->nature }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Catégorie</span>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $movement->category->name ?? 'Aucune Catégorie' }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <span class="text-sm text-gray-500">Date de la transaction</span>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $movement->created_at->format('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout-dashboard>
