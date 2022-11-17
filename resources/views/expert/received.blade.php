@extends('layouts.expert')
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
                        <h2>FILES & CONSENT LETTERS RECEIVED</h2>
                        <h3> to {{ Auth::user()->name }}  {{ Auth::user()->lastname }}   </h3>
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

          
      
      <div class="card-body">
        <div class="table-responsive">
            <i class="fas fa-align-center align-center">
                
                    
                <table class="table">
              <thead class=" text-primary">
                
                <th>DOC-Name</th>
                
                
                <th>Sender</th>  

                <th>Uploaded</th> 
                
                <th>Download</th>                              
                 
               
                
              </thead>
              <tbody>
            @foreach ($files  as $file  )


            <tr>

                <td>{{ $file->name }}</td>
                <td>{{\App\User::findOrFail($file->sender)->name}}</td>
                
                <td><span class="badge badge-lgiht">{{$file->created_at->diffForHumans()}}</span></td>
           
                 
               
                <td>
                    <a href="{{asset("file/$file->name")}}" class="btn btn-success">Download</a>
                {{-- <a href="{{route('downloadfile', $file->id)}}" class="btn btn-success">Download</a> --}}
                  
                  {{-- {{asset("file/$file->name")}} --}}
                  </td>
                 
          </tr>
            @endforeach 
            <thead class=" text-primary">
                 <th>Letter-Name</th> 
                 <th>Sender</th>  
                 <th>Approved</th>  
                <th>Uploaded</th> 
             
             
            </thead>
             @foreach ( $letters as $letter)
            <tr>
                <td>{{ $letter->name }}</td>
                <td>{{\App\User::findOrFail($file->sender)->name}}</td>
            
            <td> <span class="badge badge-primary"> {{ $letter->approved ? trans('yes') : trans('no') }}</span></td>
            <td><span class="badge badge-lgiht">{{$letter->created_at->diffForHumans()}}</span></td>
             <td>
                <a href="{{asset("consent/$letter->name")}}" class="btn btn-light">SHOW</a>
                  
                  {{-- {{asset("file/$file->name")}} --}}
                  </td>
            </tr>
             @endforeach
        </tbody>
    </table>

        </div>
        </i>
        </div>
    </div>
   
@endsection