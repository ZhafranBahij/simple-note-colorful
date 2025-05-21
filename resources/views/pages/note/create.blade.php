<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    {{-- Error in laravel --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $message)
                            <div role="alert" class="alert alert-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endforeach
                    @endif

                    <form class="flex flex-col gap-2" action="{{ route('note.store') }}" method="POST">
                        @csrf
                        <label class="input w-full">
                            <input type="text" class="grow" placeholder="title" name="title" required value="{{ old('title') }}" />
                        </label>
                        <textarea class="textarea w-full" placeholder="description" name="description">{{old('description')}}</textarea>

                        <div>
                            <a href="{{ route('note.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
