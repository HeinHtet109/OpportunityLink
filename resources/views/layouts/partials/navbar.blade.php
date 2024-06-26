<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ Auth::guard('admin')->check()? route('admin.dashboard'): (Auth::guard('web')->user()->isFreelancer()? route('web.freelancers.dashboard'): route('web.employers.dashboard')) }}"
                    class="flex ml-2 md:mr-8">
                    <x-application-logo class="fill-current text-gray-500 h-10 w-10" />
                    <span
                        class="self-center hidden sm:block text-lg font-semibold sm:text-lg whitespace-nowrap dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                </a>
            </div>

            <div class="flex items-center">
                @if (Auth::guard('web')->check())
                    <!-- Notifications -->
                    <button type="button" data-dropdown-toggle="notification-dropdown"
                        class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                        @if (count(auth()->user()->unreadNotifications) > 0)
                            <span class="absolute rounded-full px-1 mt-4 top-0 -ml-4 bg-red-500 text-white text-xs">{{ count(auth()->user()->unreadNotifications) }}</span>
                        @endif
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700"
                        id="notification-dropdown">
                        <div
                            class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Notifications
                        </div>
                        <div>
                            @if (count(auth()->user()->notifications) > 0)
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    @if ($notification->type == 'App\Notifications\ConfirmJobNotification')
                                        <a href="{{ route('web.freelancers.managejob.activeJob.index') }}"
                                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="flex items-center justify-center w-11 h-11 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                                                    <svg class="w-8 h-8 text-white" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                        </path>
                                                        <path
                                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="w-full pl-3">
                                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-white">
                                                    {{ $notification->data['data'] }}
                                                </div>
                                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>
                                    @elseif ($notification->type == 'App\Notifications\ChatMessageNotification')
                                        <a href="{{ $notification->data['route'] }}"
                                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="flex items-center justify-center w-11 h-11 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                                                    <svg class="w-8 h-8 text-white" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                        </path>
                                                        <path
                                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="w-full pl-3">
                                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-white">
                                                    {{ $notification->data['data'] }}
                                                </div>
                                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                    @endif
                                @endforeach

                                @foreach (auth()->user()->readNotifications as $notification)
                                    <a href="{{ route('web.freelancers.managejob.activeJob.index') }}"
                                        class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center w-11 h-11 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                    </path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="w-full pl-3">
                                            <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                                {{ $notification->data['data'] }}
                                            </div>
                                            <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div
                                    class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                            No Notification Available Yet!
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (count(auth()->user()->unreadNotifications) > 0)
                            <a href="{{ route('web.notification.markAsRead') }}"
                                class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                                <div class="inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Mark as Read
                                </div>
                            </a>
                        @endif
                    </div>
                @endif

                <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                    x-on:click="darkMode = !darkMode"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-transparent focus:ring-offset-2"
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-black" viewBox="0 0 20 20"
                                fill="currentColor">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-black" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                            </svg>
                        </span>
                    </span>
                </button>

                <!-- Profile -->
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="{{ Auth::guard('admin')->check() ? asset(Auth::guard('admin')->user()->photo) ?? '' : asset(Auth::guard('web')->user()->photo) ?? '' }}"
                                alt="user photo" />
                        </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-2">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name ?? '' : Auth::guard('web')->user()->name ?? '' }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->email ?? '' : Auth::guard('web')->user()->email ?? '' }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ Auth::guard('admin')->check() ? route('admin.profile.edit') : route('web.profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Profile</a>
                            </li>
                            <li>
                                <form method="POST"
                                    action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('web.logout') }}">
                                    @csrf
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
