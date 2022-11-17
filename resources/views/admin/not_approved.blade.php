@extends('layouts.master')




@section('title')
  Not Approved
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Not Approved Doctors:</h4>
          <div class="col-sm-5">
            <form action="/Admin/search_Not_approved" method="GET">
            <div class="form-group"> 
              <input type="search"  name="search" class="form-control">
                            <br>            
                <button type="submit" class="btn btn-primary">Search</button>                  
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
            @if (session('disapprove'))
            <div class="alert alert-danger" role="alert">
                {{ session('disapprove') }}
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
                <th>Is Approved ?</th>  
                <th>Approve</th>                                                
                <th>Disapprove</th>                                                
               </thead>
    <tbody>               
              @foreach ($users as $user)            
                <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}&nbsp;{{ $user->lastname }}</td>
                      <td>{{ $user->email }}</td>
                      <td> {{ $user->block ? trans('yes') : trans('no') }} </td>    
                      <td>
                        <form action="/Admin/approved/{{$user->id}}" method="post">
                          @csrf
                          @method('PUT')
                          <button type="submit"  class="btn btn-success app">Approve</button>
                        </form>
                      </td>
                      <td>
                        <form action="/Admin/disapproved/{{$user->id}}" method="post">
                          @csrf
                          @method('PUT')
                          <button type="submit"  class="btn btn-danger dis">Disapprove</button>
                        </form>
                      </td>
                      {{-- <td>
                        <form action="/role-delete/{{ $user->id}}" method="post">
                          {{ csrf_field() }}
                         {{ method_field('DELETE')}}
                        <input type="hidden" name="id" value="{{ $user->id}}">
                      <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                      </td> --}}
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
  $(".dis").click(function(){
    return confirm("are you sure you want to Disapprove this doctor?")
  });
 
$(".app").click(function(){
  return confirm("are you sure you want to  Approve this doctor?")
});
</script>

@endsection