<x-dashboard-layout>
    <div
        class="p-4  block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1  dark:border-gray-700 w-full">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('web.freelancers.dashboard') }}"
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">My
                                    Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Create personal profile here!
                </h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="inline-block min-w-full align-middle">
            <div class="shadow card">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-3 p-5">
                    <div class="flex items-center space-x-5">
                        <svg class="w-20 h-20 bg-[#EDC92F] rounded-full p-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" fill="#1C274C"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-lg font-semibold italic text-gray-900 sm:text-xl dark:text-white">Update
                            Personal Detail</span>
                    </div>
                    <div class="flex items-center space-x-5">
                        <svg class="w-20 h-20 bg-[#EDC92F] rounded-full p-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.54497 8.73005C2 9.79961 2 11.1997 2 14C2 16.8003 2 18.2004 2.54497 19.27C3.02433 20.2108 3.78924 20.9757 4.73005 21.455C5.79961 22 7.19974 22 10 22H14C16.8003 22 18.2004 22 19.27 21.455C20.2108 20.9757 20.9757 20.2108 21.455 19.27C22 18.2004 22 16.8003 22 14C22 11.1997 22 9.79961 21.455 8.73005C20.9757 7.78924 20.2108 7.02433 19.27 6.54497C18.2004 6 16.8003 6 14 6H10C7.19974 6 5.79961 6 4.73005 6.54497C3.78924 7.02433 3.02433 7.78924 2.54497 8.73005ZM15.0595 12.4995C15.3353 12.1905 15.3085 11.7164 14.9995 11.4406C14.6905 11.1647 14.2164 11.1915 13.9406 11.5005L10.9286 14.8739L10.0595 13.9005C9.78359 13.5915 9.30947 13.5647 9.0005 13.8406C8.69152 14.1164 8.66468 14.5905 8.94055 14.8995L10.3691 16.4995C10.5114 16.6589 10.7149 16.75 10.9286 16.75C11.1422 16.75 11.3457 16.6589 11.488 16.4995L15.0595 12.4995Z"
                                    fill="#1C274C"></path>
                                <path
                                    d="M20.5348 3.46447C19.0704 2 16.7133 2 11.9993 2C7.28525 2 4.92823 2 3.46377 3.46447C2.70628 4.22195 2.3406 5.21824 2.16406 6.65598C2.69473 6.06532 3.33236 5.57328 4.04836 5.20846C4.82984 4.81027 5.66664 4.6488 6.59316 4.5731C7.48829 4.49997 8.58971 4.49998 9.93646 4.5H14.0621C15.4089 4.49998 16.5103 4.49997 17.4054 4.5731C18.332 4.6488 19.1688 4.81027 19.9502 5.20846C20.6662 5.57328 21.3039 6.06532 21.8345 6.65598C21.658 5.21824 21.2923 4.22195 20.5348 3.46447Z"
                                    fill="#1C274C"></path>
                            </g>
                        </svg>
                        <span class="text-lg font-semibold italic text-gray-900 sm:text-xl dark:text-white">Save
                            information</span>
                    </div>
                    <div class="flex items-center space-x-5">
                        <svg class="w-20 h-20 bg-[#EDC92F] rounded-full p-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M20.5348 3.46447C19.0704 2 16.7133 2 11.9993 2C7.28525 2 4.92823 2 3.46377 3.46447C2.70628 4.22195 2.3406 5.21824 2.16406 6.65598C2.69473 6.06532 3.33236 5.57328 4.04836 5.20846C4.82984 4.81027 5.66664 4.6488 6.59316 4.5731C7.48829 4.49997 8.58971 4.49998 9.93646 4.5H14.0621C15.4089 4.49998 16.5103 4.49997 17.4054 4.5731C18.332 4.6488 19.1688 4.81027 19.9502 5.20846C20.6662 5.57328 21.3039 6.06532 21.8345 6.65598C21.658 5.21824 21.2923 4.22195 20.5348 3.46447Z"
                                    fill="#1C274C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14ZM12.5303 10.4697C12.3897 10.329 12.1989 10.25 12 10.25C11.8011 10.25 11.6103 10.329 11.4697 10.4697L8.96967 12.9697C8.67678 13.2626 8.67678 13.7374 8.96967 14.0303C9.26256 14.3232 9.73744 14.3232 10.0303 14.0303L11.25 12.8107V17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V12.8107L13.9697 14.0303C14.2626 14.3232 14.7374 14.3232 15.0303 14.0303C15.3232 13.7374 15.3232 13.2626 15.0303 12.9697L12.5303 10.4697Z"
                                    fill="#1C274C"></path>
                            </g>
                        </svg>
                        <span class="text-lg font-semibold italic text-gray-900 sm:text-xl dark:text-white">Publish
                            Profile</span>
                    </div>
                </div>

                <section class="p-5 border-t border-gray-200 dark:border-gray-700">
                    <form method="post" action="{{ route('web.freelancers.profile.update') }}" class="mt-6 space-y-6"
                        id="UpdateProfileForm" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 flex space-x-8 sm:col-span-6 md:col-span-2 justify-center">
                                <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0 object-contain"
                                    id="logo-img"
                                    src={{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->profile_photo : asset('assets/images/default-user.jpg') }}
                                    alt="Jese picture" id="preview" />
                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                                        Resume Profile Photo
                                    </h3>
                                    <div
                                        class="mb-4 text-sm {{ $errors->any() ? 'text-red-500 dark:text-red-400' : 'text-gray-500 dark:text-gray-400' }}">
                                        {{ $errors->any() ? $errors->first('profile_photo') : 'JPG or PNG. Max size of 1MB' }}
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <label for="photo-upload"
                                            class="inline-flex cursor-pointer items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                                </path>
                                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                            </svg>
                                            Upload picture
                                        </label>
                                        <input type="file" class="hidden" name="profile_photo" id="photo-upload"
                                            onchange="document.getElementById('logo-img').src = window.URL.createObjectURL(this.files[0])"
                                            accept=".png,.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="job_title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                    Title</label>
                                <input type="text" name="job_title" id="job_title"
                                    value="{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->job_title : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Software Designer" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('job_title') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="age"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                                <input type="text" name="age" id="age"
                                    value="{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->age : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Eg. 25" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('age') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="gender" id="gender"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Gender</option>
                                    @foreach (['Male', 'Female'] as $el)
                                        <option value="{{ $el }}"
                                            {{ isset(request()->user()->freelancerProfile) && request()->user()->freelancerProfile->gender == $el ? 'selected' : '' }}>
                                            {{ $el }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('gender') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="experience_level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                    Level</label>
                                <select name="experience_level" id="experience_level"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Experience Level</option>
                                    @foreach (EXPERIENCE_LEVEL as $el)
                                        <option value="{{ $el }}"
                                            {{ isset(request()->user()->freelancerProfile) && request()->user()->freelancerProfile->experience_level == $el ? 'selected' : '' }}>
                                            {{ $el }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('experience_level') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-1">
                                <label for="education_level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Education Level</label>
                                <select name="education_level" id="education_level"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Education Level</option>
                                    @foreach (EDUCATION_LEVEL as $el)
                                        <option value="{{ $el }}"
                                            {{ isset(request()->user()->freelancerProfile) && request()->user()->freelancerProfile->education_level == $el ? 'selected' : '' }}>
                                            {{ $el }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('education_level') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-1">
                                <label for="city_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <select name="city_id" id="city_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ isset(request()->user()->freelancerProfile) && request()->user()->freelancerProfile->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('city_id') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-6 md:col-span-2">
                                <label for="languages"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Languages</label>
                                <input type="text" name="languages" id="languages"
                                    value="{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->languages : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Eg. English, French" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('languages') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="current_salary"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                                    Salary</label>
                                <input type="text" name="current_salary" id="current_salary"
                                    value="{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->current_salary : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Eg. 500000 MMK" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('current_salary') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="expected_salary"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expected
                                    Salary</label>
                                <input type="text" name="expected_salary" id="expected_salary"
                                    value="{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->expected_salary : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Eg. 500000 MMK" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('expected_salary') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <textarea name="address" id="address" rows="5"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->address : '' }}</textarea>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('address') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="biography"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography
                                    (Optional)</label>
                                <textarea name="biography" id="biography" rows="5"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ isset(request()->user()->freelancerProfile) ? request()->user()->freelancerProfile->biography : '' }}</textarea>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('biography') }}</span>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-end space-x-5 mt-5">
                        <button
                            class="flex text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="submit" form="UpdateProfileForm">
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
                            Save Information
                        </button>
                        @if (isset(request()->user()->freelancerProfile))
                            @if (request()->user()->freelancerProfile->status == 'inactive')
                                <form method="post" action="{{ route('web.freelancers.profile.update') }}">
                                    @csrf
                                    <input type="hidden" name="status" value="active">

                                    <button
                                        class="flex text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        type="submit">
                                        <svg class="w-5 h-5 rounded-full mr-2" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M20.5348 3.46447C19.0704 2 16.7133 2 11.9993 2C7.28525 2 4.92823 2 3.46377 3.46447C2.70628 4.22195 2.3406 5.21824 2.16406 6.65598C2.69473 6.06532 3.33236 5.57328 4.04836 5.20846C4.82984 4.81027 5.66664 4.6488 6.59316 4.5731C7.48829 4.49997 8.58971 4.49998 9.93646 4.5H14.0621C15.4089 4.49998 16.5103 4.49997 17.4054 4.5731C18.332 4.6488 19.1688 4.81027 19.9502 5.20846C20.6662 5.57328 21.3039 6.06532 21.8345 6.65598C21.658 5.21824 21.2923 4.22195 20.5348 3.46447Z"
                                                    fill="#fff"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14ZM12.5303 10.4697C12.3897 10.329 12.1989 10.25 12 10.25C11.8011 10.25 11.6103 10.329 11.4697 10.4697L8.96967 12.9697C8.67678 13.2626 8.67678 13.7374 8.96967 14.0303C9.26256 14.3232 9.73744 14.3232 10.0303 14.0303L11.25 12.8107V17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V12.8107L13.9697 14.0303C14.2626 14.3232 14.7374 14.3232 15.0303 14.0303C15.3232 13.7374 15.3232 13.2626 15.0303 12.9697L12.5303 10.4697Z"
                                                    fill="#fff"></path>
                                            </g>
                                        </svg>
                                        Publish Profile
                                    </button>
                                </form>
                            @else
                                <div
                                    class="flex cursor-default text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Profile Live Now
                                    <svg class="w-5 h-5 rounded-full ml-2" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.54497 8.73005C2 9.79961 2 11.1997 2 14C2 16.8003 2 18.2004 2.54497 19.27C3.02433 20.2108 3.78924 20.9757 4.73005 21.455C5.79961 22 7.19974 22 10 22H14C16.8003 22 18.2004 22 19.27 21.455C20.2108 20.9757 20.9757 20.2108 21.455 19.27C22 18.2004 22 16.8003 22 14C22 11.1997 22 9.79961 21.455 8.73005C20.9757 7.78924 20.2108 7.02433 19.27 6.54497C18.2004 6 16.8003 6 14 6H10C7.19974 6 5.79961 6 4.73005 6.54497C3.78924 7.02433 3.02433 7.78924 2.54497 8.73005ZM15.0595 12.4995C15.3353 12.1905 15.3085 11.7164 14.9995 11.4406C14.6905 11.1647 14.2164 11.1915 13.9406 11.5005L10.9286 14.8739L10.0595 13.9005C9.78359 13.5915 9.30947 13.5647 9.0005 13.8406C8.69152 14.1164 8.66468 14.5905 8.94055 14.8995L10.3691 16.4995C10.5114 16.6589 10.7149 16.75 10.9286 16.75C11.1422 16.75 11.3457 16.6589 11.488 16.4995L15.0595 12.4995Z"
                                                fill="#fff"></path>
                                            <path
                                                d="M20.5348 3.46447C19.0704 2 16.7133 2 11.9993 2C7.28525 2 4.92823 2 3.46377 3.46447C2.70628 4.22195 2.3406 5.21824 2.16406 6.65598C2.69473 6.06532 3.33236 5.57328 4.04836 5.20846C4.82984 4.81027 5.66664 4.6488 6.59316 4.5731C7.48829 4.49997 8.58971 4.49998 9.93646 4.5H14.0621C15.4089 4.49998 16.5103 4.49997 17.4054 4.5731C18.332 4.6488 19.1688 4.81027 19.9502 5.20846C20.6662 5.57328 21.3039 6.06532 21.8345 6.65598C21.658 5.21824 21.2923 4.22195 20.5348 3.46447Z"
                                                fill="#fff"></path>
                                        </g>
                                    </svg>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-dashboard-layout>
