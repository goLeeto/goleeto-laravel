@extends('layouts.homelayout')


@section('container')

		<div class="container-fluid bodyContainer">
			@include('search')
			<div class="container productContainer">
				<!-- Page Features -->
				<div class="row text-center">
					@foreach($products as $product)
					<div class="col-md-4 col-sm-6 hero-feature">
						<div class="thumbnail">
							<h4>{{$product->name}}</h4>
							<div class="img">
								@php($i=0)
								@foreach($product->images as $images)
									@if($i==0)
										<img class="showItem" src="{{$images->path}}" />
									@elseif($i!=0)

										<img class="hideItem" src="{{$images->path}}" />
									@endif
								@php($i++)
								@endforeach
								<a class="left changeImage">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right changeImage">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<hr>
							<div class="caption">
								
								<div class="row">
									<p class="pull-left">
										<span>Rating: 
										{{$product->details->rating}}/{{$product->details->ratingNo}}
										</span>
									</p>
									<p class="pull-right">
										@if(isset($product->discount->value) && ($product->discount->validUntil >= date("Y-m-d")))
					                        <h4 class="pull-right"><span>$</span>{{$product->discount->value}}</h4>
					                    @else
					                     	<h4 class="pull-right"><span>$</span>{{$product->price}}</h4>
					                    @endif
									</p>
								</div>
								
								<p>{{$product->details->description}} </p>
								
								<p>
									@if(Auth::check() && Auth::user()->UserType == 3)
										<a href="/addtocart/{{$product->id}}" class="btn btn-primary">Add To Cart!</a>
									@elseif(!Auth::check())
										<a href="/login/1" class="btn btn-primary">Log in ...</a>
									@endif
									<a href="/products/{{$product->id}}" class="btn btn-default">More Info</a>
								</p>
							</div>
							
						</div>
					</div>
					@endforeach
				</div>
				<!-- /.row -->
			</div>
		</div>
		<script type="text/javascript">
			$('.changeImage.left').click(function() {
				var el=$(this).parent().children('img');
				for (var i = el.length - 1; i >= 0; i--) {
					if ($(el[i]).attr('class')=='showItem' && i==0) {
						$(el[i]).hide('slow/400/fast');
						$(el[el.length-1]).show('slow/400/fast');
						
							$(el[i]).attr('class', 'hideItem');
							$(el[el.length-1]).attr('class', 'showItem');
						
						break;
					}else if($(el[i]).attr('class')=='showItem' ){
						console.log('majtas');
						$(el[i]).hide('slow/400/fast');
						$(el[i-1]).show('slow/400/fast');
						
							$(el[i]).attr('class', 'hideItem');
							$(el[i-1]).attr('class', 'showItem');
						
						break;
					}
				}
				
			});
			$('.changeImage.right').click(function() {
				var el=$(this).parent().children('img');
				for (var i = el.length - 1; i >= 0; i--) {
					if ($(el[i]).attr('class')=='showItem' && i==el.length-1) {
						$(el[i]).hide('slow/400/fast');
						$(el[0]).show('slow/400/fast');
						
							$(el[i]).attr('class', 'hideItem');
							$(el[0]).attr('class', 'showItem');
						
						break;
					}else if($(el[i]).attr('class')=='showItem' ){
						$(el[i]).hide('slow/400/fast');
						$(el[i+1]).show('slow/400/fast');
						
							$(el[i]).attr('class', 'hideItem');
							$(el[i+1]).attr('class', 'showItem');
						
						break;
					}
				}
				
			});
		</script>
@endsection