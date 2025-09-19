<x-layout-dashboard>
    <x-slot:title>Mon Profil</x-slot:title>

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- Success Alert -->
        @if (session('success'))
            <div class="animate-fade-in flex items-center p-4 mb-6 text-success-800 glass-morphism rounded-2xl border border-success-200/50 shadow-soft">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <span class="font-semibold">Parfait !</span>
                    <p class="text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Profile Header Card -->
        <div class="glass-morphism rounded-3xl p-8 mb-8 shadow-glass border border-white/10">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <!-- Avatar -->
                <div class="relative">
                    <div class="w-32 h-32 rounded-3xl bg-gradient-to-br from-primary-500 to-accent-600 flex items-center justify-center shadow-xl">
                        <span class="text-4xl font-bold text-white">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="text-3xl font-bold text-secondary-900 mb-2">{{ $user->name }}</h1>
                    <p class="text-lg text-secondary-600 mb-3">{{ $user->email }}</p>
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $user->role === 'admin' ? 'bg-accent-100 text-accent-700' : 'bg-primary-100 text-primary-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                        <span class="px-3 py-1 text-sm font-medium bg-success-100 text-success-700 rounded-full">
                            Membre depuis {{ $stats['member_since'] }}
                        </span>
                        <span class="px-3 py-1 text-sm font-medium bg-secondary-100 text-secondary-700 rounded-full">
                            Compte vérifié
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3 mb-8 mx-auto">
            <div class="glass-morphism rounded-2xl p-6 text-center">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                    </svg>
                </div>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['accounts_count'] }}</p>
                <p class="text-sm text-secondary-600">Comptes</p>
            </div>

            <div class="glass-morphism rounded-2xl p-6 text-center">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-success-500 to-success-600 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                    </svg>
                </div>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['movements_count'] }}</p>
                <p class="text-sm text-secondary-600">Transactions</p>
            </div>

            <div class="glass-morphism rounded-2xl p-6 text-center">
                <div class="w-12 h-12 mx-auto rounded-xl bg-gradient-to-br from-accent-500 to-accent-600 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <p class="text-2xl font-bold text-secondary-900">{{ $stats['categories_count'] }}</p>
                <p class="text-sm text-secondary-600">Catégories</p>
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="glass-morphism rounded-3xl p-8 shadow-glass border border-white/10">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-secondary-800 mb-2">Modifier mon profil</h2>
                <p class="text-sm text-secondary-600">Mettez à jour vos informations personnelles</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-secondary-700 mb-2">Nom complet</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-secondary-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 glass-morphism transition-all duration-300 @error('name') border-danger-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-secondary-700 mb-2">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-secondary-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 glass-morphism transition-all duration-300 @error('email') border-danger-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Section -->
                <div class="border-t border-white/10 pt-6">
                    <h3 class="text-lg font-semibold text-secondary-800 mb-4">Changer le mot de passe</h3>
                    <p class="text-sm text-secondary-600 mb-4">Laissez vide pour conserver le mot de passe actuel</p>

                    <!-- Current Password -->
                    <div class="mb-4">
                        <label for="current_password" class="block text-sm font-medium text-secondary-700 mb-2">Mot de passe actuel</label>
                        <input type="password" id="current_password" name="current_password"
                            class="w-full px-4 py-3 rounded-xl border border-secondary-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 glass-morphism transition-all duration-300 @error('current_password') border-danger-500 @enderror">
                        @error('current_password')
                            <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-secondary-700 mb-2">Nouveau mot de passe</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 rounded-xl border border-secondary-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 glass-morphism transition-all duration-300 @error('password') border-danger-500 @enderror">
                            @error('password')
                                <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-secondary-700 mb-2">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-4 py-3 rounded-xl border border-secondary-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 glass-morphism transition-all duration-300">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-6">
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 px-8 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Sauvegarder les modifications
                    </button>

                    <a href="{{ route('dashboard') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-white/50 hover:bg-white/70 px-6 py-3 text-sm font-medium text-secondary-700 shadow-soft hover:shadow-md transition-all duration-300 border border-white/20">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
