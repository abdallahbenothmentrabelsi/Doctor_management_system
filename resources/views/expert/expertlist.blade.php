@extends('layouts.adherent')
@section('title')

Welcome
              
              
@endsection
@section('content')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Expert List :</h2>
                        <h3> {{ Auth::user()->name }}  {{ Auth::user()->lastname }}</h3>
                        <div class="col-sm-5">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

         
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

       
        <div class="card-body">
          <div class="table-responsive">
            <i class="fas fa-align-center align-center">
                
                    
                <table class="table">
              <thead class=" text-primary">
                
                <th>Name</th>
                
                
                <th>User Type</th>  
                <th>Role</th>                              
                
                <th>EDIT</th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    
                
                <tr>

                    
                      <td>{{ $user->name }}&nbsp;{{ $user->lastname }}</td>
                      <td>{{ $user->usertype }}</td>
                      <td>{{ $user->email }}</td>
                <td> {{ $user->role }}</td>
                     
                      <td>
                      <a href=" " class="btn btn-success">Send File</a>
                        
                        <a href=" " class="btn btn-primary">Give Rate</a>
                        </td>
                       
                </tr>
                @endforeach 
               
              </tbody>
            </table>
                </div>
        </i>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div>
@endsection