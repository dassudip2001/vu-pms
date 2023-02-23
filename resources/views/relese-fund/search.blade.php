<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                {{-- @can('Post create') --}}
                {{-- <a href="{{route('admin.department.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New post</a> --}}
                {{-- @endcan --}}
            </div>

        </div>


        {{-- <div class="container mt-4 mx-4"> --}}
        <div class="card mt-4 mx-4">
            <div class="card-title mt-4 mx-4">
                <button type="button" class="btn btn-success float-end"><a
                        href=" {{ url('/admin/relesefund') }} ">Back</a></button>
                <br>
                <h6>Search Fund</h6>
                <hr>
            </div>
            <div class="card-body">
                @if ($fundSearch->isNotEmpty())
                    @foreach ($fundSearch as $post)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Date</th>
                                    <th scope="col"> Trnastation No</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Transtation Date</th>
                                    <th scope="col">Relese Fund Amount </th>
                                    <th scope="col"> Payment Method No </th>
                                    <th scope="col">Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>{{ $post->date }}</td>
                                    <td>{{ $post->transaction_no }}</td>
                                    <td> {{ $post->payment_method }} </td>
                                    <td> {{ $post->transtation_date }} </td>
                                    <td> {{ $post->relese_funds_amount }} </td>
                                    <td> {{ $post->payment_method_no }}</td>
                                    <th>
                                        <a href=" {{ url('/relesefund/pdfForm', $post->id) }} ">
                                            <i class="fa-regular fa-solid fa-print"></i>
                                        </a>

                                        <a href=" {{ url('relesefund/showall', $post->id) }} ">
                                            <i class="fa-solid fa-street-view"></i>
                                        </a>
                                    </th>
                                </tr>


                            </tbody>
                        </table>
                        <div class="post-list">


                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
            </div>

        </div>

        </div>
        </div>
    </main>
    </div>
</x-app-layout>
