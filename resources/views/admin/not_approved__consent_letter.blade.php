@extends('layouts.master')




@section('title')
  Not Approved
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Not Approved Consent Letters:</h4>
          <div class="col-sm-4">
            <form action="/Admin/search_Consent_letters" method="GET">
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
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table">
              <thead class=" text-primary">
                
                <th>Name</th>                
                <th>Sender</th> 
             
                <th>Show</th>  
                <th>Approve</th>                                          
               </thead>
    <tbody>
                
              @foreach ($letters as $letter)
                    
                
                <tr>

                      <td>{{ $letter->name}}</td>
                      <td>{{\App\User::findOrFail($letter->sender)->name}}</td>
                     
                      <td>
                        <a href="{{asset("consent/$letter->name")}}" class="btn btn-light">SHOW</a>
                      </td>
                     <td>
                      <form action="/Admin/approveletter/{{$letter->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"  class="btn btn-success ap">Approve</button>
                      </form>
                    </td>
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
  $(".ap").click(function(){
    return confirm("are you sure you want to Approve this consent letter?")
  });
</script>
@endsection