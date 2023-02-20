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
                            {{-- @if (session('success'))
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
                            @endif --}}
                            <form action=" " method="POST">
                                @csrf
                                <div class="card-title mx-2 mt-2">
                                    <h6>Budget Form<span class="required" style="color: red;">*</span></h6>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Budget Name -->
                                            <div class="mb-6">
                                                <label for="budget_title">Budget Title<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('budget_title') is-invalid @enderror"
                                                    name="budget_title" id="budget_name" aria-describedby="budget_name"
                                                    placeholder="Enter Budget Title">
                                            </div>
                                            @error('budget_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <!-- Budget code -->
                                            <div class="mb-6">
                                                <label for="budget_type">Budget Type<span class="required"
                                                        style="color: red;">*</span></label>
                                                <!-- <input type="text" class="form-control form-control-sm" name="budget_type"  id="budget_type" aria-describedby="budget_type" placeholder="Enter Budget Type"> -->
                                                <select name="budget_type"
                                                    class="form-select form-select-sm @error('budget_type') is-invalid @enderror"
                                                    aria-label=".form-select-sm example">
                                                    <option selected hidden>Budget Type</option>
                                                    <option>Recurring</option>
                                                    <option>Non-Recurring</option>
                                                </select>
                                            </div>
                                            @error('budget_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                <div class="card max-h-96">
                    <div class="card-title mx-2 mt-2">
                        <a style="text-decoration: none" class="float-end" href=" {{ url('/admin/budget/download') }} ">
                            <i
                                class="fa-regular fa-solid fa-print"style="border: none;
                  text-decoration: none;"></i>Print
                            All
                        </a>
                        <br>
{{--                        <form action=" {{ route('budget.search') }} " method="GET" class="d-flex">--}}
{{--                            <input class="form-control me-2  type="text" name="search" placeholder="Search"--}}
{{--                                aria-label="Search" required>--}}
{{--                            <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                        </form>--}}
                        <br>
                        <h6>Budget Details</h6>
                    </div>
                    <!-- <div class="card-body"> -->
                    <!-- output -->
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Budget Title</th>
                                <th>Budget Type</th>

                                @role('admin')
                                    <th>Action</th>

                                    <th>Print</th>
                                @endrole

                            </tr>
                        </thead>
                        <div class="overflow-auto">
                            <tbody>
                                @foreach ($budget as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td> {{ $item->budget_title }}</td>

                                        <td> {{ $item->budget_type }}</td>
                                        @role('admin')
                                            <td>

                                                <a href=" {{ url('/admin/budget/edit', $item->id) }} ">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href=" {{ url('/admin/budget/delete', $item->id) }} ">
                                                    <i class="fa-solid fa-trash"></i>

                                            </td>
                                            </a>
                                            <th>
                                                <a href=" {{ url('/admin/budget/pdfForm', $item->id) }} ">
                                                    <i class="fa-regular fa-solid fa-print"></i>
                                                </a>

                                            </th>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
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
