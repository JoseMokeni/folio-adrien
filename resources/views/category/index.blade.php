<x-layout-dashboard>
    <x-slot:title>
        Catégories
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="flex items-center p-4 mb-6 text-green-700 bg-green-100 rounded-lg border border-green-300 shadow-sm">
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
            <div class="flex items-center p-4 mb-6 text-red-700 bg-red-100 rounded-lg border border-red-300 shadow-sm">
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
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
            <h2 class="text-2xl font-bold text-black-800">Liste des catégories</h2>
            <form method="POST" action="{{ route('category.store') }}" class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                @csrf
                <input type="text" name="name" placeholder="Nom de la catégorie" required
                       class="w-full sm:w-auto rounded-md border-gray-300 shadow-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2 text-sm">
                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition w-full sm:w-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajouter
                </button>
            </form>
        </div>

        <!-- Liste des catégories -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            @forelse ($categories as $category)
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 mb-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors shadow-sm border border-gray-200 group gap-3">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 group-hover:bg-indigo-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195
                                         1.414.586l7 7a2 2 0 010 2.828l-7
                                         7a2 2 0 01-2.828 0l-7-7A2
                                         2 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">{{ $category->name }}</span>
                    </div>

                    @if (Auth::id() == $category->user_id)
                        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                            <a href="{{ route('category.edit', $category->id) }}"
                               class="px-3 py-1 rounded-md text-xs font-semibold bg-blue-100 text-blue-700 hover:bg-blue-200 text-center transition">
                                Modifier
                            </a>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"
                                  class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full sm:w-auto px-3 py-1 rounded-md text-xs font-semibold bg-red-100 text-red-600 hover:bg-red-200 text-center transition">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <div class="p-4 text-sm text-gray-600 bg-gray-50 rounded-lg flex items-center justify-center border border-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21
                                 12a9 9 0 11-18 0 9 9 0
                                 0118 0z"/>
                    </svg>
                    Aucune catégorie trouvée.
                </div>
            @endforelse

            <!-- Pagination -->
            <div class="mt-6">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-layout-dashboard>
