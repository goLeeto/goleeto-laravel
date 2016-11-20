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
                    @if(count($users)>0)
                        <div class="content table-responsive ">
                            <table class="table messages-table">
                                <tbody>

                                @php($i=0)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                        @if($messages[$i][0]->read ==1 && $messages[$i][0]->from!=Auth::user()->id)
                                        <span class="newmsg">*</span>
                                        @endif
                                            <a href="/seller/messages/{{$user->id}}">
                                                <span class="username-row">{{$user->UserName}}</span>
                                                <span class="message-row">{{$messages[$i][0]->message}}</span>  
                                            </a>
                                        </td>

                                    </tr>
                                    @php($i++)
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                        You Have No Messages!
                        @endif
                        
                        </div>
                    </div>
                </div>
            </div>

	
@endsection
