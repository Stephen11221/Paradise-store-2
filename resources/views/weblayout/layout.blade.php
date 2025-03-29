<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise</title>
        <!-- Gogle Material Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--slides -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="script.js"></script>

<!-- Tailwind Custom Animation -->
<!-- Custom CSS for Animation -->
<style>
    @keyframes fadeInLetter {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
  
    .animate-fade-in {
      animation: fadeIn 1s ease-out;
    }
  </style>
      
</hea>
<body class="bg-gray-100">
   <!-- Hero Section -->

   <div id="loadingScreen" class="fixed inset-0 flex items-center bg-black justify-center  z-50">
    <div class="text-center">
        <img src="img/logo.jpeg" alt="Loading" class="w-24 h-24 rounded-full animate-pulse mx-auto">
        <div class="mt-4">
            <div class="w-10 h-10 border-4 border-white-300 border-t-gray-600 rounded-full animate-spin mx-auto"></div>
        </div>
    </div>
</div>
<!-- JavaScript for Letter-by-Letter Animation -->
    
    <!-- Navbar -->
    <nav class="bg-black text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex items-center space-x-2 bg-black text-white px-4 py-2 rounded-full shadow-lg">
            <img src="img/logo.jpeg" alt="Perfume Logo" class="w-20 h-20 rounded-full">
            <span class="text-lg font-bold">Paradise</span>
        </div>
        
        <!-- Mobile Menu Button -->
        <button class="md:hidden text-2xl" id="menu-toggle">&#9776;</button>
        
        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6 text-lg" id="nav-links">
            <li><a href="{{ route('home') }}" class="hover:text-gray-400">Home</a></li>
            <li><a href="{{ route('about.view') }}" class="hover:text-gray-400">About</a></li>
            
            <li><a href="{{ route('women') }}" class="hover:text-gray-400">Women</a></li> 
            <li><a href="{{ route('men') }}" class="hover:text-gray-400">Men</a></li>             
            <li><a href="{{ route('product.view') }}" class="hove:text-gray-400">Product </a></li>      
            <li><a href="{{ route('brand') }}" class="hover:text-gray-400">Brand</a></li>
            <li><a href="{{ route('contact.store' ) }}" class="hover:text-gray-400">Contact</a></li>
                 <!-- Cart Icon -->
                 <a href="" class="relative hover:text-gray-400">
                <i class="material-icons">shopping_cart</i>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full" id="cart-count">0</span>
            </a>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <ul class="hidden flex flex-col space-y-2 bg-black p-4 md:hidden" id="mobile-menu">
        <li><a href="{{ route('home') }}" class="hover:text-gray-400">Home</a></li>
        <li><a href="{{ route('about.view') }}"  class="hover:text-gray-400">About</a></li>
        <li><a href="{{ route('women') }}" class="hover:text-gray-400">Women</a></li> 
        <li><a href="{{ route('men') }}" class="hover:text-gray-400">Men</a></li>
        <li><a href="{{ route('product.view') }}" class="hover:text-gray-400">Product</a>        </li>                    
        <li><a href="{{ route('brand') }}" class="hover:text-gray-400">Brand</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-gray-400">Contact</a></li>
                <!-- Cart Icon -->
                <a href="" class="relative hover:text-gray-400">
                    <i class="material-icons">shopping_icon</i>
                    <span class="absolute -top-2 -right-2bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full" id="cart-count">0</span>
                </a>
    </ul>
</nav>

<!-- JavaScript for Mobile Menu Toggle -->
    @yield('content')
    <footer class="bg-black text-white text-center p-6 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-left">
            <!-- About Us Section -->
            <div>
                <h3 class="text-xl font-semibold">About Us</h3>
                <p class="text-gray-400 mt-2">Luxury perfumes at the best prices. Discover our exclusive collections.</p>
            </div>
    
            <!-- Quick Links Section -->
            <div>
                <h3 class="text-xl font-semibold">Quick Links</h3>
                <ul class="text-gray-400 mt-2 space-y-2">
                    <li><a href="#" class="hover:text-white flex items-center"><span class="material-icons text-sm mr-2">chevron_right</span>Contact Us</a></li>
                    <li><a href="#" class="hover:text-white flex items-center"><span class="material-icons text-sm mr-2">chevron_right</span>FAQ</a></li>
                    <li><a href="#" class="hover:text-white flex items-center"><span class="material-icons text-sm mr-2">chevron_right</span>Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white flex items-center"><span class="material-icons text-sm mr-2">chevron_right</span>Terms & Conditions</a></li>
                </ul>
            </div>
    
            <!-- Newsletter Subscription -->
            <div>
.<footer class="bg-gray-800 text-white p-6 text-center mt-10">
    <p class="mb-3">Subscribe to our newsletter for updates</p>
    
    @if(session('success'))
        <p class="text-green-400">{{ session('success') }}</p>
    @endif

    <form action="{{ route('subscribe') }}" method="POST" class="mt-2">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required
            class="p-2 border rounded w-64 text-black">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded">
            Subscribe
        </button>
    </form>
</footer>

            </div>
    
            <!-- Social Media Section -->
            <div>
                <h3 class="text-xl font-semibold">Follow Us</h3>
                <div class="flex space-x-4 text-gray-400 mt-2">
                    <a href="#" class="hover:text-white text-2xl"><span class="material-icons">facebook</span></a>
                    <a href="#" class="hover:text-white text-2xl"><span class="material-icons">camera_alt</span></a>
                    <a href="#" class="hover:text-white text-2xl"><span class="material-icons">chat</span></a>
                    <a href="#" class="hover:text-white text-2xl"><span class="material-icons">play_circle</span></a>
                </div>
            </div>
        </div>
    
        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 mt-6 pt-4 text-gray-500 text-sm">
            <p>&copy; 2025 Perfume Luxe. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
            // Mobile Navbar Toggle
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });


    // Hide loader after 3 seconds
        setTimeout(() => {
            document.getElementById('loadingScreen').style.display = 'none';
        }, 3000);
