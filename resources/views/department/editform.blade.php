<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>

        <div class="container text-center mt-4">
            <div class="card">
                <div class="card-title mt-2">
                    <h6>Edit Department Details</h6>
                    <hr>
                </div>

                <div class="card-body">
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
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <!-- Department Name -->
                                <div class="mb-6">
                                    <label for="department_name">Department Name</label>
                                    <input type="text" class="form-control form-control-sm" name="dept_name"
                                        value="{{ $department->dept_name }}" id="department_name"
                                        aria-describedby="department_name" placeholder="Enter Department Name">
                                </div>
                            </div>
                            <div class="col">
                                <!-- Department code -->
                                <div class="mb-6">
                                    <label for="department_code">Department Code</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $department->dept_code }}" name="dept_code" id="department_code"
                                        aria-describedby="department_code" placeholder="Enter Department Code">
                                </div>
                            </div>
                        </div>


                        <!-- Department Details -->
                        <div class="mb-6">
                            <label for="department_details">Department Details</label>
                            <input type="text" class="form-control form-control-sm" name="description"
                                value="{{ $department->description }}" id="department_details"
                                aria-describedby="department_details" placeholder="Enter Department Description">
                        </div>
                        <!-- Button -->
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">update</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    </div>
</x-app-layout>
