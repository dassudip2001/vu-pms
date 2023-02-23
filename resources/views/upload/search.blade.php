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
                        href=" {{ url('/admin/invoiceuoload') }} ">Back</a></button>
                <br>



                <h6>Search Invoice</h6>
                <hr>
            </div>
            <div class="card-body">
                @if ($invoiceupload->isNotEmpty())
                    @foreach ($invoiceupload as $post)
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Project No</th>
                                    <th scope="col"> Bill No</th>
                                    <th scope="col"> Describption</th>
                                    <th scope="col"> Amount</th>
                                    <th scope="col"> File</th>

                                    <th scope="col"> Download</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->bill_no }}</td>

                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->amount }}</td>
                                    <td>{{ $post->file }}</td>
                                    <td>
                                        <a href=" {{ url('/download', $post->file) }}  ">
                                            <button type="submit"><i
                                                    class="fa-sharp fa-solid fa-download"></i></button>
                                        </a>
                                    </td>
                                    <td><a href="{{ url('/view/' . $post->id) }}   ">
                                            <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                        </a></td>

                                    <td><a href=" {{ url('invoiceuoload/delete', $post->id) }} ">
                                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </a></td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="post-list">


                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No invoiceupload found</h2>
                    </div>
                @endif
            </div>

        </div>
        </div>
        </div>
    </main>
    </div>
</x-app-layout>
