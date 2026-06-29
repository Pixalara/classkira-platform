<header class="header-area navbar">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-5 logo ck-logo">
                <!-- Logo  -->
                <a href="{{ url('/') }}">
                    <img class="logo-img" src="{{ asset('frontend/assets/image/new-logo.png') }}" alt="ClassKira">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 menu-items">
                <!-- Menu -->
                <nav class="header-menu">
                    <ul class="primary-menu d-flex justify-content-center m-0 p-0">
                        <li class="nav-item"><a class="nav-link" href="#">{{ get_phrase('Home') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#feature">{{ get_phrase('Feature') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#price">{{ get_phrase('Price') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq">{{ get_phrase('Faq') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">{{ get_phrase('Contact') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-7 d-flex justify-content-end align-items-center">
                <!-- Button Area -->
                <div class="header-btn navbar-actions d-flex align-items-center nav-actions">
                    @php
                    if(isset(auth()->user()->id) && auth()->user()->id != "") {
                        if (auth()->user()->role_id =='1') { $panel = 'Superadmin'; $dashboard = route('superadmin.dashboard'); $user_profile = route('superadmin.profile'); }
                        elseif(auth()->user()->role_id =='2'){ $panel = 'Administrator'; $dashboard = route('admin.dashboard'); $user_profile = route('admin.profile'); }
                        elseif(auth()->user()->role_id =='3'){ $panel = 'Teacher'; $dashboard = route('teacher.dashboard'); $user_profile = route('teacher.profile'); }
                        elseif(auth()->user()->role_id =='4'){ $panel = 'Accountant'; $dashboard = route('accountant.dashboard'); $user_profile = route('accountant.profile'); }
                        elseif(auth()->user()->role_id =='5'){ $panel = 'Librarian'; $dashboard = route('librarian.dashboard'); $user_profile = route('librarian.profile'); }
                        elseif(auth()->user()->role_id =='6'){ $panel = 'Parent'; $dashboard = route('parent.dashboard'); $user_profile = route('parent.profile'); }
                        elseif(auth()->user()->role_id =='7'){ $panel = 'Student'; $dashboard = route('student.dashboard'); $user_profile = route('student.profile'); }
                        elseif (auth()->user()->role_id == '8') { $panel = 'Driver'; $dashboard = route('driver.dashboard'); $user_profile = route('driver.profile'); }
                        elseif(auth()->user()->role_id =='9'){ $panel = 'Alumni'; $dashboard = route('alumni.dashboard'); $user_profile = route('alumni.profile'); }
                    }
                    @endphp
                    @if(isset(auth()->user()->id) && auth()->user()->id != "")
                        <a class="btn-primary me-2 nav-register-btn" href="{{ $dashboard }}">{{ get_phrase($panel) }}</a>
                        <!-- User Profile Start -->
                        <div class="user-profile ms-2">
                            <button class="us-btn dropdown-toggle border-0 custom-dropdown" style="background:#F8FAFC; border-radius:50%; width:44px; height:44px; display:flex; align-items:center; justify-content:center;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <img src="{{ get_user_image(auth()->user()->id) }}" style="width:100%; height:100%; border-radius:50%; object-fit:cover;" alt="user">
                           </button>
                           <ul class="dropdown-menu dropmenu-end border-0 shadow-lg" style="border-radius:12px; padding:12px;">
                               <li><a class="dropdown-item" href="{{ $user_profile }}" style="padding:10px; border-radius:6px; font-weight:600;"><i class="fa-solid fa-user me-2"></i> {{ get_phrase('Profile') }}</a></li>
                               <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="padding:10px; border-radius:6px; font-weight:600;"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>  {{ get_phrase('Log out') }}</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                 </li>
                           </ul>
                         </div>
                    @else
                        <a class="signUp-btn nav-signin me-2" href="{{ route('login') }}" target="_blank">{{ get_phrase('Sign In') }}</a>
                        <button type="button" onclick="openRegisterModal()" class="btn-primary nav-register-btn register-btn">{{ get_phrase('Register School') }}</button>
                    @endif
                    <button
                      type="button"
                      class="hamburger ms-3"
                      id="mobileMenuToggle"
                      aria-label="Toggle navigation"
                      onclick="
                        var menu = document.getElementById('mobileMenu');
                        var btn = this;
                        if (menu.style.display === 'flex') {
                          menu.style.display = 'none';
                          btn.classList.remove('is-open');
                        } else {
                          menu.style.display = 'flex';
                          btn.classList.add('is-open');
                        }
                      "
                      style="
                        display:flex;
                        flex-direction:column;
                        align-items:center;
                        justify-content:center;
                        gap:5px;
                        width:40px;
                        height:40px;
                        background:transparent;
                        border:1.5px solid rgba(0,0,0,0.15);
                        border-radius:8px;
                        cursor:pointer;
                        padding:0;
                        outline:none !important;
                      ">
                      <span style="display:block;width:16px;height:2px;background:#1A1A18;border-radius:2px;transition:transform 0.25s"></span>
                      <span style="display:block;width:16px;height:2px;background:#1A1A18;border-radius:2px;transition:opacity 0.2s"></span>
                      <span style="display:block;width:16px;height:2px;background:#1A1A18;border-radius:2px;transition:transform 0.25s"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<div
  id="mobileMenu"
  style="
    display:none;
    position:fixed;
    top:64px;
    left:0;
    right:0;
    background:#ffffff;
    border-top:1px solid rgba(0,0,0,0.08);
    padding:12px 16px 24px;
    box-shadow:0 8px 32px rgba(0,0,0,0.1);
    flex-direction:column;
    gap:2px;
    z-index:9998;
  ">
  <a href="{{ url('/') }}"
    style="display:block;padding:12px 14px;font-size:15px;font-weight:700;color:#1A1A18;border-radius:10px;text-decoration:none;"
    onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
    Home
  </a>
  <a href="{{ url('/#feature') }}"
    style="display:block;padding:12px 14px;font-size:15px;font-weight:700;color:#1A1A18;border-radius:10px;text-decoration:none;"
    onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
    Features
  </a>
  <a href="{{ url('/#price') }}"
    style="display:block;padding:12px 14px;font-size:15px;font-weight:700;color:#1A1A18;border-radius:10px;text-decoration:none;"
    onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
    Price
  </a>
  <a href="{{ url('/#faq') }}"
    style="display:block;padding:12px 14px;font-size:15px;font-weight:700;color:#1A1A18;border-radius:10px;text-decoration:none;"
    onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
    FAQ
  </a>
  <a href="{{ url('/#contact') }}"
    style="display:block;padding:12px 14px;font-size:15px;font-weight:700;color:#1A1A18;border-radius:10px;text-decoration:none;"
    onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
    Contact
  </a>
  <div style="height:1px;background:rgba(0,0,0,0.08);margin:10px 0;"></div>
  @if(isset(auth()->user()->id) && auth()->user()->id != "")
    <a href="{{ $dashboard }}"
      style="display:block;width:100%;padding:13px;background:transparent;color:#0DA896;font-size:15px;font-weight:800;border-radius:12px;text-align:center;border:1.5px solid #0DA896;text-decoration:none;box-sizing:border-box;margin-top:4px;"
      onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
      Dashboard
    </a>
  @else
    <a href="{{ route('login') }}"
      style="display:block;width:100%;padding:13px;background:transparent;color:#0DA896;font-size:15px;font-weight:800;border-radius:12px;text-align:center;border:1.5px solid #0DA896;text-decoration:none;box-sizing:border-box;margin-top:4px;"
      onclick="document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');">
      Sign In
    </a>
    <button
      onclick="openRegisterModal(); document.getElementById('mobileMenu').style.display='none'; document.getElementById('mobileMenuToggle').classList.remove('is-open');"
      style="display:block;width:100%;padding:13px;background:#0DA896;color:#ffffff;font-size:15px;font-weight:800;border-radius:12px;text-align:center;border:none;cursor:pointer;margin-top:8px;box-sizing:border-box;">
      Register School
    </button>
  @endif
</div>
<!--  Header Area End   -->
