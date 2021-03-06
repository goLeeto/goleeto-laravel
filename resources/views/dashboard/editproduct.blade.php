@extends('layouts.seller')

@section('title','Edit Product')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('navbar')
    @include('dashboard.navbar')
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">

		<div class="col-md-12">
		    <div class="card">
		        <div class="header ">
		            <h4 class="title">Editing {{$product->name}}</h4> 
		        </div>
		        <div class="content ">
		            <form method="POST" action="/seller/editproduct" enctype="multipart/form-data">
		            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <input type="hidden" name="id" value="{{$product->id}}">


		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Name </label>
		                                <input name="name" type="text" class="form-control border-input" value="{{$product->name}}" >
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Price $</label>
		                                <input name="price" type="text" class="form-control border-input" value="{{$product->price}}">
		                            </div>
		                        </div>
		                        <div class="col-md-12">
		                            <div class="form-group">
		                                <label>Description</label>
		                                <input name="description" type="text" class="form-control border-input" value="{{$product->details->description}}">
		                            </div>
		                        </div>
		                        <div class="col-md-6" >
		                            <label>Category</label>
		                            <div id="zgjidhCategory" class="dropdown-check-list anch-kerko" tabindex="100">
		                            <span class="zgjidhCategoryanchor anch anch-kerko">Choose Categories</span>
		                                <ul id="zgjidhCategoryItems" class="items ">
		                                @foreach($categories as $category)
		                                @php($checked='')
		                                	@foreach($product->productCategorys as $cat)
		                                		@if($category['id']==$cat['id'])
		                                		@php($checked='checked')
		                                    	@break
		                                    	@endif
		                                	@endforeach
		                                    <li><input type="checkbox" name="categories[]" value="{{$category['id']}}" {{$checked}}/><span>{{$category['name']}} </span>
		                                    </li>
		                                @endforeach
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="col-md-6" >
		                            <label>Features</label>
		                            <div id="zgjidhFeature" class="dropdown-check-list anch-kerko" tabindex="100">
		                              <span class="zgjidhFeatureanchor anch anch-kerko">Choose Feature</span>
		                              <ul id="zgjidhFeatureItems" class="items ">
		                                @foreach($features as $feature)
		                              	@php($checked='')
		                                	@foreach($product->productFeatures as $feat)
		                                		@if($feature['id']==$feat['id'])
		                                		@php($checked='checked')
		                                    	@break
		                                    	@endif
		                                	@endforeach
		                                    	<li><input type="checkbox" name="features[]" value="{{$feature['id']}}" {{$checked}} /><span>{{$feature['name']}} </span>
		                                    	</li>
		                                @endforeach
		                              </ul>
		                            </div>
		                        </div>
		                        <div class="col-md-12">
		                            <div class="">
		                                <label>Theme Preview</label>
		                                <div class="row ">
	                                		@foreach($product->images as $imagepath)
			                                	<div class="col-md-3 editProductImages"><label class="imgContainer"><img src="{{url('/')}}/{{$imagepath->path}}" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="photos[]" value="{{$imagepath->id}}" class="hidden" autocomplete="off"></label></div>
			                                @endforeach
		                                </div>
		                                <div class="row nomargin">
		                                <label> Add more photos</label>
		                                	<div class="col-md-12">
		                                		<input name="preview[]" type="file" accept="image/*" multiple>
		                                	</div>
		                                </div>
		                                
		                                
		                            </div>
		                        </div>
		                    </div>
		                    <div class="text-center">
		                        <button type="submit" class="btn btn-info btn-fill btn-wd">Edit Product</button>
		                    </div>
		                </div>
		                <div class="clearfix"></div>
		            </form>
		        </div>
		    </div>
		</div>


<script type="text/javascript">
    function openDropDown(id1,id2,className){
        var checkzgjidhPronen = document.getElementById(id1);
        var zgjidhPronenItems = document.getElementById(id2);
            checkzgjidhPronen.getElementsByClassName(className)[0].onclick = function (evt) {
                if (zgjidhPronenItems.classList.contains('visible')){
                    zgjidhPronenItems.classList.remove('visible');
                    zgjidhPronenItems.style.display = "none";
                }
                
                else{
                    zgjidhPronenItems.classList.add('visible');
                    zgjidhPronenItems.style.display = "block";
                }
                
                
            }

            zgjidhPronenItems.onblur = function(evt) {
                zgjidhPronenItems.classList.remove('visible');
            } 
    }
    openDropDown('zgjidhFeature','zgjidhFeatureItems','zgjidhFeatureanchor');
    openDropDown('zgjidhCategory','zgjidhCategoryItems','zgjidhCategoryanchor');

</script>


<script type="text/javascript">
var i=0;
	$(document).ready(function(){
    		$(".imgContainer").on('click',function(){
    			console.log($(this));
				$(this).toggleClass('imgchecked');
				$(this).children('img.img-thumbnail.img-check').toggleClass('check');

				if ($(this).children('input.hidden').is(':checked')) {
					$(this).children('input.hidden').removeAttr('checked');
				}else{
					$(this).children('input.hidden').attr('checked', 'true');
				}

				//Executes twice
				return false;
				
				
			});
	});
</script>






    </div>
</div>




@endsection



