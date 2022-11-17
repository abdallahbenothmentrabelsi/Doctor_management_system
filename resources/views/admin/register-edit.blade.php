@extends('layouts.master')




@section('title')
   Edit-Registered-Page
@endsection
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header">
                    <h3>Edit Role For Registered User.</h3>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                       <form action="/Admin/role-register-update/{{ $users->id }}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label>Name</label>
                            <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label >Give Role</label>
                                <select name="usertype" class="form-control" >
                                    <option value="admin">Admin</option>
                                    <option value="Simple user">User</option>
                                    <option value="web master">Web Master</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/Admin/role-register" type="submit" class="btn btn-danger">Delete</a>
                        </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    
@endsection