// Image Slider Logic

let currentIndex = 0;
const slides = document.querySelectorAll("#slider > div");
const totalSlides = slides.length;

function updateSlide() {
    document.getElementById("slider").style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Auto-slide every 3 seconds
setInterval(() => {
    nextSlide();
}, 3000);

function prevSlide() {
    currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
    updateSlide();
}

function nextSlide() {
    currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
    updateSlide();
}

        // Auto-slide for Customer Reviews
        let index = 0;
        function slideReviews() {
            const slider = document.getElementById("reviewSlider");
            index = (index + 1) % 2; // Change number based on total reviews
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
        setInterval(slideReviews, 3000);
        // brand animation 
        document.addEventListener("DOMContentLoaded", function () {
            const text = "EXCLUSIVE PERFUME BRANDS";
            const animatedText = document.getElementById("animatedBrandText");
            let index = 0;
        
            function typeText() {
              if (index < text.length) {
                let span = document.createElement("span");
                span.textContent = text[index];
                span.style.opacity = "0";
                span.style.animation = "fadeInLetter 0.5s ease-out forwards";
                span.style.animationDelay = `${index * 0.1}s`; // Delay each letter
                animatedText.appendChild(span);
                index++;
                setTimeout(typeText, 50); // Adjust speed here
              }
            }
        
            typeText();
          });
 
          // brand  animal
          
        
    document.addEventListener("DOMContentLoaded", function () {
        // Brand Slider (Auto-scroll)
        new Swiper(".brandSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: { delay: 2000, disableOnInteraction: false },
            breakpoints: {
                640: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                1024: { slidesPerView: 5 }
            }
        });

        // New Arrivals Slider
        new Swiper(".newArrivalSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    });

</script>
    
        
</body>
</html>
