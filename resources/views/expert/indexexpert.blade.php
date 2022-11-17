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
                        <h2>Welcome </h2>
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
 
<section >
    <div class="container">
   
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Doctors Number</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><span class="badge badge-warning">{{\App\User::count()}}</span>    Doctors.</h3>

            </div>
            <div class="chart-three">
                <div id="flotChart3" class="flot-chart ht-30"></div>
            </div><!-- chart-three -->
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
      <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Shared Files</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><span class="badge badge-warning">{{\App\Filedoc::count()}}</span>    Files.</h3>
        
        </div>
          <div class="chart-three">
              <div id="flotChart4" class="flot-chart ht-30"></div>
          </div><!-- chart-three -->
      </div>
  </div>
  <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Files Received</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><span class="badge badge-warning"> {{ \App\Filedoc::where('receiver', '=', Auth::user()->id)->get()->count()}}</span>   Files.</h3>
             
        </div> <a href="/Expert/received" class="btn btn-light">Check this </a>
        <div class="chart-three">
            <div id="flotChart5" class="flot-chart ht-30"></div>
        </div><!-- chart-three -->
    </div>
</div> 
    </div><br>
    <div class="row">
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
        <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tolal Expert</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><span class="badge badge-warning"> {{ \App\User::where('role', '=', 'EXPERT')->get()->count()}}</span> Experts for sharing Experience.</h6>
            </div> <a href="/chatroom" class="btn btn-light">Check this </a>
            <div class="chart-three">
                <div id="flotChart4" class="flot-chart ht-30"></div>
            </div><!-- chart-three -->
        </div>
    </div>
        
       
           
    <div class="col-mg-8">
        <div id="pie_chart" style="width:30rem; height:15rem;">
            </div> 
     </div>
  
    
        
        
    </div>
   </div>
</section>
<br><br><br> 
<br><br><br>
<br><br><br>

@endsection
    
 @section('scripts')
     
 @endsection