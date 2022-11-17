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
                        <h2>Welcome :</h2>
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
      
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
        <div class="card card-body" style="text-align: center;">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8" style="text-align: center;">Doctors Number</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h2><span class="label label-warning" >{{\App\User::count()}}</span></h2>
            </div>
             
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
        <div class="card card-body" style="text-align: center;">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8" style="text-align: center;">Shared Files</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h2><span class="label label-warning" >{{\App\Filedoc::count()}}</span></h2>
            </div>
             
        </div>
    </div>
         

   
<div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
    <div class="card card-body" style="text-align: center;">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8" style="text-align: center;">Sent Files</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
          <h2 ><span class="label label-warning" >{{\App\Filedoc::where('sender',Auth::user()->id)->count()}}</span></h2>
        </div>
         
    </div>
</div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
            <div class="card card-body" style="text-align: center;">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8" style="text-align: center;">Tolal Expert</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h2><span class="label label-warning" > {{ \App\User::where('role', '=', 'EXPERT')->get()->count()}}</span>  Experts for sharing Files.</h2>
                </div>
                 
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
 <style type="text/css">
    .box{
     width:300px;
     margin:0 auto;
    }
   </style>
 <script type="text/javascript">
  var analytics = <?php echo $role; ?>

  google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart()
  {
   var data = google.visualization.arrayToDataTable(analytics);
   var options = {
    title : 'Percentage of Expert and Adherent '
   };
   var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
   chart.draw(data, options);
  }
 </script>
 @endsection