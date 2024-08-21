@props(['question'])

<div 
    class="rounded dark:bg-gray800/50 shadow shadow-blue-500/50 p-3 dark:text-gray-400
    flex justify-between items-center"
>
    <span>{{ $question }}</span>

    <div>
        <a href="{{ route('question.like', $question) }}">
            <x-icons.thumbs-up class="w-5 h-5 text-green-500 hover:text-green-300 cursor-pointer" id="thumbs-up" />
        </a>

        <a href="{{ route('question.like', $question) }}">
            <x-icons.thumbs-down class="w-5 h-5 text-red-500 hover:text-red-300 cursor-pointer" id="thumbs-down" />
        </a>
    </div>
</div>
