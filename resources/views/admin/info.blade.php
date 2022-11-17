@extends('layouts.master')

@section('title')
   info
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered infoo</h4>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Id</th>
                <th>Name</th>
                
                <th>Email</th>
                <th>User Type</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    
                
                <tr>

                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}{{ $user->lastname }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->usertype }}</td>
                      <td>
                      <a href="/Admin/register-edit/{{ $user->id}}" class="btn btn-success">EDIT</a>
                      </td>
                      <td>
                        <form action="/Admin/role-delete/{{ $user->id}}" method="post">
                          {{ csrf_field() }}
                         {{ method_field('DELETE')}}
                        <input type="hidden" name="id" value="{{ $user->id}}">
                      <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                    </td>
                </tr>
                @endforeach 
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div>
@endsection


@section('scripts')
    
@endsection