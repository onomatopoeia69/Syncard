{{-- all of the navbars and footer are inside here --}}

@extends('layouts.guest-layout')

{{-- title section --}}

@section('title','Shop')

{{-- all the head scripts,links and cdn's here --}}

@section('head-script')

<link href="https://fonts.googleapis.com/css2?family=Agrandir&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>




{{-- the body tag if you need to insert the class of the body --}}

@section('body-class', 'bg-gray-900 h-screen text-gray-300 font-sans')

{{-- all the contents --}}

@section('content')

        
<section id="hero">
        <div class="hero-content container text-center">
            <div class="hero-eyebrow" data-aos="fade-down" data-aos-duration="900">
                <i class="bi bi-broadcast-pin"></i>
                NFC • DIGITAL IDENTITY • SAFETY
            </div>

            <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1100">
                <span class="white">SMARTER NFC.</span>
                <span class="yellow"><span id="typed"></span></span>
            </h1>

            <p class="hero-description" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1100">
                NFC cards and tags designed for digital identity, contactless information,
                and safer connections — including a simple Child Lost Mode for emergency contact.
            </p>

            <div class="hero-actions" data-aos="fade-up" data-aos-delay="350" data-aos-duration="1100">
                <a href="#services" class="btn btn-nfc-primary">
                    Explore Services <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="#child-lost-mode" class="btn btn-nfc-outline">
                    Child Lost Mode <i class="bi bi-shield-check ms-2"></i>
                </a>
            </div>
        </div>

        <div class="hero-scroll">
            Scroll to explore
            <i class="bi bi-chevron-down"></i>
        </div>
    </section>

    {{-- services section --}}
    <section id="services" class="section section-soft">
        <div class="container">
            <div class="network-line" data-aos="fade-down">
                <div class="section-label mb-0">OUR SERVICES</div>
            </div>

            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">NFC SOLUTIONS FOR A SMARTER YOU</h2>
                <p class="section-subtitle">
                    One tap can connect people to the information they need — from your digital profile
                    to emergency contact details.
                </p>
            </div>

            <div class="row g-4">
                {{-- Service 1 --}}
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                        <h3>NFC Digital Portfolio</h3>
                        <p>
                            Tap an NFC card to instantly open a personalized digital profile,
                            portfolio, contact page, or other online information.
                        </p>
                        <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>

                {{-- Service 2 --}}
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-credit-card-2-front"></i>
                        </div>
                        <h3>NFC Business Card</h3>
                        <p>
                            Share your contact information through a single tap without relying
                            on traditional paper business cards.
                        </p>
                        <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>

                {{-- Service 3 --}}
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="240">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>Child Lost Mode</h3>
                        <p>
                            Attach an NFC card or sticker to a child's belongings. If the child gets
                            separated, a finder can tap the tag to access approved emergency contact information.
                        </p>
                        <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- child lost mode section --}}
    <section id="child-lost-mode" class="section lost-section">
        <div class="container">
            <div class="lost-wrapper" data-aos="fade-up" data-aos-duration="1000">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-5">
                        <div class="lost-visual">
                            <div class="nfc-tag" aria-label="NFC tag illustration">
                                <i class="bi bi-broadcast-pin"></i>
                            </div>

                            <div class="phone" aria-label="Child Lost Mode phone preview">
                                <div class="phone-screen">
                                    <div class="phone-nfc">
                                        <i class="bi bi-broadcast-pin"></i>
                                    </div>
                                    <small>NFC Child Safety</small>
                                    <h5>This child is lost</h5>
                                    <p>Please contact the parent or guardian using the emergency contact below.</p>
                                    <span class="phone-contact">
                                        <i class="bi bi-telephone-fill me-1"></i> Contact Parent
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="lost-content">
                            <div class="section-label">CHILD LOST MODE</div>
                            <h2>LOST? ONE TAP <span>CAN HELP.</span></h2>
                            <p>
                                A simple NFC card or sticker can give a finder a quick way to reach a
                                child's parent or guardian when they become separated during trips,
                                events, malls, parks, or other crowded places.
                            </p>

                            <div class="steps">
                                <div class="step">
                                    <div class="step-number">01</div>
                                    <div>
                                        <h4><i class="bi bi-tag me-1 text-warning"></i> Attach</h4>
                                        <p>Place the NFC sticker or card on the child's bag, ID, clothing, or belongings.</p>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">02</div>
                                    <div>
                                        <h4><i class="bi bi-phone me-1 text-warning"></i> Tap</h4>
                                        <p>If the child gets separated, a finder taps the NFC tag using a compatible smartphone.</p>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">03</div>
                                    <div>
                                        <h4><i class="bi bi-person-lines-fill me-1 text-warning"></i> Contact</h4>
                                        <p>The approved emergency profile opens with the parent's selected contact information.</p>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="step-number">04</div>
                                    <div>
                                        <h4><i class="bi bi-people me-1 text-warning"></i> Reconnect</h4>
                                        <p>The finder can contact the parent or guardian directly using the available contact option.</p>
                                    </div>
                                </div>
                            </div>

                            <a href="#how-it-works" class="btn btn-nfc-primary mt-3">
                                Learn More <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                            
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center mt-4 mb-0" style="color:#64748b;font-size:11px;">
                <i class="bi bi-info-circle me-1"></i>
                NFC provides access to the profile; it does not independently track a child's location.
            </p>
        </div>
    </section>

    {{-- how it works section --}}
    <section id="how-it-works" class="section section-soft">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-label">HOW IT WORKS</div>
                <h2 class="section-title">ONE TAP. SIMPLE CONNECTION.</h2>
                <p class="section-subtitle">
                    NFC makes sharing approved information quick and straightforward.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="how-card">
                        <div class="how-number">01</div>
                        <div class="how-icon"><i class="bi bi-phone"></i></div>
                        <h3>Bring a Phone Close</h3>
                        <p>A compatible smartphone is brought near the NFC card or sticker.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="how-card">
                        <div class="how-number">02</div>
                        <div class="how-icon"><i class="bi bi-broadcast-pin"></i></div>
                        <h3>Tap the NFC</h3>
                        <p>The NFC tag communicates the information needed to open its linked profile.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="how-card">
                        <div class="how-number">03</div>
                        <div class="how-icon"><i class="bi bi-globe2"></i></div>
                        <h3>Open the Profile</h3>
                        <p>The linked web page opens without requiring the finder to install a dedicated app.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="how-card">
                        <div class="how-number">04</div>
                        <div class="how-icon"><i class="bi bi-person-check"></i></div>
                        <h3>Connect</h3>
                        <p>The visitor can use the available approved contact or information options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section, why nfc --}}
    <section id="about" class="section section-dark">
        <div class="container">
            <div class="about-panel" data-aos="fade-up">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-8">
                        <div class="section-label">WHY NFC?</div>
                        <h2 class="section-title mb-4">MAKE YOUR INFORMATION<br>MORE CONNECTED.</h2>
                        <p>
                            Our NFC solutions turn a physical card or tag into a simple doorway to
                            digital information. Whether it is a portfolio, business profile, or an
                            emergency contact page, users can access the information through a quick tap.
                        </p>
                    </div>

                    <div class="col-lg-4">
                        <div class="stat">
                            <strong>01</strong>
                            <span>Tap-to-open digital profile</span>
                        </div>
                        <div class="stat">
                            <strong>02</strong>
                            <span>Contactless information sharing</span>
                        </div>
                        <div class="stat">
                            <strong>03</strong>
                            <span>Emergency contact use case</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section id="contact" class="section cta-section">
        <div class="container cta-content" data-aos="zoom-in">
            <div class="section-label">READY TO CONNECT?</div>
            <h2 class="cta-title">
                TURN ONE TAP INTO A <span>CONNECTION.</span>
            </h2>
            <p class="section-subtitle mb-4">
                Build your digital NFC profile or explore a safer way to keep emergency contact information accessible.
            </p>

            <div class="hero-actions">
                <a href="{{ url('/contact') }}" class="btn btn-nfc-primary">
                    Get Started <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="mailto:hello@example.com" class="btn btn-nfc-outline">
                    Contact Us <i class="bi bi-envelope ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <footer class="nfc-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="footer-brand">SyncCard<span>™</span></div>
                    <p class="footer-text">
                        Smart NFC solutions for digital identity, contactless information,
                        and safer connections.
                    </p>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Explore</div>
                    <a class="footer-link" href="#services">Services</a>
                    <a class="footer-link" href="#child-lost-mode">Child Lost Mode</a>
                    <a class="footer-link" href="#how-it-works">How It Works</a>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Company</div>
                    <a class="footer-link" href="#about">About</a>
                    <a class="footer-link" href="#contact">Contact</a>
                    <a class="footer-link" href="{{ url('login') }}">Login</a>
                </div>

                <div class="col-lg-2">
                    <div class="footer-heading">Connect</div>
                    <a class="footer-link" href="#contact"><i class="bi bi-envelope me-1"></i> Email</a>
                    <a class="footer-link" href="#contact"><i class="bi bi-facebook me-1"></i> Facebook</a>
                    <a class="footer-link" href="#contact"><i class="bi bi-instagram me-1"></i> Instagram</a>
                </div>
            </div>

            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2">
                <span>© {{ date('Y') }} SyncCard™. All rights reserved.</span>
                <span>SMART TECHNOLOGY FOR A SAFER TOMORROW.</span>
            </div>
        </div>
    </footer>

    {{-- Back to top --}}
    <button id="backToTop" aria-label="Back to top">
        <i class="bi bi-arrow-up"></i>
    </button>







 {{-- for the body scripts --}}
