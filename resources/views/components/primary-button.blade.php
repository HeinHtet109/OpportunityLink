<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center w-full px-5 py-3 text-sm leading-4 text-white bg-purple-500 text-center rounded-full hover:bg-purple-50 hover:text-purple-500 duration-200 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-purple-500']) }}>
    {{ $slot }}
</button>
