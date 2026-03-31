@php
  $metaTitle = 'ClassKira — Every School. One System.';
  $metaDescription = 'ClassKira is India\'s most complete School Management System. Manage students, fees, attendance, exams, library & hostel — 8 role dashboards, GKE-powered, 99.9% uptime.';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <x-meta-tags 
        :title="$metaTitle ?? 'ClassKira — Every School. One System.'"
        :description="$metaDescription ?? 'ClassKira is a complete School Management System for modern Indian schools. Manage students, fees, attendance, exams, library and hostel from one powerful platform.'"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classkira-redesign.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    @stack('styles')
</head>
<body>

<!-- ========== STICKY NAVBAR ========== -->
<nav class="ck-nav" id="ckNav">
  <div class="ck-nav-inner">
    <a href="/" class="ck-logo" style="font-family:'Nunito',sans-serif;font-weight:900;font-size:24px;letter-spacing:-0.5px;text-decoration:none;display:inline-flex;align-items:center;">
      <span style="color:#0DA896">c</span><span style="color:#D44F7E">l</span><span style="color:#E8921A">a</span><span style="color:#2079CF">s</span><span style="color:#0DA896">s</span><span style="color:#D44F7E">k</span><span style="color:#E8921A;position:relative;">i<span style="display:block;width:4px;height:4px;background:#0DA896;border-radius:50%;position:absolute;top:3px;left:50%;transform:translateX(-50%);"></span></span><span style="color:#2079CF">r</span><span style="color:#0DA896">a</span>
    </a>
    <div class="ck-nav-links">
      <a href="#features">Features</a>
      <a href="#pricing">Pricing</a>
      <a href="#roles">Schools</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="ck-nav-actions">
      @php
        if(isset(auth()->user()->id) && auth()->user()->id != "") {
          if (auth()->user()->role_id=='1') { $panel='Superadmin'; $dashboard=route('superadmin.dashboard'); }
          elseif(auth()->user()->role_id=='2'){ $panel='Administrator'; $dashboard=route('admin.dashboard'); }
          elseif(auth()->user()->role_id=='3'){ $panel='Teacher'; $dashboard=route('teacher.dashboard'); }
          elseif(auth()->user()->role_id=='4'){ $panel='Accountant'; $dashboard=route('accountant.dashboard'); }
          elseif(auth()->user()->role_id=='5'){ $panel='Librarian'; $dashboard=route('librarian.dashboard'); }
          elseif(auth()->user()->role_id=='6'){ $panel='Parent'; $dashboard=route('parent.dashboard'); }
          elseif(auth()->user()->role_id=='7'){ $panel='Student'; $dashboard=route('student.dashboard'); }
          elseif(auth()->user()->role_id=='8'){ $panel='Driver'; $dashboard=route('driver.dashboard'); }
          elseif(auth()->user()->role_id=='9'){ $panel='Alumni'; $dashboard=route('alumni.dashboard'); }
        }
      @endphp
      @if(isset(auth()->user()->id) && auth()->user()->id != "")
        <a href="{{ $dashboard }}" class="ck-btn ck-btn-primary ck-btn-pill">{{ get_phrase($panel) }}</a>
      @else
        <a href="{{ route('login') }}" class="ck-btn ck-btn-ghost ck-btn-pill">Login</a>
        <button type="button" onclick="openRegisterModal()" class="ck-btn ck-btn-primary ck-btn-pill">Register Your School</button>
      @endif
      <button class="ck-hamburger" id="ckHamburger" aria-label="Menu">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
  <!-- Mobile menu -->
  <div class="ck-mobile-menu" id="ckMobileMenu">
    <a href="#features">Features</a>
    <a href="#pricing">Pricing</a>
    <a href="#roles">Schools</a>
    <a href="#contact">Contact</a>
    @if(isset(auth()->user()->id) && auth()->user()->id != "")
      <a href="{{ $dashboard }}">{{ get_phrase($panel) }}</a>
    @else
      <a href="{{ route('login') }}">Login</a>
      <button type="button" onclick="openRegisterModal()" style="text-align:left; color:var(--teal); font-weight:700;">Register Your School</button>
    @endif
  </div>
</nav>

