<x-layout-dashboard title="Import">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-soft p-8 text-center">
            <!-- Construction Icon -->
            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-warning-100 to-warning-200 rounded-full flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-secondary-800 mb-3">
                Page en construction
            </h2>

            <!-- Description -->
            <p class="text-secondary-600 mb-6 max-w-md mx-auto">
                La fonctionnalite d'import est actuellement en cours de developpement. Elle sera bientot disponible pour importer vos transactions depuis des fichiers CSV ou bancaires.
            </p>

            <!-- Features Coming Soon -->
            <div class="bg-secondary-50 rounded-xl p-6 max-w-lg mx-auto mb-6">
                <h3 class="text-sm font-semibold text-secondary-700 uppercase tracking-wide mb-4">Fonctionnalites a venir</h3>
                <ul class="space-y-3 text-left">
                    <li class="flex items-center text-secondary-600">
                        <svg class="w-5 h-5 text-primary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Import de fichiers CSV
                    </li>
                    <li class="flex items-center text-secondary-600">
                        <svg class="w-5 h-5 text-primary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Import depuis releves bancaires
                    </li>
                    <li class="flex items-center text-secondary-600">
                        <svg class="w-5 h-5 text-primary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Categorisation automatique
                    </li>
                </ul>
            </div>

            <!-- Back Button -->
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-medium rounded-xl shadow-md hover:shadow-lg hover:from-primary-600 hover:to-primary-700 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour au Dashboard
            </a>
        </div>
    </div>
</x-layout-dashboard>
