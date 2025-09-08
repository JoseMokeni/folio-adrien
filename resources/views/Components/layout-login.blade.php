<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion | Mon Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366F1',   // Indigo moderne
                        secondary: '#1E293B', // Slate foncé
                        accent: '#F59E0B',   // Orange doré
                        background: '#0F172A', // Fond sombre
                        surface: '#1E293B',  // Surface des cartes
                    },
                },
            },
        };
    </script>
</head>

<body class="bg-background min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Dégradé décoratif -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-700/30 via-purple-700/20 to-pink-500/10 blur-3xl"></div>

    <!-- Carte principale -->
    <div
        class="relative z-10 w-full max-w-md bg-surface/70 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/10 p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                alt="Logo" class="w-14 h-14 drop-shadow-lg">
        </div>

        <!-- Titre -->
        <h1 class="text-2xl font-bold text-white text-center">Bienvenue 👋</h1>
        <p class="text-gray-400 text-center mt-2 text-sm">Connectez-vous pour accéder à votre tableau de bord</p>

        <!-- Formulaire -->
        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Adresse e-mail</label>
                <input type="email" name="email" id="email" required autofocus
                    class="mt-1 w-full rounded-lg bg-background/60 border border-white/10 px-4 py-2.5 text-gray-100
                    placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Mot de passe</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 w-full rounded-lg bg-background/60 border border-white/10 px-4 py-2.5 text-gray-100
                    placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember"
                        class="h-4 w-4 rounded bg-background border-white/20 text-primary focus:ring-primary focus:ring-offset-background">
                    <span class="text-sm text-gray-300">Se souvenir de moi</span>
                </label>
                <a href=""
                    class="text-sm text-primary hover:underline hover:text-indigo-400 transition">
                    Mot de passe oublié ?
                </a>
            </div>

            <!-- Bouton de connexion -->
            <button type="submit"
                class="w-full py-2.5 rounded-lg bg-primary text-white font-medium shadow-md hover:bg-indigo-700
                transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-1 focus:ring-offset-background">
                Se connecter
            </button>
        </form>

        <!-- Lien d'inscription -->
        <p class="text-center text-sm text-gray-400 mt-6">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-primary hover:text-indigo-400 hover:underline transition">
                Créer un compte
            </a>
        </p>
    </div>
</body>

</html>
