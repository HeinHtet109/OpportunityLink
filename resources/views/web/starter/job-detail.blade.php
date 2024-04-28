<x-app-layout>
    <section>
        <div class="mx-auto px-8 md:px-32 py-12 max-w-7xl">
            <div class="border-b pb-12">
                <div class="w-full inline-flex items-center gap-3">
                    <div class="h-12 w-12 flex-none"><img class="inset-0 h-full w-full rounded-full object-cover"
                            src="{{ $job->employer->employerProfile->logo }}"
                            alt="{{ $job->employer->employerProfile->company_name }}"></div>
                    <h2
                        class="text-slate-900 text-3xl font-normal tracking-tight font-display lg:text-4xl md:mt-0 dark:text-white">
                        {{ $job->title }} at <span
                            class="italic">{{ $job->employer->employerProfile->company_name }}</span></h2>
                    <div class="wish-list ml-auto ">
                        @if (request()->user() &&
                                request()->user()->isFreelancer())
                            <button type="button" onclick="addToWishList(this)" title="add-to-wish-list"
                                data-tag="{{ in_array($job->id,request()->user()->wishlists->pluck('job_id')->toArray())? 'true': 'false' }}"
                                data-route="{{ route('web.starter.wishlist.add') }}" data-job={{ $job->id }}
                                data-id="{{ request()->user()->id }}">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M5 19.6693V4C5 3.44772 5.44772 3 6 3H18C18.5523 3 19 3.44772 19 4V19.6693C19 20.131 18.4277 20.346 18.1237 19.9985L12 13L5.87629 19.9985C5.57227 20.346 5 20.131 5 19.6693Z"
                                            class="stroke-black dark:stroke-white {{ in_array($job->id,request()->user()->wishlists->pluck('job_id')->toArray())? 'fill-blue-800': '' }}"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </button>
                        @else
                            <a href="{{ route('web.auth.login') }}" title="add-to-wish-list">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M5 19.6693V4C5 3.44772 5.44772 3 6 3H18C18.5523 3 19 3.44772 19 4V19.6693C19 20.131 18.4277 20.346 18.1237 19.9985L12 13L5.87629 19.9985C5.57227 20.346 5 20.131 5 19.6693Z"
                                            class="stroke-black dark:stroke-white" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <dl class="mt-12 grid grid-cols-2 gap-x-8 gap-y-12 sm:grid-cols-3 sm:gap-y-16 lg:grid-cols-5">
                    <div class="flex flex-col gap-y-3 border-l pl-6">
                        <dt class="text-base leading-7 text-slate-500 inline-flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                </path>
                            </svg>Location
                        </dt>
                        <dd class="text-base font-semibold tracking-tight text-slate-900 dark:text-white">
                            {{ $job->location }}
                        </dd>
                    </div>
                    <div class="flex flex-col gap-y-3 border-l pl-6">
                        <dt class="text-base leading-7 text-slate-500 inline-flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                            </svg>Job Category
                        </dt>
                        <dd class="text-base font-semibold tracking-tight text-slate-900 dark:text-white">
                            {{ $job->jobCategory->name }}
                        </dd>
                    </div>
                    <div class="flex flex-col gap-y-3 border-l pl-6">
                        <dt class="text-base leading-7 text-slate-500 inline-flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack-pop"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 9.5l-3 1.5l8 4l8 -4l-3 -1.5"></path>
                                <path d="M4 15l8 4l8 -4"></path>
                                <path d="M12 11v-7"></path>
                                <path d="M9 7l3 -3l3 3"></path>
                            </svg>
                            Experience Level
                        </dt>
                        <dd class="text-base font-semibold tracking-tight text-slate-900 dark:text-white">
                            {{ $job->experience_level }}
                        </dd>
                    </div>
                    <div class="flex flex-col gap-y-3 border-l pl-6">
                        <dt class="text-base leading-7 text-slate-500 inline-flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-bolt"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20.984 12.53a9 9 0 1 0 -7.552 8.355"></path>
                                <path d="M12 7v5l3 3"></path>
                                <path d="M19 16l-2 3h4l-2 3"></path>
                            </svg>
                            Closed At
                        </dt>
                        <dd class="text-base font-semibold tracking-tight text-slate-900 dark:text-white">
                            {{ Carbon\Carbon::parse($job->expired_at)->format('M d, Y g:i A') }}
                        </dd>
                    </div>
                    <div class="flex flex-col gap-y-3 border-l pl-6">
                        <dt class="text-base leading-7 text-slate-500 inline-flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path
                                    d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1">
                                </path>
                                <path d="M12 7v10"></path>
                            </svg>
                            Salary
                        </dt>
                        <dd class="text-base font-semibold tracking-tight text-slate-900 dark:text-white">
                            {{ $job->offer_salary }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="mx-auto px-8 md:px-32 py-12 max-w-7xl">
            @if (session()->has('status'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Success!</span> {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Alert!</span> {{ $errors->first() }}
                </div>
            @endif
            <div
                class="text-justify hover:prose-a:text-slate-900 prose prose-a:text-accent-500 prose-blockquote:border-l-black prose-blockquote:text-slate-500 prose-code:text-slate-900 prose-headings:font-semibold prose-headings:text-slate-900 prose-li:marker:text-accent-500 text-slate-500 prose-pre:border">
                <p><strong class="dark:text-slate-500">Posted on:</strong>
                    {{ Carbon\Carbon::parse($job->created_at)->format('M d, Y') }}</p>
                <div class="dark:dark text-white-all">
                    {!! $job->description !!}
                </div>
            </div>
            <div class="py-6">
                @if (Auth::guard('web')->user() &&
                        Auth::guard('web')->user()->isFreelancer())
                    <!-- Modal toggle -->

                    @if ($appliedJob != null && $appliedJob->status == PENDING)
                        <div
                            class="inline-flex items-center w-full px-5 py-3 text-sm leading-4 text-white bg-green-500 md:w-auto rounded-sm cursor-default duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="w-5 h-5 rounded-full mr-2" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.54497 8.73005C2 9.79961 2 11.1997 2 14C2 16.8003 2 18.2004 2.54497 19.27C3.02433 20.2108 3.78924 20.9757 4.73005 21.455C5.79961 22 7.19974 22 10 22H14C16.8003 22 18.2004 22 19.27 21.455C20.2108 20.9757 20.9757 20.2108 21.455 19.27C22 18.2004 22 16.8003 22 14C22 11.1997 22 9.79961 21.455 8.73005C20.9757 7.78924 20.2108 7.02433 19.27 6.54497C18.2004 6 16.8003 6 14 6H10C7.19974 6 5.79961 6 4.73005 6.54497C3.78924 7.02433 3.02433 7.78924 2.54497 8.73005ZM15.0595 12.4995C15.3353 12.1905 15.3085 11.7164 14.9995 11.4406C14.6905 11.1647 14.2164 11.1915 13.9406 11.5005L10.9286 14.8739L10.0595 13.9005C9.78359 13.5915 9.30947 13.5647 9.0005 13.8406C8.69152 14.1164 8.66468 14.5905 8.94055 14.8995L10.3691 16.4995C10.5114 16.6589 10.7149 16.75 10.9286 16.75C11.1422 16.75 11.3457 16.6589 11.488 16.4995L15.0595 12.4995Z"
                                        fill="#fff"></path>
                                    <path
                                        d="M20.5348 3.46447C19.0704 2 16.7133 2 11.9993 2C7.28525 2 4.92823 2 3.46377 3.46447C2.70628 4.22195 2.3406 5.21824 2.16406 6.65598C2.69473 6.06532 3.33236 5.57328 4.04836 5.20846C4.82984 4.81027 5.66664 4.6488 6.59316 4.5731C7.48829 4.49997 8.58971 4.49998 9.93646 4.5H14.0621C15.4089 4.49998 16.5103 4.49997 17.4054 4.5731C18.332 4.6488 19.1688 4.81027 19.9502 5.20846C20.6662 5.57328 21.3039 6.06532 21.8345 6.65598C21.658 5.21824 21.2923 4.22195 20.5348 3.46447Z"
                                        fill="#fff"></path>
                                </g>
                            </svg>
                            Applied
                        </div>
                    @elseif($appliedJob != null && $appliedJob->status == CONFIRM)
                        <a href="{{ route('web.freelancers.managejob.activeJob.index') }}"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-sm leading-4 text-white bg-green-500 md:w-auto rounded-full hover:bg-green-50 hover:text-green-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-green-500">
                            OnGoing
                        </a>
                    @else
                        <button data-modal-target="applyFormModal" data-modal-toggle="applyFormModal"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-sm leading-4 text-white bg-purple-500 md:w-auto rounded-full hover:bg-purple-50 hover:text-purple-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500"
                            type="button">
                            Apply now
                        </button>
                    @endif


                    <!-- Main modal -->
                    <div id="applyFormModal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <form action="{{ route('web.starter.job.apply') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Modal header -->
                                    <input type="hidden" name="job" value="{{ $job->slug }}">
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Job Apply Form
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="applyFormModal">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div>
                                            <label for="resume"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                Resume File
                                                (Note: Only pdf allowed!)</label>
                                            <input type="file" name="resume" id="resume"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                accept="application/pdf" />
                                            <span class="text-red-600"></span>
                                        </div>
                                        <div>
                                            <label for="resume_text"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">If
                                                you have an additional request write it below</label>
                                            <textarea name="resume_text" id="resume_text" rows="10"
                                                class="resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            <span class="text-red-600"></span>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="sumit"
                                            class="inline-flex items-center justify-center w-full px-5 py-3 text-sm leading-4 text-white bg-purple-500 md:w-auto rounded-full hover:bg-purple-50 hover:text-purple-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500">
                                            Apply now</button>
                                        <button data-modal-hide="applyFormModal" type="button"
                                            class="inline-flex items-center justify-center w-full px-5 py-3 text-sm leading-4 text-white bg-gray-500 md:w-auto rounded-full hover:bg-gray-50 hover:text-gray-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-500">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('web.auth.login') }}"
                        class="inline-flex items-center w-full px-5 py-3 text-sm leading-4 text-white bg-purple-500 md:w-auto rounded-full hover:bg-purple-50 hover:text-purple-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500">Login
                        as Freelancer</a>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
