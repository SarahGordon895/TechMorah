# Asset Integration - Code Reference Guide

## Quick Reference: Asset Links

### CSS Assets (Head Section)
```html
<!-- Bootstrap CSS (optional, for utility classes) -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Animate CSS -->
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

<!-- Custom Style -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
```

### JavaScript Assets (Body Section, before closing tag)
```html
<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- WOW.js - Scroll animations -->
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>

<!-- Easing Functions - jQuery easing -->
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>

<!-- Waypoints - Scroll detection -->
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>

<!-- Main initialization script -->
<script src="{{ asset('js/main.js') }}"></script>
```

---

## WOW.js Animation Examples

### Basic Usage
```html
<!-- Elements with WOW.js animation classes -->
<h1 class="wow slideInDown">Get In Touch</h1>
<p class="wow fadeIn" data-wow-delay=".2s">Subtitle text</p>
<div class="wow fadeInUp" data-wow-delay=".3s">Card content</div>
```

### Available Animations from Animate.css
```
- fadeIn / fadeOut
- slideInDown / slideInUp / slideInLeft / slideInRight
- bounceIn / bounceOut
- rotateIn / rotateOut
- zoomIn / zoomOut
- flipIn / flipOut
- And many more...
```

### Staggered Animation Pattern
```html
<!-- Using incremental delays for visual hierarchy -->
<div class="wow fadeInUp" data-wow-delay=".1s">First item</div>
<div class="wow fadeInUp" data-wow-delay=".2s">Second item</div>
<div class="wow fadeInUp" data-wow-delay=".3s">Third item</div>
<div class="wow fadeInUp" data-wow-delay=".4s">Fourth item</div>
```

### Initialization in main.js
```javascript
// WOW.js is initialized automatically in public/js/main.js
new WOW().init();

// This watches for elements with class "wow" and animates them
// when they come into the viewport during scroll
```

---

## Font Awesome Icon Usage

### Contact Form Icons
```html
<i class="fas fa-map-marker-alt"></i>      <!-- Map pin -->
<i class="fas fa-phone"></i>               <!-- Phone -->
<i class="fas fa-envelope"></i>            <!-- Email envelope -->
<i class="fa fa-arrow-up"></i>             <!-- Up arrow -->
```

### Icon Styling Patterns
```html
<!-- Icon in colored circle (Orange accent) -->
<div class="w-12 h-12 bg-[#FF750F] rounded-full flex items-center justify-center text-white">
    <i class="fas fa-map-marker-alt"></i>
</div>

<!-- Icon with size and color -->
<i class="fa fa-arrow-up text-white"></i>

<!-- Icon in button -->
<button class="btn">
    <i class="fas fa-paper-plane"></i>
    <span>Send</span>
</button>
```

---

## Custom CSS Classes (from style.css)

### Spinner
```css
/* Spinner styling - auto-hides after page load */
#spinner {
    background: rgba(0, 0, 0, 0.5);
    z-index: 99999;
}

#spinner.show {
    display: flex;
}
```

### Back-to-Top Button
```css
/* Back-to-top button styling */
.back-to-top {
    position: fixed;
    right: 30px;
    bottom: 30px;
    width: 50px;
    height: 50px;
    background-color: #FF750F;
    display: none;
    z-index: 999;
}

.back-to-top:hover {
    background-color: #E66500;
    transition: background-color 0.3s;
}

.back-to-top.show {
    display: block;
}
```

### Button Utilities
```css
/* Button square utilities for consistency */
.btn-square {
    width: 40px;
    height: 40px;
    padding: 0;
    border-radius: 50%;
}

.btn-lg-square {
    width: 50px;
    height: 50px;
    padding: 0;
    border-radius: 50%;
}
```

---

## Form Submission with AJAX

### Form HTML
```html
<form id="contactForm" method="POST" action="{{ route('contact.send') }}">
    @csrf
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <input type="tel" name="phone">
    <textarea name="message" required></textarea>
    <button type="submit">Send Message</button>
    <div id="formAlert"></div>
</form>
```

### Form JavaScript Handling
```javascript
document.getElementById('contactForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const alertBox = document.getElementById('formAlert');
    const submitBtn = form.querySelector('button[type="submit"]');

    // Show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    alertBox.innerHTML = '<div class="text-blue-600">📨 Sending your message...</div>';

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({
                name: form.name.value,
                email: form.email.value,
                phone: form.phone.value,
                message: form.message.value,
            }),
        });

        if (response.ok) {
            form.reset();
            alertBox.innerHTML = '<div class="text-green-600">✅ Message sent successfully!</div>';
            submitBtn.textContent = 'Send Message';
            submitBtn.disabled = false;
        } else {
            alertBox.innerHTML = '<div class="text-red-600">❌ Failed to send message.</div>';
            submitBtn.textContent = 'Send Message';
            submitBtn.disabled = false;
        }
    } catch (error) {
        console.error('Error:', error);
        alertBox.innerHTML = '<div class="text-red-600">❌ Error sending message.</div>';
        submitBtn.textContent = 'Send Message';
        submitBtn.disabled = false;
    }
});
```

---

## Color Palette Reference

### TECHMORAH Brand Colors
```css
Primary Orange:     #FF750F
Hover Orange:       #E66500 (darker on hover)

Dark Background:    #1b1b18
Dark Accent:        #2d2d27
Dark Deep:          #0a0a0a

Light Background:   #FDFDFC (near white)
Light Accent:       #EDEDEC (light gray)

Borders Light:      #e3e3e0 (light borders)
Borders Dark:       #3E3E3A (dark mode borders)

Card Dark:          #161615 (card backgrounds)
Text Dark:          #1b1b18 (dark text)
Text Light:         #EDEDEC (light text)
```

