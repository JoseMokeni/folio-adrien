<x-layout-login>
    <!-- Carte principale -->
    <div class="relative z-10 w-full max-w-md glass-morphism border border-white/10 p-8">
        <!-- Logo simplifié -->
        <div class="flex justify-center mb-8">

                <img class="w-32 text-white" src="/images/logo.png" alt="Logo">
        </div>

        <!-- En-tête -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white mb-2">Connexion</h1>
            <p class="text-white/70 text-sm">Accédez à votre tableau de bord</p>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-white/90 mb-2">Email</label>
                <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"
                    class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white
                    placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300"
                    placeholder="votre@email.com">
                @error('email')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-white/90 mb-2">Mot de passe</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white
                    placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="h-4 w-4 rounded bg-white/10 border-white/20 text-indigo-500 focus:ring-indigo-500 focus:ring-offset-0">
                <label for="remember" class="ml-2 text-sm text-white/80">Se souvenir de moi</label>
            </div>

            <!-- Bouton de connexion -->
            <button type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold
                hover:from-indigo-600 hover:to-purple-700 transform hover:scale-[1.02] transition-all duration-300
                focus:outline-none focus:ring-2 focus:ring-white/30 shadow-lg">
                Se connecter
            </button>
        </form>

        <!-- Lien d'inscription -->
        <div class="text-center mt-8 pt-6 border-t border-white/10">
            <p class="text-white/70 text-sm">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-white font-semibold hover:text-indigo-300 transition-colors duration-300 ml-1">
                    Créer un compte
                </a>
            </p>
        </div>

        <!-- Lien mot de passe oublié -->
        <div class="text-center mt-4">
            <p class="text-white/70 text-sm">
                <a href="{{ route('password.request') }}" class="text-white font-semibold hover:text-indigo-300 transition-colors duration-300">
                    Mot de passe oublié ?
                </a>
            </p>
    </div>
</x-layout-login>
