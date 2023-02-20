<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card mt-3 m-4 table-responsive">
            <div class="card-title">
                <h6>Show All</h6>
            </div>
            <div class="card-body ">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Project No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Transtation No</th>
                            <th scope="col">Method </th>
                            <th scope="col">Date</th>
                            <th scope="col">Payament Method No</th>
                            <th scope="col">Amout</th>
                            <th scope="col">Budget Amount</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($printfund as $item)
                            <tr>
                                {{-- <td>{{$item->id}}</td> --}}
                                <td> project No:{{ $item->project_no }} || Project Title: {{ $item->project_title }}
                                </td>
                                <br>
                                <br>

                                <td> Date :{{ $item->date }}</td>
                                <td> Transtation No :{{ $item->transaction_no }}</td>
                                <td> {{ $item->payment_method }}</td>
                                <td> {{ $item->transtation_date }}</td>
                                <td> {{ $item->payment_method_no }}</td>
                                <td>{{ $item->relese_funds_amount }}</td>
                                <td> {{ $item->fund_relese_budget_amount }} </td>
                                <td> {{ $item->budget_title }} </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        </div>
        </div>
    </main>
    </div>
</x-app-layout>
