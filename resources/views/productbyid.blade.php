@extends('layouts.homelayout')


@section('container')
	<style type="text/css">
		.thumbnail .img img {
			height: 400px!important;
		}
	</style>
	<div class="container-fluid bodyContainer">

		@include('search')

		<div class="container productContainer">
			


			<div class="row">

	            <div class="col-md-3">
	                <p class="lead">Shop Name</p>
	                <div class="list-group">
	                    @php($i=0)
	                    @foreach($categories as $category)
		                    @if($i==0)
		                    <a href="#" class="list-group-item active">{{$category->name}}</a>
		                    @else
		                    <a href="#" class="list-group-item">{{$category->name}}</a>
		                    @endif
	                    @php($i++)
	                    @endforeach
	                </div>
	            </div>

	            <div class="col-md-9">

	                <div class="thumbnail">
	                    <div class="img text-center">
							@php($i=0)
							@foreach($product->images as $images)
								@if($i==0)
									<img class="showItem" src="{{url('/')}}/{{$images->path}}" />
								@elseif($i!=0)

									<img class="hideItem" src="{{url('/')}}/{{$images->path}}" />
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
	                    <div class="caption-full">
	                        <h4 class="pull-right"><span>$</span>{{$product->price}}</h4>
	                        <h4>{{$product->name}}</h4>
	                        <p>
	                        	{{$product->details->description}}
	                        </p>
	                    </div>
	                    <div class="ratings">
	                        <p class="pull-right">{{$product->details->ratingNo}} reviews</p>
	                        @if($product->details->ratingNo==0)
	                        <p>No Rating</p>
	                        @else
	                        	@php($nr=$product->details->rating/$product->details->ratingNo)
	                        	<p>
	                        	@for($i=0; $i < (int)$nr; $i++)
	                        		<span class="glyphicon glyphicon-star"></span>
	                        	@endfor
	                        	@for($i = (int)$nr; $i < 5; $i++)
	                            	<span class="glyphicon glyphicon-star-empty"></span>
	                        	@endfor
	                        	{{$nr}}
	                        	</p>
	                        @endif
	                    </div>
	                   <div class="row nomargin">
		                	<div class="text-right">
								<a href="#" class="btn btn-primary">Buy Now!</a>
							</div>
	                   </div>
	                </div>

	                <div class="well">
	                	<div>
	                		<form method="POST" action="/sendreview">
	                		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                		<input type="hidden" name="pid" value="{{$product->id}}">
	                			<div class="form-group">
		                			<div class="row">
			                			<div class="col-md-9">
			                				<input name="review" type="text" class="form-control" placeholder="Review" required>
			                			</div>
			                			<div class="col-md-3">
			                				<input type="submit" name="submit" class="form-control btn btn-success">
			                			</div>
	                				</div>
                				</div>
	                		</form> 
	                	</div>
	                    

	                    <hr>

	                    @if(count($product->comments)==0)
	                    <div class="row">
	                    	<div class="col-md-12 text-center">
	                    		<p>No Comments</p>
	                    	</div>
	                    </div>
	                    @else
		                    @foreach($product->comments->sortByDesc('created_at') as $comment)
		                    	<div class="row">
		                        <div class="col-md-12">
		                            <a href="/user/{{$comment->user->id}}">{{$comment->user->UserName}}</a>
		                            <span class="pull-right">{{$comment->created_at}}</span>
		                            <p>{{$comment->comment}}</p>
		                        </div>
		                    </div>
		                    <hr>
		                    @endforeach
	                    @endif
	                </div>

	            </div>

	        </div>
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
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection