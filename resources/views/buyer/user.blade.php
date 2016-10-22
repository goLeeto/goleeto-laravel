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

        <!-- Change Password modal -->

        <div id="changePasswordModal" class="modal fade">
            <div class="card modal-content">
                <div class="header modal-header">
                    <h4 class="title">Change Password</h4> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="content modal-content">
                    <form method="POST" action="/buyer/changepassword">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input name="oldpass" type="password" class="form-control border-input" placeholder="*******">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input name="newpass" type="password" class="form-control border-input" placeholder="********">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input name="rnewpass" type="password" class="form-control border-input" placeholder="********">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Change Password</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

        <!-- //// Change Password Modal -->

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card card-user">
                        <div class="image">
                            <span id="changeCover">Change</span>
                            <img src="{{url('/')}}/assets/img/background.jpg" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                              <span id="changeProfile">Change</span>
                              <img class="avatar border-white" src="{{url('/')}}/assets/img/faces/face-2.jpg" alt="..."/>
                              <h4 class="title">{{$user->FirstName}} {{$user->LastName}}<br />
                                 <a href="#"><small>@</small><small>{{$user->UserName}}</small></a>
                              </h4>
                            </div>
                            <p class="description text-center">
                                "I like the way you work it <br>
                                No diggity <br>
                                I wanna bag it up"
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <h5>{{$spent}}<span>$</span><br /><small>Total Spent</small></h5>
                                </div>

                                <div class="col-md-5">
                                    <h5>{{$purchases}}<br /><small>Total Purchases</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Profile</h4> 
                            <span data-toggle="modal" data-target="#changePasswordModal" class="pull-right changePassword" >Change Password</span>
                        </div>
                        <div class="content">
                            <form method="POST" action="/seller/updateinfo">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control border-input" placeholder="Username" value="{{$user->UserName}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email" value="{{$user->email}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Company" value="{{$user->FirstName}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Last Name" value="{{$user->LastName}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="street" type="text" class="form-control border-input" placeholder="Home Address" value="{{$user['details']['addr']->Street}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" type="text" class="form-control border-input" placeholder="City" value="{{$user['details']['addr']->City}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input name="country" type="text" class="form-control border-input" placeholder="Country" value="{{$user['details']['addr']->Country}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input name="zip" type="text" class="form-control border-input" placeholder="ZIP" value="{{$user['details']['addr']->Zip}}">
                                        </div>
                                    </div>
                                </div>
                                @if(isset($error)) <div class="text-center"><label>{{$error}}</label></div> @endif
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
