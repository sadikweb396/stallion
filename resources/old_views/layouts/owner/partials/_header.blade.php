
<div class="dash_top_header">
            <header class="d-flex align-items-center justify-space-between">
              <div class="menu-bar d-none">
                <div class="menu-bar-icon collaose_menu cursor-pointer">
                  <i class="fas fa-bars"></i>
                </div>
              </div>
              <div class="search_bar_m">
                <div class="darksoul-search-bar" id="searchbar">
                  <input
                    id="searchbarinput"
                    class="darksoul-search-bar-input"
                    type="text"
                    name="search"
                    id="searchval"
                    placeholder="Type something"
                  />
                  <img
                    id="searchicon"
                    width="22"
                    height="22"
                    src="https://img.icons8.com/sf-black/100/ffffff/search.png"
                    alt="search"
                  />
                  <div class="darksoul-dropdown" id="dropdown">
                    <ul id="resultlist">
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <p>
                            Most people only see the success and the winning
                            moments
                          </p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="sign_out_btn">
                <ul role="menu" class="ab-top-secondary ab-top-menu list-none">
                  <li id="menu-bar-my-account" class="menupop with-avatar">
                    <a class="ab-item d-flex align-items-center gap10" href="#">
                      <span>
                        Howdy, <span class="display-name">  {{ Auth::user()->username }} </span>
                      </span>
                      <span class="img-content">
                        <img
                          alt=""
                          src="{{url('assets/admin/image/profile-image.jpeg')}}"
                          srcset="../assets/image/Ellipse 6.png"
                          class="ab-avatar"
                          height="26"
                          width="26"
                          decoding="async"
                        />
                      </span>
                    </a>
                    <div class="ab-sub-wrapper d-none">
                      <ul class="ab-submenu list-none">
                        <li
                          role="group"
                          id="admin-bar-user-info"
                          class="d-flex align-items-center gap10"
                        >
                          <span>
                            <a class="ab-item" role="menuitem" href="#">
                              <img
                                alt=""
                                src="{{url('assets/admin/image/profile-image.jpeg')}}"
                                srcset="
                                ../assets/image/Ellipse 6.png
                                "
                                class="ab-avatar"
                                height="70"
                                width="70"
                                decoding="async"
                              />
                            </a>
                          </span>
                          <span>
                            <a href="{{ url('edit-profile/' . Auth::user()->id) }}">
                              <span class="display-name"> {{ Auth::user()->username }}</span>
                              <span class="display-name edit-profile">
                              Edit Profile
                              </span>
                            </a>
                            <a
                              class="ab-item item_logout"
                              role="menuitem"
                              href="{{ route('owner.logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              >Log Out</a
                            >
                            <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
                          </span>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </header>
          </div>