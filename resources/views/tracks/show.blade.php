<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Track\'s Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('tracks.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <table class="w-full table-fixed">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 font-bold">Artist</td>
                            <td>{{ $artist->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Album</td>
                            <td>{{ $album->title }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Name</td>
                            <td>{{ $track->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Duration</td>
                            <td>{{ $track->duration }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Created on</td>
                            <td>{{ $artist->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Last updated</td>
                            <td>{{ $artist->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
