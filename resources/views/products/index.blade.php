<x-layouts.app>
    <x-slot name="title">Our Collections | ZUE Artisanal Pâtisserie</x-slot>

    <!-- Hero Section -->
    <section class="relative h-[614px] flex items-center justify-center overflow-hidden curved-section-bottom bg-surface-container-low">
        <div class="absolute inset-0 z-0">
            <img alt="Luxury Bakery Background" class="w-full h-full object-cover opacity-30 mix-blend-multiply"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPydkOOIuYSrDNPFDLx1APdodqwuhn0Y3F5MuqMMTXzRxYUzo_rzJa4DSv6CjQ5sKbc4lpu5pu4VQQgJiJovi2Rt0tLm4IZ_8p1IyxwMXiXXxhTjOsU0BrmidEhWjLt8dFl0KiUPn1MpBerjhxha3LArmi-1p8MeDOazDQg7U9Isn-BHnlIKnC1tywWGGjSdGWTyQYwRciFLbAcnQ_Jom2oiEF3R4Qn1WsGRjXPp4SG9v8wrmiSpglS5gv_SHqtFyr3iTEI0Z3vlI5" />
        </div>
        <div class="relative z-10 text-center px-margin-mobile max-w-3xl">
            <h1 class="font-display-lg text-display-lg text-primary mb-4">
                @if($activeCategory)
                    {{ $activeCategory->name }}
                @else
                    Our Collections
                @endif
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed italic">
                @if($activeCategory && $activeCategory->description)
                    {{ $activeCategory->description }}
                @else
                    "Every creation is a handcrafted masterpiece, baked with love and designed to make your celebrations unforgettable."
                @endif
            </p>
            <div class="lace-border mt-8 opacity-40"></div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="mt-20 mb-12 px-margin-mobile md:px-gutter max-w-container-max mx-auto">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('category.show') }}"
                class="px-8 py-3 rounded-full font-label-lg text-label-lg ambient-shadow transition-transform hover:scale-105 active:scale-95 border {{ !$activeCategory ? 'bg-primary text-on-primary border-primary' : 'bg-surface-container-high text-on-surface-variant hover:bg-secondary-container border-outline-variant' }}">
                All
            </a>
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category) }}"
                    class="px-8 py-3 rounded-full font-label-lg text-label-lg transition-all hover:scale-105 active:scale-95 border {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-primary text-on-primary ambient-shadow border-primary' : 'bg-surface-container-high text-on-surface-variant hover:bg-secondary-container border-outline-variant' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </section>

    <!-- Product Grid -->
    <section class="mb-20 px-margin-mobile md:px-gutter max-w-container-max mx-auto min-h-[400px]">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($products as $product)
                    <div class="group bg-surface-container-low rounded-[32px] border border-outline-variant p-4 transition-all duration-500 hover:-translate-y-2 ambient-shadow">
                        <div class="relative overflow-hidden rounded-[24px] aspect-square mb-6">
                            @if($product->getFirstMediaUrl('featured_image'))
                                <img alt="{{ $product->title }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    src="{{ $product->getFirstMediaUrl('featured_image') }}" />
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-surface-variant text-primary font-headline-sm">
                                    {{ $product->title }}
                                </div>
                            @endif
                        </div>
                        <div class="px-2">
                            <div class="mb-2">
                                <h3 class="font-headline-sm text-headline-sm text-primary">
                                    {{ $product->title }}
                                </h3>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mb-4 line-clamp-2 h-10">
                                {{ $product->short_description }}
                            </p>
                            <a href="{{ $whatsappLink }}" target="_blank"
                                class="block w-full py-4 rounded-full bg-primary text-on-primary font-label-lg text-label-lg uppercase tracking-widest text-center transition-all hover:bg-on-primary-fixed-variant active:scale-95">
                                Request This Design
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-primary/40 text-6xl mb-4">sentiment_dissatisfied</span>
                <p class="font-body-lg text-on-surface-variant">No products found in this collection yet.</p>
                <a href="{{ route('category.show') }}" class="mt-6 inline-block text-primary border-b border-primary pb-1 font-label-lg">Browse all collections</a>
            </div>
        @endif
    </section>

    <!-- Bottom CTA -->
    <section class="mt-32 bg-surface-container curved-section-top pt-24 pb-32">
        <div class="px-margin-mobile md:px-gutter max-w-container-max mx-auto text-center">
            <div class="flex justify-center mb-6">
                <span class="material-symbols-outlined text-primary text-5xl">spa</span>
            </div>
            <h2 class="font-display-lg text-display-lg text-primary mb-6">
                Let's Create Together
            </h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-10 italic">
                Bespoke orders require time and soul. From intimate birthdays to grand weddings, we collaborate with you to craft the flavor of your memories.
            </p>
            <a class="inline-flex items-center gap-3 bg-primary text-on-primary font-label-lg text-label-lg px-12 py-5 rounded-full ambient-shadow hover:bg-on-primary-fixed-variant transition-all hover:scale-105 active:scale-95 group"
                href="{{ $whatsappLink }}" target="_blank">
                <span class="material-symbols-outlined">chat_bubble</span>
                Inquire via WhatsApp
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <div class="mt-16 pb-12 flex justify-center gap-12 text-primary/40">
                <span class="material-symbols-outlined text-4xl">local_florist</span>
                <span class="material-symbols-outlined text-4xl">cake</span>
                <span class="material-symbols-outlined text-4xl">local_florist</span>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .lace-border {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='20' viewBox='0 0 100 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 20c5 0 5-10 10-10s5 10 10 10 5-10 10-10 5 10 10 10 5-10 10-10 5 10 10 10 5-10 10-10 5 10 10 10 5-10 10-10 5 10 10 10z' fill='none' stroke='%23d4c2c2' stroke-width='1'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            height: 20px;
        }
        .curved-section-bottom {
            border-bottom-left-radius: 50% 40px;
            border-bottom-right-radius: 50% 40px;
        }
        .curved-section-top {
            border-top-left-radius: 50% 40px;
            border-top-right-radius: 50% 40px;
        }
    </style>
    @endpush
</x-layouts.app>
