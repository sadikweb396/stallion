<style>
  .a{
     display:none;
   }
   .b
   {
    display: block;
   }
</style>
<!-- header start -->
<header class="main_header_m">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div
              class="header_inner_m d-flex align-items-center justify-space-between"
            >
              <div class="menu_m">
                <div class="humberg_icon cursor-pointer">
                  <img src="{{ url('assets/frontend/image/Vector.png')}}" alt="humberg icon" />
                </div>
                <div class="main_sidebar_section d-none">
                  <div class="sidebar_inner_e">
                    <div class="main_menu_m">
                      <div class="close_btn cursor-pointer">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 384 512"
                        >
                          <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                          />
                        </svg>
                      </div>
                      <div class="main_menu_inner">
                        <nav class="menu_list">
                          <ul class="list-none">
                          <li class="menu_items">
                              <a href="{{url('mares')}}"> Home </a>
                            </li>
                           <li class="menu_items">
                              <a href="{{url('mares')}}"> Mares </a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('stallions')}}">STALLIONS</a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('events')}}">Calendar</a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('progeny')}}">Progeny Sale barn</a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('about-us')}}">About us</a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('contact-us')}}">Contact Us</a>
                            </li>
                            <li class="menu_items">
                              <a href="{{url('photographers')}}">Photographers</a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main_logo_m d-none">
                <a href="javascript:void(0)" aria-label="site url">
                  <img
                    src="{{ url('assets/frontend/image/logo.png')}}"
                    alt="logo"
                    class="img-contain"
                  />
                </a>
              </div>
              <div class="header_button_m text-right">
                <a
                  href="#"
                  class="btn_i bttn_login"
                  aria-label="login"
                  data-target="#login"
                >
                  Login
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>





      @if(session('error'))
      <div class="popupp d-none popupp-show" style="display: block;">
      @else
      <div class="popupp d-none">
      @endif
        <div
          id="login"
          class="modal fade d-flex align-items-center justify-content-center"
          role="dialog"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button data-dismiss="modal" class="close cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                      d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                    />
                  </svg>
                </button>


                <div class="container" id="contain">
                  <div class="form-container sign-up-container">
                    <form action="#">
                      <div class="create_account">
                        <h3 class="mb20">Member</h3>
                        <p class="mtb20">
                          Nullam laoreet condimentum purus sit amet suscipit. Ut
                          eu neque tincidunt.
                        </p>
                        <div class="subscription_listing">
                          <ul class="list-none mb20">
                            <li>
                              <span class="check_listing"
                                ><svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 448 512"
                                >
                                  <path
                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                  ></path></svg></span
                              >Access to exclusive data.
                            </li>
                            <li>
                              <span class="check_listing"
                                ><svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 448 512"
                                >
                                  <path
                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                  ></path></svg></span
                              >Follow Stallions Mares and events.
                            </li>
                            <li>
                              <span class="check_listing"
                                ><svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 448 512"
                                >
                                  <path
                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                  ></path></svg></span
                              >Take part in Campdraft.
                            </li>
                          </ul>
                        </div>
                        <a href="{{url('member/register')}}" class="btn-form"> Become a Member </a>
                      </div>
                    </form>
                  </div>
                  
                  <div class="form-container sign-in-container">
                  <form method="POST" action="{{ route('owner.login.store') }}">
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
                        <input
                          type="text"
                          id="Username"
                          name="email"
                          placeholder="Username"
                          class="text_input"required
                        />
                        <span
                          class="input_icon"
                          style="
                            background-image: url(./assets/image/Frame.png);
                          "
                        >
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="Password"
                          ><span class="visually-hidden">Password</span></label
                        >
                        <input
                          type="Password"
                          id="Password"
                          name="password"
                          placeholder="Password"
                          class="text_input"required
                        />
                        <span
                          class="input_icon"
                          style="
                            background-image: url(./assets/image/password-icon.png);
                          "
                        ></span>
                      </div>
                        @if(session('error'))
                          <div style="color: red; margin-top: 10px;">
                              {{ session('error') }}
                          </div>   
                        @endif
                      <div class="forgot_password mb20">
                        <p class="text-right">
                          <a href="javascript:void(0);">Forgot Password?</a>
                        </p>
                      </div>
                      <div class="form-group">
                        <input
                          type="submit"
                          value="Login Now"
                          class="submit_bttn btn-form cursor-pointer"
                        />
                      </div>
                      <div class="social-container">
                        <p class="logins_line">
                          <span><b>Login </b> with Others</span>
                        </p>                    
                        <a href="#" class="social">
                          <img
                            src="{{url('assets/frontend/image/google1.png')}}"
                            class="img-contain"
                          />
                        </a>
                        <a href="#" class="social">
                          <img src="{{url('assets/frontend/image/Group8.png')}}"class="img-contain"/>
                        </a>
                        <a href="#" class="social">
                          <img src="{{url('assets/frontend/image/Group12.png')}}" class="img-contain"/>
                        </a>
                      </div>
                    </form>
                  </div>
                  <div class="overlay-container">
                    <div class="overlay">
                      <div class="overlay-panel overlay-left">
                        <div class="overlay-panel-inner">
                          <h3>Owner</h3>
                          <p class="mtb20">
                            Nullam laoreet condimentum purus sit amet suscipit.
                            Ut eu neque tincidunt.
                          </p>
                          <div class="subscription_listing">
                            <ul class="list-none mb20">
                              <li>
                                <span class="check_listing"
                                  ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"
                                  >
                                    <path
                                      d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                    ></path></svg></span
                                >Personalized profile
                              </li>
                              <li>
                                <span class="check_listing"
                                  ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"
                                  >
                                    <path
                                      d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                    ></path></svg></span
                                >List Your Stallions and mares Profile
                              </li>
                              <li>
                                <span class="check_listing"
                                  ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"
                                  >
                                    <path
                                      d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                                    ></path></svg></span
                                >Access Everything that Members can
                              </li>
                            </ul>
                          </div>
                          <a href="{{route('owner.register')}}" class="signIn btn-form">
                            Become a Owner
                          </a>
                          <button class="signIn back_login cursor-pointer">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                              />
                            </svg>
                            Back to login
                          </button>
                        </div>
                      </div>
                      <div class="overlay-panel overlay-right">
                        <div class="overlay-panel-inner">
                          <div class="panel_inner mb50">
                          <img
                              src="{{url('/assets/frontend/image/black-logo-transparent.png')}}"
                              class="img-contain"
                            />
                          </div>
                          <button class="signUp btn-form">
                            Become a member or an owner?
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- header end -->