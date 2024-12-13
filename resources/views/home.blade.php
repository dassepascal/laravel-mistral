<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::check())
                        <p>Welcome, {{ Auth::user()->name }}!</p>
                    @else
                        <p>Welcome to our website! Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">register</a> to access more features.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
