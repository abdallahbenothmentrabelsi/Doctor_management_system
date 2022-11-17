@extends('layouts.app')
@section('title')
    sign up
@endsection
@section('content')
<div class="content content-fixed content-auth">
  <div class="container">
      <div class="media align-items-stretch justify-content-center ht-100p">
          <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
              <div class="pd-t-20 wd-100p">
                  <h4 class="tx-color-01 mg-b-5">Create New Account <a href="{{route('login')}}"><small>Or sign in</small></a></h4>
                  <p class="tx-color-03 tx-16 mg-b-40">It's free to signup and only takes a minute.</p>
                </p>
                @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                @endif
                  <form method="POST" action="{{ route('register') }}" id="register">
                    @csrf                 
                            <fieldset>
                              <legend>Registration Form</legend>
                              <div class="form-group row">
                                            <div class="col-sm-4">
                                                <label for="name" >Name</label>                             
                                                <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required >
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                              </div>
                                        <div class="col-sm-4">
                                            <label for="lastname">Last Name </label>
                                            <input type="text" class="form-control  @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Last name" required>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                              <div class="col-sm-4">
                                                <label for="dateofbirth"></label> 
                                                <input  class="form-control @error('dateofbirth') is-invalid @enderror" id="dateofbirth" type="date" name="dateofbirth" value="" required>
                                                @error('dateofbirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                              </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-5">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="ExampleMail@gmail.com" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                <div class="col-sm-3">
                                    <label for="phonenumber" >Phone</label>                             
                                    <input type="text"  class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" id="phonenumber" placeholder="+126" required>
                                    @error('phonenumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>   
                                <div class="col-sm-4">
                                  <label for="lastname">Gender</label>
                                  <div class="form-check ">
                                    <label for="male" class="form-check-label">
                                      <input class="form-check-input position-static  @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="Male" aria-label="..." required>
                                    Male                                     
                                      </label>                                      
                                  
                                    <label for="female" class="form-check-label">
                                      <input class="form-check-input position-static  @error('gender') is-invalid @enderror " type="radio" name="gender" id="female" value="Female" aria-label="..." required>
                                    Female                                    
                                      </label>                                      
                                    </div>

                                  @error('lastname')
                                  <span class="invalid-feedback" role="alert" >
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              </div>
                              </div>
                                        {{-- adress    --}}
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control  @error('country') is-invalid @enderror" name="country" id="country" placeholder="" required>
                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="city">City</label>
                          <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" required >
                            
                        </div> 
                        <div class="col-sm-3">
                            <label for="postalcode">Postal Code</label>
                            <input type="number" class="form-control @error('postalcode') is-invalid @enderror " name="postalcode" id="postalcode" placeholder="" required >
                            @error('postalcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                    </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" placeholder="Password" required >
                                @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                              </div> 
                              <div class="form-group">
                                <label for="Password1">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password1" name="password_confirm" placeholder="Confirm Password" required >
                              </div>
                              <div class="form-group row">

                                <div class="col-sm-4">
                                <label for="Role">Role</label>
                                <div class="form-check ">
                                  <label  for="expert" class="form-check-label">                                     
                                      <input class="form-check-input position-static @error('role') is-invalid @enderror " type="radio" name="role" id="expert" value="Expert" aria-label="..." required >                    
                                    Expert 
                                  
                                    </label>                                    
                                  </div> 

                                  <div class="form-check ">
                                    <label for="adherent" class="form-check-label">
                                      <input class="form-check-input position-static" type="radio" name="role" id="adherent" value="Adherent" aria-label="..." required >                                      
                                      Adherent(Member)  
                                     
                                      </label>
                                    </div>
                                
                                
                                
                                
                                @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            
                            <div class="col-sm-4">
                               
                                  <label for="institution">Institution</label>
                                <select  class="form-control" id="institution" name="institution" required>
                                  <option>ESEN</option>
                                  <option>ESC</option>
                                  <option>ISAMM</option>
                                  
                                </select>
                              </div>
                                        
                                          
                       
             
                                
                                
                               
                                @error('Institution')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            
                         
                          
                        
                          
                    <div class="form-group">
                      <label for="Description">Description</label>
                      <textarea class="form-control" id="Description" name="description" rows="3" placeholder="Describe your Experience" required ></textarea>
                    </div> 
                    <div class="form-group tx-12">
                      By clicking <strong>Create an account</strong> below, you agree to our terms of service
                      and privacy statement.
                  </div>
                              {{-- <div class="form-group">
                                <label for="fileinput">File input</label>
                                <input type="file" class="form-control-file" name="input" id="fileinput" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                              </div>
                              <fieldset class="form-group">
                                <legend>Radio buttons</legend>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                    Option one is this and that—be sure to include why it's great
                                  </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Option two can be something else and selecting it will deselect option one
                                  </label>
                                </div>
                                <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                                    Option three is disabled
                                  </label>
                                </div>
                              </fieldset> --}}
                             
                             <div style="text-align:center">
                              {{-- <button type="submit" class="btn btn-primary" style="border: none;background: #b41939;">Register</button> --}}
                              <a class="btn btn-brand-02 btn-block" href="#modal6"  data-toggle="modal" data-animation="effect-newspaper"  style="border: none;background: #b41939;">Create Account</a>
                              
                             
                            </div>
                            </fieldset>
                          
                       
                    </m>
                  </div>
                </div><!-- sign-wrapper -->
                <div class="media-body pd-y-50 pd-lg-x-30 pd-xl-x-50 align-items-center   d-lg-flex  ">
                    <div class="mx-lg-wd-500 mx-xl-wd-550">
                        <img src="{{asset('img/epilepsi awarness.png')}}" class="img-fluid" alt="">
                    </div>

                </div><!-- media-body -->
            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->
    
    <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel6">Hey you should agree this term</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mg-b-0">This web site is a plateform between physicians and experts in epilepsia. It has been designed as an interacting interface to improve epilepsy management on the East Mediterranean Area.

                        Before registration, physicians must commit to obtain written consent from the adult patient or the legal guardian for children (see consent letter form) to send his personal medical story and exams through this plateform. This consent letter must be sent with the medical documents to the expert. No transfer will be permitted without this consent.

                        In the other hand, the expert must commit to delate all the sent documents until they have been consulted.   He also commits to not use these documents to any other purpose than giving his expert opinion to the physician. It is important to highlight that his expert opinion is his own view and do engage neither the ILAE nor the MENA region.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary tx-13 " data-dismiss="modal" onclick="document.getElementById('register').submit();" style="color: #fff;cursor: pointer;">I agree</a>
                </div>
            </div>
        </div>
    </div>
@endsection