<!-- ========== HERO SECTION ========== -->
<section class="ck-hero">
  <div class="ck-hero-inner">
    <div>
      <span class="ck-hero-pill ck-reveal">🎓 Trusted by 200+ schools across India</span>
      <h1 class="ck-reveal">Every School.<br><span class="ck-accent">One System.</span></h1>
      <p class="ck-hero-sub ck-reveal">ClassKira brings admissions, academics, finance, attendance, and communication into one powerful platform — built for Indian schools.</p>
      <div class="ck-hero-ctas ck-reveal">
        @if(isset(auth()->user()->id) && auth()->user()->id != "")
          <a href="{{ $dashboard }}" class="ck-btn ck-btn-primary ck-btn-lg ck-btn-pill">Access Dashboard →</a>
        @else
          <button type="button" onclick="openRegisterModal()" class="ck-btn ck-btn-primary ck-btn-lg ck-btn-pill">Register Your School →</button>
          <a href="#features" class="ck-btn ck-btn-ghost ck-btn-lg ck-btn-pill">See a Demo</a>
        @endif
      </div>
      <div class="ck-trust-row ck-reveal">
        <div class="ck-trust-avatars">
          <span style="background:var(--teal)">A</span>
          <span style="background:var(--pink)">R</span>
          <span style="background:var(--amber)">S</span>
          <span style="background:var(--blue)">P</span>
        </div>
        Join 5,000+ students already learning smarter
      </div>
    </div>
    <!-- Dashboard Mockup Card -->
    <div class="ck-mockup ck-reveal">
      <div class="ck-mockup-header">
        <span style="font-weight:800;font-size:16px;color:var(--text)">Dashboard</span>
        <span style="font-size:12px;color:var(--muted);font-weight:600">Today</span>
      </div>
      <div class="ck-mockup-stat">
        <div class="ck-mockup-stat-icon">👨‍🎓</div>
        <div>
          <div class="ck-mockup-stat-num">1,247</div>
          <div class="ck-mockup-stat-label">Total Students</div>
        </div>
      </div>
      <div class="ck-mockup-ring">
        <svg class="ck-ring-svg" viewBox="0 0 56 56">
          <circle class="ck-ring-bg" cx="28" cy="28" r="26"/>
          <circle class="ck-ring-fg" cx="28" cy="28" r="26"/>
        </svg>
        <div>
          <div style="font-size:20px;font-weight:900;color:var(--text)">84%</div>
          <div style="font-size:12px;font-weight:600;color:var(--muted)">Attendance Today</div>
        </div>
      </div>
      <div class="ck-mockup-notif">
        <span class="ck-mockup-notif-dot"></span>
        <span class="ck-mockup-notif-text">Fee reminder sent</span>
        <span class="ck-mockup-notif-time">2m ago</span>
      </div>
    </div>
  </div>
</section>

<!-- ========== STATS BAR ========== -->
<section class="ck-stats">
  <div class="ck-stats-inner">
    <div class="ck-stat-divider ck-reveal"><div class="ck-stat-num">200+</div><div class="ck-stat-label">Schools Managed</div></div>
    <div class="ck-stat-divider ck-reveal"><div class="ck-stat-num">50,000+</div><div class="ck-stat-label">Students Enrolled</div></div>
    <div class="ck-stat-divider ck-reveal"><div class="ck-stat-num">8</div><div class="ck-stat-label">User Roles</div></div>
    <div class="ck-stat-divider ck-reveal"><div class="ck-stat-num">99.9%</div><div class="ck-stat-label">Uptime SLA</div></div>
  </div>
</section>

<!-- ========== FEATURES ========== -->
<section class="ck-features ck-section" id="features">
  <div class="ck-section-header ck-reveal">
    <h2>Everything a school needs. Nothing it doesn't.</h2>
    <p>8 specialized dashboards, one unified platform.</p>
  </div>
  <div class="ck-features-grid">
    <!-- 1 Academic -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-teal">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 3 3 6 3s6-1 6-3v-5"/></svg>
      </div>
      <h3>Academic Management</h3>
      <p>Curriculum planning, timetables, exams, and report cards unified in one system.</p>
    </div>
    <!-- 2 Finance -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-pink">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v12M8 10h8M9 14h6"/></svg>
      </div>
      <h3>Finance & Fees</h3>
      <p>Automate fee collection with Razorpay, Stripe & Paytm gateways built right in.</p>
    </div>
    <!-- 3 Student -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-amber">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </div>
      <h3>Student Information</h3>
      <p>Complete student profiles, admissions, transfers, and document management.</p>
    </div>
    <!-- 4 Library -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-blue">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
      </div>
      <h3>Library System</h3>
      <p>Catalog books, manage issues and returns, and track overdue items effortlessly.</p>
    </div>
    <!-- 5 Hostel -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-teal">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 21h18M3 7v14M21 7v14M6 21V10M18 21V10M9 21v-4h6v4"/><path d="M3 7l9-4 9 4"/></svg>
      </div>
      <h3>Hostel Management</h3>
      <p>Room allocation, mess billing, hostel attendance and complaint tracking.</p>
    </div>
    <!-- 6 Communication -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-pink">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
      </div>
      <h3>Communication Hub</h3>
      <p>Notices, circular distribution, parent-teacher messaging, all in one place.</p>
    </div>
    <!-- 7 Attendance -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-amber">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M9 16l2 2 4-4"/></svg>
      </div>
      <h3>Attendance Tracking</h3>
      <p>Digital attendance with biometric support, leave requests, and reports.</p>
    </div>
    <!-- 8 CMS -->
    <div class="ck-feature-card ck-reveal">
      <div class="ck-feature-icon ck-icon-blue">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
      </div>
      <h3>CMS & Website</h3>
      <p>Build and manage your school website with a drag-and-drop CMS included.</p>
    </div>
  </div>
</section>

