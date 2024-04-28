<x-app-layout>
    <section>
        <header class="px-8 mx-auto max-w-7xl pt-8" data-aos="fade-in" data-aos-easing="ease-in-out">
            <div
                class="p-8 lg:px-20 lg:py-32 rounded-3xl bg-gradient-to-tr from-purple-700 via-purple-500 to-purple-300">
                <div class="text-center max-w-xl mx-auto">
                    <span
                        class="text-white text-sm leading-6 px-4 py-2 relative bg-white/10 ring-1 ring-white/20 rounded-full">Find
                        your next job</span>
                    <h2 class="text-white text-3xl font-light tracking-tight lg:text-4xl mt-8 font-display">
                        Job Board for Web Developers, <span class="md:block">UI/UX Designers, and Marketers,
                            etc...</span>
                    </h2>
                    <p class="text-slate-300 text-base mt-4">
                        Jobs is a handpicked job platform showcasing premier opportunities for
                        <span class="md:block">
                            developers, designers, and marketers, etc... within the working industry.
                        </span>
                    </p>
                </div>
            </div>
        </header>
        <div class="px-8 lg:px-0 mx-auto max-w-7xl" data-aos="fade-in">
            <div class="lg:-mt-24 mx-auto md:px-32 py-6 max-w-7xl">
                <div class="mx-auto rounded-2xl p-4 lg:p-8 mt-4 bg-white/20 ">
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
                        <div>
                            <form action="{{ route('web.starter.home') }}" method="GET" id="SearchForm">
                                <div class="flex justify-start items-center relative">
                                    <input
                                        class="leading-none shadow shadow-slate-500/20 text-left block w-full rounded-lg border-0 py-2.5 lg:rounded-xl pl-4 pr-8 text-slate-500 ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-purple-600 sm:text-sm sm:leading-6 duration-200 px-4 border-slate-300 outline-none"
                                        type="text" name="search" placeholder="Search by name, company">
                                    <svg class="absolute right-3 z-10 cursor-pointer" width="20" height="20"
                                        onclick="$('#SearchForm').submit()" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z"
                                            stroke="#6b7280" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M21 21L15 15" stroke="#6b7280" stroke-width="1.66667"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </form>
                        </div>

                        <div x-data="{ isDropOpen: false }" class="relative">
                            <button @click="isDropOpen = !isDropOpen" @keydown.escape="isDropOpen = false"
                                type="button"
                                class="flex relative items-center gap-2 w-full rounded-lg bg-white text-slate-500 ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-purple-600 sm:text-sm sm:leading-6 duration-200 px-4 border-slate-300 outline-none shadow shadow-slate-500/20 border-0 py-2.5 lg:rounded-xl"
                                id="alpine-popover-button-1" aria-expanded="false">
                                {{ isset(request()->e) && in_array(request()->e, EXPERIENCE_LEVEL) ? request()->e : 'Experience Level' }}

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 ml-auto"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div x-show="isDropOpen" @click.away="isDropOpen = false"
                                class="absolute left-0 mt-2 w-full bg-white rounded-md shadow-md shadow-slate-500/20 z-10"
                                id="alpine-popover-panel-1" style="display: none;">
                                <a href="{{ route('web.starter.home') }}"
                                    class="block w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-slate-500 hover:text-purple text-left text-sm hover:bg-slate-50 disabled:text-slate-500">
                                    All
                                </a>
                                @foreach (EXPERIENCE_LEVEL as $el)
                                    <a href="{{ route('web.starter.home') }}?e={{ $el }}"
                                        class="block w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-slate-500 hover:text-purple text-left text-sm hover:bg-slate-50 disabled:text-slate-500">
                                        {{ $el }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div x-data="{ isDropOpen: false }" class="relative">
                            <button @click="isDropOpen = !isDropOpen" @keydown.escape="isDropOpen = false"
                                type="button"
                                class="flex relative items-center gap-2 w-full rounded-lg bg-white text-slate-500 ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-purple-600 sm:text-sm sm:leading-6 duration-200 px-4 border-slate-300 outline-none shadow shadow-slate-500/20 border-0 py-2.5 lg:rounded-xl"
                                id="alpine-popover-button-1" aria-expanded="false">
                                {{ isset(request()->c) && in_array(request()->c, $jobCategories->pluck('slug')->toArray()) ? $jobCategories->where('slug', request()->c)->first()->name : 'Job Category' }}

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 ml-auto"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div x-show="isDropOpen" @click.away="isDropOpen = false"
                                class="absolute left-0 mt-2 w-full bg-white rounded-md shadow-md shadow-slate-500/20 z-10"
                                id="alpine-popover-panel-1" style="display: none;">
                                <a href="{{ route('web.starter.home') }}"
                                    class="block w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-slate-500 hover:text-purple text-left text-sm hover:bg-slate-50 disabled:text-slate-500">
                                    All
                                </a>
                                @foreach ($jobCategories as $el)
                                    <a href="{{ route('web.starter.home') }}?c={{ $el->slug }}"
                                        class="block w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-slate-500 hover:text-purple text-left text-sm hover:bg-slate-50 disabled:text-slate-500">
                                        {{ $el->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($employers) > 0)
        <section>
            <div class="mx-auto px-8 md:px-32 py-12 max-w-6xl">
                <div class="items-center grid grid-cols-1 lg:gap-24 lg:grid-cols-4 md:grid-cols-2">
                    <div class="mx-auto col-span-full lg:col-span-1 lg:max-w-none lg:mr-auto">
                        <p class="text-slate-500 text-xs">
                            Some of the mazing companies that trust us.
                        </p>
                    </div>
                    <div class="mt-12 lg:mt-0 md:col-span-3">
                        <div class="flex justify-around flex-wrap">

                            @foreach ($employers as $e)
                                <div class="relative h-[3.125rem] w-[3.125rem] sm:h-[3.75rem] sm:w-[3.75rem] flex-none" title="{{ $e->employerProfile->company_name }}">
                                    <img class="absolute inset-0 h-full w-full rounded-full object-cover"
                                        src="{{ $e->employerProfile->logo }}"
                                        alt="{{ $e->employerProfile->company_name }}">
                                    <div class="absolute inset-0 rounded-full ring-1 ring-inset ring-black/[0.08]">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (count($wishListJobs) > 0)
        <section>
            <div class="mx-auto px-8 md:px-32 py-12 max-w-6xl">
                <div class="border-b border-gray-200 pb-5 grid gird-cols-1 lg:grid-cols-2 gap-2">
                    <h3 class="text-lg lg:text-xl font-semibold leading-6 text-slate-900 dark:text-white">
                        Wish Listed Jobs
                    </h3>
                    <p class="text-sm text-blue-500 underline flex justify-end items-end">
                        <a href="{{ route('web.freelancers.managejob.wishlistedJob.index') }}">View All</a>
                    </p>
                </div>
                <ul class="divide-y divide-slate-100">
                    @foreach ($wishListJobs as $wishlistjob)
                        <li>
                            <div class="group relative py-6 sm:rounded-2xl">
                                <div
                                    class="absolute -inset-x-4 -inset-y-px bg-slate-50 opacity-0 group-hover:opacity-100 group-hover:shadow-2xl group-hover:shadow-slate-500/30 sm:-inset-x-6 rounded-2xl lg:-inset-x-8 duration-200">
                                </div>
                                <div class="relative flex items-center">
                                    <div
                                        class="relative h-[3.125rem] w-[3.125rem] sm:h-[3.75rem] sm:w-[3.75rem] flex-none">
                                        <img class="absolute inset-0 h-full w-full rounded-full object-cover"
                                            src="{{ $wishlistjob->job->employer->employerProfile->logo }}"
                                            alt="{{ $wishlistjob->job->employer->employerProfile->company_name }}">
                                        <div class="absolute inset-0 rounded-full ring-1 ring-inset ring-black/[0.08]">
                                        </div>
                                    </div>
                                    <dl
                                        class="ml-4 flex flex-auto flex-wrap gap-y-1 gap-x-2 overflow-hidden sm:ml-6 sm:grid sm:grid-cols-[auto_1fr_auto_auto] sm:items-center">
                                        <div class="col-span-2 mr-2.5 flex-none sm:mr-0">
                                            <dt class="sr-only">Company</dt>
                                            <dd class="text-xs font-semibold leading-6 text-slate-500">
                                                {{ $wishlistjob->job->employer->employerProfile->company_name }}
                                                <span class="ml-2">
                                                    <label>
                                                        @if ($wishlistjob->job->employer->ratings->average('score') < 1)
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($wishlistjob->job->employer->ratings->average('score') > 1 && $wishlistjob->job->employer->ratings->average('score') < 2)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($wishlistjob->job->employer->ratings->average('score') > 2 && $wishlistjob->job->employer->ratings->average('score') < 3)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($wishlistjob->job->employer->ratings->average('score') > 3 && $wishlistjob->job->employer->ratings->average('score') < 4)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($wishlistjob->job->employer->ratings->average('score') > 4 && $wishlistjob->job->employer->ratings->average('score') < 5)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                        @else
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                        @endif
                                                    </label>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="col-start-3 row-start-2 -ml-2.5 flex-auto sm:ml-0 sm:pl-6">
                                            <dt class="sr-only">Location</dt>
                                            <dd class="flex items-center text-xs leading-6 text-slate-500">
                                                <svg viewBox="0 0 2 2" aria-hidden="true"
                                                    class="mr-2 h-0.5 w-0.5 flex-none fill-slate-400 sm:hidden">
                                                    <circle cx="1" cy="1" r="1"></circle>
                                                </svg>
                                                {{ $wishlistjob->job->location }}
                                            </dd>
                                        </div>
                                        <div class="col-span-2 col-start-1 w-full flex-none">
                                            <dt class="sr-only">Title</dt>
                                            <dd class="text-base font-semibold leading-6 text-slate-900">
                                                <a
                                                    href="{{ route('web.starter.job.detail', $wishlistjob->job->slug) }}">
                                                    <span
                                                        class="absolute -inset-x-4 inset-y-[calc(-1*(theme(spacing.6)+1px))] sm:-inset-x-6 sm:rounded-2xl lg:-inset-x-8 "></span>
                                                    <span
                                                        class="dark:text-white group-hover:text-black">{{ $wishlistjob->job->title }}</span>
                                                </a>
                                            </dd>
                                        </div>
                                        <div class="col-start-1 mr-2.5 flex-none">
                                            <dt class="sr-only">Experience</dt>
                                            <dd class="text-xs leading-6 text-slate-500">
                                                {{ $wishlistjob->job->experience_level }}
                                            </dd>
                                        </div>
                                        <div class="col-span-3 -ml-2.5 flex-none">
                                            <dt class="sr-only">Salary</dt>
                                            <dd class="flex items-center text-xs leading-6 text-slate-500">
                                                <svg viewBox="0 0 2 2" aria-hidden="true"
                                                    class="mr-2 h-0.5 w-0.5 flex-none fill-slate-400">
                                                    <circle cx="1" cy="1" r="1"></circle>
                                                </svg>
                                                {{ $wishlistjob->job->offer_salary }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    <section data-aos="fade-up" data-aos-delay="100">
        <div class="mx-auto px-8 md:px-32 py-12 max-w-6xl">
            <div class="border-b border-gray-200 pb-5 grid gird-cols-1 lg:grid-cols-2 gap-2">
                <h3 class="text-lg lg:text-xl font-semibold leading-6 text-slate-900 dark:text-white">
                    Latest jobs
                </h3>
                <p class="text-sm text-gray-500">
                    Stay updated with the newest job openings for developers, designers, and
                    marketers in the tech industry. Find your next career move and stay
                    ahead of the curve.
                </p>
            </div>


            @if (count($jobListings) > 0)
                <ul class="divide-y divide-slate-100">
                    @foreach ($jobListings as $job)
                        <li>
                            <div class="group relative py-6 sm:rounded-2xl">
                                <div
                                    class="absolute -inset-x-4 -inset-y-px bg-slate-50 opacity-0 group-hover:opacity-100 group-hover:shadow-2xl group-hover:shadow-slate-500/30 sm:-inset-x-6 rounded-2xl lg:-inset-x-8 duration-200">
                                </div>
                                <div class="relative flex items-center">
                                    <div
                                        class="relative h-[3.125rem] w-[3.125rem] sm:h-[3.75rem] sm:w-[3.75rem] flex-none">
                                        <img class="absolute inset-0 h-full w-full rounded-full object-cover"
                                            src="{{ $job->employer->employerProfile->logo }}"
                                            alt="{{ $job->employer->employerProfile->company_name }}">
                                        <div class="absolute inset-0 rounded-full ring-1 ring-inset ring-black/[0.08]">
                                        </div>
                                    </div>
                                    <dl
                                        class="ml-4 flex flex-auto flex-wrap gap-y-1 gap-x-2 overflow-hidden sm:ml-6 sm:grid sm:grid-cols-[auto_1fr_auto_auto] sm:items-center">
                                        <div class="col-span-2 mr-2.5 flex-none sm:mr-0">
                                            <dt class="sr-only">Company</dt>
                                            <dd class="text-xs font-semibold leading-6 text-slate-500">
                                                {{ $job->employer->employerProfile->company_name }}
                                                <span class="ml-2">
                                                    <label>
                                                        @if ($job->employer->ratings->average('score') < 1)
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($job->employer->ratings->average('score') > 1 && $job->employer->ratings->average('score') < 2)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($job->employer->ratings->average('score') > 2 && $job->employer->ratings->average('score') < 3)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($job->employer->ratings->average('score') > 3 && $job->employer->ratings->average('score') < 4)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        @elseif($job->employer->ratings->average('score') > 4 && $job->employer->ratings->average('score') < 5)
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon">★</span>
                                                        @else
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                            <span class="icon text-yellow-300">★</span>
                                                        @endif
                                                    </label>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="col-start-3 row-start-2 -ml-2.5 flex-auto sm:ml-0 sm:pl-6">
                                            <dt class="sr-only">Location</dt>
                                            <dd class="flex items-center text-xs leading-6 text-slate-500">
                                                <svg viewBox="0 0 2 2" aria-hidden="true"
                                                    class="mr-2 h-0.5 w-0.5 flex-none fill-slate-400 sm:hidden">
                                                    <circle cx="1" cy="1" r="1"></circle>
                                                </svg>
                                                {{ $job->location }}
                                            </dd>
                                        </div>
                                        <div class="col-span-2 col-start-1 w-full flex-none">
                                            <dt class="sr-only">Title</dt>
                                            <dd class="text-base font-semibold leading-6 text-slate-900">
                                                <a href="{{ route('web.starter.job.detail', $job->slug) }}">
                                                    <span
                                                        class="absolute -inset-x-4 inset-y-[calc(-1*(theme(spacing.6)+1px))] sm:-inset-x-6 sm:rounded-2xl lg:-inset-x-8 "></span>
                                                    <span
                                                        class="dark:text-white group-hover:text-black">{{ $job->title }}</span>
                                                </a>
                                            </dd>
                                        </div>
                                        <div class="col-start-1 mr-2.5 flex-none">
                                            <dt class="sr-only">Experience</dt>
                                            <dd class="text-xs leading-6 text-slate-500">
                                                {{ $job->experience_level }}
                                            </dd>
                                        </div>
                                        <div class="col-span-3 -ml-2.5 flex-none">
                                            <dt class="sr-only">Salary</dt>
                                            <dd class="flex items-center text-xs leading-6 text-slate-500">
                                                <svg viewBox="0 0 2 2" aria-hidden="true"
                                                    class="mr-2 h-0.5 w-0.5 flex-none fill-slate-400">
                                                    <circle cx="1" cy="1" r="1"></circle>
                                                </svg>
                                                {{ $job->offer_salary }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="divide-y divide-slate-100">
                    <h2 class="pt-8 pb-4 text-xl font-bold tracking-tight text-gray-700 dark:text-white">Jobs are
                        comming soon!</h2>
                </div>
            @endif

            <div class="border-t border-gray-200 pt-5">
                {{ $jobListings->links() }}
            </div>
        </div>
    </section>
    <section>
        <div class="mx-auto px-8 md:px-32 py-12 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div data-aos="flip-right" data-aos-delay="200"
                    class="relative border rounded-3xl bg-gradient-to-tr from-purple-700 via-purple-500 to-purple-300 p-8 shadow-2xl shadow-slate-500/30 overflow-hidden">
                    <div class="relative w-full">
                        <p class="text-lg font-medium text-white">
                            Post a free job offer
                        </p>
                        <p class="text-base mt-4 text-slate-200">
                            <span class="font-medium text-purple-100 leading-6">
                                Boost your job listing ⏤</span> Gain maximum exposure by posting it as a featured
                            opportunity
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('web.auth.login') }}"
                                class="inline-flex items-center w-full px-5 py-3 text-sm leading-4 text-purple-500 bg-white md:w-auto rounded-full hover:bg-purple-50 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-white">Get
                                started as Employer</a>
                        </div>
                    </div>
                </div>
                <div class="relative border rounded-3xl p-8 shadow-2xl shadow-slate-500/30 overflow-hidden"
                    data-aos="flip-left" data-aos-delay="200">
                    <div class="relative w-full">
                        <p class="text-lg font-medium text-slate-900 dark:text-white">
                            Work as Freelancer
                        </p>
                        <p class="text-base mt-4 text-slate-500">
                            <span class="font-medium text-slate-600 leading-6 dark:text-slate-400">Amplify your job
                                listing ⏤
                            </span> <span class="dark:text-white">Increase visibility by finding it as a opportunity,
                                free of charge</span>
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('web.auth.login') }}"
                                class="inline-flex items-center w-full px-5 py-3 text-sm leading-4 text-purple-500 bg-purple-50 md:w-auto rounded-full hover:bg-purple-800 hover:text-purple-100 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500">Get
                                started as Freelancer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
