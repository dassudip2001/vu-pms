<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>

        {{-- <div class="container mt-4 mx-4"> --}}
        <div class="card mt-4 mx-4">
            <div class="card-title mt-4 mx-4">
                <button type="button" class="btn btn-success float-end"><a
                        href=" {{ url('/department') }} ">Back</a></button>
                <br>
                <h6>Search Department</h6>
                <hr>
            </div>
            <div class="card-body">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col"> Department Name</th>
                                    <th scope="col"> Department Describption</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ $post->dept_name }}</td>
                                    <td>{{ $post->description }}</td>


                                </tr>


                            </tbody>
                        </table>
                        <div class="post-list">


                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
            </div>

        </div>


        </div>
        </div>
    </main>
    </div>
</x-app-layout>
