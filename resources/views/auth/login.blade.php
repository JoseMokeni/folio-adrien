<x-layout-login>
    <div class="min-h-screen bg-gradient-to-br from-primary-600 via-accent-600 to-primary-800 flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-1/2 -left-1/2 w-96 h-96 bg-gradient-radial from-white/20 to-transparent rounded-full animate-bounce-gentle"></div>
            <div class="absolute -bottom-1/2 -right-1/2 w-96 h-96 bg-gradient-radial from-white/20 to-transparent rounded-full animate-bounce-gentle" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-radial from-accent-300/30 to-transparent rounded-full animate-bounce-gentle" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex flex-col items-center mb-8">
                <div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-white/20 to-white/10 backdrop-blur-lg border border-white/30 flex items-center justify-center shadow-glass mb-6">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">ExpenseTracker</h1>
                <p class="text-white/80 text-lg font-medium">Votre gestionnaire financier personnel</p>
            </div>

            <h2 class="text-center text-3xl font-bold tracking-tight text-white mb-2">Bienvenue de retour</h2>
            <p class="text-center text-sm text-white/80 mb-8">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="font-medium text-white hover:text-white/90 underline decoration-2 decoration-white/50 hover:decoration-white/80 transition-all duration-300 ml-1">
                    Créez-en un maintenant
                </a>
            </p>
        </div>

        <div class="relative sm:mx-auto sm:w-full sm:max-w-md">
            <div class="glass-morphism py-10 px-6 shadow-glass rounded-3xl border border-white/20 backdrop-blur-xl sm:px-10">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-white mb-2">Adresse email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/60 group-focus-within:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" required
                                class="block w-full pl-10 pr-4 py-3 bg-white/10 rounded-xl border border-white/20 text-white placeholder-white/60 shadow-inner backdrop-blur-sm focus:border-white/40 focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300 sm:text-sm"
                                placeholder="nom@exemple.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-200 bg-red-500/20 rounded-lg px-3 py-2 border border-red-300/30">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-white mb-2">Mot de passe</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/60 group-focus-within:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-4 py-3 bg-white/10 rounded-xl border border-white/20 text-white placeholder-white/60 shadow-inner backdrop-blur-sm focus:border-white/40 focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-200 bg-red-500/20 rounded-lg px-3 py-2 border border-red-300/30">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-white/30 bg-white/10 text-primary-600 focus:ring-white/30 focus:ring-offset-0">
                            <label for="remember-me" class="ml-2 block text-sm text-white/80">Se souvenir de moi</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-white/80 hover:text-white transition-colors duration-300">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-primary-600 bg-white hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white/30 focus:ring-offset-transparent transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-primary-500 group-hover:text-primary-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                            </span>
                            Se connecter
                        </button>
                    </div>
                </form>

                <!-- Social Login Options -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-white/20"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-transparent text-white/60">Ou continuez avec</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="w-full inline-flex justify-center py-2 px-4 border border-white/20 rounded-xl shadow-sm bg-white/10 text-sm font-medium text-white hover:bg-white/20 transition-all duration-300">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                            <span class="ml-2">Google</span>
                        </button>

                        <button class="w-full inline-flex justify-center py-2 px-4 border border-white/20 rounded-xl shadow-sm bg-white/10 text-sm font-medium text-white hover:bg-white/20 transition-all duration-300">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-2">GitHub</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom branding -->
        <div class="relative mt-12 text-center">
            <div class="text-white/60 text-sm">
                <p>© {{ date('Y') }} ExpenseTracker Pro. Tous droits réservés.</p>
                <p class="mt-2">Développé avec ❤️ par Paul Adrien</p>
            </div>
        </div>
    </div>
</x-layout-login>
