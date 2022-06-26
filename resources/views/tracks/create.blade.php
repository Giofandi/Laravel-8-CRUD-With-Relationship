<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Create New Track') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('tracks.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <form action="{{ route('tracks.store') }}" method="POST" >
                    @csrf
                <div class="mb-4">
                    <label for="artist" class="block mb-2 text-sm font-bold text-gray-700">Select Artist : </label>
                    <select name="artist_id" id="slctartist" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" style="width:400px">
                        <option value="">--- Select Artist ---</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="artist" class="block mb-2 text-sm font-bold text-gray-700">Select Album : </label>
                    <select name="album_id" id="slctalbum" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" style="width:400px">
                        <option value="">--- Select Album ---</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Name</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="name"
                        placeholder="Enter Title">
                    @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>
                <div class="mb-4">
                    <label for="textduration"
                        class="block mb-2 text-sm font-bold text-gray-700">Duration</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="duration"
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

<script>
var lists = @json($results);
window.onload = function() {
  var slctartist = document.getElementById("slctartist");
  var slctalbum = document.getElementById("slctalbum");
  for (var artist in lists) {
    slctartist.options[slctartist.options.length] = new Option(lists[artist].name, lists[artist].id);
  }
      slctartist.onchange = function()
      {
          //empty Chapters- and Topics- dropdowns
          slctalbum.options.length = 1;
          var artist_idx = slctartist.selectedIndex - 1;
          for (var album in lists[artist_idx].albums)
          {
              slctalbum.options[slctalbum.options.length] = new Option(lists[artist_idx].albums[album].title, lists[artist_idx].albums[album].id);
          }
      }
}
</script>
