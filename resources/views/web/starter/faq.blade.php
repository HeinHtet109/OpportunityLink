<x-app-layout>
    <section>
        <div class="mx-auto px-8 md:px-32 py-12 max-w-7xl">
            <div class="max-w-xl"><span
                    class="text-purple-500 text-sm leading-6 px-4 py-2 relative bg-white ring-1 ring-slate-200 rounded-full">FAQs</span>
                <h2 class="text-slate-900 text-3xl font-normal tracking-tight font-display lg:text-4xl mt-8 dark:text-white">
                    Seek helps and find more answers.
                </h2>
                <p class="text-slate-500 text-base mt-4">
                    Unleashing your potential, overcoming challenges,
                    <span class="md:block">
                        and thriving in today's evolving workplace
                    </span>
                </p>
            </div>
            @if (count($faqs) > 0)
                <div class="mt-2 lg:mt-6">
                    {{ $faqs->links('vendor.pagination.tailwind') }}
                </div>
                <ul class="grid grid-cols-1 mt-2 lg:mt-6 lg:grid-cols-3 sm:grid-cols-2 gap-x-3 gap-y-8 lg:gap-x-6">
                    @foreach ($faqs as $faq)
                        <li>
                            <a href="{{ route('web.starter.faq.single', $faq->slug) }}" title="{{ $faq->ques }}"
                                class="group">
                                <article class="flex-1 h-full flex flex-col">
                                    <div></div>
                                    <div class="flex flex-col items-start justify-start flex-1 w-full mt-4">
                                        <footer>
                                            <div class="inline-flex space-x-1 items-center">
                                                <p class="text-xs font-medium text-gray-400">Opportunity Link Platform
                                                </p><span aria-hidden="true">·</span>
                                                <div class="flex text-xs text-gray-500"><time
                                                        datetime="2020-03-16">{{ Carbon\Carbon::parse($faq->created_at)->format('Y M d') }}</time>
                                                </div>
                                            </div>
                                        </footer>
                                        <div class="w-full mt-4">
                                            <div>
                                                <p class="text-lg font-medium text-slate-900 dark:text-white">{!! $faq->ques !!}
                                                </p>
                                            </div>
                                            <p class="text-base mt-4 text-slate-500 line-clamp-2">
                                                {!! $faq->ans !!}</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
            <div class="divide-y divide-slate-100">
                <h2 class="pt-8 pb-4 text-xl font-bold tracking-tight text-gray-700 dark:text-white">FAQs are not available yet. Stay Tuned! <span class="text-gray-500 font-normal text-lg">We will provide as soon as possible.</span></h2>
            </div>
            @endif
        </div>
    </section>
</x-app-layout>