<!-- ========== USER ROLES ========== -->
<section class="ck-roles ck-section" id="roles">
  <div class="ck-section-header ck-reveal">
    <h2>Built for every person in your school</h2>
  </div>
  <div class="ck-roles-pills ck-reveal">
    <span class="ck-role-pill rp-teal">Super Admin</span>
    <span class="ck-role-pill rp-pink">Admin</span>
    <span class="ck-role-pill rp-amber">Teacher</span>
    <span class="ck-role-pill rp-blue">Student</span>
    <span class="ck-role-pill rp-teal">Parent</span>
    <span class="ck-role-pill rp-pink">Librarian</span>
    <span class="ck-role-pill rp-amber">Accountant</span>
    <span class="ck-role-pill rp-blue">Warden</span>
  </div>
  <p class="ck-roles-sub ck-reveal">Every role gets their own dashboard, their own tools, their own experience.</p>
</section>

<!-- ========== TECH TRUST ========== -->
<section class="ck-tech ck-section" id="tech">
  <div class="ck-section-header ck-reveal">
    <h2>Enterprise-grade infrastructure. School-friendly UX.</h2>
  </div>
  <div class="ck-tech-grid">
    <div class="ck-tech-card ck-reveal">
      <h3>GCP + Kubernetes</h3>
      <p>Deployed on Google Cloud with zero-downtime rolling updates.</p>
    </div>
    <div class="ck-tech-card ck-reveal">
      <h3>Razorpay, Stripe & Paytm</h3>
      <p>Multi-gateway fee collection built right in.</p>
    </div>
    <div class="ck-tech-card ck-reveal">
      <h3>Firebase + RBAC</h3>
      <p>JWT authentication with role-based access control.</p>
    </div>
  </div>
</section>

<!-- ========== CTA BAND ========== -->
<section class="ck-cta-band" id="contact">
  <div class="ck-container" style="text-align:center;">
    <h2 class="ck-reveal">Ready to modernize your school?</h2>
    <p class="ck-reveal">Join hundreds of schools already running smarter with ClassKira.</p>
    @if(isset(auth()->user()->id) && auth()->user()->id != "")
      <a href="{{ $dashboard }}" class="ck-btn ck-btn-white ck-btn-lg ck-btn-pill ck-reveal">Access Dashboard</a>
    @else
      <button type="button" onclick="openRegisterModal()" class="ck-btn ck-btn-white ck-btn-lg ck-btn-pill ck-reveal">Register Your School</button>
    @endif
  </div>
</section>

<!-- ========== FOOTER ========== -->
<footer class="ck-footer">
  <div class="ck-footer-inner">
    <div class="ck-footer-brand">
      <a href="/" style="font-family:'Nunito',sans-serif;font-weight:900;font-size:24px;letter-spacing:-0.5px;text-decoration:none;display:inline-flex;align-items:center;">
        <span style="color:rgba(255,255,255,.7)">c</span><span style="color:rgba(255,255,255,.5)">l</span><span style="color:rgba(255,255,255,.7)">a</span><span style="color:rgba(255,255,255,.5)">s</span><span style="color:rgba(255,255,255,.7)">s</span><span style="color:rgba(255,255,255,.5)">k</span><span style="color:rgba(255,255,255,.7)">i</span><span style="color:rgba(255,255,255,.5)">r</span><span style="color:rgba(255,255,255,.7)">a</span>
      </a>
      <p>Powering Schools. Shaping Futures.</p>
    </div>
    <div class="ck-footer-col">
      <h4>Product</h4>
      <a href="#features">Features</a>
      <a href="#pricing">Pricing</a>
      <a href="#roles">Roles</a>
      <a href="#tech">Infrastructure</a>
    </div>
    <div class="ck-footer-col">
      <h4>Company</h4>
      <a href="#">About Us</a>
      <a href="#">Careers</a>
      <a href="#">Blog</a>
    </div>
    <div class="ck-footer-col">
      <h4>Support</h4>
      <a href="mailto:{{ get_settings('contact_email') }}">Contact</a>
      <a href="#">Documentation</a>
      <a href="#">Help Center</a>
    </div>
  </div>
  <div class="ck-footer-bottom">
    <p>© 2026 ClassKira — Pixalara LLP</p>
    <div class="ck-footer-social">
      <a href="{{ get_settings('facebook_link') }}" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="{{ get_settings('twitter_link') }}" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
      <a href="{{ get_settings('linkedin_link') }}" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
      <a href="{{ get_settings('instagram_link') }}" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
    </div>
  </div>
</footer>

<!-- Include Registration Modal -->
@include('components.register-modal')

<!-- Scripts -->
<script src="{{ asset('frontend/assets/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/classkira-ui.js') }}"></script>
@include('external_plugin')
<script>
"use strict";
@if(Session::has('message'))
toastr.options={"closeButton":true,"progressBar":true};toastr.success("{{ session('message') }}");
@endif
@if(Session::has('error'))
toastr.options={"closeButton":true,"progressBar":true};toastr.error("{{ session('error') }}");
@endif
</script>

</body>
</html>
