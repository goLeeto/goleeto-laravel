@extends('layouts.buyer')

@section('title','User Profile')

@section('sidebar')
    @include('buyer.sidebar')
@endsection

@section('navbar')
    @include('buyer.navbar')
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
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>
                                            @if($message->from == $user->id)
                                            <span class="from-other">{{$message->message}}</span>
                                            @else
                                            <span class="from-me">{{$message->message}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-center">
                                            <form method="POST" action="/sendmessage/{{$user->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" name="message" placeholder="Message..." class="form-control border-input sendmessageInput" autocomplete="false">
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