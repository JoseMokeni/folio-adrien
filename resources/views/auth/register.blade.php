<x-layout-register>
    <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-16 w-auto drop-shadow-xl" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Logo">
            <h2 class="mt-6 text-center text-4xl font-bold tracking-tight text-white">Créer un compte</h2>
            <p class="mt-2 text-center text-sm text-white/80">
                Ou
                <a href="{{ route('login') }}" class="font-medium text-white hover:text-white/90 underline decoration-2 decoration-white/30 hover:decoration-white/70">
                    connectez-vous à votre compte
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white/10 backdrop-blur-lg py-8 px-4 shadow-2xl rounded-2xl border border-white/20 sm:px-10">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-white">Nom complet</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required
                                class="block w-full bg-white/5 rounded-lg border border-white/10 px-4 py-3 text-white placeholder-white/50 shadow-sm backdrop-blur-sm focus:border-white/30 focus:ring-2 focus:ring-white/30 sm:text-sm"
                                placeholder="John Doe">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white">Adresse email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" required
                                class="block w-full bg-white/5 rounded-lg border border-white/10 px-4 py-3 text-white placeholder-white/50 shadow-sm backdrop-blur-sm focus:border-white/30 focus:ring-2 focus:ring-white/30 sm:text-sm"
                                placeholder="nom@exemple.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-white">Mot de passe</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required
                                class="block w-full bg-white/5 rounded-lg border border-white/10 px-4 py-3 text-white placeholder-white/50 shadow-sm backdrop-blur-sm focus:border-white/30 focus:ring-2 focus:ring-white/30 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-white">Confirmer le mot de passe</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full bg-white/5 rounded-lg border border-white/10 px-4 py-3 text-white placeholder-white/50 shadow-sm backdrop-blur-sm focus:border-white/30 focus:ring-2 focus:ring-white/30 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-lg bg-white py-3 px-4 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/30 transition duration-200">
                            S'inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-register>
