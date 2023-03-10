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
                    <div class="card ">
                        <div class="mx-3 mt-2">
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        @role('admin')
                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalToggleLabel">Create User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endrole
                                        {{-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif --}}
                                        <div class="modal-body">
                                            <form action=" " method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Faculty Title  -->
                                                        <div class="mb-6 ">
                                                            <label for="faculty_title">Faculty Title<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <!-- <input type="text" class="form-control form-control-sm" name="fac_title"  id="faculty_title" aria-describedby="faculty_title" placeholder="Enter  Faculty Title"> -->
                                                            <select name="fac_title"
                                                                class="form-select form-select-sm @error('fac_title') is-invalid @enderror"
                                                                aria-label=".form-select-sm example">
                                                                <option selected hidden>Faculty Title </option>
                                                                <option>Prf.</option>
                                                                <option>Dr.</option>
                                                                <option>Mr.</option>
                                                                <option>Mis.</option>
                                                            </select>
                                                        </div>
                                                        @error('fac_title')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Name -->
                                                        <div class="mb-6">
                                                            <label for="faculty_name">Faculty Name<span class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                                name="name" id="faculty_name"
                                                                aria-describedby="faculty_name"
                                                                placeholder="Enter  Faculty Name">
                                                        </div>
                                                        @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Code -->
                                                        <div class="mb-6">
                                                            <label for="faculty_code">Faculty Code<span class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('fac_code') is-invalid @enderror"
                                                                name="fac_code" id="faculty_code"
                                                                aria-describedby="faculty_code"
                                                                placeholder="Enter  Faculty Code">
                                                        </div>
                                                        @error('fac_code')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Faculty Email -->
                                                        <div class="mb-6">
                                                            <label for="faculty_email">Faculty Email<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="email"
                                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                                name="email" id="faculty_email"
                                                                aria-describedby="faculty_email"
                                                                placeholder="Enter  Faculty Email">
                                                        </div>
                                                        @error('email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Department -->
                                                        <div class="mb-6">
                                                            <label for="funding_agency">Faculty Department <span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <br>
                                                            <select name="department_id"
                                                                class="form-select form-select-sm @error('department_name') is-invalid @enderror"
                                                                aria-label=".form-select-sm example">
                                                                <option selected hidden>Select Faculty Department
                                                                </option>
                                                                @foreach ($data as $department)
                                                                    <option value="{{ $department->id }}">
                                                                        {{ $department->dept_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('department_name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!--Faculty Designation  -->
                                                        <div class="mb-6 ">
                                                            <label for="faculty_designation">Faculty Designation<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <!-- <input type="text" class="form-control form-control-sm" name="fac_designtion"  id="faculty_designation" aria-describedby="faculty_designation" placeholder="Enter  Faculty Designation"> -->
                                                            <select name="fac_designtion"
                                                                class="form-select form-select-sm @error('fac_designtion') is-invalid @enderror"
                                                                aria-label=".form-select-sm example">
                                                                <option selected hidden>Faculty Designation </option>
                                                                <option>Professor </option>
                                                                <option>Associate Professor </option>
                                                                <option>Assistance Professor</option>
                                                            </select>
                                                        </div>
                                                        @error('fac_designtion')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Join Date -->
                                                        <div class="mb-6">
                                                            <label for="faculty_join">Faculty Join<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="date"
                                                                class="form-control form-control-sm @error('fac_join') is-invalid @enderror"
                                                                name="fac_join" id="from-datepicker"
                                                                aria-describedby="faculty_join"
                                                                placeholder="Enter  Faculty Join" checked>
                                                        </div>
                                                        @error('fac_join')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Faculty Retirement Date -->
                                                        <div class="mb-6">
                                                            <label for="faculty_retirement">Faculty Retirement<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="date"
                                                                class="form-control form-control-sm @error('fac_retirement') is-invalid @enderror"
                                                                name="fac_retirement" id="from-datepicker"
                                                                aria-describedby="faculty_retirement"
                                                                placeholder="Enter  Faculty Retirement">
                                                        </div>
                                                        @error('fac_retirement')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Phone -->
                                                        <div class="mb-6">
                                                            <label for="faculty_phone">Faculty Phone<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('fac_phone') is-invalid @enderror"
                                                                name="fac_phone" id="faculty_phone"
                                                                aria-describedby="faculty_phone"
                                                                placeholder="Enter  Faculty Phone Number">
                                                        </div>
                                                        @error('fac_phone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Faculty Status -->
                                                        <div class="mb-6">
                                                            <label for="faculty_status">Faculty Status<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <!-- <input type="text" class="form-control form-control-sm" name="fac_status"  id="faculty_status" aria-describedby="faculty_status" placeholder="Enter  Faculty Status"> -->
                                                            <select name="fac_status"
                                                                class="form-select form-select-sm @error('fac_status') is-invalid @enderror"
                                                                aria-label=".form-select-sm example">
                                                                <option selected hidden>Faculty Status </option>
                                                                <option>Active </option>
                                                                <option>Dactive </option>
                                                            </select>
                                                        </div>
                                                        @error('fac_status')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- Faculty Description -->
                                                        <div class="mb-6">
                                                            <label for="faculty_description">Faculty Description<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('fac_description') is-invalid @enderror"
                                                                name="fac_description" id="faculty_description"
                                                                aria-describedby="faculty_description"
                                                                placeholder="Faculty Description">
                                                        </div>
                                                        @error('fac_description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- password -->
                                                        <div class="mb-6">
                                                            <label for="password">Faculty Password<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="password"
                                                                class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                                name="password" id="password"
                                                                aria-describedby="password"
                                                                placeholder=" Password like Admin@123">
                                                        </div>
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <!-- confirm password -->
                                                        <div class="mb-6">
                                                            <label for="confirm_password">Confirm Password<span
                                                                    class="required"
                                                                    style="color: red;">*</span></label>
                                                            <input type="password"
                                                                class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                                                name="password_confirmation" id="confirm_password"
                                                                aria-describedby="confirm_password"
                                                                placeholder="Confirm Password">
                                                        </div>
                                                        @error('password_confirmation')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr>

                                                <!-- Button -->
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-end">Create
                                                    User</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @role('admin')
                                <a class=" "style="border: none;text-decoration: none;"
                                    href="{{ url('/admin/createuser/download') }}"><i class="fa-solid fa-print"></i>Print
                                    All</a>

                                <a class="btn btn-primary float-end" data-bs-toggle="modal" href="#exampleModalToggle"
                                    role="button"><i class="fa-solid fa-user-plus"></i> Add New User</a>
                            @endrole
                        </div>
                        <div class="card-title  mx-3">
                            <!-- success massage -->
                            {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}
                            <hr>
                            <br>
                            <form action="{{ route('admin.usercreate.search') }}" method="GET" class="d-flex">
                                <input class="form-control me-2  type="text" name="search" placeholder="Search"
                                    aria-label="Search" required>
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <br>

                            <h6> User Details</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover ">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th> Fac Code</th>
                                            <th> Fac Title</th>
                                            <th> Name</th>
                                            <th> Email</th>
                                            <th> Phone</th>
                                            <th> Join</th>
                                            <th> Retirement</th>
                                            <th> Department</th>
                                            <th> Designation</th>
                                            <th> Status</th>
                                            <th>Action </th>
                                            <th>Print </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($createUser as $key => $item)
                                            @if (Auth::user()->id == '1' || Auth::id() == $item->user->id)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>{{ $item->faculty->fac_code }}</td>
                                                    <td>{{ $item->faculty->fac_title }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->user->email }} </td>
                                                    <td>{{ $item->faculty->fac_phone }}</td>
                                                    <td>{{ $item->faculty->fac_join }}</td>
                                                    <td>{{ $item->faculty->fac_retirement }}</td>
                                                    <td>{{ $item->department->dept_name }}</td>
                                                    <td>{{ $item->faculty->fac_designtion }}</td>
                                                    @if ($item->faculty->fac_status != 'Dactive')
                                                        <td style="color: green">{{ $item->faculty->fac_status }}</td>
                                                    @else
                                                    <td style="color: red">{{ $item->faculty->fac_status }}</td>

                                                    @endif
                                                    {{-- @endif --}}
                                                    {{-- @can('edit_user') --}}
                                                    {{-- @if (Auth::user()->id == '1' || Auth::id() == $item->user->id) --}}
                                                    <th>
                                                        <a href=" {{ url('/admin/createuser/edit', $item->id) }} ">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <a href=" {{ url('/admin/createuser/delete', $item->id) }} ">
                                                            <button type="submit">
                                                                <i class="fa-solid fa-trash">
                                                                </i>
                                                            </button>
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <a href=" {{ url('/admin/createuser/pdfForm', $item->id) }} ">
                                                            <i class="fa-regular fa-solid fa-print"></i>
                                                        </a>
                                                    </th>
                                            @endif
                                            {{-- @endcan --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        {{ $createUser->onEachSide(5)->links() }}

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