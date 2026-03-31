@php
  $metaTitle = 'ClassKira — Every School. One System.';
  $metaDescription = 'ClassKira is India\'s most complete School Management System. Manage students, fees, attendance, exams, library & hostel — 8 role dashboards, GKE-powered, 99.9% uptime.';
@endphp
@extends('frontend.index')
@section('content')
{{-- @php
 use App\Models\FrontendFeature;

 $frontendFeatures = FrontendFeature::take(9)->get();

@endphp --}}
<style>
    /* CRITICAL OVERRIDES — inline to guarantee application */
    
    /* 1. Logo bigger size (Desktop) */
    .logo img, .logo-img, .small-device-show img {
        height: 96px !important;
        width: auto !important;
        max-width: none !important;
        object-fit: contain !important;
    }
    
    /* 2. Sign In & buttons - 1 row */
    .signUp-btn, .header-btn a, .header-btn .btn-primary {
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }
    .header-btn {
        flex-wrap: nowrap !important;
        gap: 8px !important;
        align-items: center;
    }
    .header-area .signUp-btn {
        padding: 10px 20px !important;
        font-size: 14px !important;
        white-space: nowrap !important;
    }
    .header-area .btn-primary {
        padding: 10px 18px !important;
        font-size: 14px !important;
        white-space: nowrap !important;
    }
    
    /* 3. Dashboard 3D image */
    .bananr-right-img {
        border-radius: 20px !important;
        box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.2),
                    0 20px 40px -10px rgba(13, 168, 150, 0.15) !important;
        padding: 0 !important;
        background: transparent !important;
        border: none !important;
        transform: perspective(1000px) rotateY(-4deg) rotateX(2deg);
        animation: dashFloat 5s ease-in-out infinite;
    }
    .bananr-right-img img {
        border-radius: 20px !important;
        width: 100%;
        image-rendering: -webkit-optimize-contrast;
    }
    @keyframes dashFloat {
        0%, 100% { transform: perspective(1000px) rotateY(-4deg) rotateX(2deg) translateY(0px); }
        50% { transform: perspective(1000px) rotateY(-4deg) rotateX(2deg) translateY(-12px); }
    }
    
    /* Responsive Media Queries */
    @media (max-width: 991px) {
        .logo img, .logo-img, .small-device-show img {
            height: 60px !important; /* Smaller logo on tablets */
        }
        .bananr-right-img {
            transform: none; /* Disable aggressive 3D tilt on tablets/mobile to avoid overflow */
            animation: dashFloatMobile 5s ease-in-out infinite;
            margin-top: 30px;
        }
        @keyframes dashFloatMobile {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
    }
    
    @media (max-width: 576px) {
        .logo img, .logo-img, .small-device-show img {
            height: 48px !important; /* Even smaller logo on mobile */
        }
        
        .header-btn {
            gap: 4px !important;
        }
        
        /* Hide Register button on very small screens to fit Sign in and Hamburger */
        .header-area .btn-primary {
            display: none !important;
        }
        
        .header-area .signUp-btn {
            padding: 8px 14px !important;
            font-size: 13px !important;
        }
    }
    
    .service-icon i {
        font-size: 24px;
        font-weight: bold;
        margin-left: 10px;
        margin-top: 10px;
        color: var(--secondary-color);
    }
</style>



<!--  Bannar Area Start  -->
<section class="bannar-area">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <!-- Bannar Content -->
                <div class="bannar-content">
                    <span class="hero-pill">{{ get_settings('system_title') }}</span>
                    <h2><span>Bringing Excellence</span><br>To Students Everywhere</h2>
                    <p>Empowering and inspiring all students to excel as life long learners. Streamline administration, empower teachers, and engage parents effortlessly.</p>
                    
                    <div class="hero-cta">
                        @if(isset(auth()->user()->id) && auth()->user()->id != "")
                            <a class="btn-primary" href="{{ $dashboard }}">{{ get_phrase('Access Dashboard') }} <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        @else
                            <button type="button" onclick="openRegisterModal()" class="btn-primary me-3">{{ get_phrase('Get Started Free') }}</button>
                            <a class="btn-secondary" href="#feature">{{ get_phrase('Explore Features') }}</a>
                        @endif
                    </div>
                    

                </div>
            </div>
            <div class="col-lg-6 position-relative">
                <div class="bananr-right-img">
                    <img src="{{ asset('frontend/assets/image/classkira-dashboard.png') }}" alt="ClassKira LMS Dashboard">
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Bannar Area End   -->
<!--  Service Area Start  -->
<section class="service-area section-padding" id="feature">
    <div class="container">
        <!-- Title  -->
        <div class="title-area">
            <h1>{{ get_phrase('Powerful School Management Tools') }}</h1>
            <h3>{{ get_settings('features_title')  }}</h3>
            <p>{{ get_settings('features_subtitle') }}</p>
        </div>

        <div class="row mt-5 pt-3">
            @foreach ($frontendFeatures as $frontendFeature)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12  mb-60">
                <div class="service-items">
                    <div class="service-icon">
                        <i class="{{$frontendFeature->icon }}"></i>
                    </div>
                    <div class="service-text">
                        <h3>{{$frontendFeature->title }}</h3>
                        <p>{{$frontendFeature->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        @if(count($frontendFeatures) > 7)
        <div class="see-all-btn">
            <a class="see-btn" id="see-btn">{{ get_phrase('See all') }} <i class="fa-solid fa-right-long"></i></a>
        </div>
        @else

        @endif

    </div>
</section>
<!--  Feature Area End   -->
<!--  Pricing Area Start   -->
<section class="pricing-area section-padding" id="price">
    <div class="container-xl">
        <!-- Title  -->
        <div class="title-area">
            <h1>{{ get_phrase('Our Packages') }}</h1>
            <h3>{{ get_phrase('Pick the Best Fit') }}</h3>
            <p>{{ get_settings('price_subtitle') }}</p>
        </div>
        <div class="row">
        	@foreach($packages as $package)
	        	@if($package->interval == 'Monthly')
	        		@php $interval = 'mon'; @endphp
	        	@elseif($package->interval == 'Yearly')
	        		@php $interval = 'year'; @endphp
	        	@else
	        		@php $interval = 'day'; @endphp
	        	@endif
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="pricing-table">
                    <span class="trail-price">{{ $package->name }}</span>
                    <h4>{{ currency($package->price) }}<span class="small-text">/@if($package['interval'] == 'life_time')
                        {{ get_phrase('life time') }}
                        @else
                          <?php if($package['interval'] == 'Days'): ?>
                            {{ $package['days'].' '.$package['interval'] }}
                        <?php else: ?>
                            {{ $package['interval'] }}
                        <?php endif; ?>
                        @endif</span></h4>
                        <p class="color-ff">Total Students: {{ $package->studentLimit }}</p>
                        @php
						$packages_features = json_decode($package->features);
					 @endphp

                    <ul class="pricing-item" style="border-top:0px;">
                        @foreach ($packages_features as $packages_feature)
						<li class="color-ff">{{ $packages_feature }}</li>
						@endforeach
                        <li class="color-ff">Description: {{ $package->description }}</li>
                    </ul>
                    @if(Auth::check() && auth()->user()->role_id == 1)
                        <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning('{{ auth()->user()->role_id }}')">{{ get_phrase('Subscribe') }}</a>
                    @elseif(Auth::check() && auth()->user()->role_id == 2)
                        @php $status = subscription_check(auth()->user()->school_id) @endphp
                        @if($status != 1)
                            <a href="{{ route('admin.subscription.payment', ['package_id'=> $package->id]) }}" class="subscribe-btn" target="_blank">{{ get_phrase('Subscribe') }}</a>
                        @else
                            <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning('{{ auth()->user()->role_id }}')">{{ get_phrase('Subscribe') }}</a>
                        @endif
                    @else
                        <a href="javascript:;" class="subscribe-btn" onclick="subscription_warning()">{{ get_phrase('Subscribe') }}</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--  Pricing Area End   -->
<!--  Faq  Area Start   -->
<section class="faq-area" id="faq">
    <div class="container-xl">
         <!-- Title  -->
         <div class="title-area">
            <h1>Frequently Asked Questions</h1>
            <p>Everything you need to know about ClassKira</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion-area">
                    <div class="accordion" id="accordionExample">
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">What is ClassKira?</button>
                          </h2>
                          <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>ClassKira is a complete School Management System (SMS/LMS) built for modern educational institutions. It brings together student admissions, academic management, fee collection, attendance tracking, library, hostel, and parent communication into one unified platform — accessible by 8 distinct user roles including Super Admin, Admin, Teacher, Student, Parent, Librarian, Accountant, and Warden.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Is ClassKira suitable for my school's size?</button>
                          </h2>
                          <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Yes. ClassKira is built to scale. Whether you manage 50 students or 5,000+, our plans are tiered to match your institution's size. Small schools start with our Starter plan, while larger institutions can opt for Enterprise with unlimited students and custom reporting. Multi-school chains can manage all branches from a single Super Admin dashboard.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading3">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Which payment gateways are supported for fee collection?</button>
                          </h2>
                          <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>ClassKira supports Razorpay, Stripe, PayPal, and Paytm out of the box. Parents can pay fees online directly through the parent portal, and accountants get a full payment history, invoice generation, and audit trail — no third-party tools needed.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading4">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">How secure is the student and school data?</button>
                          </h2>
                          <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>ClassKira uses Firebase JWT authentication, Kubernetes Secrets for credential management, and role-based access control (RBAC) middleware so every user sees only what they're authorized to access. The platform is deployed on Google Cloud Platform (GCP) with GKE, giving you enterprise-grade infrastructure, automatic backups, and 99.9% uptime SLA.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading5">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Can parents and students access ClassKira on mobile?</button>
                          </h2>
                          <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Yes. ClassKira's interface is fully responsive and works seamlessly on all modern browsers across mobile, tablet, and desktop. Parents can track attendance, view fee receipts, and communicate with teachers. Students can access their timetable, results, and admit cards — anytime, anywhere.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading6">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">How long does it take to set up ClassKira for my school?</button>
                          </h2>
                          <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Most schools are fully onboarded within 24–72 hours. After you register, our team schedules a dedicated onboarding call to configure your school profile, import existing student data, set up user roles, and walk your staff through the platform. We handle the technical setup — you focus on running your school.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading7">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">Does ClassKira support multiple boards and curriculums?</button>
                          </h2>
                          <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Absolutely. ClassKira supports CBSE, ICSE, State Board, IB, Cambridge, and custom curriculum setups. Syllabus configuration, class routines, examination structures, and grading systems are all fully customizable to match your board's requirements.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading8">
                            <button class="accordion-button collapsed round-bg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">What kind of support do you offer after onboarding?</button>
                          </h2>
                          <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>All plans include email and chat support. Professional and Enterprise plans include priority support with faster response times. Our team is available to assist with configuration changes, staff training, and technical issues. Enterprise clients also get a dedicated account manager for ongoing assistance.</p>
                            </div>
                          </div>
                        </div>

                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>
<!--  faq Area End   -->
<!--  Cntact  Area Start  -->
<section class="contact-us-area" id="contact">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12">
                <div class="lan-contact">
                    <div class="contact-left text-center">
                        <h3>{{ get_phrase('Contact us with any questions') }}</h3>
                        <a class="contact-us-btn" href="mailto:{{ get_settings('contact_email') }}"><i class="fa-solid fa-envelope"></i> {{ get_phrase('Contact Us') }}</a>
                    </div>
                    <div class="contact-right">
                        <div class="envolepe-messeage">
                            <img src="{{ asset('frontend/assets/image/envelope.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Contact Area End   -->


<style>
    #toast-container > .toast-warning {
        font-size: 15px;
    }
</style>

<script type="text/javascript">

                // JavaScript to handle language selection
                document.addEventListener('DOMContentLoaded', function() {
        let languageLinks = document.querySelectorAll('.language-item');

        languageLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                let languageName = this.getAttribute('data-language-name');
                document.getElementById('selectedLanguageName').value = languageName;
                document.getElementById('languageForm').submit();
            });
        });
    });
    "use strict";

    function subscription_warning(roleId) {
        if(roleId == 1){
            toastr.warning("You can't subscribe as superadmin");
        } else if(roleId == 2){
            toastr.warning("Your school is already subscribed to a package.");
        } else {
            toastr.warning("You are not authorized! Please login as school admin.");
        }
    }

        var seeBtn = document.getElementById('see-btn');
        if (seeBtn) {
            seeBtn.addEventListener('click', function() {
                var currentUrl = new URL(window.location.href);
                var seeAll = currentUrl.searchParams.get('see_all');

                if (seeAll) {
                    currentUrl.searchParams.delete('see_all');
                } else {
                    currentUrl.searchParams.set('see_all', true);
                }

                window.location.href = currentUrl.toString();
            });
        }

    function onSubmit(token) {
      document.getElementById("schoolReg").submit();
    }

  </script>

    <script src="https://www.google.com/recaptcha/api.js"></script>

@endsection
