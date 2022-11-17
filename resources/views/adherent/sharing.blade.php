@extends('layouts.adherent')
@section('title')

Sharing
              
              
@endsection
@section('content')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>New Sharing :</h2>
                        <h2> {{ Auth::user()->name }}  {{ Auth::user()->lastname }}</h2>
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
              <div class="row back">
              
                <div class="col-md-11">
                <div class="col-md-7 col-md-offset-3">
                <form action="{{route('Adherent.share.doc')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                         <h3>Select An Expert</h3>  
                        <section>
                          <p class="mg-b-20">You can select one expert by category </p>
                          <select class="form-control select2" id="user" name="user">
                            <option label="Choose one"></option>
                            @foreach ($users as $user)
                          <option value="{{$user->id}}" >{{$user->name}}  ->  {{$user->role}} RATED WITH {{ \App\rate::where('to', '=', $user->id)->get()->avg('rates') / \App\User::where('role', '=', 'Adherent')->get()->count()  }}* 
                            </option>
                            @endforeach
                          
                          </select>
                        </section>  
                         <section>
                           
                          <h3>Upload a consent letter</h3>
                   
                        <h4>Upload or drop your consent file here </h4>
                        <p class="mg-b-20">if you don't have a consent letter , you can download it from <a target="_blank" href="{{asset('consentletter/Consent Letter.pdf')}}">here</a> and fill it.</p>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="constent" name="constent">
                          <label class="custom-file-label" for="constent">Choose file</label>
                        </div>
                            
                            
                      
                    </section>
                    <section>
                      <h6>Please upload just the zip files *.zip , thank you </h6>
                         <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                              </div>
                          
                       </section>
                       <h3>Ask the expert questions</h3>
                       <section>
                            
                            
                           <label for="">Message</label>
                           <textarea class="form-control mb-3" rows="2" placeholder="message" id="message" name="message" required></textarea>
                       </section>


                         <center>
                        <button class="btn btn-success " type="submit">Send</button>
                      </center>
                        
                        
                        
                        <!-- Circles which indicates the steps of the form: -->
                         
                         
                       
                        
                        </form>
                    <!-- link to designify.me code snippets -->
                     <br><br>
                    <!-- /.link to designify.me code snippets -->
                </div>
            </div>
            </div>
              



                
{{-- 

                <a href="/Adherent/sendfile/{{ $user->id}}" class="btn btn-success">Send File</a>
                        
                        <a href="/Adherent/giverate/{{ $user->id}}" class="btn btn-primary">Give Rate</a> --}}
                </div>
        </i>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div>
@endsection
@section('scripts')
 
@endsection