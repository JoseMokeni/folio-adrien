<x-layout-register>
    <!-- Carte principale -->
    <div class="relative z-10 w-full max-w-md glass-morphism border border-white/10 p-8">
        <!-- Logo simplifié -->
        <div class="flex justify-center mb-8">

                <img class="w-32 text-white" src="/images/logo.png" alt="Logo">
        </div>

        <!-- En-tête -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white mb-2">Créer un compte</h1>
            <p class="text-white/70 text-sm">Rejoignez-nous pour gérer vos finances</p>
        </div>

        <!-- Message d'erreur global -->
        @if (session('error'))
            <div class="mb-6 bg-red-500/20 border border-red-400/30 text-red-300 rounded-xl p-3 text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-white/90 mb-2">Nom complet</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                    class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white
                    placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300"
                    placeholder="Jean Dupont">
                @error('name')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-white/90 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
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

            <!-- Confirmation du mot de passe -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-white/90 mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-white
                    placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all duration-300"
                    placeholder="••••••••">
                @error('password_confirmation')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold
                hover:from-indigo-600 hover:to-purple-700 transform hover:scale-[1.02] transition-all duration-300
                focus:outline-none focus:ring-2 focus:ring-white/30 shadow-lg mt-6">
                Créer mon compte
            </button>
        </form>

        <!-- Lien vers connexion -->
        <div class="text-center mt-8 pt-6 border-t border-white/10">
            <p class="text-white/70 text-sm">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="text-white font-semibold hover:text-indigo-300 transition-colors duration-300 ml-1">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</x-layout-register>
