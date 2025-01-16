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
              <form method="POST" action="{{ route('member.register.store') }}">
                @csrf
                  <div class="account_detail mb50">
                    <h3 class="mb20">Personal Details</h3>
                    <div class="row">
                      <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name"value="{{ old('first_name') }}" name="first_name"required />

                      </div>
                      <input type="hidden"value="{{$role}}"name="role">
                      <div class="form-group">
                        <label for="last-name">Last Name :</label>
                        <input type="text" id="last-name" value="{{ old('last_name') }}"name="last_name"required />
                      </div>

                      <div class="form-group">
                        <label for="email-address">Email Address:</label>
                        <input
                          type="text"
                          id="email-address" value="{{ old('email') }}"
                          name="email"required
                        />
                        @error('email')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="Password" name="password"value="{{ old('password') }}" required/>
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="number" id="Phone" name="phone" required/>
                        @error('phone')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
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
@endsection
