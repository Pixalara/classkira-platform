# ClassKira — Anti Gravity Prompt
## Frontend Redesign: Public Website + Login Page + School Registration Popup
**Model:** Claude Opus 4.6 | **Scope:** Frontend-only (Blade/CSS/JS — zero backend changes)

---

## YOUR MISSION

You are redesigning the **public-facing website** and **login page** of **ClassKira** — an enterprise School Management System (LMS/ERP) built on Laravel 9 with Blade templates. Your job is to make it look modern, professional, and premium while keeping every single backend, database, route, controller, model, and migration completely untouched.

**You may ONLY touch:**
- Blade template files (`resources/views/`)
- CSS / SCSS files (`public/css/` or `resources/css/`)
- JS files (`public/js/` or `resources/js/`) — UI behaviour only
- Inline `<style>` and `<script>` blocks within Blade files

**You must NEVER touch:**
- Any PHP controller, model, middleware, or helper
- Any route file (`routes/web.php`, `routes/api.php`)
- Any migration, seeder, or database config
- Any `.env` file or config files
- Any backend logic, authentication flow, or session handling
- Any existing form `action=""` attributes, `method=""` attributes, or `name=""` input attributes (these connect to the backend — keep them identical)
- Any `@csrf`, `@auth`, `@guest`, `@foreach`, or other Blade directives (preserve them exactly)

---

## BRAND SYSTEM — IMPLEMENT EXACTLY

### Font
```
Google Font: Nunito
Weights: 400, 600, 700, 800, 900
Import: https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap
```
Use Nunito exclusively. No Inter, no Roboto, no system fonts.

### Color Palette (CSS Variables)
```css
:root {
  --teal:     #0DA896;   /* Primary brand — CTAs, accents, highlights */
  --pink:     #D44F7E;   /* Secondary accent */
  --amber:    #E8921A;   /* Tertiary accent */
  --blue:     #2079CF;   /* Quaternary accent */
  --teal-lt:  #E1F9F6;   /* Teal light surface */
  --pink-lt:  #FCEDF3;   /* Pink light surface */
  --amber-lt: #FEF3E2;   /* Amber light surface */
  --blue-lt:  #E8F1FB;   /* Blue light surface */
  --bg:       #F7F7F5;   /* Page background */
  --card:     #FFFFFF;   /* Card/panel background */
  --dark:     #111110;   /* Dark variant background */
  --text:     #1A1A18;   /* Primary text */
  --muted:    #6B6B65;   /* Secondary/muted text */
  --border:   rgba(0,0,0,0.08); /* Subtle borders */
}
```

### Logo — HTML Implementation
The ClassKira logo is rendered in HTML (not an image). Each letter has a specific color cycling through teal → pink → amber → blue:
```html
<!-- Logo at 24px (navbar) -->
<a href="/" class="ck-logo" style="font-family:'Nunito',sans-serif;font-weight:900;font-size:24px;letter-spacing:-0.5px;text-decoration:none;display:inline-flex;align-items:center;">
  <span style="color:#0DA896">c</span><span style="color:#D44F7E">l</span><span style="color:#E8921A">a</span><span style="color:#2079CF">s</span><span style="color:#0DA896">s</span><span style="color:#D44F7E">k</span><span style="color:#E8921A;position:relative;">i<span style="display:block;width:4px;height:4px;background:#0DA896;border-radius:50%;position:absolute;top:3px;left:50%;transform:translateX(-50%);"></span></span><span style="color:#2079CF">r</span><span style="color:#0DA896">a</span>
</a>

<!-- Logo at 56px (hero section) -->
<div class="ck-logo-hero" style="font-family:'Nunito',sans-serif;font-weight:900;font-size:56px;letter-spacing:-1.5px;line-height:1;display:inline-flex;align-items:center;">
  <span style="color:#0DA896">c</span><span style="color:#D44F7E">l</span><span style="color:#E8921A">a</span><span style="color:#2079CF">s</span><span style="color:#0DA896">s</span><span style="color:#D44F7E">k</span><span style="color:#E8921A;position:relative;">i<span style="display:block;width:8px;height:8px;background:#0DA896;border-radius:50%;position:absolute;top:7px;left:50%;transform:translateX(-50%);"></span></span><span style="color:#2079CF">r</span><span style="color:#0DA896">a</span>
</div>
```

