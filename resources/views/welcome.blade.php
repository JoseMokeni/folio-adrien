<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Arrière-plan animé */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            background: linear-gradient(135deg, #eef2ff, #fdfdea);
        }

        /* Bulles animées */
        .bubble {
            position: absolute;
            bottom: -100px;
            background: rgba(79, 70, 229, 0.15); /* Indigo doux */
            border-radius: 50%;
            animation: rise 15s infinite ease-in;
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
            100% {
                transform: translateY(-110vh) scale(1.5);
                opacity: 0;
            }
        }

        /* Tailles et vitesses des bulles */
        .bubble:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-duration: 12s; }
        .bubble:nth-child(2) { left: 30%; width: 100px; height: 100px; animation-duration: 18s; }
        .bubble:nth-child(3) { left: 50%; width: 40px; height: 40px; animation-duration: 10s; }
        .bubble:nth-child(4) { left: 70%; width: 80px; height: 80px; animation-duration: 20s; }
        .bubble:nth-child(5) { left: 90%; width: 50px; height: 50px; animation-duration: 15s; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-50 relative">

    <!-- Arrière-plan animé -->
    <div class="background-animation">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <!-- Contenu principal -->
    <div class="px-6 py-20 w-full max-w-lg content-center rounded-xl shadow-xl bg-white bg-opacity-90 backdrop-blur-md">
        <div class="w-full">
            <img src="https://images.pexels.com/photos/4386372/pexels-photo-4386372.jpeg?auto=compress&cs=tinysrgb&w=600"
     alt="Gestion des finances"
     class="mx-auto h-20 w-auto" />


            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Page de test</h2>
        </div>

        @if (session('error'))
            <div class="mt-4 text-red-600 text-center">{{ session('error') }}</div>
        @endif

        <div class="mt-10 w-full">
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-4">
                    <!-- Champ Nom -->
                    <label for="name" class="block text-sm font-semibold text-indigo-700">Nom</label>
                    <input type="text" id="name" name="name"
                        class="bg-indigo-50 border border-indigo-300 text-gray-900 text-sm rounded-lg
                               hover:bg-yellow-50 hover:border-yellow-400
                               focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5
                               placeholder-gray-400 transition-all duration-300"
                        placeholder="John Doe" required />

                    <!-- Champ Email -->
                    <label for="email" class="block text-sm font-semibold text-indigo-700">Adresse e-mail</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                        class="bg-indigo-50 border border-indigo-300 text-gray-900 text-sm rounded-lg
                               hover:bg-yellow-50 hover:border-yellow-400
                               focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5
                               placeholder-gray-400 transition-all duration-300"
                        placeholder="exemple@mail.com" />

                    <!-- Champ Mot de passe -->
                    <label for="password" class="block text-sm font-semibold text-indigo-700">Mot de passe</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="bg-indigo-50 border border-indigo-300 text-gray-900 text-sm rounded-lg
                               hover:bg-yellow-50 hover:border-yellow-400
                               focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5
                               placeholder-gray-400 transition-all duration-300"
                        placeholder="••••••••" />

                    <!-- Champ Confirmation -->
                    <label for="password_confirmation" class="block text-sm font-semibold text-indigo-700">Confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="current-password"
                        class="bg-indigo-50 border border-indigo-300 text-gray-900 text-sm rounded-lg
                               hover:bg-yellow-50 hover:border-yellow-400
                               focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5
                               placeholder-gray-400 transition-all duration-300"
                        placeholder="••••••••" />
                </div>

                <!-- Bouton principal -->
                <div class="mt-6">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white
                               shadow-md hover:bg-yellow-400 hover:text-gray-900
                               focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400
                               transition-colors duration-300">
                        S'inscrire
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Déjà inscrit ?
                <a href="/auth/login" class="font-semibold text-indigo-600 hover:text-yellow-500 transition-colors duration-300">
                    Connectez-vous
                </a>
            </p>
        </div>
    </div>

</body>
</html>
