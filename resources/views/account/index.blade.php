<x-layout-dashboard>
    <x-slot:title>
        Comptes
    </x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="flex items-center p-4 mb-6 text-green-700 bg-green-50 rounded-xl border border-green-200 shadow-sm animate-fade-in">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9
                             10.586 7.707 9.293a1 1 0 00-1.414
                             1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center p-4 mb-6 text-red-700 bg-red-50 rounded-xl border border-red-200 shadow-sm animate-fade-in">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
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
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
                Liste des comptes
            </h2>
            <a href="{{ route('account.create') }}"
               class="inline-flex items-center gap-2 rounded-md bg-emerald-500 px-5 py-2 text-sm sm:text-base font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Ajouter un compte
            </a>
        </div>

        <!-- Accounts List -->
        <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 border border-gray-200">
            @forelse ($accounts as $account)
                <a href="{{ route('account.show', $account->id) }}"
                   class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 mb-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all shadow-sm border border-gray-200 group">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 group-hover:bg-indigo-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195
                                         1.414.586l7 7a2 2 0 010 2.828l-7
                                         7a2 2 0 01-2.828 0l-7-7A2
                                         2 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 text-base sm:text-lg">{{ $account->name }}</span>
                    </div>
                    <span class="text-gray-800 font-semibold text-lg sm:text-xl">
                        {{ number_format($account->balance, 2) }} {{ strtoupper($account->currency) }}
                    </span>
                </a>
            @empty
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-10 px-4 bg-gray-50 rounded-xl border border-gray-200 text-center">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21
                                 12a9 9 0 11-18 0 9 9 0
                                 0118 0z"/>
                    </svg>
                    <p class="text-gray-700 font-medium text-base">Aucun compte trouvé</p>
                    <a href="{{ route('account.create') }}"
                       class="mt-4 inline-flex items-center gap-2 rounded-md bg-indigo-500 px-5 py-2 text-sm sm:text-base font-semibold text-white shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Créer un compte
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-layout-dashboard>
