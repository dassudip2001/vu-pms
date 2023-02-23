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
                <div class="col ">
                    @role('admin')
                        <div class="card max-h-96">

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
                            <form action="/admin/department" method="POST">
                                @csrf
                                <div class="card-title mx-2 mt-2">
                                    <h6>Department Form<span class="required" style="color: red;">*</span></h6>

                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Department Name -->
                                            <div class="mb-6">
                                                <label for="department_name">Department Name<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('dept_name') is-invalid @enderror"
                                                    name="dept_name" id="department_name" aria-describedby="department_name"
                                                    placeholder="Enter Department Name" require>
                                            </div>
                                            @error('dept_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <!-- Department code -->
                                            <div class="mb-6">
                                                <label for="department_code">Department Code<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text"
                                                    class="form-control form-control-sm  @error('dept_code') is-invalid @enderror"
                                                    name="dept_code" id="department_code" aria-describedby="department_code"
                                                    placeholder="Enter Department Code">
                                            </div>
                                            @error('dept_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Department Details -->
                                    <div class="mb-6">
                                        <label for="department_details">Department Details</label>
                                        <input type="text"
                                            class="form-control form-control  @error('description') is-invalid @enderror"
                                            name="description" id="department_details" aria-describedby="department_details"
                                            placeholder="Enter Department Description">
                                    </div>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <!-- Button -->
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            </form>
                        </div>
                    @endrole
                </div>
            </div>
            <div class="col ">
                <div class="card max-h-96">
                    <div class="card-title mx-2 mt-2">
                        <a class="  float-end" href="{{ url('/admin/department/download') }} "
                            style="border: none;color: black;
              text-decoration: none;"><i
                                class="fa-solid fa-print"></i>Print All</a>
                        <br>
                        <hr>
                        <form action="{{ route('admin.search') }}" method="GET" class="d-flex">
                            <input class="form-control me-2" type="text" name="search" placeholder="Search"
                                aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        {{-- <form action="{{ route('search') }}" method="GET">
                  <input type="text" name="search" required/>
                  <button type="submit">Search</button>
              </form> --}}

                        <hr>

                        <h6>Department Details</h6>
                    </div>
                    <!-- <div class="card-body"> -->
                    <!-- output -->

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    @role('admin')
                                        <th>Action</th>
                                        <th>print</th>
                                    @endrole
                                </tr>
                            </thead>
                            <div class="overflow-auto">
                                <tbody>
                                    @foreach ($department as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            {{-- <td>{{ $item->id }}</td> --}}
                                            <td> {{ $item->dept_name }}</td>
                                            <td> {{ $item->dept_code }}</td>
                                            <td> {{ $item->description }}</td>
                                            {{-- <td>{{ $item->jdcontent }} --}}
                                            </td>
                                            @role('admin')
                                                <td>

                                                    <a href=" {{ url('/admin/department/edit', $item->id) }} ">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <a style="color: red"
                                                        href=" {{ url('/admin/department/delete', $item->id) }} "
                                                        onclick="return confirm('Are You Sure You want to Delete This Record')">
                                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>

                                                </td>
                                                </a>
                                                <td>
                                                    <a style="color: black"
                                                        href=" {{ url('/admin/department/pdfForm', $item->id) }} ">
                                                        <i class="fa-regular fa-solid fa-print"></i>
                                                    </a>

                                                </td>
                                            @endrole
                                        </tr>
                                    @endforeach

                                </tbody>

                            </div>

                        </table>

                    </div>
                    <div class="con">
                        {{ $department->onEachSide(5)->links() }}

                    </div>

                </div>

            </div>
        </div>
        </div>
        </div>
        </div>
    </main>
    </div>
</x-app-layout>
