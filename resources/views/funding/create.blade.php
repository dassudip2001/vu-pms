<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>
        <div class="container  mt-4">
            <div class="row">
                <div class="col">
                    @role('admin')
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">
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
                            @endif
                            <form action=" " method="POST">
                                @csrf
                                <div class="card-title mx-2 mt-2">
                                    <h6>Funding Agency Form<span class="required" style="color: red;">*</span></h6>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <!-- funding Name -->
                                    <div class="mb-6">
                                        <label for="funding_agency">Funding Agency Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control  @error('agency_name') is-invalid @enderror"
                                            name="agency_name" id="funding_agency" aria-describedby="funding_agency"
                                            placeholder="Enter Funding Agency Name">
                                        @error('agency_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Button -->

                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

                            </form>
                        </div>
                    @endrole
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-title mx-2 mt-2">
                        <a class="  float-end"
                            href="{{ url('/admin/funding/download') }}"style="border: none;
          text-decoration: none;"><i
                                class="fa-solid fa-print"></i>Print All</a>

                        <h6>Funding Agency Details</h6>
                        <br>
                        {{--                        <form action="{{route('funding.search')}}" method="GET" class="d-flex"> --}}
                        {{--                            <input class="form-control me-2  type="text" name="search" placeholder="Search" aria-label="Search" required> --}}
                        {{--                            <button class="btn btn-outline-success" type="submit">Search</button> --}}
                        {{--                        </form> --}}
                        <br>
                    </div>

                    <!-- <div class="card-body"> -->
                    <!-- output -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Funding Agency Name</th>
                                    @role('admin')
                                        <th>Action</th>

                                        <th>Print</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agency as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td> {{ $item->agency_name }}</td>
                                        @role('admin')
                                            <td>

                                                <a href=" {{ url('/admin/funding/edit', $item->id) }} ">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href=" {{ url('/admin/funding/delete', $item->id) }} ">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href=" {{ url('/funding/pdfForm', $item->id) }} ">
                                                    <i class="fa-regular fa-solid fa-print"></i>
                                                </a>

                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        </div>


        </div>
        </div>
    </main>
    </div>
</x-app-layout>
