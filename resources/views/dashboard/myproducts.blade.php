@extends('layouts.seller')

@section('title','My Products')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('navbar')
    @include('dashboard.navbar')
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">



        @include('dashboard.addproduct')










            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Striped Table</h4>
                            <span data-toggle="modal" data-target="#addNewProduct" class="pull-right changePassword" >Add new Product</span>
                        </div>
                    @if(count($products)>0)
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>id</th>
                                	<th>name</th>
                                	<th>price</th>
                                	<th>description</th>
                                    <th>rating</th>

                                </thead>
                                <tbody>
                                    @php ($i=0)

                                    @foreach($products as $product)

                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><span>$</span>{{$product->price}}</td>
                                        <td> {{$details[$i]['description']}}</td>
                                        <td> {{ $details[$i]['rating']/$details[$i]['ratingNo'] }}</td>
                                        <td> <span class="changePassword">Edit</span></td>
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
@endsection