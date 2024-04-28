<x-dashboard-layout>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 w-full">
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
                        <li class="flex items-center">
                            <a href="{{ route('web.freelancers.managejob.activeJob.index') }}"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Manage Active Jobs
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                    aria-current="page">Manage</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="items-center justify-between block sm:flex">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Chat with client here!
                        </h1>
                    </div>

                    @if ($activeJob->status == ONGOING && $activeJob->freelancer_end == false)
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <button type="button" data-modal-target="end-modal" data-modal-toggle="end-modal"
                                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:w-auto dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                End Job Now
                            </button>
                        </div>
                    @endif

                    @if ($activeJob->status == ONGOING && $activeJob->employer_end == false && $activeJob->freelancer_end == true)
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <div
                                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-teal-700  sm:w-auto">
                                Waiting For Employer Response
                            </div>
                        </div>
                    @endif

                    @if ($activeJob->status == ENDED)
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                            <div
                                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-red-700  sm:w-auto">
                                Ended
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="inline-block min-w-full align-middle">
            <div class="shadow">

                <div class="w-full border flex flex-col">
                    <!-- Header -->
                    <div class="py-2 px-3  flex flex-row justify-between items-center border-b">
                        <div class="flex items-center">
                            <div>
                                <img class="w-10 h-10 rounded-full" src="{{ $activeJob->employer->photo }}" />
                            </div>
                            <div class="ml-4">
                                <p class=" text-slate-800 font-bold dark:text-white">
                                    {{ $activeJob->employer->name }}
                                </p>
                                <p class="text-grey-darker text-xs mt-1 dark:text-white">
                                     Contact Number: {{ $activeJob->employer->phone }}
                                </p>
                            </div>
                        </div>

                        <div class="flex mr-3">
                            <div class="ml-6">
                                <a href="mailto:{{ $activeJob->employer->email }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30"
                                        height="30">
                                        <g data-name="7-Email-Arrow up">
                                            <path class="fill-black dark:fill-white"
                                                d="M29 4H3a3 3 0 0 0-3 3v18a3 3 0 0 0 3 3h13v-2H3a1 1 0 0 1-1-1V7.23l13.42 9.58a1 1 0 0 0 1.16 0L30 7.23V17h2V7a3 3 0 0 0-3-3zM16 14.77 3.72 6h24.56z" />
                                            <path class="fill-black dark:fill-white"
                                                d="m24.29 18.29-4 4 1.41 1.41 2.3-2.29V29h2v-7.59l2.29 2.29 1.41-1.41-4-4a1 1 0 0 0-1.41 0z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-1 overflow-auto" style="max-height: 20rem">
                        <div class="py-2 px-3">
                            <div class="flex justify-center mb-4">
                                <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                                    <p class="text-xs">
                                        Messages to this chat and calls are now secured with end-to-end
                                        encryption.
                                    </p>
                                </div>
                            </div>

                            <div class="message-box">
                                @if (count($activeJob->jobActivityLog) > 0)
                                    @foreach ($activeJob->jobActivityLog as $dt)
                                        @if ($dt->status == DELIVERED)
                                            @if ($dt->user_id == request()->user()->id)
                                                <div class="flex justify-end mb-2">
                                                    <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                                        <p class="text-sm mt-1">
                                                            {{ $dt->message }}
                                                        </p>
                                                        <p class="text-right text-xs text-grey-dark mt-1">
                                                            {{ Carbon\Carbon::parse($dt->created_at)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="flex mb-2">
                                                    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                                        <p class="text-sm text-teal">
                                                            {{ $dt->message }}
                                                        </p>
                                                        <p class="text-right text-xs text-grey-dark mt-1">
                                                            {{ Carbon\Carbon::parse($dt->created_at)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Input -->
                    @if ($activeJob->employer_end || $activeJob->status == ENDED)
                        <div class="px-4 py-4 flex items-center">
                            <div class="flex-1 mx-4">
                                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        This Job is already ended! No longer send messages to your employer, if you have any issues, don't hesitate to contact us! Thank you!
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <form action="{{ route('web.freelancers.chat.message.send') }}" method="POST" id="SendMessage">
                        @csrf

                        <input type="hidden" name="active_job_id" value="{{ $activeJob->id }}">
                        <input type="hidden" name="user_id" value="{{ request()->user()->id }}">
                        <input type="hidden" name="receiver_id" value="{{ $activeJob->employer_id }}">
                        <div class="px-4 pt-4 flex items-center">
                            <div class="flex-1 mx-4">
                                <input name="message"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    type="text" />
                            </div>
                            <div>
                                <button type="submit" id="sendMessage_btn">
                                    <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M5.5 9H3.5" stroke="#0095FF" stroke-width="1.5"
                                                stroke-linecap="round">
                                            </path>
                                            <path d="M5 15L4 15" stroke="#0095FF" stroke-width="1.5"
                                                stroke-linecap="round">
                                            </path>
                                            <path d="M4 12H2" stroke="#0095FF" stroke-width="1.5"
                                                stroke-linecap="round">
                                            </path>
                                            <path
                                                d="M12.0409 12.7649C12.4551 12.7649 12.7909 12.4291 12.7909 12.0149C12.7909 11.6007 12.4551 11.2649 12.0409 11.2649V12.7649ZM9.26797 12.7649H12.0409V11.2649H9.26797V12.7649Z"
                                                fill="#0095FF"></path>
                                            <path
                                                d="M11.8369 4.80857L12.1914 4.14766L11.8369 4.80857ZM20.5392 9.47684L20.1846 10.1377L20.5392 9.47684ZM20.5356 14.5453L20.8891 15.2068L20.5356 14.5453ZM11.8379 19.1934L11.4844 18.5319H11.4844L11.8379 19.1934ZM8.13677 15.7931L7.41828 15.578L8.13677 15.7931ZM8.13127 8.2039L7.41256 8.41827L8.13127 8.2039ZM9.18255 11.7286L8.46384 11.9429L9.18255 11.7286ZM11.4823 5.46948L20.1846 10.1377L20.8937 8.81593L12.1914 4.14766L11.4823 5.46948ZM20.1821 13.8839L11.4844 18.5319L12.1914 19.8548L20.8891 15.2068L20.1821 13.8839ZM8.85526 16.0082L9.90074 12.5163L8.46376 12.0861L7.41828 15.578L8.85526 16.0082ZM9.90126 11.5142L8.84998 7.98954L7.41256 8.41827L8.46384 11.9429L9.90126 11.5142ZM11.4844 18.5319C10.7513 18.9237 9.98824 18.7591 9.44091 18.2563C8.88829 17.7486 8.58451 16.9125 8.85526 16.0082L7.41828 15.578C6.97411 17.0615 7.47325 18.4855 8.4261 19.3609C9.38423 20.2411 10.8292 20.5828 12.1914 19.8548L11.4844 18.5319ZM20.1846 10.1377C21.6065 10.9005 21.6046 13.1236 20.1821 13.8839L20.8891 15.2068C23.3683 13.8819 23.3707 10.1447 20.8937 8.81593L20.1846 10.1377ZM12.1914 4.14766C10.8301 3.41739 9.38432 3.75692 8.42486 4.63604C7.47072 5.5103 6.96983 6.93392 7.41256 8.41827L8.84998 7.98954C8.5801 7.08467 8.88494 6.24894 9.43821 5.74199C9.98618 5.23991 10.7495 5.07638 11.4823 5.46948L12.1914 4.14766ZM9.90074 12.5163C9.9986 12.1895 9.99878 11.8412 9.90126 11.5142L8.46384 11.9429C8.47777 11.9896 8.47774 12.0394 8.46376 12.0861L9.90074 12.5163Z"
                                                class="fill-black dark:fill-white"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-4 mx-4 pb-4 error-message"></div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- End modal -->
    @if ($activeJob->status == ONGOING && $activeJob->freelancer_end == false)
    <div id="end-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <form action="{{ route('web.freelancers.managejob.activeJob.end') }}" method="POST">
                    @csrf
                    <input type="hidden" name="activeJob_id" value="{{ $activeJob->id }}">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Confirmation
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="end-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Are you sure you want to end this job?
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Yes,
                            Sure</button>
                        <button data-modal-hide="end-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Rating modal -->
    <div id="rating-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->

                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Submit Rating
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Please submit rating for your employer! Your rating is useful to improve better performance in
                        working environment.
                    </p>

                    <p class="text-base leading-relaxed text-red-500 dark:text-red-400">
                        {{ $errors->first('score') }}
                    </p>

                    <form action="{{ route('web.freelancers.managejob.activeJob.submit-rating') }}" method="POST"
                        class="rating" id="RatingForm">
                        @csrf
                        <input type="hidden" name="activeJob_id" value="{{ $activeJob->id }}">
                        <label>
                            <input type="radio" name="stars" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" form="RatingForm"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            const form = document.querySelector('#SendMessage');
            let message = document.querySelector('input[name=message]');

            message.addEventListener('keyup', function(e){
                $('.error-message').html('');
            });

            if(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if(message.value == ""){
                        $(".error-message").html(`<span class="text-red-500 text-sm">Send Message is required!</span>`);
                        return;
                    }

                    sendChatMessage(this, e.target.action);

                    $("#sendMessage_btn").attr('disabled', true);
                    form.reset();
                })
            }
        </script>

        <script type="module">
            var user_id = "{{ request()->user()->id }}";

             @if (session('rating_status'))
                openRatingModal();
            @endif

            @if ($errors->first('score'))
                openRatingModal();
            @endif

            channel.bind('chat-event-' + user_id, function(data) {

                var html = `<div class="flex mb-2">
                                <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                    <p class="text-sm text-teal">
                                        ${data.message}
                                    </p>
                                    <p class="text-right text-xs text-grey-dark mt-1">
                                        ${formatAMPM(new Date())}
                                    </p>
                                </div>
                            </div>`;

                $('.message-box').append(html);
            });
        </script>
    </x-slot>
</x-dashboard-layout>
