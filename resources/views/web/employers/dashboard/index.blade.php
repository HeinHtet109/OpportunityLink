<x-dashboard-layout>
    <div
        class="min-h-[calc(100vh-4rem)] bg-gradient-to-r from-slate-100 to-slate-200 dark:from-slate-900 dark:to-slate-800 text-slate-800 dark:text-slate-100 p-4 lg:p-16 shadow-xl shadow-slate-200 dark:shadow-slate-900">
        <header class="p-8 flex justify-center items-center flex-wrap flex-col w-full mt-16">
            <div class="flex justify-center w-full">
                <div class="svg-inline w-40 h-40 text-violet-700 dark:text-violet-100">
                    <x-application-logo class="h-40 w-40" />
                </div>
            </div>

            <div class="format dark:format-invert lg:format-lg mt-10">
                <p class="text-4xl lg:text-7xl dark:text-slate-200 text-slate-600 leading-tight">
                    Welcome <a rel="noopener nofollow" href="https://astro.build"
                        class="font-bold text-transparent bg-clip-text bg-gradient-to-br from-pink-400 to-violet-800 dark:from-pink-300 dark:to-violet-700 no-underline">from</a>…
                    <br />Opportunity <a rel="noopener nofollow" href="https://flowbite.com"
                        class="font-bold text-blue-600 dark:text-blue-500 no-underline">Link</a>!
                </p>
            </div>

            <div class="flex justify-center w-full mt-20">
                <a href="{{ route('web.employers.profile.index') }}"
                    class="text-blue-800 hover:text-white border border-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-100 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Setup your company Profile!</a>
            </div>
        </header>
    </div>
</x-dashboard-layout>
