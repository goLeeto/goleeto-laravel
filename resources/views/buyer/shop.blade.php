@extends('layouts.buyer')

@section('title','User Profile')

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
                            <h4 class="title">Shopping Cart</h4>
                            <h4 class="pull-right title"> {{$total}}<span>$</span></h4>
                            @if(count($carts)>0)
                            <br>
                            <br>
                            <form method="POST" action="removeallfromcart" class="pull-right">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button style="border-style: none; background: none;">Remove All</button>
                            </form> 
                            @endif

                        </div>
                    @if(count($carts)>0)
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                	<th>Name</th>
                                	<th>Price</th>

                                </thead>
                                <tbody>

                                    @foreach($carts as $cart)

                                    <tr>
                                        <td> {{$cart->product->name}}</td>
                                        <td><span>$</span>{{$cart->value}}</td>
                                        <td> 
                                            <form method="POST" action="removefromcart/{{$cart->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button style="border-style: none; background: none;">Remove</button>
                                            </form> 
                                        </td>
                                    </tr>

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