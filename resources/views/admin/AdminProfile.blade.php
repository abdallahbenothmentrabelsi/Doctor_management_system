@extends('layouts.master')




@section('title')
   Edit-Registered-Page
@endsection
@section('content') 
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <img class="col-sm-4 d-none d-sm-block" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="">
      
        <div class="col-lg-7">
          <div class="p-5">
            
            
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Informations</h1>
            </div>
              <form  class="user" enctype="multipart/form-data" action="/Admin/adminupdate/{{ $users->id }}" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}
 
               

              <div class="form-group row">
                <div class="col-sm-6 ">
                 <label for="name">First Name</label>
                  <input type="text" class="form-control form-control-user" id="name" name="name" value="{{ $users->name }}" >
                </div>
                <div class="col-sm-6">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control form-control-user" id="lastname" name="lastname"  value="{{ $users->lastname }}">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6 ">
                  <label for="dateofbirth">Date Of Birth</label>
                  <input type="text" class="form-control form-control-user" name="dateofbirth" id="dateofbirth" value="{{ $users->dateofbirth }}">
                </div>
                
                <div class="col-sm-6">
                  <label for="email">Email Adress</label>
                  <input type="text" class="form-control form-control-user"  name="email" id="email" value="{{ $users->email }}">
                </div>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 ">
                  <label for="phonenumber">Phone Number</label>
                  <input type="text" class="form-control form-control-user" name="phonenumber" id="phonenumber" value="{{ $users->phonenumber }}">
                </div>
                <div class="col-sm-6 ">
                 
                  <label for="gender">Gender</label>
                  <input type="text" class="form-control form-control-user" name="gender" id="gender" value="{{ $users->gender }}">
                  
                </div>
              </div>
        <div class="form-group row">
                <div class="col-sm-4 ">
                  <label for="city">City</label>
                  <input type="text" class="form-control form-control-user" name="city" id="city" value="{{ $users->city }}">
                </div>
                <div class="col-sm-4">
                  
                  <label for="country"> Country</label>
                  <input type="text" class="form-control form-control-user" name="country" id="country" value="{{ $users->country }}">                   
                  
                </div>
                <div class="col-sm-4">
                  <label for="postalcode">Postal Code</label>
                  <input type="text" class="form-control form-control-user" name="postalcode" id="postalcode" value="{{ $users->postalcode }}">
                </div>
                         
         </div>
         <div class="form-group row">
          
                      <div class="col-sm-3">
                        <label for="usertype" >User Type</label>
                          <select name="usertype" id="usertype" class="form-control" >
                            <option value="{{ $users->usertype}}">{{ $users->usertype}}</option> 
                            <option value="Admin">Admin</option>                              
                            <option value="Doctor">Doctor</option>
                          </select>
                      </div>
                      <div class="col-sm-9 ">   
                        
                         
                        <label for="avatar" >Profile Image</label>
                                <div class="custom-file">
                                <input type="file"  name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                <input type="hidden" name="_token" value="{{ csrf_token()}}" >  
                                </div>
                      </div>  
                         
                                    
                     </div>
                         
       
          
              
         <div class="form-group row">
                   
                <div class="col-sm-6 ">
                  <label for="institution">Institution</label>
                  <input type="text" class="form-control form-control-user" name="institution" id="institution" value="{{ $users->institution}}">
                </div>   
                 
               
                 
                
                
               </div>
              
             
              <div class="form-group row">   
                 
                           
                              
                                
                      
                
                </a>
                  

              <div class="text-right">
                <button type="submit" class="btn btn-success up">Update</button>
                <a href="/Admin/dashboard" class="btn btn-secondary" >Back To Dashboard</a>
                
                 
              
            </div>

            </form>
             
            <hr>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script>
  $(".up").click(function(){
    return confirm("are you sure you want to update your profile?")
  });
</script>
    
@endsection