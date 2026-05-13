<x-layouts.app meta-description="Handcrafted artisanal cakes and desserts, made with love in our home bakery. Explore our collections and let us create something beautiful for your next celebration.">
    <!-- Hero Section -->
    <header
        class="relative min-h-[100svh] md:min-h-[90vh] flex flex-col items-center justify-center px-margin-mobile md:px-gutter pt-12 md:pt-20 overflow-hidden">
        <div
            class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-gradient-to-br from-secondary-container to-transparent opacity-40 blur-3xl -z-10">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-[60vw] h-[60vw] rounded-full bg-gradient-to-tl from-primary-fixed to-transparent opacity-40 blur-3xl -z-10">
        </div>

        <div class="flex flex-col items-center text-center max-w-3xl mx-auto z-10 space-y-6 md:space-y-8">
            <div class="w-48 md:w-80 h-auto mb-2 md:mb-4">
                <img alt="Zue Home Baked Cakes Logo" class="w-full h-auto object-contain"
                    src="{{ cloud_asset('assets/logo/zue-round.jpeg') }}" />
            </div>

            <h1 class="font-display-lg text-headline-lg md:text-display-lg text-primary max-w-2xl mx-auto leading-tight italic">
                {{ $settings['hero_title'] ?? 'Handcrafted with Love.' }} <br />
                <span class="text-on-surface not-italic">Made at Home.</span>
            </h1>

            <p class="font-body-lg text-body-md md:text-body-lg text-on-surface-variant max-w-xl mx-auto mt-2 md:mt-4">
                {{ $settings['hero_subtitle'] ?? "Experience the warmth of artisanal baking, where every creation is a delicate masterpiece designed to celebrate life's sweetest moments." }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mt-6 md:mt-8 w-full sm:w-auto">
                <a class="inline-flex justify-center items-center px-8 py-4 bg-primary text-on-primary rounded-full font-label-lg text-label-lg uppercase hover:bg-surface-tint transition-all scale-100 hover:scale-105 ambient-shadow"
                    href="{{ route('category.show') }}">
                    Explore Collections
                </a>
                <a class="inline-flex justify-center items-center px-8 py-4 bg-surface border-2 border-outline-variant text-primary rounded-full font-label-lg text-label-lg uppercase hover:bg-surface-container transition-all scale-100 hover:scale-105"
                    href="{{ $whatsappLink }}" target="_blank">
                    Order on WhatsApp
                </a>
            </div>
        </div>
    </header>

    <!-- Featured Categories -->
    <section class="py-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto" id="collections">
        <div class="text-center mb-16">
            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Our Confections</h2>
            <div class="w-16 h-1 bg-outline-variant mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($categories as $category)
                <a class="group block bg-surface rounded-[32px] border border-outline-variant overflow-hidden ambient-shadow transition-transform duration-300 hover:-translate-y-2"
                    href="{{ route('category.show', $category) }}">

                    <div class="aspect-square overflow-hidden bg-surface-container-low">
                        @if($category->getFirstMediaUrl('image'))
                            <img alt="{{ $category->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90"
                                src="{{ $category->getFirstMediaUrl('image', 'webp') }}" />
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-surface-variant text-primary">No Image
                            </div>
                        @endif
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-2">{{ $category->name }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $category->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Signature Collection -->
    @if($signatureProduct)
        <section class="py-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto">
            <div
                class="bg-surface-container-low rounded-[40px] p-8 md:p-12 border border-outline-variant relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-20 pointer-events-none text-primary">
                    <span class="material-symbols-outlined"
                        style="font-size: 120px; font-variation-settings: 'FILL' 0;">local_florist</span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-5 space-y-6 z-10">
                        <div
                            class="inline-block px-4 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-lg text-label-lg uppercase">
                            Signature</div>
                        <h2 class="font-display-lg text-display-lg text-on-surface">{{ $signatureProduct->title }}</h2>
                        <p class="font-body-lg text-body-lg text-on-surface-variant">
                            {{ $signatureProduct->full_description ?? $signatureProduct->short_description }}
                        </p>
                        <ul class="space-y-3 font-body-md text-body-md text-on-surface-variant">
                            @if($signatureProduct->flavor_tags)
                                @foreach($signatureProduct->flavor_tags as $tag)
                                    <li class="flex items-center gap-3"><span
                                            class="material-symbols-outlined text-primary text-sm">favorite</span> {{ $tag }}</li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="pt-4">
                            <a class="inline-flex items-center gap-2 font-label-lg text-label-lg text-primary hover:text-surface-tint border-b-2 border-primary pb-1 transition-colors"
                                href="{{ route('product.show', $signatureProduct) }}">
                                Explore This Creation
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-7 grid grid-cols-2 gap-4 h-[600px]">
                        <div
                            class="col-span-2 md:col-span-1 h-full rounded-[32px] overflow-hidden border border-outline-variant ambient-shadow">
                            @if($signatureProduct->getFirstMediaUrl('featured_image'))
                                <img alt="{{ $signatureProduct->title }}" class="w-full h-full object-cover"
                                    src="{{ $signatureProduct->getFirstMediaUrl('featured_image', 'webp') }}" />
                            @endif
                        </div>
                        <div class="col-span-2 md:col-span-1 grid grid-rows-2 gap-4 h-full">
                            <div class="rounded-[32px] overflow-hidden border border-outline-variant ambient-shadow">
                                @if($signatureProduct->getMedia('gallery_images')->count() > 0)
                                    <img alt="Details" class="w-full h-full object-cover"
                                        src="{{ $signatureProduct->getMedia('gallery_images')->first()->getUrl('webp') }}" />
                                @endif
                            </div>
                            <div
                                class="rounded-[32px] bg-primary-container p-8 flex flex-col justify-center items-center text-center text-on-primary-container border border-outline-variant ambient-shadow">
                                <span class="material-symbols-outlined mb-4"
                                    style="font-size: 48px; font-variation-settings: 'FILL' 1;">cake</span>
                                <h3 class="font-headline-sm text-headline-sm mb-2">Perfect For</h3>
                                <p class="font-body-sm text-body-sm">Intimate weddings, anniversaries, and milestone
                                    celebrations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Custom Orders & Inquiry (Form) -->
    <section class="py-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto relative" id="inquiry">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="space-y-8 flex flex-col justify-center">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Let's Create Something Beautiful</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">
                    Every celebration is unique. Share your vision, and let us handcraft a confection that perfectly
                    matches the joy of your occasion. Please provide details at least two weeks in advance.
                </p>
                <div class="space-y-6 pt-4">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">chat</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-label-lg text-on-surface">Quick Inquiry?</h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Message us directly on
                                WhatsApp.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">photo_camera</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-label-lg text-on-surface">Inspiration</h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Follow our latest creations on
                                Instagram.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vintage Style Form -->
            <div class="bg-surface rounded-[32px] p-8 md:p-10 border border-outline-variant ambient-shadow">
                @if(session('success'))
                    <div class="bg-primary-container text-on-primary-container p-4 rounded-xl mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('inquiry.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                                for="name">Full Name *</label>
                            <input
                                class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface placeholder-outline transition-colors"
                                id="name" name="name" required type="text" />
                        </div>
                        <div class="flex flex-col">
                            <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                                for="email">Email Address</label>
                            <input
                                class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface placeholder-outline transition-colors"
                                id="email" name="email" type="email" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                                for="phone">Phone Number</label>
                            <input
                                class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface placeholder-outline transition-colors"
                                id="phone" name="phone" type="tel" />
                        </div>
                        <div class="flex flex-col">
                            <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                                for="date">Event Date</label>
                            <input
                                class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface placeholder-outline transition-colors"
                                id="date" name="event_date" type="date" />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                            for="type">Desired Dessert</label>
                        <select
                            class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface transition-colors"
                            id="type" name="product_interest">
                            <option>Custom Cake</option>
                            <option>Cupcake Assortment</option>
                            <option>Dessert Box</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                            for="image">Inspiration Picture (Max 10MB)</label>
                        <input
                            class="bg-transparent border-0 border-b-2 border-outline-variant focus:ring-0 focus:border-primary px-0 py-2 font-body-md text-on-surface transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-container file:text-on-primary-container hover:file:bg-secondary-container"
                            id="image" name="image" type="file" accept="image/*" />
                        @error('image')
                            <p class="text-error text-body-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="font-label-lg text-label-lg text-on-surface-variant mb-2 uppercase"
                            for="message">Your Vision *</label>
                        <textarea
                            class="bg-surface-container-lowest border border-outline-variant rounded-xl focus:ring-primary focus:border-primary p-4 font-body-md text-on-surface placeholder-outline transition-colors"
                            id="message" name="message" required
                            placeholder="Tell us about the theme, flavors, and feelings you want to evoke..."
                            rows="4"></textarea>
                    </div>

                    <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.key') }}" data-theme="light"></div>
                    @error('cf-turnstile-response')
                        <p class="text-error text-body-sm mt-1">{{ $message }}</p>
                    @enderror

                    <button
                        class="w-full bg-primary text-on-primary rounded-full py-4 font-label-lg text-label-lg uppercase hover:bg-surface-tint transition-all scale-100 hover:scale-102 ambient-shadow"
                        type="submit">
                        Submit Inquiry
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
@push('scripts')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js"></script>
    <script>
        window.onload = function() {
            if (typeof turnstile === 'undefined') {
                console.error('Turnstile script failed to load.');
            } else {
                console.log('Turnstile is ready.');
            }
        };
    </script>
@endpush
