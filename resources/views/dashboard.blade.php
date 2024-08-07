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
    </x-container>
</x-app-layout>
