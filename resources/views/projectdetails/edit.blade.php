<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>

        <div class="container  mt-4 ">
            <div class="row">
                <div class="col">
                    <div class="card ">
                        <div class="card-title mt-2 mx-2">
                            {{-- <button type="button" class="btn btn-success float-end " ><a
                                    href=" {{ url('/createuser') }} ">Back</a></button> --}}
                            <h6>Edit Project Details </h6>
                            <hr>
                        </div>
                        <div class="mt-2 mx-2">
                            <div class="modal-body">

                                <!-- form Start -->
                                <form action="" method="POST" name="budgetForm">
                                    @method('PUT')
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div>
                                                <label for="name">Project No<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="project_no" id="project_no"
                                                    value=" {{ $projects->project_no }} " aria-describedby="project_no"
                                                    placeholder="Enter Project No">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="mb-6">
                                                <label for="project_title">Project Title<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="project_title" value=" {{ $projects->project_title }} "
                                                    id="project_title" aria-describedby="project_title"
                                                    placeholder="Enter Project Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="funding_agency">Funding Agency</label>

                                                <br>
                                                <select name="funding_agency_id" id="funding_agency_id"
                                                    class="form-select form-select-sm"
                                                    aria-label=".form-select-sm example">
                                                    <option selected hidden>Select</option>
                                                    @foreach ($funding as $fund)
                                                        <option value="{{ $fund->id }}">
                                                            {{ $fund->agency_name }}
                                                        </option>
                                                    @endforeach
                                                    {{-- @foreach ($funding as $funding_agency_id)
                                                        <option value="{{ $funding_agency_id->id }}"
                                                            {{ old('funding_agency_id', $funding_agency_id->agency_name) == $funding_agency_id->id ? 'selected' : '' }}>
                                                            {{ $funding_agency_id->agency_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                                {{-- <select class="form-control" name="funding_agency_id"
                                                    id="funding_agency_id">
                                                    <option value="">---------Choose fund---------</option>
                                                    @foreach ($funding as $fund)
                                                        @if (old('fund') == $fund->id)
                                                            <option value={{ $fund->id }} selected>
                                                                {{ $fund->agency_name }}</option>
                                                        @else
                                                            <option value={{ $fund->id }}>{{ $fund->agency_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="name">Principle Investigator<span class="required"
                                                        style="color: red;">*</span></label>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <select name="create_user_id" class="form-select form-select-sm"
                                                            aria-label=".form-select-sm example">
                                                            <option selected hidden>Select</option>
                                                            @foreach ($createUser as $funding)
                                                                <option value="{{ $funding->user_id }}" selected>
                                                                    {{ $funding->name }} - {{ $funding->dept_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div>
                                                <label for="project_scheme">Project Scheme<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="project_scheme" value=" {{ $projects->project_scheme }} "
                                                    id="project_scheme" aria-describedby="project_scheme"
                                                    placeholder="Enter Project Scheme">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="mb-6">
                                                <label for="project_duration">Project Duration<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="project_duration" value=" {{ $projects->project_duration }} "
                                                    id="project_duration" aria-describedby="project_duration"
                                                    placeholder="Enter Project Duration">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="mb-6">
                                                <label for="project_cost">Project Cost<span class="required"
                                                        style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="project_total_cost"
                                                    value=" {{ $projects->project_total_cost }} " id="amount"
                                                    aria-describedby="project_cost" placeholder="Enter Project Cost">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Budget Details
                                        </div>
                                        {{-- @php
                              echo"$budget_heads";
                          @endphp --}}
                                        <div class="card-body">
                                            <table class="table" id="products_table">
                                                <thead>
                                                    <tr>
                                                        <th>Budget Name</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach (old('budget_id', ['']) as $index => $oldProduct)
                                                        @foreach ($amount as $product)
                                                            <tr id="product{{ $index }}">

                                                                <td>

                                                                    <select name="budget_id[]" class="form-control">
                                                                        <option value="">-- choose Budget Name --
                                                                        </option>


                                                                        <option value="{{ $product->budget_id }}"
                                                                            selected>
                                                                            {{ $product->budget_title }}
                                                                        </option>

                                                                    </select>

                                                                </td>
                                                                <td>
                                                                    <input type="txt"
                                                                        class="form-control form-control"
                                                                        onblur="findTotal()" id="inst_amount"
                                                                        value=" {{ $product->budget_details_amount }} "
                                                                        name="budget_details_amount[]" id="clear"
                                                                        placeholder="Enter Budget Amount" selected />
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    <tr id="product{{ count(old('budget_id', [''])) }}"></tr>
                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <button id="add_row" class="btn  btn-success pull-left"
                                                        onclick="editOptions()">+ Add Row</button>
                                                    <button id='delete_row' class="pull-right btn btn-danger">- Delete
                                                        Row</button>
                                                </div>

                                                <div class="col-sm-2">

                                                    <label for="total_amount">Total Amount</label>
                                                    <input type="number" class="form-control form-control"
                                                        name="totalAmount" id="grandTotal"
                                                        aria-describedby="total_amount" placeholder="0" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class=" my-2 mx-2">
                                            <button id="submit" type="submit" disabled
                                                class="btn btn-primary float-end"
                                                value="{{ trans('global.save') }}">Update Project</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @section('script')
                <script>
                    $(document).ready(function() {
                        let row_number = {{ count(old('budget_id', [''])) }};
                        $("#add_row").click(function(e) {
                            e.preventDefault();
                            let new_row_number = row_number - 1;
                            $('#product' + row_number).html($('#product' + new_row_number).html()).find(
                                'td:first-child');
                            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                            row_number++;
                        });

                        $("#delete_row").click(function(e) {
                            e.preventDefault();
                            if (row_number > 1) {
                                $("#product" + (row_number - 1)).html('');
                                row_number--;
                            }
                        });
                    });

                    //   edit options

                    function editOptions() {

                        $(document).ready(function() {
                            let row_number = {{ count(old('budget_id', [''])) }};
                            $("#add_row").click(function(e) {
                                e.preventDefault();
                                let new_row_number = row_number - 1;
                                $('#product' + row_number).html($('#product' + new_row_number).html()).find(
                                    'td:first-child');
                                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                                row_number++;
                            });

                            $("#delete_row").click(function(e) {
                                e.preventDefault();
                                if (row_number > 1) {
                                    $("#product" + (row_number - 1)).html('');
                                    row_number--;
                                }
                            });
                        });
                    }

                    //calculation
                    function findTotal() {

                        var arr = document.getElementsByName('budget_details_amount[]');
                        var tot = 0;
                        //button
                        var Amount = document.getElementById('amount').value;
                        var button = document.querySelector("#submit");
                        //setting button state to disabled
                        //button complete
                        for (var i = 0; i < arr.length; i++) {
                            if (parseInt(arr[i].value))
                                tot += parseInt(arr[i].value);
                            console.log(tot);
                        }
                        document.getElementById('grandTotal').value = tot;
                        console.log(tot);
                        if (tot == Amount) {
                            alert('Equal To The Grand Total ');
                            add_row.disabled = true;
                            button.disabled = false;
                            $('#budgetForm').submit();
                        } else {
                            button.disabled = true;
                            alert('Somethings Went Wrong ');
                        }

                    }
                </script>
            @endsection
        </div>
        </div>
    </main>
    </div>
</x-app-layout>
