<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="px-6 py-12 w-full max-w-lg content-center rounded-xl shadow-xl">
        <div class="w-full">
            <img src="/images/image.png" alt="Your Company" class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">{{ $slot }}</h2>
        </div>

        <div class="mt-10 w-full">
            <form action="" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="John" required />
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />

                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />

                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm
                        Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="current-password"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">S'inscrire</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already have an account?
                <a href="/auth/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
            <p class="mt-2 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free
                    trial</a>
            </p>
        </div>
    </div>

</body>

</html>
