<x-layout-dashboard>
    <x-slot:title>
        Modifier la catégorie
    </x-slot:title>

    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <svg class="w-7 h-7 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m2 0h2a2 2 0 012
                        2v2m0 2v2m0 2v2a2 2 0
                        01-2 2h-2m-2 0h-2m-2
                        0H7a2 2 0
                        01-2-2v-2m0-2v-2m0-2V7a2
                        2 0 012-2h2" />
                </svg>
                Modifier la catégorie
            </h2>
            <a href="{{ route('category.index') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>

        <!-- Edit Category Card -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <!-- Title -->
            <h3 class="text-xl font-semibold text-gray-800 mb-6">
                Modifier la catégorie :
                <span class="text-indigo-600">"{{ $category->name }}"</span>
            </h3>

            <!-- Form -->
            <form method="POST" action="{{ route('category.update', $category->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Category Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom de la catégorie
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Ex : Nourriture et Boissons"
                        required
                        value="{{ old('name', $category->name) }}"
                        class="w-full rounded-lg border border-gray-300 shadow-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-gray-100">
                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer
                    </button>

                    <!-- Cancel Button -->
                    <a
                        href="{{ route('category.index') }}"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
