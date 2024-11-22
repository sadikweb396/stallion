@extends('layouts.admin.app')
@section('content')
    <section class="dash_login_m">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 no-padding">
            <div
              class="dash_login_i d-flex align-items-center justify-content-center"
            >
              <div class="login_p">
              <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                  <div class="login_info">
                    <h3 class="">Login</h3>
                    <p class="mb20">
                      A login system lets users access an app using their
                      credentials.
                    </p>
                  </div>

                  <div class="form-group">
                    <label for="Username"
                      ><span class="visually-hidden">Username</span></label
                    >
                   
                    <input id="email" type="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span
                      class="input_icon"
                      style="background-image: url(assets/frontend/image/Frame.png)"
                    >
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="Password"
                      ><span class="visually-hidden">Password</span></label
                    >
                    
                    <input id="password" type="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                    <span
                      class="input_icon"
                      style="
                        background-image: url(assets/frontend/image/password-icon.png);
                      "
                    ></span>
                  </div>

                  <div class="form-group">
                    <input
                      type="submit"
                      value="Login Now"
                      class="submit_bttn btn-form cursor-pointer"
                    />
                  </div>
                </form>
              </div>
              <div
                class="login_info background-img"
                style="background-image: url(assets/frontend/image/Rectangle211.png)"
              >
                <div class="info_head">
                  <h1>
                    Donec in dapibus augue <br />
                    sed nisi nunc suscipit<br />
                    eget enim sit amet
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection