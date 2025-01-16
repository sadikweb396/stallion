<div class="dash_sidebar_m">
    <div class="dash_sidebar_inner">
            <div class="User_avtar text-center">
              <img src="{{url( Auth::user()->image )}}" class="ab-avatar " alt="User avtaar" />
            </div>
            <div class="menu_list">
              <ul class="menu_list_ul">
                @can('Dashboard')
                <li class="menu_list_items mb20  @if(Request::is('admin/home/stallion-section')) active_menu @endif">
                  <a href="#" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="menu_items_t">Dashboard</span>
                  </a>
                </li>
                @endcan  
                <li class="menu_list_items mb20  @if(Request::is('user/profile') ||  Request::is('edit-profile/*') ) active_menu @endif">
                  <a href="{{ url('user/profile') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="menu_items_t">{{ Auth::user()->username }} profile </span>
                  </a>
                </li>
              </ul>
              <ul class="menu_list_ul">
                @can('Stallions')
                <li class="menu_list_items mb20 collaose_menu  @if(Request::is('owner/stallions') || Request::is('owner/stallion/create') || Request::is('owner/Stallion/*') || Request::is('owner/stallion/progeny/*')) active_menu @endif">
                <a href="{{ url('owner/stallions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-horse"></i>
                    </span>
                    <span class="menu_items_t">Your Stallions</span>
                  </a>
                </li>
                @endcan  
                @can('Mares')
                <li class="menu_list_items mb20 collaose_menu @if(Request::is('owner/mares') || Request::is('owner/mares/create') || Request::is('owner/mare/*') || Request::is('owner/mare/progeny/*')) active_menu @endif">
                <a href="{{ url('owner/mares') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                    <i class="fa-solid fa-horse-head"></i>
                    </span>
                    <span class="menu_items_t">Your Mares</span>
                  </a>
                </li>
                @endcan 
                @can('Followed Mares')
                <li class="menu_list_items mb20 collaose_menu  @if(Request::is('followed/mares')) active_menu @endif">
                <a href="{{ url('followed/mares') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                    <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="menu_items_t">Followed Mares</span>
                  </a>
                </li>
                @endcan  
                @can('Followed Stallions')  
                <li class="menu_list_items mb20 collaose_menu  @if(Request::is('followed/stallions')) active_menu @endif">
                <a href="{{ url('followed/stallions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                    <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="menu_items_t">Followed Stallions</span>
                  </a>
                </li>
                @endcan 
                @can('Followed Event')  
                <li class="menu_list_items mb20 collaose_menu  @if(Request::is('followed/event')) active_menu @endif">
                <a href="{{ url('followed/event') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                    <i class="fas fa-clock"></i>
                    </span>
                    <span class="menu_items_t">Followed Events</span>
                  </a>
                </li>
                @endcan 
                @can('subscription')    
                <li class="menu_list_items mb20 collaose_menu  @if(Request::is('subscription') || Request::is('subscription/*') ) active_menu @endif">
                <a href="{{ url('subscription') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                    <i class="fas fa-newspaper"></i>
                    </span>
                    <span class="menu_items_t">Subscriptions</span>
                  </a>
                </li>  
                @endcan 
                @can('Home')
                <li class="menu_list_items mb20 have-child @if(Request::is('admin/home/banner') || Request::is('admin/home/stallion-section') || Request::is('admin/category') || Request::is('admin/home/mare-section') || Request::is('admin/about-us/banner') || Request::is('admin/what-we-do') || Request::is('admin/our-team') || Request::is('admin/our-brain-and-thinker') || Request::is('admin/progeny/banner') || Request::is('admin/progeny-information') || Request::is('admin/event')|| Request::is('admin/contact-us/banner') || Request::is('admin/contact-us/details') || Request::is('admin/stallion/list') || Request::is('admin/mare/list') || Request::is('admin/advertisement') || Request::is('admin/photographer') || Request::is('admin/category/create') ||  Request::is('admin/category/edit/*') ||  Request::is('admin/our-team/create') ||  Request::is('admin/photographer/banner') || Request::is('admin/our-team/edit/*') || Request::is('admin/photographer/edit/*') || Request::is('admin/event/edit/*') || Request::is('admin/event/create') || Request::is('admin/badge') ) clicked_sub  @endif">
                  <a
                    href="javascript:void(0);"
                    class="d-flex align-items-center gap10"
                  >
                    <span class="list_icon">
                    <i class="fa-brands fa-page4"></i>
                    </span>
                    <span class="menu_items_t">All Pages</span>
                  </a>
                  <ul class="menu_list_ul_sub"@if(Request::is('admin/home/banner') || Request::is('admin/home/stallion-section') || Request::is('admin/category') || Request::is('admin/home/mare-section') || Request::is('admin/about-us/banner') || Request::is('admin/what-we-do') || Request::is('admin/our-team') || Request::is('admin/our-brain-and-thinker') || Request::is('admin/progeny/banner') || Request::is('admin/progeny-information') || Request::is('admin/event') || Request::is('admin/contact-us/banner') || Request::is('admin/contact-us/details') || Request::is('admin/stallion/list') || Request::is('admin/mare/list') || Request::is('admin/advertisement') || Request::is('admin/photographer') || Request::is('admin/category/create') ||  Request::is('admin/category/edit/*') || Request::is('admin/our-team/create') ||  Request::is('admin/our-team/edit/*') || Request::is('admin/photographer/banner') || Request::is('admin/event/banner') || Request::is('admin/our-brain-and-thinker/create') ||  Request::is('admin/our-brain-and-thinker/edit/*') || Request::is('admin/photographer/edit/*') || Request::is('admin/event/edit/*') || Request::is('admin/event/create') || Request::is('admin/badge') || Request::is('admin/plan-member') || Request::is('admin/plan-owner')) style="display: block;@endif">
                    <li class="menu_list_items mb20 have-child @if(Request::is('admin/home/banner') || Request::is('admin/home/stallion-section') || Request::is('admin/category') || Request::is('admin/home/mare-section') || Request::is('admin/category/create') ||  Request::is('admin/category/edit/*') || Request::is('admin/our-brain-and-thinker/create') || Request::is('admin/plan-member')  || Request::is('admin/plan-owner')||  Request::is('admin/our-brain-and-thinker/edit/*')) clicked_sub @endif">
                      <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                        <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="menu_items_t">Home</span>
                      </a>
                      <ul class="menu_list_ul_sub list-none" @if(Request::is('admin/home/banner') || Request::is('admin/home/stallion-section') || Request::is('admin/category') || Request::is('admin/home/mare-section') || Request::is('admin/category/create') ||  Request::is('admin/category/edit/*') || Request::is('admin/plan-member') || Request::is('admin/plan-owner')) style="display: block;@endif">
                        <li class="menu_list_items mb20  @if(Request::is('admin/home/banner')) active_menu @endif">
                          <a
                            href="{{url('admin/home/banner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                            
                            </span>
                            <span class="menu_items_t">Banner</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20  @if(Request::is('admin/category') || Request::is('admin/category/create') ||  Request::is('admin/category/edit/*') ) active_menu @endif">
                          <a
                            href="{{url('admin/category')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                              
                            </span>
                            <span class="menu_items_t">Category</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/home/mare-section')) active_menu @endif">
                          <a
                            href="{{url('admin/home/mare-section')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                           
                            </span>
                            <span class="menu_items_t">Mare</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20  @if(Request::is('admin/home/stallion-section') ) active_menu @endif">
                          <a
                            href="{{url('admin/home/stallion-section')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                           
                            </span>
                            <span class="menu_items_t">Stallion</span>
                          </a>
                        </li>

                        <li class="menu_list_items mb20  @if(Request::is('admin/plan-member') ) active_menu @endif">
                          <a
                            href="{{url('admin/plan-member')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                           
                            </span>
                            <span class="menu_items_t">Plan Member</span>
                          </a>
                        </li>

                        <li class="menu_list_items mb20  @if(Request::is('admin/plan-owner') ) active_menu @endif">
                          <a
                            href="{{url('admin/plan-owner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                           
                            </span>
                            <span class="menu_items_t">Plan Owner</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                    <li class="menu_list_items mb20 @if(Request::is('admin/mare/list')) active_menu @endif">
                      <a
                        href="{{ url('admin/mare/list') }}"
                        class="d-flex align-items-center gap10"
                      >
                        <span class="list_icon">
                         <i class="fa-solid fa-horse-head"></i>
                        </span>
                        <span class="menu_items_t">Mare</span>
                      </a>
                    </li>
                    <li class="menu_list_items mb20 @if(Request::is('admin/stallion/list')) active_menu @endif">
                      <a
                        href="{{ url('admin/stallion/list') }}"
                        class="d-flex align-items-center gap10"
                      >
                        <span class="list_icon">
                       
                        <i class="fa-solid fa-horse"></i>
                        </span>
                        <span class="menu_items_t">Stallion</span>
                      </a>
                    </li>
                    @can('Event')
                    <li class="menu_list_items mb20 have-child @if(Request::is('admin/event/banner') || Request::is('admin/event')|| Request::is('admin/event/edit/*') || Request::is('admin/event/create') ) clicked_sub @endif ">
                        <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                          <span class="list_icon">
                            <i class="fas fa-sliders-h"></i>
                          </span>
                          <span class="menu_items_t">Calendar</span>
                        </a>
                        <ul class="menu_list_ul_sub list-none"@if(Request::is('admin/event/banner') || Request::is('admin/event') || Request::is('admin/event/edit/*') || Request::is('admin/event/create') ) style="display: block;@endif">
                          <li class="menu_list_items mb20 @if(Request::is('admin/event/banner')) active_menu @endif">
                            <a
                              href="{{url('admin/event/banner')}}"
                              class="d-flex align-items-center gap10"
                            >
                              <span class="list_icon">
                                
                              </span>
                              <span class="menu_items_t">Banner</span>
                            </a>
                          </li>
                          <li class="menu_list_items mb20 @if(Request::is('admin/event') || Request::is('admin/event/edit/*') || Request::is('admin/event/create')) active_menu @endif">
                            <a
                              href="{{url('admin/event')}}"
                              class="d-flex align-items-center gap10"
                            >
                              <span class="list_icon">
                                
                              </span>
                              <span class="menu_items_t">Events</span>
                            </a>
                          </li>          
                        
                        </ul>
                    </li> 
                    @endcan
                    <li class="menu_list_items mb20 have-child @if(Request::is('admin/progeny/banner') || Request::is('admin/progeny-information') )  clicked_sub @endif ">
                      <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                          <i class="fas fa-heart"></i>
                        </span>
                        <span class="menu_items_t">Progeny</span>
                      </a>
                      <ul class="menu_list_ul_sub list-none"@if(Request::is('admin/progeny/banner') || Request::is('admin/progeny-information') ) style="display: block;@endif">
                        <li class="menu_list_items mb20 @if(Request::is('admin/progeny/banner')) active_menu @endif">
                          <a
                            href="{{url('admin/progeny/banner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Banner</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/progeny-information')) active_menu @endif">
                          <a
                            href="{{url('admin/progeny-information')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Progeny Information</span>
                          </a>
                        </li>                 
                      </ul>
                    </li>
                    <li class="menu_list_items mb20 have-child @if(Request::is('admin/about-us/banner') || Request::is('admin/what-we-do') || Request::is('admin/our-team') || Request::is('admin/our-team') || Request::is('admin/our-brain-and-thinker') || Request::is('admin/our-team/create') ||  Request::is('admin/our-team/edit/*')) clicked_sub @endif"">
                      <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                            <i class="fa-solid fa-address-card"></i>
                        </span>
                        <span class="menu_items_t">About Us</span>
                      </a>
                      <ul class="menu_list_ul_sub list-none" @if(Request::is('admin/about-us/banner') || Request::is('admin/what-we-do') || Request::is('admin/our-team') || Request::is('admin/our-brain-and-thinker') || Request::is('admin/our-team/create') ||  Request::is('admin/our-team/edit/*') || Request::is('admin/our-brain-and-thinker/create') ||  Request::is('admin/our-brain-and-thinker/edit/*')) style="display: block;@endif">
                        <li class="menu_list_items mb20 @if(Request::is('admin/about-us/banner')) active_menu @endif">
                          <a
                            href="{{url('admin/about-us/banner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Banner</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/what-we-do')) active_menu @endif">
                          <a
                            href="{{url('admin/what-we-do')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                              
                            </span>
                            <span class="menu_items_t">What We Do</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/our-team') || Request::is('admin/our-team/create') ||  Request::is('admin/our-team/edit/*') ) active_menu @endif">
                          <a
                            href="{{url('admin/our-team')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Our Team</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/our-brain-and-thinker') || Request::is('admin/our-brain-and-thinker/create') ||  Request::is('admin/our-brain-and-thinker/edit/*')) active_menu @endif">
                          <a
                            href="{{url('admin/our-brain-and-thinker')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Our Brain & Thinker</span>
                          </a>
                        </li>
                      </ul>
                    </li>            
                    <li class="menu_list_items mb20 have-child @if(Request::is('admin/contact-us/banner') || Request::is('admin/contact-us/details') ) clicked_sub @endif ">
                      <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                           <i class="fa-regular fa-address-card"></i>
                        </span>
                        <span class="menu_items_t">Contact Us</span>
                      </a>
                      <ul class="menu_list_ul_sub list-none"@if(Request::is('admin/contact-us/banner') || Request::is('admin/contact-us/details') ) style="display: block;@endif">
                        <li class="menu_list_items mb20 @if(Request::is('admin/contact-us/banner')) active_menu @endif">
                          <a
                            href="{{url('admin/contact-us/banner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Banner</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/contact-us/details')) active_menu @endif">
                          <a
                            href="{{url('admin/contact-us/details')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Contact Details</span>
                          </a>
                        </li>          
                      
                      </ul>
                    </li>        
                    @can('Advertisement')
                    <li class="menu_list_items mb20  @if(Request::is('admin/advertisement')) active_menu @endif">
                      <a href="{{ url('admin/advertisement') }}" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                          <i class="fas fa-play-circle"></i>
                        </span>
                        <span class="menu_items_t">Advertisement</span>
                      </a>
                    </li>
                  @endcan   
                  
                 @can('Photographer')

                 <li class="menu_list_items mb20 have-child @if(Request::is('admin/photographer/banner') || Request::is('admin/photographer') || Request::is('admin/photographer/edit/*') ) clicked_sub @endif ">
                      <a href="javascript:void(0);" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                         <i class="fas fa-sliders-h"></i>
                        </span>
                        <span class="menu_items_t">Photographer</span>
                      </a>
                      <ul class="menu_list_ul_sub list-none"@if(Request::is('admin/photographer/banner') || Request::is('admin/photographer') || Request::is('admin/photographer/edit/*') ) style="display: block;@endif">
                        <li class="menu_list_items mb20 @if(Request::is('admin/photographer/banner')) active_menu @endif">
                          <a
                            href="{{url('admin/photographer/banner')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Banner</span>
                          </a>
                        </li>
                        <li class="menu_list_items mb20 @if(Request::is('admin/photographer') ||  Request::is('admin/photographer/edit/*')) active_menu @endif">
                          <a
                            href="{{url('admin/photographer')}}"
                            class="d-flex align-items-center gap10"
                          >
                            <span class="list_icon">
                             
                            </span>
                            <span class="menu_items_t">Photographers</span>
                          </a>
                        </li>          
                      
                      </ul>
                </li> 
                @endcan
                @can('Badge')
                    <li class="menu_list_items mb20  @if(Request::is('admin/badge')) active_menu @endif">
                      <a href="{{ url('admin/badge') }}" class="d-flex align-items-center gap10">
                        <span class="list_icon">
                          <i class="fas fa-play-circle"></i>
                        </span>
                        <span class="menu_items_t">Badge</span>
                      </a>
                    </li>
                  @endcan  
                  </ul>
                </li>
                @endcan 
                @can('All Animals')
                <li class="menu_list_items mb20 have-child @if(Request::is('admin/stallions') || Request::is('admin/mares') ) clicked_sub @endif ">
                  <a
                    href="javascript:void(0);"
                    class="d-flex align-items-center gap10"
                  >
                    <span class="list_icon">
                      <i class="fas fa-heart"></i>
                    </span>
                    <span class="menu_items_t">All Animals</span>
                  </a>
                  <ul class="menu_list_ul_sub" @if(Request::is('admin/stallions') || Request::is('admin/mares') ) style="display: block;@endif">
                    @can('All Stallions')
                    <li class="menu_list_items mb20 collaose_menu  @if(Request::is('admin/stallions')) active_menu @endif">
                      <a
                        href="{{url('admin/stallions')}}"
                        class="d-flex align-items-center gap10"
                      > <span class="list_icon">
                          
                        </span>
                        <span class="menu_items_t">All Stallions</span>
                      </a>
                    </li>
                    @endcan 
                    @can('All Mares')
                    <li class="menu_list_items mb20 collaose_menu @if(Request::is('admin/mares')) active_menu @endif">
                      <a
                        href="{{url('admin/mares')}}"
                        class="d-flex align-items-center gap10"
                      > 
                      <span class="list_icon">
                          
                        </span> 
                        <span class="menu_items_t">All Mares</span>
                      </a>
                    </li> 
                    @endcan                
                  </ul>
                </li> 
                @endcan  
                @can('Plan')
                <li class="menu_list_items mb20 collaose_menu @if(Request::is('admin/plan') || Request::is('admin/plan/create') || Request::is('admin/plan/edit/*') )   active_menu @endif">
                  <a href="{{ url('admin/plan') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Plans</span>
                  </a>
                </li>  
                @endcan             
                @can('view role')
                <li class="menu_list_items mb20 collaose_menu @if(Request::is('roles') || Request::is('roles/create') || Request::is('roles/*/edit') ) active_menu @endif">
                  <a href="{{ url('roles') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Roles</span>
                  </a>
                </li>
                @endcan
                @can('view permission')
                <li class="menu_list_items mb20 collaose_menu @if(Request::is('permissions') || Request::is('permissions/create')  || Request::is('permissions/*/edit') ) active_menu @endif">
                  <a href="{{ url('permissions') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                     <i class="fa-solid fa-lock"></i>
                    </span>
                    <span class="menu_items_t">Permissions</span>
                  </a>
                </li>
                @endcan
                @can('view user')
                <li class="menu_list_items mb20 collaose_menu @if(Request::is('users') || Request::is('users/create') || Request::is('users/*/edit') ) active_menu @endif">
                  <a href="{{ url('users') }}" class="d-flex align-items-center gap10">
                    <span class="list_icon">
                      <i class="fas fa-play-circle"></i>
                    </span>
                    <span class="menu_items_t">Users</span>
                  </a>
                </li>
                @endcan          
                <li class="menu_list_items mb20 logout_item @if(Request::is('admin/photographer') ) active_menu @endif">
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