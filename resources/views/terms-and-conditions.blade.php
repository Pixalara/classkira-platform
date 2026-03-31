@php
  $metaTitle = 'Terms & Conditions — ClassKira';
  $metaDescription = 'Read ClassKira\'s terms and conditions for using our School Management System. Governed by Indian law, Pixalara LLP.';
@endphp
@extends('frontend.index')
@section('content')

<style>
    .legal-hero {
        background-color: #111110;
        padding: 100px 24px;
        text-align: center;
    }
    .legal-hero img {
        height: 64px;
        filter: brightness(0) invert(1);
        margin-bottom: 24px;
    }
    .legal-hero h1 {
        color: #ffffff !important;
        font-size: 48px !important;
        font-weight: 900 !important;
        margin-bottom: 16px;
        line-height: 1.1;
    }
    .legal-hero p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
    }
    
    .legal-body {
        max-width: 800px;
        margin: 0 auto;
        padding: 80px 24px;
    }
    .legal-body h3 {
        font-size: 20px !important;
        font-weight: 800 !important;
        color: var(--color-text-title) !important;
        border-left: 4px solid var(--color-primary);
        padding-left: 16px;
        margin-top: 48px;
        margin-bottom: 20px;
    }
    .legal-body p {
        font-size: 16px !important;
        color: var(--color-text-body) !important;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .legal-body ul, .legal-body ol {
        margin-bottom: 24px;
        padding-left: 24px;
    }
    .legal-body li {
        font-size: 16px;
        color: var(--color-text-body);
        line-height: 1.8;
        margin-bottom: 8px;
    }
    .legal-body li::marker {
        color: var(--color-primary);
        font-weight: bold;
    }
    
    .legal-cta {
        background-color: var(--color-primary);
        padding: 60px 24px;
        text-align: center;
    }
    .legal-cta h3 {
        color: #ffffff !important;
        font-size: 24px !important;
        font-weight: 700 !important;
        margin: 0;
    }
</style>

<div class="legal-hero">
    <img src="{{ asset('frontend/assets/image/new-logo.png') }}" alt="ClassKira Logo">
    <h1>Terms & Conditions</h1>
    <p>Last Updated: March 2026 | Effective Date: January 1, 2025</p>
</div>

<div class="legal-body">

    <h3>1. Agreement to Terms</h3>
    <p>By registering for, accessing, or using ClassKira ("the Platform"), you agree to be bound by these Terms and Conditions. ClassKira is operated by Pixalara LLP, a company registered in India. If you are registering on behalf of a school or institution, you represent that you have the authority to bind that institution to these Terms.</p>

    <h3>2. Definitions</h3>
    <ul>
        <li><strong>"Platform"</strong> refers to the ClassKira School Management System, including all web interfaces, APIs, and associated services</li>
        <li><strong>"Institution"</strong> refers to the school or educational organization that has registered for and manages a ClassKira account</li>
        <li><strong>"Authorized Users"</strong> refers to individuals granted access by the Institution, including Super Admins, Admins, Teachers, Students, Parents, Librarians, Accountants, and Wardens</li>
        <li><strong>"Subscription"</strong> refers to the paid plan selected by the Institution to access the Platform</li>
    </ul>

    <h3>3. Account Registration & Responsibilities</h3>
    <p>Institutions must provide accurate, complete, and current information during registration. You are responsible for:</p>
    <ul>
        <li>Maintaining the confidentiality of all admin credentials</li>
        <li>All activity occurring under your institution's account</li>
        <li>Ensuring Authorized Users comply with these Terms</li>
        <li>Promptly notifying ClassKira of any unauthorized account access</li>
    </ul>
    <p>ClassKira reserves the right to suspend or terminate accounts that provide false information or violate these Terms.</p>

    <h3>4. Subscription Plans & Billing</h3>
    <p><strong>4.1 Plans:</strong> ClassKira offers Starter, Professional, Enterprise, and Yearly Professional plans. Each plan specifies the maximum number of students and features included.</p>
    <p><strong>4.2 Billing:</strong> Subscriptions are billed monthly or annually as selected. All fees are in USD unless otherwise agreed. Prices are exclusive of applicable taxes including Indian GST.</p>
    <p><strong>4.3 Payment:</strong> Payments are processed via Razorpay, Stripe, PayPal, or Paytm. By providing payment details, you authorize ClassKira to charge the applicable fees.</p>
    <p><strong>4.4 Renewals:</strong> Subscriptions auto-renew at the end of each billing cycle unless cancelled at least 7 days before renewal.</p>
    <p><strong>4.5 Refunds:</strong> ClassKira offers a 7-day refund window from the date of initial subscription. After 7 days, all fees are non-refundable. Refunds for annual plans are prorated at ClassKira's sole discretion.</p>
    <p><strong>4.6 Plan Upgrades:</strong> Upgrading your plan takes effect immediately. The price difference is charged on a prorated basis for the remaining billing period.</p>

    <h3>5. Acceptable Use</h3>
    <p>You agree NOT to use ClassKira to:</p>
    <ul>
        <li>Upload, transmit, or store unlawful, harmful, or offensive content</li>
        <li>Attempt to gain unauthorized access to any part of the Platform or other institutions' data</li>
        <li>Reverse engineer, decompile, or attempt to extract source code</li>
        <li>Resell, sublicense, or commercially exploit the Platform without written permission from Pixalara LLP</li>
        <li>Interfere with or disrupt the integrity or performance of the Platform</li>
        <li>Violate any applicable local, national, or international law</li>
    </ul>

    <h3>6. Data Ownership & Privacy</h3>
    <p>The Institution retains full ownership of all student and institutional data entered into ClassKira. ClassKira acts as a data processor on behalf of the Institution. Our collection, use, and handling of your data is governed by our Privacy Policy, which forms part of these Terms.</p>

    <h3>7. Intellectual Property</h3>
    <p>ClassKira, its logo, name, software, and all associated content are the exclusive intellectual property of Pixalara LLP. You are granted a limited, non-exclusive, non-transferable license to use the Platform during your active subscription. No ownership rights are transferred to the Institution.</p>

    <h3>8. Service Availability & SLA</h3>
    <p>ClassKira targets 99.9% monthly uptime, deployed on Google Cloud Platform with GKE. Scheduled maintenance will be communicated at least 48 hours in advance. ClassKira is not liable for downtime caused by third-party service failures, internet outages, or force majeure events.</p>

    <h3>9. Limitation of Liability</h3>
    <p>To the maximum extent permitted by applicable law, Pixalara LLP shall not be liable for:</p>
    <ul>
        <li>Indirect, incidental, or consequential damages</li>
        <li>Loss of student data due to Institution's misuse or unauthorized access</li>
        <li>Inaccuracies in reports generated from data entered by the Institution</li>
        <li>Third-party payment gateway failures or disputes</li>
    </ul>
    <p>ClassKira's total liability for any claim shall not exceed the fees paid by the Institution in the 3 months preceding the claim.</p>

    <h3>10. Termination</h3>
    <p>Either party may terminate the subscription at any time. Upon termination:</p>
    <ul>
        <li>Access to the Platform ceases at the end of the current billing cycle</li>
        <li>The Institution may export all data within 30 days</li>
        <li>After 30 days, all data is permanently deleted</li>
        <li>ClassKira reserves the right to immediately terminate accounts that violate these Terms without refund</li>
    </ul>

    <h3>11. Modifications to Terms</h3>
    <p>ClassKira may update these Terms at any time. Institutions will be notified via email and in-platform notification at least 14 days before changes take effect. Continued use of the Platform after the effective date constitutes acceptance of the revised Terms.</p>

    <h3>12. Governing Law & Disputes</h3>
    <p>These Terms are governed by the laws of India. Any disputes shall be subject to the exclusive jurisdiction of the courts located in Bengaluru, Karnataka, India. ClassKira encourages resolving disputes amicably — contact legal@classkira.com before initiating legal proceedings.</p>

    <h3>13. Contact</h3>
    <p>Pixalara LLP — ClassKira<br>
    Email: legal@classkira.com<br>
    Website: classkira.com</p>

</div>

<div class="legal-cta">
    <h3>Have questions? Contact us at legal@classkira.com</h3>
</div>

@endsection