@section('body-script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

<script>

  let upBtn = document.querySelector("#backToTop");

  window.addEventListener('scroll',()=>{

    upBtn.style.display = window.scrollY > 200 ? 'block' : 'none';

  });

  upBtn.addEventListener('click',()=>{
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  upBtn.addEventListener('mouseover',(event)=>{

    if(event.target.id === "arrowUp" || event.target.id === "backToTop")
    {
      upBtn.innerHTML = '<b>UP</b>';
    }
  });

upBtn.addEventListener('mouseout',()=>{

    upBtn.innerHTML= `<i id="arrowUp" class="bi bi-arrow-up">`;
 
  });  

</script>





{{-- unloading

<script>

  let loginForm = document.querySelector("#loginForm");
  let isFormChanged = false;
  let regForm = document.querySelector("#regForm");


  loginForm.addEventListener('input',(event)=>{

    isFormChanged = event.target.value != 0 ? true : false; 
  });

  regForm.addEventListener("input",(event)=>{


    isRegFormChanged = event.target.value != 0 ? true : false;

  });

  window.addEventListener("beforeunload", (e) => {
    

  if (isFormChanged || isRegFormChanged) {
    event.preventDefault();
    event.returnValue = ""; 
  }
  
});

</script> --}}


<script>


  gsap.from("#product-name",{

      x: -10,
      duration: 1,
      opacity: 0,
      repeat: -1,
      repeatDelay: 4,
      delay: 2,
      yoyo: true, 

  });



</script>

<script>
  AOS.init(); 
</script>




<script>
function eyeTogglePassword(inputId,eyeBtnId){


  let eyeBtn = document.querySelector(eyeBtnId);
  let passwordInput = document.querySelector(inputId);


  passwordInput.addEventListener('input',(event)=>{

      let value = event.target.value;

      if(value){
         eyeBtn.classList.remove('d-none');
      }else{
        eyeBtn.classList.add('d-none');
      }

  });


  eyeBtn.addEventListener('click',(event)=>{

    let isPassword = passwordInput.type === 'password' ? true : false;

    if(isPassword)
    {
      passwordInput.type = 'text';
      eyeBtn.classList.remove('bi-eye-fill');
      eyeBtn.classList.add('bi-eye-slash-fill');

    }else{
      passwordInput.type = 'password';
      eyeBtn.classList.remove('bi-eye-slash-fill');
      eyeBtn.classList.add('bi-eye-fill');
    }

  })

}

  document.addEventListener('DOMContentLoaded',()=>{

    eyeTogglePassword("#loginPassword","#eyeloginPassword");
    eyeTogglePassword("#regPassword","#eyeRegPassword");
    eyeTogglePassword("#confirmPassword","#toggleConfirmPass");

  });


</script>


<script>
  VANTA.NET({
    el: "#hero",
    color: 0xfde047,       
    backgroundColor: 0x111827, 
    maxDistance: 20.00,
    spacing: 15.00
  });
</script>

<script>

var typed = new Typed('#typed', {
  strings: ['SAFER CONNECTIONS.', 'BETTER EXPERIENCE.'],
  typeSpeed: 120,
  backSpeed: 120,
  loop: true,
  showCursor: true,
  cursorChar: '|',
});

</script>


<script>
  const swiper = new Swiper(".mySwiper", {
    effect: "cube",
      grabCursor: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      zoom: true,
      loop: true,               
    autoplay: {
      delay: 2500,           
      disableOnInteraction: false, 
    },
  });
</script>

<script>
    
  let loginModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
  let loginBtn = document.getElementById('loginBtn');
 
  loginBtn.addEventListener('click',function () {

    loginModal.show();

  });
 
</script>

 @if(session('login_required'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var loginModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
            loginModal.show();
        });
    </script>
@endif


@endsection

@endsection