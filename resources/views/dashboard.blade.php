<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My books') }}
        </h2>
    </x-slot>

    <div class="py-12">  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{route('books.index')}}">Go to books</a> <br>
                <!--<x-jet-welcome />-->
            </div>
        </div>
    </div>
</x-app-layout>
