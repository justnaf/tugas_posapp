<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="card my-5 border-0 shadow shadow-lg">
            <div class="card-body p-lg-5">
                <div class="text-center">
                    <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                      width="200px" alt="profile">
                  </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="Password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="text-center"><button type="submit" class="btn btn-dark px-5 mb-2 w-100 mt-3">Login</button></div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Forget Your Password?
                        @if (Route::has('password.request'))
                         <a href="{{route('password.request')}} " class="text-dark fw-bold"> Recovery</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
</x-guest-layout>
