<x-layout-landing>
    <x-slot:title>Folio - Gérez vos finances simplement</x-slot:title>

    <!-- Navigation -->
    <nav class="relative z-50 px-6 py-4">
        <div class="mx-auto max-w-7xl flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img class="h-10 w-auto" src="/images/logo.png" alt="Folio">
                <span class="text-2xl font-bold text-white">Folio</span>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Fonctionnalités</a>
                <a href="#testimonials" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Témoignages</a>
                <a href="#pricing" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Tarifs</a>
                <a href="#contact" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Contact</a>
            </div>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}"
                   class="text-white/90 hover:text-white transition-colors duration-300 font-medium">
                    Connexion
                </a>
                <a href="{{ route('register') }}"
                   class="bg-white/20 hover:bg-white/30 text-white px-6 py-2.5 rounded-xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20">
                    Commencer gratuitement
                </a>
            </div>

            <!-- Mobile menu button -->
            <button id="mobile-menu-btn" class="md:hidden text-white">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 glass-morphism rounded-2xl p-4">
            <div class="flex flex-col space-y-4">
                <a href="#features" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Fonctionnalités</a>
                <a href="#testimonials" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Témoignages</a>
                <a href="#pricing" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Tarifs</a>
                <a href="#contact" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Contact</a>
                <hr class="border-white/20">
                <a href="{{ route('login') }}" class="text-white/90 hover:text-white transition-colors duration-300 font-medium">Connexion</a>
                <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 text-white px-6 py-2.5 rounded-xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20 text-center">
                    Commencer gratuitement
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 py-20 lg:py-32">
        <div class="mx-auto max-w-7xl text-center">
            <div class="animate-fade-in">
                <h1 class="text-5xl lg:text-7xl font-bold text-white mb-8 leading-tight">
                    Gérez vos finances
                    <span class="block bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">
                        en toute simplicité
                    </span>
                </h1>

                <p class="text-xl lg:text-2xl text-white/80 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Folio vous aide à prendre le contrôle de vos finances personnelles avec des outils intuitifs,
                    des rapports détaillés et une interface moderne.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                    <a href="{{ route('register') }}"
                       class="group bg-white text-gray-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        Commencer gratuitement
                        <svg class="inline-block ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#demo"
                       class="group glass-morphism text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-white/10 transition-all duration-300 transform hover:scale-105 border border-white/20">
                        Voir la démo
                        <svg class="inline-block ml-2 h-5 w-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </a>
                </div>

                <!-- Features Preview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="glass-morphism rounded-2xl p-6 text-center animate-fade-in" style="animation-delay: 0.2s">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-blue-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Suivi en temps réel</h3>
                        <p class="text-white/70 text-sm">Visualisez vos dépenses et revenus instantanément</p>
                    </div>

                    <div class="glass-morphism rounded-2xl p-6 text-center animate-fade-in" style="animation-delay: 0.4s">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-pink-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Comptes multiples</h3>
                        <p class="text-white/70 text-sm">Gérez tous vos comptes bancaires en un seul endroit</p>
                    </div>

                    <div class="glass-morphism rounded-2xl p-6 text-center animate-fade-in" style="animation-delay: 0.6s">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Sécurisé</h3>
                        <p class="text-white/70 text-sm">Vos données sont protégées avec un chiffrement avancé</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="relative z-10 px-6 py-20 bg-white/5 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">Fonctionnalités puissantes</h2>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">
                    Découvrez tous les outils dont vous avez besoin pour gérer efficacement vos finances personnelles
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Tableaux de bord</h3>
                    <p class="text-white/70 leading-relaxed">
                        Visualisez vos finances avec des graphiques interactifs et des métriques clés en temps réel.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Gestion des budgets</h3>
                    <p class="text-white/70 leading-relaxed">
                        Créez et suivez vos budgets mensuels avec des alertes intelligentes et des recommandations.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Catégorisation</h3>
                    <p class="text-white/70 leading-relaxed">
                        Organisez automatiquement vos transactions par catégories pour une meilleure analyse.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Import / Export</h3>
                    <p class="text-white/70 leading-relaxed">
                        Importez vos données bancaires et exportez vos rapports en quelques clics seulement.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Sécurité avancée</h3>
                    <p class="text-white/70 leading-relaxed">
                        Protection maximale avec chiffrement de bout en bout et authentification à deux facteurs.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="glass-morphism rounded-3xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Application mobile</h3>
                    <p class="text-white/70 leading-relaxed">
                        Accédez à vos finances partout avec notre application mobile native et intuitive.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative z-10 px-6 py-20">
        <div class="mx-auto max-w-4xl text-center">
            <div class="glass-morphism rounded-3xl p-12">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Prêt à transformer vos finances ?
                </h2>
                <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
                    Rejoignez des milliers d'utilisateurs qui ont déjà pris le contrôle de leur budget avec Folio.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}"
                       class="group bg-white text-gray-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        Commencer maintenant
                        <svg class="inline-block ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="{{ route('login') }}"
                       class="text-white/90 hover:text-white transition-colors duration-300 font-medium text-lg">
                        Vous avez déjà un compte ? Connectez-vous
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 bg-white/5 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <img class="h-8 w-auto" src="/images/logo.png" alt="Folio">
                        <span class="text-xl font-bold text-white">Folio</span>
                    </div>
                    <p class="text-white/70 mb-4 max-w-md">
                        La solution complète pour gérer vos finances personnelles en toute simplicité et sécurité.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white/60 hover:text-white transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white/60 hover:text-white transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378 0 0-.599 2.282-.744 2.840-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white/60 hover:text-white transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Produit</h3>
                    <div class="space-y-2">
                        <a href="#features" class="block text-white/70 hover:text-white transition-colors duration-300">Fonctionnalités</a>
                        <a href="#pricing" class="block text-white/70 hover:text-white transition-colors duration-300">Tarifs</a>
                        <a href="#" class="block text-white/70 hover:text-white transition-colors duration-300">API</a>
                        <a href="#" class="block text-white/70 hover:text-white transition-colors duration-300">Sécurité</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Support</h3>
                    <div class="space-y-2">
                        <a href="#" class="block text-white/70 hover:text-white transition-colors duration-300">Centre d'aide</a>
                        <a href="#contact" class="block text-white/70 hover:text-white transition-colors duration-300">Contact</a>
                        <a href="#" class="block text-white/70 hover:text-white transition-colors duration-300">Blog</a>
                        <a href="#" class="block text-white/70 hover:text-white transition-colors duration-300">Statut</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-white/60 text-sm">© 2024 Folio. Tous droits réservés.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-white/60 hover:text-white transition-colors duration-300 text-sm">Confidentialité</a>
                    <a href="#" class="text-white/60 hover:text-white transition-colors duration-300 text-sm">Conditions</a>
                    <a href="#" class="text-white/60 hover:text-white transition-colors duration-300 text-sm">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for mobile menu -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</x-layout-landing>
