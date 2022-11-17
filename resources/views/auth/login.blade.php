
@extends('layouts.app')

@section('content')
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center pd-y-40 ">
            <div class="media-body align-items-center d-none d-lg-flex ">
                <div class="mx-wd-600 text-center">
                    <img src="{{asset('img/epilepsi awarness head.png')}}" class="img-fluid"  >
                </div>
            </div>
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                @endif
                    <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                    <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('E-Mail Address') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" name="email" autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                                <a href="{{ route('password.request')}}" class="tx-13">Forgot password?</a>
                            </div>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-brand-02 btn-block">Sign In</button>
                    </form>
                    <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="{{route('register')}}">Create an
                            Account</a></div>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->
@endsection
