@props([
    'metaTitle' => null,
    'metaDescription' => null,
    'metaImage' => null,
    'metaType' => 'website',
])

@php
    // Use metaTitle prop if provided, otherwise fallback to title attribute (for backward compatibility with existing views)
    $passedTitle = $metaTitle ?? $attributes->get('title');
    
    $finalTitle = $passedTitle 
        ? (str_contains($passedTitle, 'ZUE') ? $passedTitle : $passedTitle . ' | ZUE Home Baked Cakes')
        : 'ZUE Home Baked Cakes';
        
    $finalDescription = $metaDescription ?? "Experience the warmth of artisanal baking at ZUE. Handcrafted cakes and desserts made with love for your special moments.";
    
    // Ensure we have a fallback image and it's an absolute URL
    $finalImage = $metaImage ?: cloud_asset('assets/logo/zue-round.jpeg');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    
    <!-- Primary Meta Tags -->
    <title>{{ $finalTitle }}</title>
    <meta name="title" content="{{ $finalTitle }}">
    <meta name="description" content="{{ $finalDescription }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $metaType }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $finalTitle }}">
    <meta property="og:description" content="{{ $finalDescription }}">
    <meta property="og:image" content="{{ $finalImage }}">
    <meta property="og:image:secure_url" content="{{ $finalImage }}">
    <meta property="og:image:type" content="image/jpeg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $finalTitle }}">
    <meta property="twitter:description" content="{{ $finalDescription }}">
    <meta property="twitter:image" content="{{ $finalImage }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ cloud_asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ cloud_asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ cloud_asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ cloud_asset('assets/favicon/site.webmanifest') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body
    class="bg-background text-on-background font-body-md text-body-md antialiased selection:bg-primary-container selection:text-on-primary-container">

    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @stack('scripts')
</body>

</html>