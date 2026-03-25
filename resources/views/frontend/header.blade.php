<!--  Header Area Start -->
<header class="header-area">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-5">
                <!-- Logo  -->
                <div class="logo">
                    <a href="#">
                        <img class="logo-img" src="{{ asset('frontend/assets/image/new-logo.png') }}" alt="ClassKira">
                    </a>
                </div>
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
                <a class="small-device-show" href="#">
                    <img class="logo-img" src="{{ asset('frontend/assets/image/new-logo.png') }}" alt="ClassKira">
                </a>
                <span class="crose-icon"><i class="fa-solid fa-xmark"></i></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-7 d-flex justify-content-end align-items-center">
                <!-- Button Area -->
                <div class="header-btn d-flex align-items-center">
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
                        <a class="btn-primary me-2" href="{{ $dashboard }}">{{ get_phrase($panel) }}</a>
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
                        <a class="signUp-btn me-2" href="{{ route('login') }}" target="_blank">{{ get_phrase('Sign In') }}</a>
                        <button type="button" onclick="openRegisterModal()" class="btn-primary">{{ get_phrase('Register School') }}</button>
                    @endif
                    <span class="hambargar-bar ms-3" style="font-size:24px; color:#0F172A;"><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!--  Header Area End   -->