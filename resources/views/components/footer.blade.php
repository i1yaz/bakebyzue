<!-- Footer (Shared Component) -->
<footer class="bg-surface-container-low border-t border-outline-variant full-width rounded-t-[40px] mt-20">
    <div class="flex flex-col md:flex-row justify-between items-center w-full px-gutter py-section-padding max-w-container-max mx-auto gap-8">
        <div class="flex flex-col items-center md:items-start">
            <span class="font-headline-sm text-headline-sm text-primary mb-2">ZUE</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant">© {{ date('Y') }} ZUE Home Baked Cakes. Handcrafted with Love.</p>
        </div>
        <ul class="flex flex-wrap justify-center gap-6">
            <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary underline decoration-dotted opacity-80 hover:opacity-100 transition-opacity" href="{{ url('/') }}#inquiry">Contact Us</a></li>
            <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary underline decoration-dotted opacity-80 hover:opacity-100 transition-opacity" href="{{ route('privacy') }}">Privacy Policy</a></li>
            <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary underline decoration-dotted opacity-80 hover:opacity-100 transition-opacity" href="{{ route('terms') }}">Terms & Conditions</a></li>

            @php
                $instagramLink = \App\Models\SiteSetting::where('key', 'instagram_link')->value('value') ?? 'https://www.instagram.com/bakebyzue';
            @endphp
            <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary underline decoration-dotted opacity-80 hover:opacity-100 transition-opacity" href="{{ $instagramLink }}" target="_blank">Instagram</a></li>
            <li><a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary underline decoration-dotted opacity-80 hover:opacity-100 transition-opacity" href="{{ $whatsappLink }}" target="_blank">WhatsApp</a></li>
        </ul>
    </div>
</footer>
