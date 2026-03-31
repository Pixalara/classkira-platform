@php
  $metaTitle = 'Privacy Policy — ClassKira by Pixalara LLP';
  $metaDescription = 'Read ClassKira\'s privacy policy. Learn how we collect, use, and protect your school\'s data on our GCP-powered platform.';
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
    <h1>Privacy Policy</h1>
    <p>Last Updated: March 2026 | Effective Date: January 1, 2025</p>
</div>

<div class="legal-body">

    <h3>1. Introduction</h3>
    <p>ClassKira ("we," "our," or "us") is a product of Pixalara LLP. We are committed to protecting the privacy and security of all individuals who interact with our School Management System, including school administrators, teachers, students, parents, and other authorized users. This Privacy Policy explains what data we collect, how we use it, and the rights you have over your information.</p>

    <h3>2. Information We Collect</h3>
    <p>We collect the following categories of information:</p>
    <p><strong>Account & Profile Data:</strong> Name, email address, phone number, designation, and role-based profile information provided during registration or onboarding.</p>
    <p><strong>Student & Institutional Data:</strong> Student enrollment details, academic records, attendance logs, examination results, fee payment history, library records, and hostel allocations — provided by the school institution, not directly by students.</p>
    <p><strong>Usage Data:</strong> Pages visited, features accessed, login timestamps, browser type, device information, and IP addresses — collected automatically for security and product improvement.</p>
    <p><strong>Payment Data:</strong> Fee transaction records processed through Razorpay, Stripe, PayPal, or Paytm. ClassKira does not store full card or banking details — all payment processing is handled by PCI-compliant third-party gateways.</p>
    <p><strong>Communication Data:</strong> Messages sent through ClassKira's internal chat and notification system between authorized users within the same institution.</p>

    <h3>3. How We Use Your Information</h3>
    <p>We use collected information to:</p>
    <ul>
        <li>Provide, operate, and maintain the ClassKira platform</li>
        <li>Authenticate users and enforce role-based access control</li>
        <li>Process fee payments and generate financial reports</li>
        <li>Send system notifications, announcements, and alerts</li>
        <li>Generate admit cards, attendance reports, and academic records</li>
        <li>Improve platform performance and fix technical issues</li>
        <li>Comply with legal obligations and respond to lawful requests</li>
    </ul>
    <p>We do not sell, rent, or trade your personal information to any third party for marketing purposes.</p>

    <h3>4. Data Storage & Security</h3>
    <p>All data is stored on Google Cloud Platform (GCP) infrastructure, hosted in the asia-south1 (Mumbai) region. We implement the following security measures:</p>
    <ul>
        <li>Firebase JWT-based authentication for all user sessions</li>
        <li>Role-Based Access Control (RBAC) ensuring users access only their authorized data</li>
        <li>Kubernetes Secrets for secure credential management</li>
        <li>Encrypted data transmission via HTTPS/TLS</li>
        <li>Regular automated backups with point-in-time recovery</li>
        <li>Zero-downtime deployments via GKE rolling updates</li>
    </ul>

    <h3>5. Data Sharing</h3>
    <p>ClassKira shares data only in the following limited circumstances:</p>
    <ul>
        <li>With the school institution that owns the account, as they are the primary data controller for their students and staff</li>
        <li>With payment gateway providers (Razorpay, Stripe, PayPal, Paytm) solely to process fee transactions</li>
        <li>With SMS providers (Twilio) to deliver notifications authorized by the institution</li>
        <li>With law enforcement or regulators when required by applicable Indian law</li>
        <li>With service providers bound by confidentiality agreements who assist in operating our platform</li>
    </ul>

    <h3>6. Children's Privacy</h3>
    <p>ClassKira is a B2B platform deployed by schools for institutional use. Student data is entered and managed by the school institution acting as the data controller. ClassKira does not knowingly collect personal information directly from children. If you believe student data has been mishandled, contact your school's administrator immediately.</p>

    <h3>7. Data Retention</h3>
    <p>We retain institutional data for the duration of the active subscription. Upon termination of a school's account:</p>
    <ul>
        <li>A full data export is available for 30 days post-termination</li>
        <li>After 30 days, all data is permanently and irreversibly deleted</li>
        <li>Payment transaction records may be retained for 7 years to comply with Indian GST and accounting regulations</li>
    </ul>

    <h3>8. Your Rights</h3>
    <p>Authorized users and institutions have the right to:</p>
    <ul>
        <li>Access and review their personal data stored on ClassKira</li>
        <li>Request correction of inaccurate information</li>
        <li>Request deletion of personal data (subject to retention obligations above)</li>
        <li>Export institutional data in standard formats</li>
        <li>Withdraw consent for optional communications</li>
    </ul>
    <p>To exercise these rights, contact: legal@classkira.com</p>

    <h3>9. Cookies</h3>
    <p>ClassKira uses session cookies essential for authentication and maintaining your login state. We do not use third-party advertising cookies. You may disable cookies in your browser settings, but this will prevent you from logging in.</p>

    <h3>10. Changes to This Policy</h3>
    <p>We may update this Privacy Policy periodically. Schools and administrators will be notified of material changes via email and in-platform notification at least 14 days before changes take effect. Continued use after the effective date constitutes acceptance.</p>

    <h3>11. Contact Us</h3>
    <p>Pixalara LLP — ClassKira<br>
    Email: legal@classkira.com<br>
    Website: classkira.com<br>
    Jurisdiction: India (governed by Indian IT Act, 2000 and applicable data protection regulations)</p>

</div>

<div class="legal-cta">
    <h3>Have questions? Contact us at legal@classkira.com</h3>
</div>

@endsection
