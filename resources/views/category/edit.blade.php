<x-layout-dashboard>
    <x-slot:title>
        Catégories
    </x-slot:title>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Edit Category Form -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Modifier la catégorie "{{ $category->name }}"</h2>
            <form method="POST" action="{{ route('category.update', $category->id) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="flex w-full">
                    <input type="text" name="name" placeholder="Nom de la catégorie" required
                        value="{{ $category->name }}"
                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="flex items-center justify-start space-x-4">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Modifier
                    </button>
                    <a href="{{ route('category.index') }}"
                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Annuler
                    </a>
                </div>
            </form>
        </div>


    </div>
</x-layout-dashboard>
