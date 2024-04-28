<nav x-data="{ open: false }"
    class="w-full antialiased bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="mx-auto max-w-7xl lg:px-32 px-8">
        <nav class="relative select-none" x-data="{ showMenu: false }">
            <div
                class="relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden md:overflow-visible lg:justify-center md:px-4 lg:px-2 xl:px-0">
                <div class="flex items-center justify-start w-1/4 h-full pr-4">
                    <a href="{{ route('web.starter.home') }}"
                        class="flex items-center py-4 shrink-0 space-x-2 font-semibold text-slate-900 lg:py-0">
                        <x-application-logo class="h-10 w-10" />
                        <span class="text-black dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>
                <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-slate-900 bg-opacity-50 z-20 lg:items-center lg:w-3/4 md:absolute lg:text-base md:bg-white md:dark:bg-gray-800 lg:p-0 lg:relative lg:flex"
                    :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                    <div
                        class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg lg:bg-transparent lg:overflow-visible lg:rounded-none lg:relative lg:flex lg:flex-row">
                        <a href="{{ route('web.starter.home') }}"
                            class="inline-flex items-center w-auto h-16 space-x-2 px-6 font-semibold leading-none text-slate-900 lg:hidden">
                            <x-application-logo class="h-10 w-10" />
                            <span class="text-black lg:text-white">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                        <div
                            class="flex flex-col items-start justify-center w-full text-center lg:space-x-8 lg:w-2/3 lg:mt-0 lg:flex-row lg:items-center">
                            <a href="{{ route('web.starter.home') }}"
                                class="inline-block w-full pl-6 lg:pl-0 py-2 font-medium mx-0 ml-6 text-sm text-left {{ Route::is('web.starter.home') ? 'text-purple-500' : 'text-slate-500' }} md:w-auto lg:px-0 md:mx-2 hover:text-purple-500 lg:mx-3 md:text-center">Home</a>
                            <a href="{{ route('web.auth.login') }}"
                                class="inline-block w-full pl-6 lg:pl-0 py-2 font-medium mx-0 ml-6 text-sm text-left text-slate-500 md:w-auto lg:px-0 md:mx-2 hover:text-purple-500 lg:mx-3 md:text-center">Post
                                a free job offer</a>
                            <a href="{{ route('web.starter.faq') }}"
                                class="inline-block w-full pl-6 lg:pl-0 py-2 font-medium ml-6 mx-0 text-sm text-left {{ Route::is('web.starter.faq') ? 'text-purple-500' : 'text-slate-500' }} md:w-auto lg:px-0 md:mx-2 hover:text-purple-500 lg:mx-3 md:text-center">FAQs</a>
                            <a href="{{ route('web.starter.about') }}"
                                class="inline-block w-full pl-6 lg:pl-0 py-2 font-medium ml-6 mx-0 text-sm text-left {{ Route::is('web.starter.about') ? 'text-purple-500' : 'text-slate-500' }} md:w-auto lg:px-0 md:mx-2 hover:text-purple-500 lg:mx-3 md:text-center">About</a>
                            <a href="{{ route('web.starter.contact') }}"
                                class="inline-block w-full pl-6 lg:pl-0 py-2 font-medium ml-6 mx-0 text-sm text-left {{ Route::is('web.starter.contact') ? 'text-purple-500' : 'text-slate-500' }} md:w-auto lg:px-0 md:mx-2 hover:text-purple-500 lg:mx-3 md:text-center">Contact</a>
                        </div>
                        <div
                            class="flex justify-between items-center lg:justify-end w-full pt-4 lg:w-1/3 ml-auto flex-row lg:py-0">
                            @if (Auth::guard('web')->check() || Auth::guard('admin')->check())
                                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                    class="font-medium rounded-lg text-sm px-5 py-2.5 text-left inline-flex items-center dark:text-white"
                                    type="button">
                                    <div class="mr-2 rounded-lg bg-white p-2">
                                        <img src="{{ asset(Auth::guard('web')->check() ? Auth::guard('web')->user()->photo : Auth::guard('admin')->user()->photo) }}" alt="User" class="w-5 h-5">
                                    </div>
                                    <p class="text-black dark:lg:text-white">Account</p>
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path class="stroke-black dark:lg:stroke-white" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownDivider"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="{{ route('web.auth.login') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                        </li>
                                        @if (Auth::guard('web')->check() && Auth::guard('web')->user()->isFreelancer())
                                        <li>
                                            <a href="{{ route('web.freelancers.managejob.wishlistedJob.index') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Wish List</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{ Auth::guard('web')->check() ? route('web.profile.edit') : route('admin.profile.edit') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Profile</a>
                                        </li>
                                    </ul>
                                    <div class="py-2">
                                        <form method="POST"
                                            action="{{ Auth::guard('web')->check() ? route('web.logout') : route('admin.logout') }}">
                                            @csrf
                                            <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('web.auth.login') }}"
                                    class="inline-flex items-center w-full px-5 py-3 text-sm leading-4 text-white bg-purple-500 lg:w-auto lg:rounded-full hover:bg-purple-50 duration-200 hover:text-purple-500 focus:outline-none lg:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500">
                                    Sign In</a>
                            @endif
                            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                                x-on:click="darkMode = !darkMode"
                                class="relative mx-5 inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2"
                                role="switch" aria-checked="false">
                                <span class="sr-only">Dark mode toggle</span>
                                <span
                                    x-bind:class="darkMode ? 'translate-x-5 bg-white' :
                                        'translate-x-0 bg-white border border-gray-600'"
                                    class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full ring-0 transition duration-200 ease-in-out">
                                    <span
                                        x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' :
                                            'opacity-100 ease-in duration-200'"
                                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity "
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-black"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span
                                        x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' :
                                            'opacity-0 ease-out duration-100'"
                                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-black"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                        </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div @click="showMenu = !showMenu"
                    class="absolute right-0 flex flex-col items-center lg:items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer lg:hidden hover:bg-slate-100 z-30">
                    <svg class="w-6 h-6 text-slate-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6 text-slate-700" x-show="showMenu" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
            </div>
        </nav>
    </div>
</nav>
