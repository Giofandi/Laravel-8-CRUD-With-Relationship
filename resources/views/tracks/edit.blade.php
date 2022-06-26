<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Edit Track') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('tracks.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <form action="{{ route('tracks.update', $track->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-4">
                    <label for="textartist" class="block mb-2 text-xl text-center font-bold text-gray-700">Artit : {{$artist->name}}</label>
                    <label for="textalbum" class="block mb-2 text-lg text-center font-bold text-gray-700">Album : {{$album->title}}</label>
                </div>
                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Name</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="name"
                        value="{{ $track->name }}"
                        placeholder="Enter Name">
                    @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>
                <div class="mb-4">
                    <label for="textduration"
                        class="block mb-2 text-sm font-bold text-gray-700">Duration</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="duration"
                        value="{{ $track->duration }}"
                        placeholder="Enter Duration">
                    @error('duration') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>
                <div>
                    <button type="submit"
                    class="inline-flex items-center px-4 py-2 my-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                        Save
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
