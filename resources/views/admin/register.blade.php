@extends('layouts.master')




@section('title')
Doctors List
@endsection
@section('content')
 
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Doctors List</h4>
           <div class="col-sm-5">
            <form action="/Admin/search" method="GET">
            <div class="form-group"> 
              <input type="search"  name="search" class="form-control">
              
     <br>
                <button type="submit" class="btn btn-primary  ">Search</button>
               
              </div>
            

            </form>
          </div>
          <div class="col-sm-5">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
          </div>
          <div class="col-sm-5">
            @if (session('block'))
            <div class="alert alert-danger" role="alert">
                {{ session('block') }}
            </div>
        @endif
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Id</th>
                <th>Name</th>
                
                <th>Email</th>
                <th>Role</th>   
                <th>Is Approved ?</th>  
                <th>Is Blocked ?</th>                          
                
                <th>EDIT</th>
                <th>Block</th>
                <th>UnBlock</th>
              </thead>
              <tbody>
                @foreach ($users as $user)   
                <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}&nbsp;{{ $user->lastname }}</td>
                      <td> {{ $user->email }} </td>
                <td>
                  
                      <span class="badge badge-primary">{{ $user->role }} </span>
                <td>
                      <span class="badge badge-light"> @if ( $user->approved ==0)
                    NOT-YET
                  

                    @elseif ( $user->approved ==1)
                    YES                      
                  
                  @elseif ( $user->approved ==2)
                    NO
                  
                  @endif
                  </span></td>
                  <td> {{ $user->block ? trans('yes') : trans('no') }} </td>    
                   
                  <td>
                      <a href="/Admin/info/{{$user->id}}" class="btn btn-success">Show more</a>
                      </td>
                      <td>
                         
                         
                        <form action="/Admin/block/{{ $user->id}}" method="post">
                          {{ csrf_field() }}
                          {{method_field('PUT')}}
                        <input type="hidden" name="id" value="{{ $user->id}}">
                      <button type="submit" class="btn btn-danger block">Block</button>
                    </form>
                   
                   
                      </td>
                      <td> <form action="/Admin/unblock/{{ $user->id}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                      <input type="hidden" name="id" value="{{ $user->id}}">
                    <button type="submit" class="btn btn-danger unblock">Unblock</button>
                  </form></td>
                </tr>
                @endforeach 
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br> 
      <a href="/Admin/dashboard" class="btn btn-secondary" >Back To Dashboard</a>
    </div>
    
    </div>
  </div>
 
  
@endsection


@section('scripts')

<script>
  $(".block").click(function(){
    return confirm("are you sure you want to Block this doctor?")
  });
  $(".unblock").click(function(){
    return confirm("are you sure you want to UnBlock this doctor?")
  });

  $(document).ready( function () {
    $('#doctors').DataTable();
} );
</script>

@endsection