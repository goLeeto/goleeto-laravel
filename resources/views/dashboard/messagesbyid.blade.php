@extends('layouts.seller')

@section('title','User Profile')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('navbar')
    @include('dashboard.navbar')
@endsection

@section('content')
	

	<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Messages</h4>
                        </div>
                        <div class="content table-responsive ">
                            <table class="table messages-table">
                                <tbody>
                                    <tr>
                                        <td>
                                            @php($i=0) 
                                            @php($j=0)
                                            <div class="all-messages">
                                            @foreach($messages as $message)
                                                
                                                @if($message->from == $user->id)
                                                <span class="from-other @if($i!=0) from-other1 @endif ">{{$message->message}}</span>
                                                @php($i++) 
                                                @php($j=0)
                                                @else
                                                <span class="from-me @if($j!=0) from-me1 @endif">{{$message->message}}</span>
                                                
                                                @php($j++)
                                                @php($i=0)
                                                @endif
                                           
                                            @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <form method="POST" action="/sendmessage/{{$user->id}}" autocomplete="off">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" name="message" placeholder="Message..." class="form-control border-input sendmessageInput" autocomplete="off">
                                                <input type="submit" class="btn btn-default" name="Send" value="Send">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

	
@endsection