@extends('layouts.buyer')

@section('title','My Products')

@section('sidebar')
    @include('buyer.sidebar')
@endsection

@section('navbar')
    @include('buyer.navbar')
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Purchases</h4>
                        </div>
                    @if(count($products)>0)
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>Id</th>
                                	<th>Name</th>
                                	<th>Price</th>
                                	<th>Description</th>
                                    <th>Rating</th>


                                </thead>
                                <tbody>
                                    @php ($i=0)

                                    @foreach($products as $product)

                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><span>$</span>{{$product->price}}</td>
                                        <td> {{$product['details']['description']}}</td>
                                        @if($product['details']['ratingNo']==0)
                                        <td>No Rating</td>
                                        @else
                                        <td> {{ $product['details']['rating']/$product['details']['ratingNo'] }}</td>
                                        @endif
                                        <td> 
                                            <form method="POST" action="download/{{Auth::user()->id}}/{{$product->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button style="border-style: none; background: none;">Download</button>
                                            </form> 
                                        </td>
                                    </tr>

                                    @php ($i++)

                                    @endforeach

                                </tbody>
                            </table>
                        @else
                        You Have No Products!
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add theme id in discount modal -->
    <script type="text/javascript">
        function addId(id){
            $('#themeid').val(id);
        }
    </script>
@endsection