<footer class="bg-white relative border-t dark:bg-gray-900">
    <div class="mx-auto px-8 md:px-32 py-12 max-w-7xl">
        <div class="xl:gap-8 xl:grid xl:grid-cols-3">
            <div class="text-slate-900 xl:col-span-3">
                <a class="items-center inline-flex text-slate-900 font-semibold gap-2 text-xl tracking-tighter"
                    href="/">
                    <x-application-logo class="h-10 w-10" />
                    <span class="text-dark dark:text-white">{{ config('app.name', 'Laravel') }}</span></a>
            </div>
            <div class="grid md:grid-cols-2 gap-8 grid-cols-2 lg:col-span-3 mt-5">
                <div class="grid lg:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-slate-900 text-xl font-normal dark:text-white">Navigation</h3>
                        <ul class="mt-4 space-y-2" role="list">
                            <li>
                                <a class="items-center inline-flex text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.auth.login') }}">Post a free job offer
                                </a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.starter.faq') }}">FAQs</a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.auth.login') }}">Sign In</a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.auth.register') }}">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-xl font-normal">
                            Company
                        </h3>
                        <ul class="mt-4 space-y-2" role="list">
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.starter.about') }}">About Us</a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.starter.contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-slate-900 text-xl font-normal">Social</h3>
                        <ul class="mt-4 space-y-2" role="list">
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="">@opp-app-facebook</a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="">@opp-app-instagram</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-xl font-normal">Platform</h3>
                        <ul class="mt-4 space-y-2" role="list">
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.starter.privacy') }}">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="text-sm font-normal hover:text-purple-500 text-slate-500"
                                    href="{{ route('web.starter.term') }}">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto px-8 md:px-32 pb-12 max-w-7xl">
        <div class="border-t pt-6 sm:flex sm:items-center sm:justify-between">
            <h3 class="leading-6 text-slate-400 text-xs">
                © 2023 Opportunity Link. All rights reserved.
            </h3>
        </div>
    </div>
</footer>
