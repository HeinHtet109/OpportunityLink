<x-app-layout>
    <div class="mx-auto px-8 py-12 max-w-7xl">
        <div class="mx-auto text-center">
            <h1 class="text-slate-900 text-3xl font-normal tracking-tight lg:text-4xl font-display dark:text-white">{{ $faq->ques }}
            </h1>
            <p class="text-slate-500 text-base mt-4"><em>Effective strategies and practical tips to make the most of your
                    time and stay on track</em></p>
            <div class="text-slate-400 text-xs mt-4">
                <p>{{ Carbon\Carbon::parse($faq->created_at)->format('Y M d') }} - Opportunity Link Platform / <a href="{{ route('web.starter.faq') }}" class="font-medium text-blue-600 underline">FAQs</a> / {{ $faq->slug }}</p>
            </div>
        </div>
    </div>

    <section>
        <div class="mx-auto px-8 md:px-32 pb-12 max-w-7xl">
            <div
                class="hover:prose-a:text-slate-900 prose prose-a:text-accent-500 prose-blockquote:border-l-black prose-blockquote:text-slate-500 prose-code:text-slate-900 prose-headings:font-semibold prose-headings:text-slate-900 prose-li:marker:text-accent-500 text-slate-500 prose-pre:border max-w-none">
                <p>
                    {!! $faq->ans !!}
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