### Tagline (Primary — always use this)
> **Every School. One System.**

### Secondary Taglines (use in body copy)
- "The OS for Modern Education"
- "Where Schools Run Smarter"
- "Powering Schools. Shaping Futures."

---

## PAGE 1: PUBLIC WEBSITE (resources/views/welcome.blade.php or equivalent public landing page)

Design a stunning, modern landing page with these sections in order:

### 1. Sticky Navigation Bar
- Frosted glass effect: `backdrop-filter: blur(16px)` with semi-transparent white background
- Left: ClassKira logo (24px, HTML-rendered, linked to `/`)
- Right nav links: Features · Pricing · Schools · Contact
- Far right: Two buttons — "Login" (ghost/outline, teal border) and "Register Your School" (solid teal fill, rounded pill shape)
- Smooth scroll behavior, shadow appears on scroll via JS
- Mobile: Hamburger menu with slide-down drawer

### 2. Hero Section
- Full-viewport height (`min-height: 100vh`)
- Background: Soft gradient mesh — `linear-gradient(135deg, #F0FDFA 0%, #F7F7F5 45%, #EEF4FF 100%)` with a decorative abstract shape (SVG blob or CSS shape) in teal at low opacity behind the content
- Left column (60%):
  - Small pill badge: "🎓 Trusted by 200+ schools across India" — teal background, white text, small, rounded
  - H1 headline (64px, weight 900): "Every School.<br>One System." — use brand colors on "One System." (teal)
  - Subheadline (20px, weight 600, muted): "ClassKira brings admissions, academics, finance, attendance, and communication into one powerful platform — built for Indian schools."
  - Two CTA buttons: "Register Your School →" (solid teal, large, pill) and "See a Demo" (ghost)
  - Trust row: Small avatars + "Join 5,000+ students already learning smarter"
- Right column (40%): A stylized UI mockup card — show a clean dashboard card preview using CSS/HTML (fake data is fine — show a student count stat card, an attendance ring chart using CSS, and a notification item). Style it with a white card, subtle shadow, brand colors for data points.
- Subtle floating animation on the mockup card: `@keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }` — 4s ease-in-out infinite

### 3. Stats / Social Proof Bar
- Full-width, white background with top/bottom border
- 4 stats in a row with dividers:
  - "200+" → Schools Managed
  - "50,000+" → Students Enrolled
  - "8" → User Roles
  - "99.9%" → Uptime SLA
- Each stat: large number (40px, weight 900, teal), label below (14px, muted)

### 4. Features Section
- Section title: "Everything a school needs. Nothing it doesn't."
- Subtitle: "8 specialized dashboards, one unified platform."
- 8 feature cards in a 4×2 grid (responsive: 2×4 on mobile):
  - Academic Management — graduation cap icon
  - Finance & Fees — coin/wallet icon
  - Student Information — user profile icon
  - Library System — book icon
  - Hostel Management — building icon
  - Communication Hub — chat bubble icon
  - Attendance Tracking — checkmark calendar icon
  - CMS & Website — globe icon
- Each card: White background, 16px border radius, subtle shadow, icon in colored light-bg circle (cycle through teal-lt, pink-lt, amber-lt, blue-lt), feature title (weight 800), short description (2 lines, muted)
- Hover: card lifts with `transform: translateY(-4px)` and shadow deepens

