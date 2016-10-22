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


        <!-- Discount -->

        <div id="discount" class="modal fade">
            <div class="card modal-content">
                <div class="header modal-header">
                    <h4 class="title">Discount</h4> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="content modal-content">
                    <form method="POST" action="/seller/discount" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="themeid" id="themeid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Promotional Price </label>
                                        <input name="price" type="text" class="form-control border-input" placeholder="$$$">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valid Until </label>
                                        <input name="valid" type="date" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Add Discount</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

        <!-- //// Discount -->







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
                                    <th>Id</th>
                                	<th>Name</th>
                                	<th>Price</th>
                                	<th>Description</th>
                                    <th>Rating</th>
                                    <th>Discount</th>

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
                                        <td> <span data-toggle="modal" data-target="#discount" class="changePassword addDiscount" onclick="addId({{$product->id}})">Add Discount</span></td>
                                        <td> <a href="{{url()->full()}}/{{$product->id}}">Edit</a></td>
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