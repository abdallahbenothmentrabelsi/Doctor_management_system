@extends('layouts.master')

@section('title')
Dashboard
 
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">  Dashboard-Admin: Welcome Admin: {{ Auth::user()->name }}</h4>
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
               
        
          </div>
          <div class="row">
            <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
              <div class="card" style="text-align: center;">
                  <div class="card-header">
                      <h6 class="mg-b-0">ADHERENT </h6>
                  </div><!-- card-header -->
                  <div class="card-body tx-center">
                      <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0">{{count(\App\User::where('role','ADHERENT')->where('approved',1)->get())}}</h4>
                      <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Adherent actif</p>
                      <p class="tx-12 tx-color-03 mg-b-0">the Adherent role allows sharing and communicating with experts.</p>
                  </div><!-- card-body -->
                  <div class="card-footer bd-t-0 pd-t-0">
                      <a class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1" href="/Admin/ADHERENTLIST">Access</a>
                  </div><!-- card-footer -->
              </div><!-- card -->
          </div>
          <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
            <div class="card" style="text-align: center;">
                <div class="card-header">
                    <h6 class="mg-b-0" STYLE="text-transform: uppercase">ADHERENT Not APPROVED</h6>
                </div><!-- card-header -->
                <div class="card-body tx-center">
                    <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0">{{count(\App\User::where('role','ADHERENT')->where('approved',0)->get())}}</h4>
                    <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Adherent Not Actif</p>
                    <p class="tx-12 tx-color-03 mg-b-0">the Adherent role allows sharing and communicating with experts.</p>
                </div><!-- card-body -->
                <div class="card-footer bd-t-0 pd-t-0">
                    <a href="/Admin/not_approved_ADHERENT" class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1">Access</a>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
            <div class="card" style="text-align: center;">
                <div class="card-header">
                    <h6 class="mg-b-0">ADHERENT Blocked </h6>
                </div><!-- card-header -->
                <div class="card-body  " style="text-align: center;">
                    <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0" >{{count(\App\User::where('role','ADHERENT')->where('block',1)->get())}}</h4>
                    <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Blocked ADHERENT </p>
                    <p class="tx-12 tx-color-03 mg-b-0">the Adherent role allows sharing and communicating with experts.</p>
                </div><!-- card-body -->
                <div class="card-footer bd-t-0 pd-t-0">
                    <a class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1" href="/Admin/blocked_adherent">Access</a>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
          <div class="card" style="text-align: center;">
              <div class="card-header">
                  <h6 class="mg-b-0">EXPERT NOT APPROVED </h6>
              </div><!-- card-header -->
              <div class="card-body  " style="text-align: center;">
                  <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0" >{{count(\App\User::where('role','EXPERT')->where('approved',0)->get())}}</h4>
                  <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Expert Not Actif </p>
                  <p class="tx-12 tx-color-03 mg-b-0">The Expert role allows to share and communicate with experts and members.</p>
              </div><!-- card-body -->
              <div class="card-footer bd-t-0 pd-t-0">
                  <a class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1" href="/Admin/not_approved_EXPERT">Access</a>
              </div><!-- card-footer -->
          </div><!-- card -->
      </div><div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
        <div class="card" style="text-align: center;">
            <div class="card-header">
                <h6 class="mg-b-0">EXPERT Blocked </h6>
            </div><!-- card-header -->
            <div class="card-body  " style="text-align: center;">
                <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0" >{{count(\App\User::where('role','EXPERT')->where('block',1)->get())}}</h4>
                <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Blocked Expert </p>
                <p class="tx-12 tx-color-03 mg-b-0">The Expert role allows to share and communicate with experts and members.</p>
            </div><!-- card-body -->
            <div class="card-footer bd-t-0 pd-t-0">
                <a class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1" href="/Admin/blocked_expert">Access</a>
            </div><!-- card-footer -->
        </div><!-- card -->
    </div>
      <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
        <div class="card" style="text-align: center;">
            <div class="card-header">
                <h6 class="mg-b-0" STYLE="text-transform: uppercase">Expert </h6>
            </div><!-- card-header -->
            <div class="card-body  " style="text-align: center;">
                <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0  ">{{count(\App\User::where('role','EXPERT')->where('approved',1)->get())}}</h4>
                <p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Approved expert  </p>
                <p class="tx-12 tx-color-03 mg-b-0">The Expert role allows to share and communicate with experts and members.</p>
            </div><!-- card-body -->
            <div class="card-footer bd-t-0 pd-t-0">
                <a href="/Admin/EXPERTLIST" class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1">Access</a>
            </div><!-- card-footer -->
        </div><!-- card -->
    </div>
    <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
        <div class="card" style="width: 20rem;">
         <div class="card-body">
               <h5 class="card-title">Percentage of Expert and
                 Adherent
                 </h5>
               <div id="pie_chart" style="width:20rem; height:10rem;">
             </div>
           </div>   
           </div>
     </div>
    <div class="col-sm-5 col-md-4 col-lg-3 mg-t-10">
      <div class="card" style="text-align: center;">
          <div class="card-header">
              <h6 class="mg-b-0" STYLE="text-transform: uppercase">Consent Letter Not Approved </h6>
          </div><!-- card-header -->
          <div class="card-body" >
              <h4 class="tx-normal tx-rubik tx-40 tx-spacing--1 mg-b-0 ">{{ \App\ConsentLetter::where('approved', '=', '0')->get()->count()}} Not Approved file.</h4>
              
          </div><!-- card-body -->
          <div class="card-footer bd-t-0 pd-t-0">
              <a href="/Admin/not_approved_letter" class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1">Access</a>
          </div><!-- card-footer -->
      </div><!-- card -->
  </div>
           
            
          </div>
          <div class="row">
          <div class="col-md-12 mg-t-10">
            <div class="card"   >
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0">Sharing files</h6>
                    </div> 
                </div><!-- card-header -->
                <div class="card-body pd-20">
                    <ul class="activity tx-13">
                     {{-- {{$filedoc = \App\Filedoc::all()->get()}}  --}}
                     
                        @foreach($filesdoc as $file )
                        <li class="activity-item">
                            <div class="activity-icon bg-success-light tx-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                            </div>
                            <div class="activity-body">
                                @php
                                    $user=\App\User::where('id',$file->sender)->first();
                                @endphp
                                @if(!empty($user))
                                <p class="mg-b-2"><strong>{{\App\User::findOrFail($file->sender)->name}} ({{\App\User::findOrFail($file->sender)->role}})</strong> send a file entitled '{{$file->name}}' to <strong>{{\App\User::findOrFail($file->receiver)->name}} ({{\App\User::findOrFail($file->receiver)->role}})</strong></p>
                                <small class="tx-color-03">{{$file->created_at->diffForHumans()}}</small>
                                @endif
                            </div><!-- activity-body -->
                        </li><!-- activity-item -->
                            @endforeach
                    </ul><!-- activity -->
                </div><!-- card-body -->
            </div><!-- card -->
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