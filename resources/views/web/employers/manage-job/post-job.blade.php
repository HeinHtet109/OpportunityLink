<x-dashboard-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}">
    </x-slot>
    <div
        class="p-4  block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1  dark:border-gray-700 w-full">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Post a
                                    New Job</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Create a New Job Post
                </h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="inline-block min-w-full align-middle">
            <div class="shadow card">
                <section class="p-5 border-t border-gray-200 dark:border-gray-700">
                    @if (isset(request()->user()->employerProfile) && request()->user()->employerProfile->status == ACTIVE)
                    @else
                        @if ($errors->first('status'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Warning!</span> {{ $errors->first('status') }}
                        </div>
                        @else
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Warning!</span> To post a new job, Please update and publish your company profile first!.
                        </div>
                        @endif
                    @endif

                    <form method="post" action="{{ route('web.employers.managejob.post-job.store') }}" class="mt-6 space-y-6"
                        id="UpdateJobForm">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                    Title</label>
                                <input type="text" name="title" id="title"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Graphic Designer" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('title') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="offer_salary"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Offer
                                    Salary</label>
                                <input type="text" name="offer_salary" id="offer_salary"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="e.g. 500000 MMK - 700000 MMK" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('offer_salary') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="expired_at"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closed
                                    Date</label>
                                <input type="dateTime-local" name="expired_at" id="expired_at"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('expired_at') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-3">
                                <label for="job_category_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                    Category</label>
                                <select name="job_category_id" id="job_category_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Job Category</option>
                                    @foreach ($jobCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('job_category_id') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-3">
                                <label for="experience_level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                    Level</label>
                                <select name="experience_level" id="experience_level"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Experience Level</option>
                                    @foreach (EXPERIENCE_LEVEL as $el)
                                        <option value="{{ $el }}">{{ $el }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('experience_level') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                    Location</label>
                                <textarea name="location" id="location" rows="5"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('location') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Description
                                    and Job Responsible</label>
                                <textarea name="description" id="description" rows="5"
                                    class="summernote shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-end space-x-5 mt-5">
                        <button
                            class="flex text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="submit" form="UpdateJobForm">
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
                            Post Job
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('assets/js/summernote-init.js') }}" type="module"></script>
    </x-slot>
</x-dashboard-layout>
