{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot> --}}
<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>

        <div class="card mt-4 mx-4">
            <div class="card-title mt-4 mx-4">
                <button type="button" class="btn btn-success float-end"><a
                        href=" {{ url('/createuser') }} ">Back</a></button>
                <br>
                <h6>Search User4</h6>
                <hr>
            </div>
            <div class="card-body">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $bud)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> User Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $bud->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="bud-list">
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No Agency found</h2>
                    </div>
                @endif
            </div>

        </div>


        </div>
        </div>
    </main>
    </div>
</x-app-layout>

{{-- <div class="container mt-4 mx-4"> --}}
