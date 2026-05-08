---
name: Artisanal Pâtisserie
colors:
  surface: '#fff8f6'
  surface-dim: '#fbd1c4'
  surface-bright: '#fff8f6'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#fff1ed'
  surface-container: '#ffe9e3'
  surface-container-high: '#ffe2da'
  surface-container-highest: '#ffdbd0'
  on-surface: '#2c160e'
  on-surface-variant: '#504444'
  inverse-surface: '#442a22'
  inverse-on-surface: '#ffede8'
  outline: '#827473'
  outline-variant: '#d4c2c2'
  surface-tint: '#7b5455'
  primary: '#7b5455'
  on-primary: '#ffffff'
  primary-container: '#d4a5a5'
  on-primary-container: '#5d3a3b'
  inverse-primary: '#ecbbba'
  secondary: '#705959'
  on-secondary: '#ffffff'
  secondary-container: '#f8d8d8'
  on-secondary-container: '#755d5d'
  tertiary: '#665d53'
  on-tertiary: '#ffffff'
  tertiary-container: '#bbaea2'
  on-tertiary-container: '#4a4238'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdad9'
  primary-fixed-dim: '#ecbbba'
  on-primary-fixed: '#2f1314'
  on-primary-fixed-variant: '#603d3e'
  secondary-fixed: '#fbdbdb'
  secondary-fixed-dim: '#debfbf'
  on-secondary-fixed: '#281717'
  on-secondary-fixed-variant: '#574142'
  tertiary-fixed: '#eee0d3'
  tertiary-fixed-dim: '#d1c4b8'
  on-tertiary-fixed: '#211a13'
  on-tertiary-fixed-variant: '#4e453c'
  background: '#fff8f6'
  on-background: '#2c160e'
  surface-variant: '#ffdbd0'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 56px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '600'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.3'
  headline-sm:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Montserrat
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Montserrat
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  body-sm:
    fontFamily: Montserrat
    fontSize: 14px
    fontWeight: '400'
    lineHeight: '1.5'
  label-lg:
    fontFamily: Montserrat
    fontSize: 14px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: 0.1em
  headline-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.2'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1200px
  gutter: 24px
  margin-mobile: 20px
  section-padding: 80px
---

## Brand & Style

The design system is rooted in the "Artisanal Pâtisserie" aesthetic—a fusion of Parisian elegance and cottagecore warmth. It targets an audience that values slow-living, handcrafted quality, and premium presentation. The personality is refined yet approachable, avoiding the coldness of traditional high-luxury in favor of a "soft luxury" that feels like a curated home.

The visual style leans into a **Tactile Minimalist** approach. It prioritizes white space and high-quality imagery of baked goods, framed by delicate, ornamental flourishes that mimic lace and vintage botanical illustrations. Every interaction should feel intentional and graceful, evoking the emotional response of entering a sun-drenched bakery filled with the scent of vanilla and rosewater.

## Colors

The palette is a warm, monochromatic-adjacent scheme designed to feel appetizing and nostalgic. 

- **Primary (Dusty Rose):** Used for key calls-to-action and primary brand accents.
- **Secondary (Blush Pink):** Used for hover states, subtle backgrounds, and decorative elements.
- **Tertiary (Muted Beige/Peach):** Used for UI containers and soft section transitions.
- **Typography (Soft Chocolate Brown):** This replaces pure black to maintain a soft, vintage warmth. It provides excellent legibility while feeling "baked" and organic.
- **Background (Warm Ivory):** The canvas of the design system, providing a creamy, parchment-like base that is easier on the eyes than stark white.

## Typography

Typography in this design system balances the high-contrast drama of a traditional serif with the functional clarity of a modern sans-serif. 

**Headlines (Playfair Display)** should be used with generous leading. For display sizes, consider using *italic* variants for specific words to emphasize the "handwritten" or artisanal feel.

**Body Text (Montserrat)** is set with increased line-height (1.6) to enhance readability and contribute to the airy atmosphere. Label styles use all-caps and tracking (letter spacing) to create a sophisticated, editorial "menu" look.

## Layout & Spacing

The layout philosophy follows a **Fixed Grid** model for desktop, centered on the screen to feel like a curated physical album or menu. 

- **Grid:** A 12-column grid with wide 24px gutters.
- **Rhythm:** An 8px base unit drives all spacing. 
- **Section Transitions:** Instead of straight horizontal lines, the design system utilizes "Curved Section Transitions" (concave and convex arcs) to soften the breaks between content.
- **Responsive Behavior:** On mobile, margins reduce to 20px and section padding scales down to 48px. Large display typography should reflow to 'mobile' variants to ensure no overflow and maintain a high-fashion editorial balance.

## Elevation & Depth

Hierarchy is conveyed through tonal layering and soft, diffused depth rather than harsh shadows.

- **Tonal Layers:** Containers use a "Warm Ivory" base on "Pale Peach" backgrounds to create a subtle lift.
- **Ambient Shadows:** Shadows should be extremely soft, using a `#5D4037` (Chocolate Brown) tint at 5-8% opacity. This maintains the warmth of the palette and avoids the "grey" look of standard shadows.
- **Depth Focus:** Only primary cards and floating action buttons (like "Order Now") should have visible elevation. All other elements should remain flat or use thin, 1px "Blush Pink" borders to define boundaries.

## Shapes

The shape language is defined by extreme softness. Sharp corners are avoided entirely to reflect the organic nature of baking.

- **Global Radius:** Most components use a `16px` (rounded-lg) radius.
- **Large Components:** Feature cards and hero containers use `24px` to `32px` (2xl to 3xl) to create a "pillowy" feel.
- **Decorative Accents:** Scalloped edges (inspired by the logo’s lace border) are used as decorative masks for images or as bottom borders for headers. 
- **Dividers:** Use delicate, thin floral-stroke SVGs instead of standard horizontal rules.

## Components

### Buttons
Primary buttons are fully rounded (pill-shaped) with a Dusty Rose background and Soft Chocolate Brown text for high contrast without the harshness of black. Hover states involve a slight scale-up (1.02) and a shift to Blush Pink.

### Cards
Cards use a 32px corner radius and a 1px border in Blush Pink. Images inside cards should have a "soft focus" or slightly rounded corners to match the container.

### Input Fields
Inputs are ivory-filled with a subtle Chocolate Brown bottom border (vintage style) or fully rounded with a soft beige stroke. Labels are always positioned above the input in the uppercase Label-LG style.

### Lace Borders & Dividers
A unique component to this design system is the "Lace Overlay"—a repeatable SVG pattern used at the top or bottom of hero sections to mimic the logo's frame.

### Chips & Tags
Used for flavors or dietary notes (e.g., "Gluten-Free"). These are small, pill-shaped, and use the Secondary color with body-sm typography.