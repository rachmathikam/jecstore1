@section('css')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
@endsection 
@extends('layouts.app')
@section('content')

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

             
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                  @csrf

                    <div class="col-12">
                      <label for="yourName" class="form-label">{{ __('Name') }}</label>
                      <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    
                    <div class="col-12">
                            <label for="password-confirm" class=" col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>
                    </div>
                  </div>
                  
                  </form>
                  
                </div>
              </div>
              
              
              
            </div>
          </div>
        </div>
        
      </section>

    </div>
  </main><!-- End #main -->
@endsection
