<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ExpenseTracker - {{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        accent: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                        },
                        success: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        warning: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f',
                        },
                        danger: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                        'mesh-gradient': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'glass-gradient': 'linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0))',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'glow': '0 0 20px rgba(59, 130, 246, 0.5)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.37)',
                        'inner-light': 'inset 0 1px 0 0 rgba(255, 255, 255, 0.05)',
                    },
                    backdropBlur: {
                        'xs': '2px',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateX(-10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateX(0)'
                            }
                        },
                        bounceGentle: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-5px)'
                            }
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 5px rgba(59, 130, 246, 0.2)'
                            },
                            '100%': {
                                boxShadow: '0 0 20px rgba(59, 130, 246, 0.6)'
                            }
                        }
                    }
                },
            },
        };
    </script>
    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-secondary-50 via-primary-50 to-accent-50 min-h-screen font-sans">
    <div class="min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <nav class="glass-morphism sticky top-0 z-50 border-b border-white/10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    <img class="w-32 text-white" src="/images/logo.png" alt="Logo">


                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-1">
                        <a href="{{ route('dashboard') }}"
                            class="group relative rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-300
                           {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50 hover:shadow-soft' }}">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                </svg>
                                <span>Dashboard</span>
                            </span>
                        </a>
                        <a href="{{ route('account.index') }}"
                            class="group relative rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-300
                           {{ request()->routeIs('account.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50 hover:shadow-soft' }}">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1" />
                                </svg>
                                <span>Comptes</span>
                            </span>
                        </a>
                        <a href="{{ route('movement.index') }}"
                            class="group relative rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-300
                           {{ request()->routeIs('movement.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50 hover:shadow-soft' }}">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                                <span>Transactions</span>
                            </span>
                        </a>
                        <a href="{{ route('category.index') }}"
                            class="group relative rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-300
                           {{ request()->routeIs('category.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50 hover:shadow-soft' }}">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span>Catégories</span>
                            </span>
                        </a>
                        <a href="{{ route('import.create') }}"
                            class="group relative rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-300
                           {{ request()->routeIs('import.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50 hover:shadow-soft' }}">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                </svg>
                                <span>Import</span>
                            </span>
                        </a>
                    </div>

                    <!-- User Menu -->
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-secondary-800">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-secondary-500">Connecté</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="group relative rounded-xl bg-gradient-to-r from-danger-500 to-danger-600 px-4 py-2.5 text-sm font-medium text-white
                                    shadow-md hover:shadow-lg hover:from-danger-600 hover:to-danger-700 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-danger-400 focus:ring-offset-2">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Déconnexion</span>
                                </span>
                            </button>
                        </form>
                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="md:hidden">
                        <button id="menu-btn"
                            class="inline-flex items-center justify-center p-2 rounded-xl text-secondary-600 hover:bg-white/50 focus:outline-none focus:ring-2 focus:ring-primary-400 transition-all duration-300">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="md:hidden hidden glass-morphism border-t border-white/10 shadow-lg transition-all duration-300 ease-in-out">
                <div class="px-4 py-3 space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center space-x-3 rounded-xl px-3 py-3 text-sm font-medium transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('account.index') }}"
                        class="flex items-center space-x-3 rounded-xl px-3 py-3 text-sm font-medium transition-all duration-300 {{ request()->routeIs('account.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1" />
                        </svg>
                        <span>Comptes</span>
                    </a>
                    <a href="{{ route('movement.index') }}"
                        class="flex items-center space-x-3 rounded-xl px-3 py-3 text-sm font-medium transition-all duration-300 {{ request()->routeIs('movement.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                        </svg>
                        <span>Transactions</span>
                    </a>
                    <a href="{{ route('category.index') }}"
                        class="flex items-center space-x-3 rounded-xl px-3 py-3 text-sm font-medium transition-all duration-300 {{ request()->routeIs('category.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span>Catégories</span>
                    </a>
                    <a href="{{ route('import.create') }}"
                        class="flex items-center space-x-3 rounded-xl px-3 py-3 text-sm font-medium transition-all duration-300 {{ request()->routeIs('import.*') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-md' : 'text-secondary-700 hover:bg-white/50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                        <span>Import</span>
                    </a>

                    <!-- Mobile User Info & Logout -->
                    <div class="pt-3 border-t border-white/10">
                        <div class="px-3 py-2 text-sm">
                            <p class="font-medium text-secondary-800">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-secondary-500">Connecté</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center space-x-2 rounded-xl bg-gradient-to-r from-danger-500 to-danger-600 px-3 py-3 text-sm font-medium text-white shadow-md hover:shadow-lg transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- HEADER -->
        <header class="relative overflow-hidden">
            <!-- Background with gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary-600 via-primary-700 to-accent-600"></div>
            <!-- Animated background pattern -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute top-0 left-0 w-96 h-96 bg-gradient-radial from-white to-transparent rounded-full -translate-x-1/2 -translate-y-1/2 animate-bounce-gentle">
                </div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-radial from-white to-transparent rounded-full translate-x-1/2 translate-y-1/2 animate-bounce-gentle"
                    style="animation-delay: 1s"></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight text-white mb-4">
                        {{ $title }}
                        <span class="block text-lg font-normal text-primary-100 mt-2">
                            Gérez vos finances avec élégance et simplicité
                        </span>
                    </h1>

                    <!-- Quick stats in header -->
                    <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                        <div class="glass-morphism rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-white">{{ date('d') }}</div>
                            <div class="text-sm text-primary-200">{{ date('M Y') }}</div>
                        </div>
                        <div class="glass-morphism rounded-2xl p-4 text-center">
                            <div class="text-2xl font-bold text-white">{{ date('H:i') }}</div>
                            <div class="text-sm text-primary-200">Maintenant</div>
                        </div>
                        <div class="glass-morphism rounded-2xl p-4 text-center hidden sm:block">
                            <div class="text-xl font-bold text-success-300">Active</div>
                            <div class="text-sm text-primary-200">Session</div>
                        </div>
                        <div class="glass-morphism rounded-2xl p-4 text-center hidden lg:block">
                            <div class="text-xl font-bold text-accent-300">Pro</div>
                            <div class="text-sm text-primary-200">Version</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 relative -mt-8 z-10">
            {{ $slot }}
        </main>

        <!-- FOOTER -->
        <footer class="relative mt-auto">
            <div class="glass-morphism border-t border-white/10">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row items-center justify-between space-y-4 lg:space-y-0">
                        <div class="flex items-center space-x-4">
                            <div class="p-2 rounded-xl bg-gradient-to-r from-primary-500 to-accent-500">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-secondary-800">&copy; {{ date('Y') }}
                                    ExpenseTracker Pro</span>
                                <p class="text-xs text-secondary-500">Votre assistant financier personnel</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-6">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-secondary-600">Développé avec</span>
                                <svg class="w-5 h-5 text-danger-500 animate-bounce-gentle" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-medium text-secondary-700">par Paul Adrien</span>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-success-500 rounded-full animate-pulse"></div>
                                    <span class="text-xs text-secondary-600">En ligne</span>
                                </div>
                                <div class="text-xs text-secondary-500">v2.1.0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Enhanced mobile menu toggle with animations
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            // Add smooth transition
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.style.maxHeight = '0px';
                mobileMenu.style.opacity = '0';
                mobileMenu.offsetHeight; // Force reflow
                mobileMenu.style.maxHeight = '500px';
                mobileMenu.style.opacity = '1';
            }
        });

        // Auto-hide mobile menu on outside click
        document.addEventListener('click', (e) => {
            if (!menuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Enhanced loading animation for cards
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in');
            });
        });
    </script>
</body>

</html>
