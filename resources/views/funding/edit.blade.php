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
                    <h6>Edit Funding Agency Details</h6>
                    <hr>
                </div>

                <div class="card-body">
                    <form action=" " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Funding Agency Details -->
                            <div class="mb-6">
                                <label for="funding_agency">Funding Agency Details</label>
                                <input type="text" class="form-control form-control-sm" name="agency_name"
                                    value="{{ $agency->agency_name }}" id="funding_agency"
                                    aria-describedby="funding_agency" placeholder="Enter Funding agency Name">
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
