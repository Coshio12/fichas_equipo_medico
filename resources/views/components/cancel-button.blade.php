<button {{$attributes->merge(['type' => 'button', 'class' => 'px-6 py-2 min-w-[120px] text-center text-white bg-gray-600 border border-gray-600 rounded active:text-violet-500 hover:bg-transparent hover:text-gray-800 focus:outline-none focus:ring'])}}>
    {{$slot}}
</button>