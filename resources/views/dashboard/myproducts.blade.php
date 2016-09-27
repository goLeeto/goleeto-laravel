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




        <!-- Change Password modal -->

        <div id="addNewProduct" class="modal fade">
            <div class="card modal-content">
                <div class="header modal-header">
                    <h4 class="title">Add new Product</h4> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="content modal-content">
                    <form method="POST" action="/changepassword">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input name="newpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input name="rnewpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input name="newpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input name="rnewpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input name="newpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input name="rnewpass" type="text" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Change Password</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

        <!-- //// Change Password Modal -->










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
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><span>$</span>{{$product->price}}</td>
                                        <td> {{$details[$i]['description']}}</td>
                                        <td> {{ $details[$i]['rating']/$details[$i]['ratingNo'] }}</td>
                                        <td> <span class="changePassword">Edit</span> | <span class="changePassword">Info</span> </td>
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


                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="header">
                            <h4 class="title">Table on Plain Background</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                	<th>Name</th>
                                	<th>Salary</th>
                                	<th>Country</th>
                                	<th>City</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    	<td>1</td>
                                    	<td>Dakota Rice</td>
                                    	<td>$36,738</td>
                                    	<td>Niger</td>
                                    	<td>Oud-Turnhout</td>
                                    </tr>
                                    <tr>
                                    	<td>2</td>
                                    	<td>Minerva Hooper</td>
                                    	<td>$23,789</td>
                                    	<td>Curaçao</td>
                                    	<td>Sinaai-Waas</td>
                                    </tr>
                                    <tr>
                                    	<td>3</td>
                                    	<td>Sage Rodriguez</td>
                                    	<td>$56,142</td>
                                    	<td>Netherlands</td>
                                    	<td>Baileux</td>
                                    </tr>
                                    <tr>
                                    	<td>4</td>
                                    	<td>Philip Chaney</td>
                                    	<td>$38,735</td>
                                    	<td>Korea, South</td>
                                    	<td>Overland Park</td>
                                    </tr>
                                    <tr>
                                    	<td>5</td>
                                    	<td>Doris Greene</td>
                                    	<td>$63,542</td>
                                    	<td>Malawi</td>
                                    	<td>Feldkirchen in Kärnten</td>
                                    </tr>
                                    <tr>
                                    	<td>6</td>
                                    	<td>Mason Porter</td>
                                    	<td>$78,615</td>
                                    	<td>Chile</td>
                                    	<td>Gloucester</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection