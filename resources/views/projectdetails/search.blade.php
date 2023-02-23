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
                <h6>Search Project</h6>
                <hr>
            </div>
            <div class="card-body">
                @if ($ProjectPosts->isNotEmpty())
                    @foreach ($ProjectPosts as $post)
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col"> Project No</th>
                                    <th scope="col"> Project Name</th>
                                    <th scope="col"> Project Scheme</th>
                                    <th scope="col"> Project Duration</th>
                                    <th scope="col"> Project Amount</th>
                                    <th scope="col">Print</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ $post->project_no }}</td>
                                    <td>{{ $post->project_title }}</td>
                                    <td> {{ $post->project_scheme }} </td>
                                    <td> {{ $post->project_duration }} </td>
                                    <td> {{ $post->project_total_cost }} </td>
                                    <th>
                                        <a href=" {{ url('/projectdetail/pdfForm', $post->id) }} ">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    </th>

                                </tr>
                            </tbody>
                        </table>
                        <div class="post-list">


                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No ProjectPosts found</h2>
                    </div>
                @endif
            </div>

        </div>


        </div>
        </div>
    </main>
    </div>
</x-app-layout>
