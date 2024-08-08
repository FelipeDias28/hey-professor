<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question" />

            <x-btn.submit>Save</x-button>
            <x-btn.reset>Cancel</x-button>
        </x-form>

        <hr class="border-gray-600 my-4">

        {{-- O dark antes diz que se estiver no dark-mode esse vai ser o estilo utilizado --}}
        <div class="dark:text-gray-600 uppercase font-bold mb-2">List Of Questions</div>

        <div class="dark:text-gray-400">
            @foreach ($questions as $item)
                <div>{{ $item->question }}</div>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