### 5. User Roles Section
- Background: `var(--dark)` (#111110) — dark section for contrast
- Title in white: "Built for every person in your school"
- 8 role pills/badges displayed horizontally (wrap on mobile):
  Super Admin · Admin · Teacher · Student · Parent · Librarian · Accountant · Warden
- Each pill: rounded, 1px border in respective accent color, text in that color, hover fills with color
- Use the 4 brand colors cycling: teal, pink, amber, blue, teal, pink, amber, blue
- Below: "Every role gets their own dashboard, their own tools, their own experience."

### 6. Tech Stack / Trust Section
- Light teal background (`var(--teal-lt)`)
- Title: "Enterprise-grade infrastructure. School-friendly UX."
- 3 feature callout cards in a row:
  1. "GCP + Kubernetes" — "Deployed on Google Cloud with zero-downtime rolling updates"
  2. "Razorpay, Stripe & Paytm" — "Multi-gateway fee collection built right in"
  3. "Firebase + RBAC" — "JWT authentication with role-based access control"
- Each card: White bg, teal left-border accent (4px solid var(--teal)), clean and minimal

### 7. CTA / Footer Band
- Full-width, teal gradient background: `linear-gradient(135deg, #0DA896, #0A9484)`
- Large white headline: "Ready to modernize your school?"
- Subtext in white at 70% opacity
- One big white button: "Register Your School" — teal text, on hover slides to solid white

### 8. Footer
- Dark background (#111110)
- Logo (white/monochrome variant), tagline in muted white
- 4 columns: Product · Company · Support · Legal
- Bottom bar: "© 2026 ClassKira — Pixalara LLP" left, social icons right
- All text: rgba(255,255,255,0.5), links lighten on hover

---

## PAGE 2: LOGIN PAGE (resources/views/auth/login.blade.php)

Redesign into a stunning split-screen layout:

### Layout
- **Left panel (55%)**: Brand panel — dark background (#111110) with teal/colorful design elements
  - Large ClassKira logo (56px HTML-rendered, centered)
  - Tagline: "Every School. One System."
  - Decorative abstract shapes in teal, pink, amber (CSS shapes/gradients, low opacity)
  - Bottom: 3 short trust points with checkmark icons:
    - "✓ 8 role-based dashboards"
    - "✓ GKE-powered, 99.9% uptime"
    - "✓ Razorpay, Stripe & Paytm built-in"

- **Right panel (45%)**: Login form — white/light background

### Login Form (RIGHT PANEL)
⚠️ **CRITICAL BACKEND RULE**: Do NOT change form `action`, `method`, input `name` attributes, or any `@csrf` directive. Only change visual HTML structure around them.

```
Heading: "Welcome back" (28px, weight 900, dark)
Subheading: "Sign in to your ClassKira dashboard" (14px, muted)

Role selector: Horizontal pill-tab row with icons
  [Super Admin] [Admin] [Teacher] [Student] [Parent] [Librarian] [Accountant] [Warden]
  Active tab = teal background, white text. Inactive = light bg. Scrollable on mobile.
  This is purely visual — keep the underlying input name/value intact.

Email field:
  - Floating label style
  - Left icon: envelope SVG
  - Teal focus ring

Password field:
  - Floating label style
  - Left icon: lock SVG
  - Right: eye toggle button (show/hide password — JS only)
  - Teal focus ring

Remember me checkbox (keep name attribute intact)

Forgot password link (keep href intact) — right-aligned, teal color

Submit button:
  - Full width, teal (#0DA896), pill shape (border-radius: 12px)
  - Text: "Sign In →" weight 800
  - Hover: darken to #0A9484 with subtle scale
  - Loading state: spinner animation when clicked

Bottom: "New school? Register here →" — links to trigger the registration popup (see Page 3)
```

### Input Field Design System
```css
.ck-input-wrap {
  position: relative;
  margin-bottom: 20px;
}
.ck-input {
  width: 100%;
  padding: 14px 16px 14px 44px;
  border: 1.5px solid var(--border);
  border-radius: 12px;
  font-family: 'Nunito', sans-serif;
  font-size: 15px;
  font-weight: 600;
  color: var(--text);
  background: var(--bg);
  transition: border-color 0.2s, box-shadow 0.2s;
  outline: none;
}
.ck-input:focus {
  border-color: var(--teal);
  box-shadow: 0 0 0 4px rgba(13,168,150,0.12);
  background: #fff;
}
.ck-input-icon {
  position: absolute;
  left: 14px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--muted);
  width: 18px;
  height: 18px;
}
```

---

## PAGE 3: SCHOOL REGISTRATION POPUP (Modal)

This is a **frontend-only modal** — it collects data visually but submits to whatever the existing form action already is. DO NOT change the form action or add new backend routes.

### Trigger
- Opens when user clicks "Register Your School" (navbar CTA, hero CTA, or login page link)
- Triggered via JS: `document.getElementById('registerModal').classList.add('active')`

### Modal Design
```
Overlay: rgba(0,0,0,0.6) backdrop with blur(8px)
Modal card:
  - Width: 560px, centered
  - Background: #FFFFFF
  - Border-radius: 24px
  - Box-shadow: 0 32px 80px rgba(0,0,0,0.2)
  - Padding: 48px
  - Max-height: 90vh, overflow-y: auto

Close button (×): top-right, 36px circle, hover = teal bg
```

### Modal Header
```
Small teal badge: "🏫 School Registration"
H2: "Let's set up your school" (28px, weight 900)
Subtext: "Takes less than 2 minutes. No credit card required." (muted)
```

### Multi-Step Form (3 Steps — Pure JS, No Backend)

**Step 1 — School Details** (Step 1 of 3)
```
Progress bar: 33% filled, teal

Fields:
  - School Name* (text input, ck-input style)
  - School Type* (select: Primary · Secondary · Higher Secondary · International · Other)
  - City* (text input)
  - State* (select — Indian states list)
  - Board Affiliation (select: CBSE · ICSE · State Board · IB · Cambridge · Other)
  - Number of Students (select: <200 · 200–500 · 500–1000 · 1000–2000 · 2000+)

Next button: "Continue →" (solid teal, full width)
```

**Step 2 — Admin Contact** (Step 2 of 3)
```
Progress bar: 66% filled

Fields:
  - Admin Full Name* (text)
  - Designation* (text, placeholder: "Principal, IT Head, Admin Officer...")
  - Official Email* (email)
  - Phone Number* (tel, with +91 prefix)
  - WhatsApp for updates? (checkbox)

Buttons: "← Back" (ghost) + "Continue →" (teal)
```

**Step 3 — Confirmation** (Step 3 of 3)
```
Progress bar: 100% filled

Summary card (light teal bg):
  Shows the school name and admin name entered in steps 1-2

Message: "Our team will reach out within 24 hours to schedule your onboarding call."

Fields:
  - How did you hear about us? (select: Google · Referral · Social Media · Conference · Other)
  - Any message for our team? (textarea, optional)

Buttons: "← Back" (ghost) + "Submit Registration" (solid teal, full width)

On submit: Show a success state —
  Large teal checkmark animation (CSS keyframe draw animation)
  Headline: "You're on the list! 🎉"
  Subtext: "We'll be in touch within 24 hours."
  Close button: "Close" (ghost, teal border)
```

### Step Transition Animation
```javascript
// Slide in from right on Next, slide in from left on Back
function goToStep(stepNumber, direction = 'forward') {
  const current = document.querySelector('.modal-step.active');
  const next = document.querySelector(`.modal-step[data-step="${stepNumber}"]`);
  current.style.transform = direction === 'forward' ? 'translateX(-40px)' : 'translateX(40px)';
  current.style.opacity = '0';
  setTimeout(() => {
    current.classList.remove('active');
    next.classList.add('active');
    next.style.transform = direction === 'forward' ? 'translateX(40px)' : 'translateX(-40px)';
    next.style.opacity = '0';
    setTimeout(() => {
      next.style.transform = 'translateX(0)';
      next.style.opacity = '1';
    }, 20);
  }, 200);
}
```

---

## ANIMATIONS & MICRO-INTERACTIONS

Implement these throughout:

```css
/* Page load fade-in for sections */
.ck-reveal {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.ck-reveal.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Stagger for grids */
.ck-reveal:nth-child(2) { transition-delay: 0.1s; }
.ck-reveal:nth-child(3) { transition-delay: 0.2s; }
.ck-reveal:nth-child(4) { transition-delay: 0.3s; }
```

```javascript
// Intersection Observer for scroll reveals
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.12 });
document.querySelectorAll('.ck-reveal').forEach(el => observer.observe(el));

// Navbar shadow on scroll
window.addEventListener('scroll', () => {
  document.querySelector('.ck-nav').classList.toggle('scrolled', window.scrollY > 20);
});
```

---

## RESPONSIVE BREAKPOINTS

```css
/* Mobile first */
@media (max-width: 768px) {
  /* Hero: stack columns vertically */
  /* Features: 1 column grid */
  /* Login: hide left brand panel, full-width form */
  /* Modal: full-screen on mobile, border-radius: 0 at top */
  /* Nav: hamburger menu */
}

@media (min-width: 769px) and (max-width: 1024px) {
  /* Tablet: 2-column features grid */
  /* Login: smaller split (40/60) */
}
```

---

## LARAVEL BLADE INTEGRATION RULES

When wrapping or restructuring Blade files, follow these rules strictly:

1. **All Blade directives stay in place**: `@csrf`, `@if`, `@auth`, `@guest`, `@foreach`, `@yield`, `@section`, `@extends`, `@include` — never move, rename, or remove.
2. **Form integrity**: Keep `action="{{ route('login') }}"`, `method="POST"`, and all `name=""` attributes identical.
3. **Error display**: If Blade already shows `$errors->first('email')`, keep that logic — just restyle the error message container.
4. **Layout extension**: If the file uses `@extends('layouts.app')`, keep that. If you need custom styles for a specific page, use `@push('styles')` and `@push('scripts')` stacks.
5. **Asset linking**: Use `{{ asset('css/classkira-redesign.css') }}` for any new CSS file you create. Place the file in `public/css/`.
6. **Old values**: Keep `value="{{ old('email') }}"` and similar — they restore form state after failed validation.

---

## DELIVERABLES

Produce these files:

1. **`public/css/classkira-redesign.css`** — Master CSS file with all variables, resets, components, and page-specific styles. Fully commented with section headers.

2. **`public/js/classkira-ui.js`** — All JS: scroll observer, navbar shadow, modal open/close, multi-step form logic, password toggle, hamburger menu, animations. No jQuery required — vanilla JS only.

3. **`resources/views/welcome.blade.php`** (or equivalent public landing page) — Redesigned Blade template preserving all existing Blade directives.

4. **`resources/views/auth/login.blade.php`** — Redesigned login Blade template preserving form action, method, CSRF, input names, and error display.

5. **`resources/views/components/register-modal.blade.php`** — The school registration modal as a Blade component (include it in the layout via `@include('components.register-modal')`).

---

## QUALITY CHECKLIST (verify before delivering)

- [ ] All 4 brand colors used purposefully (#0DA896, #D44F7E, #E8921A, #2079CF)
- [ ] Nunito font loaded and applied everywhere — no other font families
- [ ] Logo rendered in HTML (not img tag) with correct per-letter colors
- [ ] Tagline "Every School. One System." present in hero
- [ ] Login form `action`, `method`, `name` attributes unchanged
- [ ] `@csrf` preserved in all forms
- [ ] Registration modal has 3 steps with progress indicator
- [ ] Scroll animations implemented via IntersectionObserver
- [ ] Mobile responsive at 375px, 768px, and 1280px
- [ ] No changes to any PHP file, route, controller, or migration
- [ ] Dark brand panel on left of login page
- [ ] Frosted glass navbar with scroll shadow
- [ ] Hero section floating mockup card with CSS animation
- [ ] Feature cards with hover lift effect
- [ ] Role pills in dark section with brand color borders
