@extends('layouts.frontend.app')
@section('content')
<!-- create account banner start-->
<section
      id="create_account_main"
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url('{{ asset('assets/frontend/image/stallions-banner.png') }}');"
     >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
                <h1>Create A New Account</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Create Account  banner end -->
    <!-- create account form start -->
    <section class="create_ac_form pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="create_ac_form_inner">
              <div class="form-container">
              <form method="POST" action="{{ route('owner.register.store') }}">
                @csrf
                  <div class="account_detail mb50">
                    <h3 class="mb20">Personal Details</h3>
                    <div class="row">
                      <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" />

                      </div>
                      <input type="hidden"value="{{$role}}"name="role">
                      <div class="form-group">
                        <label for="last-name">Last Name :</label>
                        <input type="text" id="last-name" name="last_name" />
                      </div>

                      <div class="form-group">
                        <label for="email-address">Email Address:</label>
                        <input
                          type="text"
                          id="email-address"
                          name="email"
                        />
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="Password" name="password" />
                      </div>
                      <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="number" id="Phone" name="phone" />
                      </div>

                    </div>
                  </div>
                  <button
                    class="btn btn_i black_btn cursor-pointer"
                    type="submit"
                  >
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('owner.register.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
