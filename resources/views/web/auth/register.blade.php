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
                    <h3 class="text-2xl">Sign up your account!</h3>
                    <a href="{{ route('web.auth.login') }}" class="text-sm underline">Already have an account?</a>
                </div>

                <form method="POST" action="{{ route('web.auth.register') }}">
                    @csrf

                    <div class="mt-8">
                        <div class="switches-container">
                            <input type="radio" id="switchEmployer" name="type" value="hire"
                                checked="checked" />
                            <input type="radio" id="switchFreelancer" name="type" value="work" />
                            <label for="switchEmployer" class="flex items-center justify-center">
                                <svg fill="#ffffff" class="w-5 h-5 mr-3" viewBox="0 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M30 5.984h-7.988v-1.938c0-1.655-1.346-3-3-3h-6.014c-1.655 0-3 1.345-3 3v1.938h-7.999c-1.099 0-2 0.901-2 2v7.008h-0.001v2h0.001v11.963c0 1.099 0.9 2 2 2h28c1.099 0 2-0.901 2-2v-20.971c0-1.099-0.901-2-2-2h0zM11.999 4.046c0-0.552 0.448-1 1-1h6.013c0.552 0 1 0.448 1 1v1.938h-8.014zM2.001 7.984h28v7.008h-11.012v-1.024c0-1.102-0.898-2-2-2h-1.992c-1.102 0-2 0.898-2 2v1.024h-10.996v-7.008zM16.99 19.004h-1.994v-5.036h1.992zM2 28.954v-11.963h10.996v2.012c0 1.102 0.897 2 2 2h1.992c1.102 0 2-0.898 2-2v-2.012h11.012v11.963h-28z">
                                        </path>
                                    </g>
                                </svg>
                                Employer
                            </label>
                            <label for="switchFreelancer" class="flex items-center justify-center">
                                <svg fill="#ffffff" class="w-5 h-5 mr-3" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <path
                                                    d="M433.425,317.697c-33.422-33.422-74.616-56.236-119.502-66.794l-29.238,29.238l12.813,155.138 c0.434,5.263-0.999,10.51-4.05,14.821l-29.235,41.31c-1.887,2.666-4.949,4.25-8.214,4.25s-6.327-1.584-8.214-4.25l-29.235-41.31 c-3.05-4.311-4.484-9.559-4.05-14.821l12.813-155.138l-29.238-29.238c-44.886,10.558-86.081,33.372-119.502,66.794 C31.182,365.089,5.082,428.1,5.082,495.122c0,9.321,7.557,16.878,16.878,16.878h468.08c9.321,0,16.878-7.557,16.878-16.878 C506.918,428.1,480.817,365.089,433.425,317.697z">
                                                </path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <circle cx="256.003" cy="111.54" r="111.54"></circle>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Freelancer
                            </label>
                            <div class="switch-wrapper">
                                <div class="switch">
                                    <div class="flex items-center justify-center">
                                        <svg fill="#000000" class="w-5 h-5 mr-3" viewBox="0 0 32 32" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M30 5.984h-7.988v-1.938c0-1.655-1.346-3-3-3h-6.014c-1.655 0-3 1.345-3 3v1.938h-7.999c-1.099 0-2 0.901-2 2v7.008h-0.001v2h0.001v11.963c0 1.099 0.9 2 2 2h28c1.099 0 2-0.901 2-2v-20.971c0-1.099-0.901-2-2-2h0zM11.999 4.046c0-0.552 0.448-1 1-1h6.013c0.552 0 1 0.448 1 1v1.938h-8.014zM2.001 7.984h28v7.008h-11.012v-1.024c0-1.102-0.898-2-2-2h-1.992c-1.102 0-2 0.898-2 2v1.024h-10.996v-7.008zM16.99 19.004h-1.994v-5.036h1.992zM2 28.954v-11.963h10.996v2.012c0 1.102 0.897 2 2 2h1.992c1.102 0 2-0.898 2-2v-2.012h11.012v11.963h-28z">
                                                </path>
                                            </g>
                                        </svg>
                                        Employer
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <svg fill="#000000" class="w-5 h-5 mr-3" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M433.425,317.697c-33.422-33.422-74.616-56.236-119.502-66.794l-29.238,29.238l12.813,155.138 c0.434,5.263-0.999,10.51-4.05,14.821l-29.235,41.31c-1.887,2.666-4.949,4.25-8.214,4.25s-6.327-1.584-8.214-4.25l-29.235-41.31 c-3.05-4.311-4.484-9.559-4.05-14.821l12.813-155.138l-29.238-29.238c-44.886,10.558-86.081,33.372-119.502,66.794 C31.182,365.089,5.082,428.1,5.082,495.122c0,9.321,7.557,16.878,16.878,16.878h468.08c9.321,0,16.878-7.557,16.878-16.878 C506.918,428.1,480.817,365.089,433.425,317.697z">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <circle cx="256.003" cy="111.54" r="111.54">
                                                        </circle>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        Freelancer
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            :value="old('phone')" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email')" autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4" x-data="{ show: true }">
                        <x-input-label for="password" :value="__('Password')" />

                        <div class="relative">
                            <input
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none  text-base"
                                :type="show ? 'password' : 'text'" name="password" id="password" autocomplete="off"
                                type="password">

                            <div class="absolute top-1/2 right-4 cursor-pointer" style="transform: translateY(-50%);">
                                <svg class="h-4 text-gray-700 block" fill="none" @click="show = !show"
                                    :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>

                                <svg class="h-4 text-gray-700 hidden" fill="none" @click="show = !show"
                                    :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4" x-data="{ show: true }">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <div class="relative">
                            <input
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none  text-base"
                                :type="show ? 'password' : 'text'" name="password_confirmation" id="password_confirmation" autocomplete="off"
                                type="password">

                            <div class="absolute top-1/2 right-4 cursor-pointer" style="transform: translateY(-50%);">
                                <svg class="h-4 text-gray-700 block" fill="none" @click="show = !show"
                                    :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>

                                <svg class="h-4 text-gray-700 hidden" fill="none" @click="show = !show"
                                    :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center mt-4">
                        <input id="link-checkbox" type="checkbox" name="term"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I
                            agree with the <a href="{{ route('web.starter.term') }}"
                                class="text-blue-600 dark:text-blue-500 hover:underline">terms and
                                conditions</a>.</label>
                    </div>

                    <x-input-error :messages="$errors->get('term')" class="mt-2" />

                    <div class="w-full mt-8">
                        <x-primary-button class="justify-center">
                            {{ __('Register') }}
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
