@extends('layouts.homelayout')


@section('container')
	<script>
	  function resizeIframe(obj) {
	    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
	  }
	</script>

	

	<div class="container-fluid bodyContainer">
		<div class="iframeType text-center">
			<span class="back" data-toggle="tooltip" title="Return To {{$productName}}"><a href="{{url('/')}}/products/{{$productId}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></span>
			<span class="desktop">
				<i class="fa fa-desktop" aria-hidden="true" data-toggle="tooltip" title="Desktop - 1440px"></i>
			</span>
			<span class="tablet">
				<i class="fa fa-tablet" aria-hidden="true" data-toggle="tooltip" title="Tablet - 768px"></i>
			</span>
			<span class="mobile">
				<i class="fa fa-mobile" aria-hidden="true" data-toggle="tooltip" title="Mobile - 425px"></i>
			</span>

		</div>
		<iframe id="preview" src="{{$src}}" width="100%" onload="resizeIframe(this)" frameborder="0"></iframe>
	</div>

	<script>
		$('.iframeType span').click(function() {
			console.log($('#preview'));
			var obj = document.getElementById('preview');

			if(this.className == 'desktop'){

			    var parentDivHeight = 1440;
			    var bodyWidth = $('body').width();
			    var x = bodyWidth/parentDivHeight;
			    $("#preview")[0].setAttribute("width", parentDivHeight);
			    if(x<1){
			    	$('#preview').css({
				    	'-ms-zoom': x,
				        '-moz-transform': 'scale('+x+')',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale('+x+')',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale('+x+')',
				        '-webkit-transform-origin': '0 0'
				    });
			    }else{
			    	$('#preview').css({
				    	'-ms-zoom': 1,
				        '-moz-transform': 'scale(1)',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale(1)',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale(1)',
				        '-webkit-transform-origin': '0 0'
				    });
			    }
			    

			}else if (this.className == 'tablet') {

			    var parentDivHeight = 768;
			    var bodyWidth = $('body').width();
			    var x = bodyWidth/parentDivHeight;
			    $("#preview")[0].setAttribute("width", parentDivHeight);
			    if(x<1){
			    	$('#preview').css({
				    	'-ms-zoom': x,
				        '-moz-transform': 'scale('+x+')',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale('+x+')',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale('+x+')',
				        '-webkit-transform-origin': '0 0'
				    });
			    }else{
			    	$('#preview').css({
				    	'-ms-zoom': 1,
				        '-moz-transform': 'scale(1)',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale(1)',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale(1)',
				        '-webkit-transform-origin': '0 0'
				    });
			    }


			}else if (this.className == 'mobile') {

			    var parentDivHeight = 425;
			    var bodyWidth = $('body').width();
			    var x = bodyWidth/parentDivHeight;
			    $("#preview")[0].setAttribute("width", parentDivHeight);
			    if(x<1){
			    	$('#preview').css({
				    	'-ms-zoom': x,
				        '-moz-transform': 'scale('+x+')',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale('+x+')',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale('+x+')',
				        '-webkit-transform-origin': '0 0'
				    });
			    }else{
			    	$('#preview').css({
				    	'-ms-zoom': 1,
				        '-moz-transform': 'scale(1)',
				        '-moz-transform-origin': '0 0',
				        '-o-transform': 'scale(1)',
				        '-o-transform-origin': '0 0',
				        '-webkit-transform': 'scale(1)',
				        '-webkit-transform-origin': '0 0'
				    });
			    }


			}

				//obj.style.height = obj.contentWindow.document.body.offsetHeight + 'px';


			if(obj.offsetHeight < obj.contentWindow.document.body.offsetHeight){
				obj.style.height = obj.contentWindow.document.body.offsetHeight + 'px';

			}

			    
		});
	</script>
@endsection










