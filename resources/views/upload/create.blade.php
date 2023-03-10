<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>

        <link rel="stylesheet" href="{{ asset('css/upload.css') }}">

        {{-- card --}}

        <div class="card mt-3 mx-3">
            <div class="card-title mx-3 mt-2">
                {{-- modal --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end m-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add New
                </button>
                <h6>Upload</h6>
                <br>
                <hr>
                <form action="{{ route('admin.invoiceupload.search') }}" method="GET" class="d-flex">
                    <input class="form-control me-2 mt-2" type="text" name="search" placeholder="Search by Bill no"
                        aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>

            {{-- card-body --}}
            <div class="card-body">
                {{-- success massage --}}

                {{-- @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                {{--  show table --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Project No</th>
                                <th>File</th>
                                <th>Bill No</th>

                                <th>Amount</th>
                                <th>Describption</th>
                                <th>Status</th>
                                @role('admin')
                                    <th>Approved</th>
                                @endrole

                                <th>View</th>
                                <th>Download</th>
                                {{-- @role('admin') --}}
                                <th>Action</th>
                                {{-- @endrole --}}
                            </tr>
                        </thead>
                        <div class="overflow-auto">
                            @foreach ($invoice as $key => $inv)
                                <tbody>
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $inv->name }}</td>
                                        <td>{{ $inv->file }}</td>
                                        <td> {{ $inv->bill_no }} </td>
                                        <td> {{ $inv->amount }} </td>
                                        <td> {{ $inv->description }}</td>
                                        @if ($inv->status == 'Pending')
                                            <td style="color: blue"> {{ $inv->status }}</td>
                                        @elseif ($inv->status == 'Approved')
                                            <td style="color: rgb(107, 222, 36)"> {{ $inv->status }}</td>
                                        @else
                                            <td  style="color: rgb(222, 58, 36)"> {{ $inv->status }}</td>
                                        @endif
                                        @role('admin')
                                            <td> <a style="text-decoration: none" class="btn-success"
                                                    href="{{ url('/admin/invoiceuoload/edit', $inv->id) }}">Click To Change Status</a>
                                            </td>
                                        @endrole
                                        <!-- <td> <a class="btn-denger" href="{{ url('/cancle', $inv->id) }}">Cancle</a></td> -->



                                        <td>
                                            <a href="{{ url('/admin/view/' . $inv->id) }}   ">
                                                <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href=" {{ url('/admin/download', $inv->file) }}  ">
                                                <button type="submit"><i
                                                        class="fa-sharp fa-solid fa-download"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href=" {{ url('/admin/invoiceuoload/delete', $inv->id) }} ">
                                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                            </a>

                                            {{-- <a href=" {{ url('invoiceuoload/showall',$inv->id) }} ">
                   <i class="fa-solid fa-street-view"></i> --}}
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </div>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Invoice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    {{-- main contain --}}
                                    {{-- start form --}}
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- input  --}}
                                        <div class="mb-3">
                                            <label for="project_no" class="form-label">Project No</label>
                                            <input type="text" class="form-control" name="name" id="project_no"
                                                placeholder="Enter Project No">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="bill_no" class="form-label">Bill No</label>
                                                    <input type="text" class="form-control" name="bill_no"
                                                        id="bill_no" placeholder="Enter Bill No">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Amount </label>
                                                    <input type="number" class="form-control" name="amount"
                                                        id="amount" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                            {{-- <div class="col">
                       <div class="mb-3">
                         <label for="project_no" class="form-label">Project No</label>
                         <input type="text" class="form-control" id="project_no" placeholder="Enter Project No">
                       </div>
                     </div> --}}
                                        </div>
                                        <div class="col">
                                            {{-- upload module --}}
                                            <div class="container">
                                                <div class="card model_card mb-3 mt-3" style="max-width: 705px;">
                                                    <div class="row g-0 fleax">
                                                        <div class="col-md-4">
                                                            <img src="{{ asset('/img/upload.png') }}"
                                                                class="img-fluid rounded-start mt-0 mx-1"
                                                                alt="...">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Upload File</h5>
                                                                {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                                                                <div>
                                                                    <label for="formFileLg" class="form-label">Please
                                                                        Upload Invoice</label>
                                                                    <input class="form-control form-control-lg"
                                                                        id="formFileLg" name="file" type="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="describption" class="form-label">Describption</label>
                                            <textarea class="form-control" name="description" id="describption" rows="3"
                                                placeholder="Enter The Describption"></textarea>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        </div>
        </div>
    </main>
    </div>
</x-app-layout>
