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
                    <h6>Edit Budget Details</h6>
                    <hr>
                </div>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card-body">
                    <form action=" " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <!-- Budget Name -->
                                <div class="mb-6">
                                    <label for="budget_title">Budget Name</label>
                                    <input type="text" class="form-control form-control-sm" name="budget_title"
                                        value="{{ $budget->budget_title }}" id="budget_title"
                                        aria-describedby="budget_title" placeholder="Enter Budget Title">
                                </div>
                            </div>
                            <div class="col">
                                <!-- Budget code -->
                                <div class="mb-6">
                                    <label for="budget_type">Budget Type</label>
                                    <select name="budget_type"
                                        class="form-select form-select-sm @error('budget_type') is-invalid @enderror"
                                        aria-label=".form-select-sm example">
                                        <option selected hidden>Budget Type</option>
                                        <option
                                            value="Recurring"{{ $budget->budget_type == 'Recurring' ? 'selected' : '' }}>
                                            Recurring</option>
                                        <option
                                            value="Non-Recurring"{{ $budget->budget_type == 'Non-Recurring' ? 'selected' : '' }}>
                                            Non-Recurring</option>

                                        <!-- <option>Recurring</option> -->
                                        <!-- <option>Non-Recurring</option> -->
                                    </select>
                                    <!-- <input type="text" class="form-control form-control-sm" value="{{ $budget->budget_type }}" name="budget_type"  id="budget_type" aria-describedby="budget_type" placeholder="Enter Your Budget Type"> -->
                                </div>
                            </div>
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
