@extends('layouts.signin_page')

@section('content')
<link rel="stylesheet" href="{{ asset('css/classkira-redesign.css') }}">
<style>
/* Role selector fix — 2-row wrap layout */
.ck-role-tabs {
  display: flex !important;
  flex-wrap: wrap !important;
  gap: 8px !important;
  justify-content: flex-start !important;
  overflow: visible !important;
  padding-bottom: 20px;
}

.ck-role-tab {
  flex: 1 1 calc(25% - 8px) !important; /* 4 per row on desktop */
  min-width: 100px !important;
  text-align: center !important;
  padding: 8px 12px !important;
  font-size: 13px !important;
  font-weight: 700 !important;
  border-radius: 8px !important;
  border: 1.5px solid var(--border) !important;
  background: var(--bg) !important;
  cursor: pointer !important;
  transition: all 0.2s !important;
  white-space: nowrap !important;
}

.ck-role-tab.active {
  background: var(--teal) !important;
  color: #fff !important;
  border-color: var(--teal) !important;
}

.ck-role-tab:hover:not(.active) {
  border-color: var(--teal) !important;
  color: var(--teal) !important;
}

@media (max-width: 480px) {
  .ck-role-tab {
    flex: 1 1 calc(50% - 8px) !important; /* 2 per row on mobile */
  }
}
</style>

<div class="ck-login">
  <!-- LEFT BRAND PANEL -->
  <div class="ck-login-brand">
    <div class="ck-login-brand-shape1"></div>
    <div class="ck-login-brand-shape2"></div>
    <!-- Logo 56px -->
    <div class="ck-logo-hero" style="font-family:'Nunito',sans-serif;font-weight:900;font-size:56px;letter-spacing:-1.5px;line-height:1;display:inline-flex;align-items:center;position:relative;z-index:1;">
      <span style="color:#0DA896">c</span><span style="color:#D44F7E">l</span><span style="color:#E8921A">a</span><span style="color:#2079CF">s</span><span style="color:#0DA896">s</span><span style="color:#D44F7E">k</span><span style="color:#E8921A;position:relative;">i<span style="display:block;width:8px;height:8px;background:#0DA896;border-radius:50%;position:absolute;top:7px;left:50%;transform:translateX(-50%);"></span></span><span style="color:#2079CF">r</span><span style="color:#0DA896">a</span>
    </div>
    <div class="ck-login-tagline">Every School. One System.</div>
    <div class="ck-login-trust">
      <div class="ck-login-trust-item">
        <svg fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
        8 role-based dashboards
      </div>
      <div class="ck-login-trust-item">
        <svg fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
        GKE-powered, 99.9% uptime
      </div>
      <div class="ck-login-trust-item">
        <svg fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
        Razorpay, Stripe & Paytm built-in
      </div>
    </div>
  </div>

  <!-- RIGHT LOGIN FORM PANEL -->
  <div class="ck-login-form">
    <div class="ck-login-form-inner">
      <!-- Mobile logo -->
      <div class="d-lg-none" style="text-align:center;margin-bottom:32px;">
        <div style="font-family:'Nunito',sans-serif;font-weight:900;font-size:32px;letter-spacing:-1px;display:inline-flex;align-items:center;">
          <span style="color:#0DA896">c</span><span style="color:#D44F7E">l</span><span style="color:#E8921A">a</span><span style="color:#2079CF">s</span><span style="color:#0DA896">s</span><span style="color:#D44F7E">k</span><span style="color:#E8921A;position:relative;">i<span style="display:block;width:5px;height:5px;background:#0DA896;border-radius:50%;position:absolute;top:4px;left:50%;transform:translateX(-50%);"></span></span><span style="color:#2079CF">r</span><span style="color:#0DA896">a</span>
        </div>
      </div>

      <h2>{{ get_phrase('Welcome back') }}</h2>
      <p class="ck-subtitle">{{ get_phrase('Sign in to your ClassKira dashboard') }}</p>

      <!-- Role selector (visual only) -->
      <div class="ck-role-tabs">
        <span class="ck-role-tab active">Super Admin</span>
        <span class="ck-role-tab">Admin</span>
        <span class="ck-role-tab">Teacher</span>
        <span class="ck-role-tab">Student</span>
        <span class="ck-role-tab">Parent</span>
        <span class="ck-role-tab">Librarian</span>
        <span class="ck-role-tab">Accountant</span>
        <span class="ck-role-tab">Warden</span>
      </div>

      <form method="POST" action="{{ route('login') }}" id="ckLoginForm">
        @csrf

        <!-- Email -->
        <div class="ck-input-wrap">
          <svg class="ck-input-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 7L2 7"/></svg>
          <input type="email" name="email" id="email" class="ck-input" placeholder="{{ get_phrase('Enter your email') }}" value="{{ old('email') }}" required autofocus>
        </div>
        @if($errors->has('email'))
          <div class="ck-error" style="margin-top:-14px;margin-bottom:14px">{{ $errors->first('email') }}</div>
        @endif

        <!-- Password -->
        <div class="ck-input-wrap">
          <svg class="ck-input-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          <input type="password" name="password" id="password" class="ck-input" placeholder="{{ get_phrase('Enter your password') }}" required>
          <button type="button" class="ck-password-toggle" id="ckPwdToggle" aria-label="Toggle password visibility">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        @if($errors->has('password'))
          <div class="ck-error" style="margin-top:-14px;margin-bottom:14px">{{ $errors->first('password') }}</div>
        @endif

        <!-- Remember / Forgot -->
        <div class="ck-form-row">
          <label class="ck-checkbox">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ get_phrase('Remember me') }}
          </label>
          <a href="{{ route('password.request') }}" class="ck-forgot" target="_blank">{{ get_phrase('Forgot password?') }}</a>
        </div>

        <!-- Submit -->
        <button type="submit" class="ck-submit">
          <span class="ck-submit-text">{{ get_phrase('Sign In') }} →</span>
          <span class="ck-spinner"></span>
        </button>
      </form>

      <div class="ck-login-footer">
        New school? <a href="#" onclick="openRegisterModal(); event.preventDefault();">Register here →</a>
      </div>

      <div style="text-align:center;margin-top:16px;">
        <a href="{{ get_settings('help_link') }}" target="_blank" style="font-size:13px;font-weight:600;color:var(--muted);">
          Need help?
        </a>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/classkira-ui.js') }}"></script>
@endsection
