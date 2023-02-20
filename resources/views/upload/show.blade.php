<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>
        <div class="container">
            <div class="card mt-4 mx-2">
                <div class="card-title mt-4 mx-2">
                    <button type="button" class="btn btn-primary float-end mx-2">
                        <a class="dropdown-item" href=" {{ url('/admin/invoiceuoload') }} ">Back To Invoice</a>

                    </button>
                    <h5>Invoice View</h5>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Project ID</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $data->name }}
                                    </td>
                                    <td>
                                        <iframe height="400px" width="100%" src="/assets/{{ $data->file }}"
                                            frameborder="0"></iframe>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        </div>
        </div>
    </main>
    </div>
</x-app-layout>
