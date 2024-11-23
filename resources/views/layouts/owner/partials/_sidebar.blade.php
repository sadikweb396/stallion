<div class="dash_sidebar_m">
          <div class="dash_sidebar_inner">
            <div class="User_avtar text-center">
              <img src="{{url('assets/admin/image/profile-image.jpeg')}}" alt="User avtaar" />
            </div>
            <div class="menu_list">
              <ul class="menu_list_ul">
                <li class="menu_list_items mb20 active_menu">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="menu_items_t"> Dashboard </span>
                  </a>
                </li>
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="menu_items_t">  {{ Auth::user()->username }} profile </span>
                  </a>
                </li>
              </ul>
              <ul class="menu_list_ul">
          
                <li class="menu_list_items mb20">
               
                <a href="{{ url('owner/stallions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-heart"></i>
                    </span>
                    <span class="menu_items_t">Your Stallions </span>
                  </a>
                </li>

               <li class="menu_list_items mb20">
                <a href="{{ url('owner/mares') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-heart"></i>
                    </span>
                    <span class="menu_items_t">Your Mares </span>
                  </a>
                </li>
                  <!--
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-calendar-check"></i>
                    </span>
                    <span class="menu_items_t"> Calender </span>
                  </a>
                </li>
              </ul>
              <ul class="menu_list_ul">
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-calendar-alt"></i>
                    </span>
                    <span class="menu_items_t"> Your Semen Contracts </span>
                  </a>
                </li>
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-sign"></i>
                    </span>
                    <span class="menu_items_t"> Auction Take Part </span>
                  </a>
                </li>
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fa-solid fa-thumbtack"></i>
                    </span>
                    <span class="menu_items_t"> List Your Auction Items </span>
                  </a>
                </li>
              </ul>
              <ul class="menu_list_ul">
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-sliders-h"></i>
                    </span>
                    <span class="menu_items_t"> Settings </span>
                  </a>
                </li> -->
                <!-- <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                    <span class="menu_items_t"> Purchases </span>
                  </a>
                </li>
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="menu_items_t"> Bank Details </span>
                  </a>
                </li>
                <li class="menu_list_items mb20">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-book"></i>
                    </span>
                    <span class="menu_items_t"> Documentation </span>
                  </a>
                </li> -->
                @can('view photographer')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('admin/photographer') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">photographer</span>
                  </a>
                </li>
                @endcan
                @can('view role')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('roles') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Roles</span>
                  </a>
                </li>
                @endcan
                @can('view permission')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('permissions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Permissions</span>
                  </a>
                </li>
                @endcan
                @can('view user')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('users') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Users</span>
                  </a>
                </li>
                @endcan
                @can('stallion list')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('admin/stallions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Stallion List</span>
                  </a>
                </li>
                @endcan

                @can('mare list')
                <li class="menu_list_items mb20 collaose_menu">
                  <a href="{{ url('admin/mares') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Mare List</span>
                  </a>
                </li>
                @endcan
                
                <li class="menu_list_items mb20 logout_item">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="menu_items_t"> Log out </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>