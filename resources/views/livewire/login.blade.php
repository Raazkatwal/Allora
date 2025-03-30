<div class="bg-gray-100" x-transition>
    <div class="min-h-screen flex" x-data="{isLogin: true}">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-2xl shadow-xl py-5 px-8">
                    <div class="text-center mb-8">
                        <div class="grid place-items-center w-16 h-16 bg-sky-100 rounded-full mb-4 place-self-center">
                            <x-lucide-log-in class="w-6 text-sky-600" x-show="isLogin" />
                            <x-lucide-user-round-plus class="w-6 text-sky-600" x-show="!isLogin" />
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            <span x-text="isLogin ? 'Welcome Back!' : 'Create Account'"></span>
                        </h2>
                        <p class="text-gray-600 mt-2">
                            <span
                                x-text="isLogin ? 'Please log in to continue' : 'Get started with your Account'"></span>
                        </p>
                    </div>

                    <div x-ref="formContainer" class="overflow-hidden" :class="isLogin ? 'h-[25rem]' : 'h-[32rem]'">

                        <form @submit.prevent="isLogin ? $wire.login() : $wire.signup()">

                            <div x-show="!isLogin" class="mb-4"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90">

                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>

                                <div class="relative">
                                    <input type="text" x-bind:required="!isLogin" wire:model="username"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-600 focus:border-transparent transition-colors"
                                        placeholder="John Doe" />
                                </div>

                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <div class="relative">
                                    <input type="email" required wire:model="email"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-600 focus:border-transparent transition-colors"
                                        placeholder="you@example.com" />
                                    <x-lucide-mail class="absolute right-2 top-1/4 w-6 h-6 text-gray-400" />
                                </div>
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-4" x-data="{showPassword:false}">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" required wire:model="password"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-600 focus:border-transparent transition-colors"
                                        placeholder="••••••••••••••••" />
                                    <button type="button" tabindex="-1"
                                        class="absolute right-3 top-1/4 text-gray-400 hover:text-gray-600 cursor-pointer"
                                        @click="showPassword = !showPassword">
                                        <x-lucide-eye class="w-5" x-show="showPassword" />
                                        <x-lucide-eye-off class="w-5" x-show="!showPassword" />
                                    </button>
                                </div>
                                @if (!$errors->has('email') && $errors->has('password'))
                                <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="mb-4 flex items-center gap-2 transition-all duration-300 ease-out"
                                x-show="isLogin" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90">
                                <input type="checkbox" id="remember_me" wire:model="remember_me">
                                <label for="remember_me">Remember Me</label>
                            </div>

                            <div class="mb-4 transition-all duration-300 ease-out" x-data={showConfirmPassword:false}
                                x-show="!isLogin" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90">

                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                <div class="relative">
                                    <input :type="showConfirmPassword ? 'text' : 'password'" x-bind:required="!isLogin"
                                        wire:model="password_confirmation"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-cyan-600 focus:border-transparent transition-colors"
                                        placeholder="••••••••••••••••" />
                                    <button type="button"
                                        class="absolute right-3 top-1/4 text-gray-400 hover:text-gray-600 cursor-pointer"
                                        @click="showConfirmPassword = !showConfirmPassword">
                                        <x-lucide-eye class="w-5" x-show="showConfirmPassword" />
                                        <x-lucide-eye-off class="w-5" x-show="!showConfirmPassword" />
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="cursor-pointer w-full bg-cyan-600 text-white py-3 rounded-lg font-semibold hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-600 focus:ring-opacity-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-text="isLogin ? 'Login' : 'Signup'"></span>
                            </button>

                            <p class="mt-6 text-center text-gray-600">
                                <span
                                    x-text="isLogin ? 'Don\'t have an account ?' : 'Already have an account ?'"></span>
                                <button type="button" @click="isLogin = !isLogin" x-text="isLogin ? 'Signup' : 'Login'"
                                    class="ml-1 text-cyan-600 hover:text-cyan-700 font-semibold focus:outline-none cursor-pointer">
                                </button>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="hidden lg:block lg:w-1/2 bg-cover bg-center transition-all duration-500 ease-in-out"
            x-ref="imageContainer"
            style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80');"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">

            <div class="h-full flex items-center justify-center bg-black opacity-70">
                <div class="text-center text-white px-12">
                    <h2 class="text-4xl font-bold mb-6"
                        x-text="isLogin ? 'Login to Your Account' : 'Create a New Account'"></h2>
                    <p class="text-xl"
                        x-text="isLogin ? 'Welcome back! Enter your credentials to securely access your account. Stay connected and manage your activities with ease.' : 'Join us today! Sign up to unlock all features and start your journey with our platform. It\'s quick, easy, and free!'">
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
