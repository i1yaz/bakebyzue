<!-- TopNavBar (Shared Component) -->
<nav
    class="docked full-width top-0 bg-surface/90 backdrop-blur-md flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-20 z-50 sticky inset-x-0">
    <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-primary">
        <img src="{{ cloud_asset('assets/logo/zue-rectangular-logo.png') }}" alt="Logo" class="h-12">
    </a>
    <ul class="hidden md:flex items-center gap-8">
        <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors duration-300"
                href="{{ url('/') }}#collections">Collections</a></li>
        <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors duration-300"
                href="{{ url('/') }}#story">Our Story</a></li>
        <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors duration-300"
                href="{{ url('/') }}#inquiry">Inquiry</a></li>
    </ul>
    <a href="{{ url('/') }}#inquiry" onclick="window.open('{{ $whatsappLink }}', '_blank')"
        class="bg-primary text-on-primary rounded-full px-6 py-3 font-label-lg text-label-lg uppercase tracking-widest hover:bg-surface-tint transition-all scale-105 ambient-shadow inline-block">
        Order Now
    </a>
</nav>