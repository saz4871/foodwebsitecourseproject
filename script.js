    // GSAP animations
    gsap.from(".content h1", { opacity: 0, y: -50, duration: 1 });
    gsap.from(".content p", { opacity: 0, x: -50, duration: 1, delay: 0.5 });
    gsap.from(".order-summary", { opacity: 0, scale: 0.9, duration: 1, delay: 1 });
    gsap.from(".button", { opacity: 0, y: 50, duration: 1, delay: 1.5 });
    gsap.from(".item-card", {
      opacity: 0,
      scale: 0.8,
      duration: 0.8,
      delay: 2,
      stagger: 0.2,
    });
    gsap.from(".food-image", { opacity: 0, scale: 0.5, duration: 1, delay: 1 });
    gsap.from(".label", { opacity: 0, y: 30, duration: 1, delay: 1.5 });
  
    //Menu Scripts

        // Function to update the image and label
        function updateDisplay(imageSrc, labelText) {
          document.getElementById('display-image').src = imageSrc;
          document.getElementById('display-label').textContent = labelText;
        }
      
      document.querySelectorAll('.scroll-button').forEach(button => {
        button.addEventListener('click', event => {
          event.preventDefault(); // Prevent default link behavior
          const target = document.querySelector(button.getAttribute('href'));
          target.scrollIntoView({ behavior: 'smooth' }); // Smooth scrolling
        });
      });
    
        // Disable right-click
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    
        // Disable common inspect element keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            // F12 key
            if (event.keyCode === 123) {
                event.preventDefault();
            }
    
            // Ctrl+Shift+I
            if (event.ctrlKey && event.shiftKey && event.keyCode === 73) {
                event.preventDefault();
            }
    
            // Ctrl+Shift+J
            if (event.ctrlKey && event.shiftKey && event.keyCode === 74) {
                event.preventDefault();
            }
    
            // Ctrl+U
            if (event.ctrlKey && event.keyCode === 85) {
                event.preventDefault();
            }
    
            // Ctrl+Shift+C (DevTools element picker)
            if (event.ctrlKey && event.shiftKey && event.keyCode === 67) {
                event.preventDefault();
            }
        });
    

    // menu navigation 
// Select all menu buttons
const buttons = document.querySelectorAll(".menu-button");

// Add event listeners to buttons
buttons.forEach((button) => {
  button.addEventListener("click", () => {
    // Hide all sections
    document.querySelectorAll(".menu-section").forEach((section) => {
      section.classList.remove("active");
    });

    // Show the targeted section
    const target = button.getAttribute("data-target");
    document.getElementById(target).classList.add("active");
  });
});

// Show the first section by default
document.getElementById("desi-menu").classList.add("active");

// slider
// GSAP Animation
gsap.registerPlugin(ScrollTrigger);

// Duplicate images to create a seamless loop
const sliderTrack = document.querySelector('.slider-track');
const images = sliderTrack.innerHTML; // Store original images
sliderTrack.innerHTML += images; // Append a duplicate of images

// Get total width of all images (including gaps)
const totalWidth = Array.from(document.querySelectorAll('.slider-track img'))
  .reduce((acc, img) => acc + img.offsetWidth + 40, 0); // 40 is the gap between images

// Create GSAP infinite loop animation
gsap.to(".slider-track", {
  x: `-${totalWidth / 2}px`, // Slide left by half the total width
  duration: 20, // Adjust duration for speed
  repeat: -1, // Infinite loop
  ease: "none", // Linear scrolling
});


// testimonials
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 3, // Show 3 testimonials at once
    spaceBetween: 20, // Reduced space between testimonials
    loop: true, // Infinite loop
    centeredSlides: true, // Center the active slide
    slideToClickedSlide: true, // Allow clicking a slide to make it active
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 2, // Show 2 testimonials on smaller screens
      },
      768: {
        slidesPerView: 1, // Show 1 testimonial on mobile
      },
    },
  });
  
  