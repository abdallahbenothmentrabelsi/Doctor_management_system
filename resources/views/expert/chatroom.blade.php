@extends('layouts.app1')

@section('content')
<center>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">BACK-HOME</a>
    </center>
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
               
                <div class="card-header">CHAT-ROOM</div>

                <div class="card-body" id="app" >
                    <chat-app :user="{{ auth()->user()}}">  </chat-app>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 