@props([
  'title' => 'ClassKira — Every School. One System.',
  'description' => 'ClassKira is a complete School Management System built for modern Indian schools. Manage students, fees, attendance, exams, library, and hostel from one powerful platform.',
  'image' => '/og/classkira-og-image.png',
  'url' => request()->url(),
  'type' => 'website',
])

<!-- ── Primary Meta ─────────────────────────────── -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="school management system, LMS India, student management, fee management software, school ERP, ClassKira, attendance tracking, online school management, CBSE school software, school administration">
<meta name="author" content="Pixalara LLP">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#0DA896">
<link rel="canonical" href="{{ $url }}">

<!-- ── Open Graph (Facebook, LinkedIn, WhatsApp) ── -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="ClassKira">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ asset($image) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="ClassKira — Every School. One System.">
<meta property="og:url" content="{{ $url }}">
<meta property="og:locale" content="en_IN">

<!-- ── Twitter / X Card ────────────────────────── -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@pixalara">
<meta name="twitter:creator" content="@pixalara">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ asset($image) }}">
<meta name="twitter:image:alt" content="ClassKira — Every School. One System.">

<!-- ── Favicon Suite ───────────────────────────── -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
<meta name="msapplication-TileColor" content="#0DA896">
<meta name="msapplication-config" content="{{ asset('favicon/browserconfig.xml') }}">

<!-- ── Geo / Local SEO ─────────────────────────── -->
<meta name="geo.region" content="IN">
<meta name="geo.placename" content="India">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
