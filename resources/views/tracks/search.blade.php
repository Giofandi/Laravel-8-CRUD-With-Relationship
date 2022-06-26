<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center text-xl font-semibold leading-tight text-gray-800">{{ __('Track\'s Search') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white px-4 py-4 shadow-xl sm:rounded-lg">
                <div class="flex">
                    <div class="w-1/2 content-center">
                        <form action="/tracks" method="get">
                            <div class="">
                                <input type="search" name="search" placeholder="Search Track" class="focus:shadow-outline appearance-none rounded border px-4 py-2 text-gray-700 shadow focus:outline-none" />
                                <button type="submit" class="focus:shadow-outline-gray mx-2 items-center rounded-md border border-transparent bg-green-500 px-4 py-4 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out disabled:opacity-25">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="w-1/2">
                        <a href="{{ route('tracks.create') }}" class="focus:shadow-outline-gray float-right inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-4 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-green-500 focus:border-green-700 focus:outline-none active:bg-green-700 disabled:opacity-25"> Create New Track </a>
                    </div>
                </div>
                <br/>
              @if ($message = Session::get('success'))
              <div class="my-3 rounded-b border-t-4 border-green-500 bg-green-100 px-4 py-3 text-green-900 shadow-md" role="alert">
                  <div class="flex">
                      <div><p class="text-sm">{{ $message }}</p></div>
                  </div>
              </div>
              @endif
              <table class="w-full table-fixed">
                  <thead>
                    <tr class="bg-gray-200">
                    <th class="w-full text-center text-lg border px-4 py-2">Artist</th>
                    <th class="w-full text-center text-lg border px-4 py-2">Album</th>
                    <th class="w-full text-center text-lg border px-4 py-2">Track</th>
                    <th class="w-full  text-center text-lg border px-4 py-2">Duration</th>
                    <th class="w-96  text-center text-lg border px-4 py-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(!empty($results))
                      @foreach($results as $track)
                          <tr class="">
                            <td class="w-full border px-4 py-2">{{ $track->album->artist->name }}</td>
                            <td class="w-full border px-4 py-2">{{ $track->album->title }}</td>
                            <td class="w-full border px-4 py-2">{{ $track->name }}</td>
                            <td class="w-full border px-4 py-2">{{ $track->duration }}</td>
                            <td class="w-96 border px-4 py-2 text-center">
                                <form action="{{ route('tracks.destroy', $track->id) }}" method="POST">
                                    <a href="{{ route('tracks.show', $track->id) }}" class="focus:shadow-outline-gray mx-2 inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none active:bg-gray-900 disabled:opacity-25"> Show </a>
                                    <a href="{{ route('tracks.edit', $track->id) }}" class="focus:shadow-outline-gray mx-2 inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none active:bg-gray-900 disabled:opacity-25"> Edit </a>
                                    @csrf @method('DELETE')
                                    <button type="submit" title="delete" onclick="return confirm('Are you sure you want to delete this track ?')" class="focus:shadow-outline-gray mx-2 inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-500 focus:border-red-700 focus:outline-none active:bg-red-700 disabled:opacity-25">Delete</button>
                                </form>
                            </td>

                            </tr>
                      @endforeach
                      @else
                      <tr>
                          <td class="border px-4 py-2 text-red-500" colspan="3">No track found.</td>
                      </tr>
                      @endif
                  </tbody>
              </table>
              <br/>
            </div>
        </div>
    </div>
</x-app-layout>
