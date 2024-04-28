<x-dashboard-layout>
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Company
                                    Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Create company profile here!
                </h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="inline-block min-w-full align-middle">
            <div class="shadow card">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-3 p-5">
                    <div class="flex items-center space-x-5">
                        <svg class="w-20 h-20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 496.159 496.159"
                            xml:space="preserve" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#EDC92F;"
                                    d="M248.083,0.003C111.071,0.003,0,111.063,0,248.085c0,137.001,111.07,248.07,248.083,248.07 c137.006,0,248.076-111.069,248.076-248.07C496.159,111.062,385.089,0.003,248.083,0.003z">
                                </path>
                                <g>
                                    <path style="fill:#82725A;"
                                        d="M408.381,340.015V214.226l-320.612-1.012v126.8c0,21.741,20.622,21.409,20.622,21.409h278.265 C409.715,361.424,408.381,340.015,408.381,340.015z">
                                    </path>
                                    <path style="fill:#756652;"
                                        d="M220.663,257.413v23.75c0,4.813,3.902,8.715,8.715,8.715h37.402c4.813,0,8.715-3.902,8.715-8.715 v-23.75H220.663z">
                                    </path>
                                    <path style="fill:#42392E;"
                                        d="M386.319,163.02H108.726c-21.729,0-20.958,21.405-20.958,21.405v44.488l137.952,39.705 c4.782,0.061,40.666,0.069,45.109,0.024l137.551-40.065v-44.151C408.381,162.029,386.319,163.02,386.319,163.02z">
                                    </path>
                                    <path style="fill:#5B4F3F;"
                                        d="M386.319,158.52H108.726c-21.729,0-20.958,21.405-20.958,21.405v44.488l137.952,39.705 c4.782,0.061,40.666,0.069,45.109,0.024l137.551-40.065v-44.151C408.381,157.529,386.319,158.52,386.319,158.52z">
                                    </path>
                                    <path style="fill:#3F3F3E;"
                                        d="M280.296,115.719h-64.882c-20.402,0-21.067,21.405-21.067,21.405v21.396h21.067v-11.364 c0-9.696,10.704-10.367,10.704-10.367h43.139c11.376,0,10.708,11.697,10.708,11.697l-0.333,10.034h21.398v-21.731 C301.029,114.717,280.296,115.719,280.296,115.719z">
                                    </path>
                                    <polygon style="fill:#DDBF68;"
                                        points="301.117,151.496 279.783,151.496 275.7,157.496 305.2,157.496 "></polygon>
                                    <polygon style="fill:#CCAD48;"
                                        points="303.45,154.829 277.617,154.829 274.866,158.496 306.033,158.496 ">
                                    </polygon>
                                    <polygon style="fill:#DDBF68;"
                                        points="215.45,151.496 194.116,151.496 190.033,157.496 219.533,157.496 ">
                                    </polygon>
                                    <g>
                                        <polygon style="fill:#CCAD48;"
                                            points="217.783,154.829 191.95,154.829 189.2,158.496 220.367,158.496 ">
                                        </polygon>
                                        <path style="fill:#CCAD48;"
                                            d="M270.83,277.847c0,3.994-3.238,7.232-7.232,7.232h-31.036c-3.994,0-7.232-3.238-7.232-7.232v-13.56 h45.5V277.847z">
                                        </path>
                                    </g>
                                    <path style="fill:#DDBF68;"
                                        d="M225.33,256.519c0-3.994,3.238-7.232,7.232-7.232h31.036c3.994,0,7.232,3.238,7.232,7.232v13.56 h-45.5V256.519z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <span class="text-lg font-semibold italic text-gray-900 sm:text-xl dark:text-white">Update
                            Company Detail</span>
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
                    <form method="post" action="{{ route('web.employers.profile.update') }}" class="mt-6 space-y-6" id="UpdateProfileForm"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 flex space-x-8 sm:col-span-6 md:col-span-2 justify-center">
                                <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0 object-contain"
                                    id="logo-img"
                                    src={{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->logo : asset('assets/images/default-user.jpg') }}
                                    alt="Jese picture" id="preview" />
                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                                        Company Logo
                                    </h3>
                                    <div
                                        class="mb-4 text-sm {{ $errors->any() ? 'text-red-500 dark:text-red-400' : 'text-gray-500 dark:text-gray-400' }}">
                                        {{ $errors->any() ? $errors->first('logo') : 'JPG or PNG. Max size of 1MB' }}
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
                                        <input type="file" class="hidden" name="logo" id="photo-upload"
                                            onchange="document.getElementById('logo-img').src = window.URL.createObjectURL(this.files[0])"
                                            accept=".png,.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="company_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                    Name</label>
                                <input type="text" name="company_name" id="company_name"
                                    value="{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->company_name : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Netflix" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('company_name') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="team_size"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team
                                    Size</label>
                                <select name="team_size" id="team_size"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select Team Size</option>
                                    @foreach (TEAM_SIZE as $el)
                                        <option value="{{ $el }}"
                                            {{ isset(request()->user()->employerProfile) && request()->user()->employerProfile->team_size == $el ? 'selected' : '' }}>
                                            {{ $el }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('team_size') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="website"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website
                                    Address (Optional)</label>
                                <input type="text" name="website" id="website"
                                    value="{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->website : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="https://www.example.com" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('website') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                <label for="company_phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                    Number</label>
                                <input type="number" name="company_phone" id="company_phone"
                                    value="{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->company_phone : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="e.g. +(95) 9712345678" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('company_phone') }}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 md:col-span-1">
                                <label for="since"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Since
                                    (Optional)</label>
                                <input type="number" name="since" id="since"
                                    value="{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->since : '' }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="2012" />
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('since') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3 md:col-span-1">
                                <label for="city_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <select name="city_id" id="city_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ isset(request()->user()->employerProfile) && request()->user()->employerProfile->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('city_id') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                    Address</label>
                                <textarea name="address" id="address" rows="5"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->address : '' }}</textarea>
                                <span
                                    class="text-sm text-red-500 dark:text-red-400">{{ $errors->first('address') }}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="biography"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                    Biography (Optional)</label>
                                <textarea name="biography" id="biography" rows="5"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ isset(request()->user()->employerProfile) ? request()->user()->employerProfile->biography : '' }}</textarea>
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
                        @if (isset(request()->user()->employerProfile))
                            @if (request()->user()->employerProfile->status == 'inactive')
                                <form method="post" action="{{ route('web.employers.profile.update') }}">
                                    @csrf
                                    <input type="hidden" name="status" value="active">

                                    <button
                                        class="flex text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        type="submit">
                                        <svg class="w-5 h-5 rounded-full mr-2" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
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
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-dashboard-layout>