### Usage in Tailwind CSS
```html
<!-- Using custom color values -->
<div class="bg-[#FF750F] dark:bg-[#0a0a0a]">
    <p class="text-[#1b1b18] dark:text-[#EDEDEC]">Content</p>
</div>

<!-- Focus states -->
<input class="focus:ring-2 focus:ring-[#FF750F]">

<!-- Border colors -->
<div class="border-[#e3e3e0] dark:border-[#3E3E3A]">
    Bordered content
</div>
```

---

## Responsive Design Patterns

### Grid Responsive
```html
<!-- 3 columns on desktop, responsive on smaller screens -->
<div class="grid md:grid-cols-3 gap-8">
    <div>Column 1</div>
    <div>Column 2</div>
    <div>Column 3</div>
</div>

<!-- 2 columns on desktop, single column on mobile -->
<div class="grid lg:grid-cols-2 gap-12">
    <div>Left column</div>
    <div>Right column</div>
</div>
```

### Responsive Typography
```html
<!-- Text sizes that respond to viewport -->
<h1 class="text-3xl md:text-4xl lg:text-5xl">Responsive heading</h1>
<p class="text-sm md:text-base lg:text-lg">Responsive paragraph</p>
```

### Responsive Spacing
```html
<!-- Padding/margin that adjusts to screen size -->
<div class="px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-20">
    Content with responsive padding
</div>
```

---

## Dark Mode Implementation

### Tailwind Dark Mode Classes
```html
<!-- Light mode styling / Dark mode styling -->
<div class="bg-white dark:bg-[#161615]">
    <p class="text-gray-900 dark:text-gray-100">Text</p>
</div>

<!-- Conditional based on system preference -->
<!-- No extra configuration needed - Tailwind handles it -->
```

### Dark Mode Triggers
```html
<!-- Browser system preference (default) -->
<!-- Via prefers-color-scheme media query -->

<!-- OR via HTML class attribute -->
<html class="dark">
    <!-- All dark: prefixed classes apply -->
</html>
```

---

## Common Patterns Used

### Info Card Pattern
```html
<div class="bg-white dark:bg-[#161615] p-8 rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-lg transition-shadow">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-12 h-12 bg-[#FF750F] rounded-full flex items-center justify-center text-white">
            <i class="fas fa-icon"></i>
        </div>
        <div>
            <h3 class="font-semibold text-lg mb-1">Title</h3>
            <p class="text-gray-600 dark:text-gray-400">Description</p>
        </div>
    </div>
</div>
```

### Form Input Pattern
```html
<div class="mb-6">
    <label for="fieldName" class="block text-sm font-medium mb-2">Label</label>
    <input
        type="text"
        id="fieldName"
        name="fieldName"
        class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF750F] transition"
        placeholder="Placeholder text"
    >
</div>
```

### Button Pattern
```html
<button class="px-6 py-3 bg-[#FF750F] hover:bg-[#E66500] text-white font-medium rounded-lg transition-colors duration-200">
    Button Text
</button>
```

---

## Performance Tips

### 1. Asset Optimization
```html
<!-- Use minified versions -->
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>

<!-- Use CDN for common libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Lazy load images -->
<iframe loading="lazy" src="..."></iframe>
```

### 2. CSS Strategy
```html
<!-- Load critical CSS in head -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Non-critical CSS can be loaded asynchronously -->
<link rel="preload" href="{{ asset('css/style.css') }}" as="style">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
```

### 3. Script Placement
```html
<!-- Critical scripts in head if needed -->
<!-- Non-critical scripts at end of body -->
<script src="..." defer></script>
```

---

## Troubleshooting Guide

### Issue: Animations not triggering
**Solution**: Ensure WOW.js is loaded and element has `wow` class
```html
<!-- Correct -->
<div class="wow fadeInUp" data-wow-delay=".3s">Content</div>

<!-- Incorrect -->
<div class="fadeInUp">Content</div>  <!-- Missing 'wow' class -->
```

### Issue: Icons not displaying
**Solution**: Check Font Awesome is loaded and class names are correct
```html
<!-- Verify Font Awesome is linked -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Use correct class format -->
<i class="fas fa-check"></i>  <!-- Correct -->
<i class="fa-check"></i>      <!-- Incorrect -->
```

### Issue: Dark mode not working
**Solution**: Verify dark mode is properly configured in Tailwind
```html
<!-- Add to <html> tag if system preference not working -->
<html class="dark">
    <!-- OR rely on browser preference -->
    <!-- prefers-color-scheme: dark -->
</html>
```

### Issue: CSRF token validation fails
**Solution**: Ensure CSRF token is included in form
```html
<form>
    @csrf  <!-- Add this in Blade templates -->
    <!-- OR -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
```

---

## File Checklist

### CSS Files (in public/css/)
- [x] bootstrap.min.css (imported)
- [x] style.css (imported)

### JavaScript Files (in public/)
- [x] js/main.js (imported)

### Library Files (in public/lib/)
- [x] animate/animate.min.css (imported)
- [x] wow/wow.min.js (imported)
- [x] easing/easing.min.js (imported)
- [x] waypoints/waypoints.min.js (imported)

### External CDN Files
- [x] Font Awesome (cdnjs.cloudflare.com)
- [x] jQuery (code.jquery.com)
- [x] Tailwind CSS (cdn.tailwindcss.com)

---

**Last Updated**: 2025-11-13
**Version**: 1.0
**Status**: Complete and Ready for Production
