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
</section>

<div class="col-sm-5">
         
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

    </div>
       
        <div class="card-body">
          <div class="table-responsive">
            <i class="fas fa-align-center align-center">
                <!-- MultiStep Form -->
<div class="row back">
    
    <div class="col-md-8">
    <div class="col-md-7 col-md-offset-3">
        <form id="regForm" action="/send" method="POST" enctype="multipart/form-data">

            <h3>Consentment Lettre</h3>
            
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
               
              
              <p><input type="file" placeholder="Last name..." oninput="this.className = ''"></p>
            </div>
            
            <div class="tab">Contact Info:
              <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
              <p><input placeholder="Phone..." oninput="this.className = ''"></p>
            </div>
            
            
            
            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
              </div>
            </div>
            
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
             
             
            </div>
            
            </form>
        <!-- link to designify.me code snippets -->
         <br><br>
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
</div>
<!-- /.MultiStep Form -->
                
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