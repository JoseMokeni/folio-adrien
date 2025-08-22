<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="px-6 py-12 w-full max-w-lg content-center rounded-xl shadow-xl">
        <div class="w-full">
            <img src="/images/image.png" alt="Your Company" class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">{{ $slot }}</h2>
        </div>

        <div class="mt-10 w-full">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                        class="bg-gray-100 border border-indigo-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />

                    <label for="password" class="block text-sm/6 font-medium text-gray-900 mt-4">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="bg-gray-100 border border-indigo-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div></div>
                    <div class="text-sm">
                        <a href="/auth/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Don't have an account?
                <a href="/auth/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
            </p>
            <p class="mt-2 text-center text-sm/6 text-gray-500">
            </p>
        </div>
    </div>
</body>
</html>
