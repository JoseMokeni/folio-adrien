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
        </form>

        <!-- Lien vers connexion -->
        <div class="text-center mt-8 pt-6 border-t border-white/10">
            <p class="text-white/70 text-sm">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="text-white font-semibold hover:text-indigo-300 transition-colors duration-300 ml-1">
                    Demander email de réinitialisation
                </a>
            </p>
        </div>
    </div>
</x-layout-register>
