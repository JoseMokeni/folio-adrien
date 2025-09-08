<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#1E293B',
                        accent: '#0EA5E9',
                        success: '#10B981',
                        warning: '#F59E0B',
                        danger: '#EF4444',
                        background: '#F8FAFC',
                        surface: '#FFFFFF',
                        'surface-dark': '#F1F5F9',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                    }
                },
            },
        };
    </script>
</head>
<body class="bg-background min-h-screen">
    <div class="min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                             alt="Logo" class="h-8 w-auto" />
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-1">
                        <a href="{{ route('dashboard') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-50' }}">
                           Dashboard
                        </a>
                        <a href="{{ route('account.index') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('account.*') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-50' }}">
                           Comptes
                        </a>
                        <a href="{{ route('movement.index') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('movement.*') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-50' }}">
                           Mouvements
                        </a>
                        <a href="{{ route('category.index') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('category.*') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-50' }}">
                           Catégories
                        </a>
                        <a href="{{ route('import.create') }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('import.*') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-50' }}">
                           Importations
                        </a>
                    </div>

                    <!-- Desktop Logout -->
                    <div class="hidden md:block">
                        <form action="{{ route('logout') }}" method="POST" class="flex items-center space-x-4">
                            @csrf
                            <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
                            <button type="submit"
                                    class="rounded-lg bg-rose-500 px-4 py-2 text-sm font-medium text-white
                                    shadow-sm hover:bg-rose-600 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2">
                                Déconnexion
                            </button>
                        </form>
                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="md:hidden">
                        <button id="menu-btn" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200 shadow-lg transition-all duration-300 ease-in-out">
                <div class="px-4 py-3 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }}">Dashboard</a>
                    <a href="{{ route('account.index') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('account.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }}">Comptes</a>
                    <a href="{{ route('movement.index') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('movement.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }}">Mouvements</a>
                    <a href="{{ route('category.index') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('category.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }}">Catégories</a>
                    <a href="{{ route('import.create') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('import.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }}">Importations</a>

                    <!-- Mobile Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="pt-3 border-t border-gray-200">
                        @csrf
                        <button type="submit"
                                class="w-full rounded-lg bg-rose-500 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-rose-600 transition-all duration-200">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- HEADER -->
        <header class="bg-gradient-to-r from-primary via-accent to-primary/80 shadow-soft">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">
                    {{ $title }}
                </h1>
                <p class="mt-2 text-primary-100/80 text-sm font-medium">
                    Gérez vos finances en toute simplicité
                </p>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 py-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="bg-surface rounded-xl shadow-soft p-6 transition-all duration-300">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">&copy; {{ date('Y') }} ExpenseTracker</span>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Made with</span>
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                  clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm text-gray-500">by Paul Adrien</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
