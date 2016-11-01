@extends('layouts.homelayout')

@section('container')

@php($date = date_format($user->created_at,'Y/m/d'))


<div class="container bodyContainer profile">
                <div class="row">
                    <div class="col-md-5 pull-left">
                        <div>
                            <div class="profile_image"><img src="https://wrapbootstrap.com/static/users/pictures/StartBootstrap.png" width="120" height="120" alt="StartBootstrap" title="StartBootstrap">
                            To Do Photo
                            </div>
                            <div >
                                <p><strong>Signed up:</strong><br>{{$date}}</p>
                                <p><strong>Location:</strong><br>{{$user->details->addr->City}}</p>
                            </div>
                        </div>
                        <p class="website"><strong>Website:</strong><br><a href="http://gooleeto.com" target="_blank" rel="nofollow">To do In Case we need it</a></p>
                    </div>
                    <div class="col-md-7 pull-right">
                        <div id="about">
                            <div class="image">
                            <div><img src="https://wrapbootstrap.com/static/users/banners/StartBootstrap.png" width="580" height="200" title="StartBootstrap" alt="StartBootstrap">
                            To Do Photo
                            </div>
                            </div>
                            <div class="bio">
                                <p>
                                    To Do the bio
                                </p>
                            </div>
                        </div>
                        <h2 >Contact</h2>
                        <div id="contact">
                            @if(!Auth::check())
                                <p>You must <a href="/login/2/{{$user->id}}" title="Sign in or sign up">sign in</a> to send a message to StartBootstrap</p>
                            @endif
                            <form method="POST" action="{{url('/')}}/sendmessage/{{$user->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="clearfix">
                                        <div class="input">
                                            <textarea @if(!Auth::check()) disabled="disabled" @endif tabindex="1" class="xxlarge" id="message" name="message" placeholder="Enter your message to the seller." rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <input  @if(!Auth::check()) disabled="disabled" @endif tabindex="2" type="submit" class="btn primary large" value="Send message">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row portfolio">
                <h2 >Portfolio</h2>
                        <div id="portfolio" class="text-center">
                            @foreach($user->products as $product)
                            <div class="col-md-4 col-sm-6 hero-feature">
                                <div class="thumbnail">
                                    <a href="{{url('/')}}/products/{{$product->id}}"><h4>{{$product->name}}</h4></a>
                                    <div class="img">
                                        @php($i=0)
                                        @foreach($product->images as $images)
                                            @if($i==0)
                                                <img class="showItem" src="../{{$images->path}}" />
                                            @elseif($i!=0)

                                                <img class="hideItem" src="../{{$images->path}}" />
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
                                </div>
                            </div>
                            @endforeach
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

@endsection