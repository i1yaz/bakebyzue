<x-layouts.app>
    <x-slot name="title">ZUE | {{ $product->title }}</x-slot>

    @php
        $whatsappNumber = config('app.whatsapp_number', 'yournumber');
        $whatsappLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode("Hi ZUE! I'm interested in '{$product->title}'. Could you tell me more?");
    @endphp

    <main>
        <!-- Product Hero -->
        <section class="w-full max-w-container-max mx-auto px-margin-mobile md:px-gutter py-12 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Gallery -->
                <div class="relative group">
                    <div class="aspect-[4/5] rounded-[40px] overflow-hidden soft-shadow bg-surface-container-low border border-outline-variant">
                        @if($product->getFirstMediaUrl('featured_image'))
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 alt="{{ $product->title }}"
                                 src="{{ $product->getFirstMediaUrl('featured_image') }}" />
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-surface-variant text-primary font-headline-sm">
                                {{ $product->title }}
                            </div>
                        @endif
                    </div>
                    @php
                        $secondaryImage = $product->getMedia('gallery')->first();
                    @endphp
                    @if($secondaryImage)
                        <div class="absolute -bottom-6 -right-6 hidden lg:block w-48 h-48 rounded-full overflow-hidden border-4 border-surface soft-shadow">
                            <img class="w-full h-full object-cover"
                                 alt="{{ $product->title }} interior"
                                 src="{{ $secondaryImage->getUrl() }}" />
                        </div>
                    @endif
                </div>
                <!-- Product Content -->
                <div class="space-y-8">
                    <div class="space-y-2">
                        <span class="font-label-lg text-label-lg text-primary uppercase tracking-[0.2em]">
                            {{ $product->category->name ?? 'Signature Collection' }}
                        </span>
                        <h1 class="font-display-lg text-display-lg text-primary leading-tight">
                            {{ $product->title }}
                        </h1>
                    </div>
                    <p class="font-body-lg text-body-lg text-on-surface-variant italic leading-relaxed">
                        {{ $product->short_description }}
                    </p>
                    @if($product->flavor_tags)
                        <div class="flex flex-wrap gap-3">
                            @foreach($product->flavor_tags as $tag)
                                <span class="px-4 py-2 rounded-full bg-secondary-container text-on-secondary-container font-body-sm text-body-sm">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ $whatsappLink }}" target="_blank"
                            class="flex-1 px-8 py-5 bg-primary text-on-primary rounded-full font-label-lg text-label-lg flex items-center justify-center gap-2 transition-transform duration-200 active:scale-95 hover:bg-surface-tint soft-shadow text-center">
                            Inquire via WhatsApp
                        </a>
                        <a href="{{ $whatsappLink }}&text={{ urlencode('I would like to request customization for ' . $product->title) }}" target="_blank"
                            class="flex-1 px-8 py-5 border-2 border-primary text-primary rounded-full font-label-lg text-label-lg flex items-center justify-center gap-2 transition-transform duration-200 active:scale-95 hover:bg-primary-fixed/20 text-center">
                            Request Customization
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Storytelling Section -->
        @if($product->full_description)
            <section class="py-section-padding bg-surface relative overflow-hidden">
                <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter relative z-10">
                    <div class="max-w-3xl mx-auto text-center space-y-8">
                        <h2 class="font-display-lg text-display-lg text-primary">Handcrafted with Love</h2>
                        <div class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                            {!! nl2br(e($product->full_description)) !!}
                        </div>
                        @php
                            $storyImage = $product->getMedia('gallery')->skip(1)->first();
                        @endphp
                        @if($storyImage)
                            <div class="pt-8">
                                <img class="w-full h-96 object-cover rounded-[40px] border border-outline-variant soft-shadow"
                                     alt="Artisanal process"
                                     src="{{ $storyImage->getUrl() }}" />
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute top-10 left-10 opacity-10 pointer-events-none">
                    <span class="material-symbols-outlined text-[120px] text-primary">filter_vintage</span>
                </div>
                <div class="absolute bottom-10 right-10 opacity-10 pointer-events-none">
                    <span class="material-symbols-outlined text-[120px] text-primary">local_florist</span>
                </div>
            </section>
        @endif

        <!-- Testimonials -->
        @if($testimonial)
            <section class="py-16 bg-surface-container-high">
                <div class="max-w-4xl mx-auto px-margin-mobile md:px-gutter">
                    <div class="bg-surface p-12 rounded-[40px] border border-outline-variant soft-shadow text-center space-y-6">
                        <span class="material-symbols-outlined text-primary text-5xl" style="font-variation-settings: 'FILL' 1;">format_quote</span>
                        <p class="font-headline-sm text-headline-sm text-on-surface italic leading-relaxed">
                            "{{ $testimonial->review }}"
                        </p>
                        <div class="pt-4">
                            <p class="font-label-lg text-label-lg text-primary uppercase">{{ $testimonial->customer_name }}</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Related Creations -->
        @if($relatedProducts->count() > 0)
            <section class="py-section-padding">
                <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter space-y-12">
                    <div class="flex justify-between items-end">
                        <div class="space-y-2">
                            <span class="font-label-lg text-label-lg text-primary uppercase tracking-[0.2em]">Explore More</span>
                            <h2 class="font-headline-lg text-headline-lg text-primary">You May Also Love</h2>
                        </div>
                        <a class="font-label-lg text-label-lg text-primary flex items-center gap-2 group" href="{{ route('category.show') }}">
                            View Boutique <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($relatedProducts as $related)
                            <a href="{{ route('product.show', $related) }}" class="group cursor-pointer">
                                <div class="aspect-square rounded-[32px] overflow-hidden mb-6 border border-outline-variant soft-shadow">
                                    @if($related->getFirstMediaUrl('featured_image'))
                                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                             alt="{{ $related->title }}"
                                             src="{{ $related->getFirstMediaUrl('featured_image') }}" />
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-surface-variant text-primary font-headline-sm">
                                            {{ $related->title }}
                                        </div>
                                    @endif
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-primary mb-2">{{ $related->title }}</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant italic line-clamp-2">{{ $related->short_description }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Final CTA -->
        <section class="py-20 text-center bg-surface-container-low border-t border-outline-variant curved-section-top">
            <div class="max-w-2xl mx-auto px-margin-mobile space-y-8">
                <h2 class="font-display-lg text-display-lg text-primary">Let's Create Your Masterpiece</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">
                    Whether it's an intimate celebration or a grand gala, we are here to bring your vision to life with Parisian elegance.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ $whatsappLink }}" target="_blank"
                        class="px-12 py-5 bg-primary text-on-primary rounded-full font-label-lg text-label-lg transition-transform duration-200 active:scale-95 hover:bg-surface-tint soft-shadow text-center">
                        Start Your Inquiry
                    </a>
                </div>
            </div>
        </section>
    </main>

    @push('styles')
    <style>
        .soft-shadow {
            box-shadow: 0 10px 30px -10px rgba(93, 64, 55, 0.08);
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
