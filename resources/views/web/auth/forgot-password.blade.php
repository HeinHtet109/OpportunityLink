<x-guest-layout>
    <div class="bg-gray-100 md:w-1/2 order-last md:order-none">
        <div class="mx-auto max-w-[512px] px-10 pb-6 pt-40 md:pb-15">
            <div>
                <div class="mb-4">
                    <div class="flex items-start">
                        <h1 class="text-2xl font-medium" dusk="checkout-product-name">Free Platform!</h1>
                        <p class="ml-auto flex-shrink-0"><span class="ml-2 text-2xl"><span
                                    class="text-2xl line-through">$99.00</span></span></p>
                    </div><!----><!---->
                </div>
                <div class="glide group relative rounded-t bg-white mb-4 glide--swipeable glide--ltr glide--carousel"
                    dusk="checkout-product-media">
                    <div class="glide__track overflow-hidden rounded-t rounded-b" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <div class="product-media-item aspect-h-3 aspect-w-4 w-full bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(&quot;{{ asset('assets/images/default-user.jpg') }}&quot;);">
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="product-media-item aspect-h-3 aspect-w-4 w-full bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(&quot;{{ asset('assets/images/default-user.jpg') }}&quot;);">
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="product-media-item aspect-h-3 aspect-w-4 w-full bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(&quot;{{ asset('assets/images/default-user.jpg') }}&quot;);">
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="product-media-item aspect-h-3 aspect-w-4 w-full bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(&quot;{{ asset('assets/images/default-user.jpg') }}&quot;);">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="glide__arrows hidden group-hover:block" data-glide-el="controls">
                        <button
                            class=" absolute left-0 top-0 flex h-full -translate-x-2.5 transform items-center focus:outline-none"
                            data-glide-dir="<">
                            <div class="flex h-10 w-10 items-center rounded-full bg-gray-300">
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="mx-auto h-6 w-6 fill-transparent stroke-current">
                                    <path d="M4.75 11.98h14.5M11.25 18.25 4.75 12l6.5-6.25" stroke="#25252D"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </button>
                        <button
                            class=" absolute right-0 top-0 flex h-full translate-x-2.5 transform items-center focus:outline-none"
                            data-glide-dir=">">
                            <div class="flex h-10 w-10 items-center rounded-full bg-gray-300">
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="mx-auto h-6 w-6 fill-transparent stroke-current">
                                    <path d="M4.75 11.98h14.5M12.75 5.75l6.5 6.25-6.5 6.25" stroke="#25252D"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="glide__bullets absolute bottom-0 left-0 flex w-full justify-center pb-3"
                        data-glide-el="controls[nav]"><button
                            class="glide__bullet mx-0.5 h-1 w-1 rounded-full bg-white opacity-40 focus:outline-none glide__bullet--active"
                            data-glide-dir="=0"></button><button
                            class="glide__bullet mx-0.5 h-1 w-1 rounded-full bg-white opacity-40 focus:outline-none"
                            data-glide-dir="=1"></button><button
                            class="glide__bullet mx-0.5 h-1 w-1 rounded-full bg-white opacity-40 focus:outline-none"
                            data-glide-dir="=2"></button><button
                            class="glide__bullet mx-0.5 h-1 w-1 rounded-full bg-white opacity-40 focus:outline-none"
                            data-glide-dir="=3"></button><button
                            class="glide__bullet mx-0.5 h-1 w-1 rounded-full bg-white opacity-40 focus:outline-none"
                            data-glide-dir="=4"></button></div>
                </div><!---->
                <div>
                    <div class="formatted-html" dusk="checkout-product-description">
                        <h1><strong>{{ config('app.name', 'Laravel') }}</strong> is a website application for a job
                            board platform, nice, clean an
                            easy to navigate.</h1>
                    </div>
                </div><!---->
            </div>
        </div>
    </div>
    <div class="bg-white md:w-1/2 order-first md:order-none">
        <div class="mx-auto max-w-[560px] px-4 pb-10 pt-32 md:pt-15">
            <div>
                <div class="flex items-end mb-10 justify-between">
                    <h3 class="text-2xl">Reset Your Password!</h3>
                    <a href="{{ route('web.auth.login') }}" class="text-sm underline">Back to Login?</a>
                </div>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email')"  autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="justify-center">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>

                <footer class="text-center text-13 text-grey mt-5">
                    <div class="md:flex md:items-center md:justify-center">
                        <div class="inline-flex items-center">
                            <a href="https://www.lemonsqueezy.com" target="_blank"
                                class="flex items-center hover:text-wtf-majorelle">
                                <svg width="24" height="40" viewBox="0 0 24 40" fill="none"
                                    class="mr-1 h-4 w-3" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.94385 23.1854L14.472 26.658C15.4051 27.0887 16.0637 27.8113 16.4194 28.6403C17.319 30.7396 16.0894 32.8866 14.1593 33.6588C12.2288 34.4306 10.1713 33.9339 9.23584 31.7508L5.95959 24.0863C5.70571 23.4922 6.34348 22.9084 6.94385 23.1854Z"
                                        fill="#FFC233"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.39572 20.9376L15.1667 18.0066C17.7494 17.0325 20.5706 18.8756 20.5326 21.5536C20.532 21.5886 20.5314 21.6235 20.5304 21.6588C20.4746 24.2666 17.7319 26.0194 15.206 25.0968L7.40308 22.2473C6.78064 22.0201 6.77604 21.1713 7.39572 20.9376Z"
                                        fill="#FFC233"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.96192 19.9223L14.6011 16.6836C17.1396 15.6073 17.7838 12.3769 15.7957 10.5104C15.7696 10.4858 15.7436 10.4616 15.7172 10.4373C13.768 8.63208 10.5457 9.26767 9.43605 11.6454L6.00803 18.9914C5.73452 19.5773 6.35267 20.1806 6.96192 19.9223Z"
                                        fill="#FFC233"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.99467 18.6425L7.77204 11.0441C8.11638 10.102 8.0526 9.14118 7.69661 8.31219C6.79515 6.21378 4.35383 5.53642 2.42396 6.30974C0.49439 7.08335 -0.595954 8.84027 0.341386 11.0225L3.6391 18.6787C3.89482 19.2719 4.77329 19.2485 4.99467 18.6425Z"
                                        fill="#FFC233"></path>
                                </svg>
                                <span>Powered by Opportunity Link</span>
                            </a>
                        </div>
                        <div>
                            <span class="mx-1 hidden md:inline">·</span>
                            <a href="{{ route('web.starter.term') }}" target="_blank"
                                class="hover:text-wtf-majorelle"> Terms </a><span class="mx-1">·</span><a
                                href="{{ route('web.starter.privacy') }}" target="_blank"
                                class="hover:text-wtf-majorelle"> Privacy
                            </a>
                        </div>
                    </div><!---->
                </footer>
            </div>
        </div>
    </div>
</x-guest-layout>
