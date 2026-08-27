<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portfolio Page') }}</title>
        
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    </head>
    <body>
        {{-- header --}}
        <header class="header">
           <a href="#" class="logo"><span>Radwa Gamal</span></a>
        <ul class="nav-links">
               <li>
                <a href="#about">About</a>
            </li>
               <li>
                <a href="#experience">Experience</a>
            </li>
               <li>
                <a href="#projects">Projects</a>
            </li>
               <li>
                <a href="#contact">Contact</a>
            </li>
        </ul>
           <i class="fa-solid fa-bars-staggered menu-icon" id="menu-icon"></i>
           <button class="visit-btn" href="https://github.com/radwa-gamal30">Visit GitHub</button>
        </header>
        {{-- header end --}}
        
        {{-- about --}}
        <section id="about" class="about">
            <div class="about-container">
                <img src="{{ asset('assets/images/radwa.png') }}" alt="">
                <div class="info-box">
                    <div class="text">
                        <h3>Hi,I'm</h3>
                        <h1>Radwa Gamal</h1>
                        <span>Backend Developer</span>
                        {{-- <span>a passionate backend developer with
                            a strong background in creating dynamic and user-friendly web applications using Laravel.
                            <br> I have experience in building RESTful APIs,
                            <br> and I enjoy working with the latest technologies to build innovative solutions.</span> --}}

                    </div>
                    <div class="btn-group">
                        {{-- make it open in new tab --}}

                        <div class="btn download-btn"> <a target="_blank"  href="https://drive.google.com/file/d/1EooaAcwVll4ii3uKsR2LGDkjsDzXZPF6/view?usp=drive_link" style="text-decoration: none;">Download CV</a></div>
                        <div class="btn contact-btn" ><a href="https://wa.me/01093395099" target="_blank" style="text-decoration: none;">contact</a></div>
                    </div>
                    <div class="socials">
                        <a href="https://github.com/radwa-gamal30"><i class="fa-brands fa-github-alt"></i></a>
                        <a href="https://www.linkedin.com/in/radwagamalmohamed"><i class="fa-brands fa-linkedin"></i></a>
                       
                    </div>
                </div>
            </div>
        </section>
        {{-- about end --}}
        
           {{-- experience --}}
           <section id="experience" class="experience">
            <h2 class="section-title">Experience</h2>
            <div class="experience-info">
                <div class="grid">
                    <div class="grid-card">
                        <i class="fa-solid fa-code"></i>
                        <span>Backend Developer</span>
                        <h3>Emcan Solutions — Jun 2025 to Feb 2026</h3>
                        <p>Developed full-stack web applications using PHP/Laravel for backend logic,
                           with front-end edits on HTML, CSS, and Bootstrap. Integrated JavaScript
                           libraries to enhance UI functionality and collaborated directly with
                           clients to define requirements and deliver tailored solutions.</p>
                    </div>
                    <div class="grid-card">
                        <i class="fa-solid fa-file-code"></i>
                        <span>Backend Developer</span>
                        <h3>Blue Technology — Oct 2024 to Mar 2025</h3>
                        <p>Specialized in PHP API development integrating with React-based web
                           projects and Flutter mobile apps. Managed API endpoints for efficient
                           data exchange and oversaw database operations (MySQL/NoSQL), including
                           optimization for scalability and security.</p>
                    </div>
                    <div class="grid-card">
                        <i class="fa-solid fa-laptop"></i>
                        <span>Full Stack Web Development</span>
                        <h3>ITI — Intensive Code Camp, 2024</h3>
                        <p>4-month intensive training program focused on full-stack PHP development.
                           Gained hands-on experience building responsive web applications and
                           collaborated on team projects that strengthened problem-solving and
                           coding skills.</p>
                    </div>
                   
                </div>
                <img src="{{ asset('assets/images/radwa.png') }}" alt="">
            </div>
        </section>
        {{-- experience end --}}
        
        {{-- projects --}}
        <section id="projects" class="projects">
            <h2 class="section-title">Recent Projects</h2>
            <div class="projects-grid">
                <div class="project-card">
                    <img src="{{ asset('assets/images/nasscafe_logo.webp') }}" alt="" style="width: 100%; height: 100%;">
                    <h3>Nass Café</h3>
                    <p>Backend for a KSA café chain's Flutter ordering app — RESTful APIs (Laravel)
                       for menu, cart, and delivery flow, with Foodics POS integration for
                       real-time order and inventory sync.</p>
                        <div class="btn-group">
                            <a class="btn" href="https://play.google.com/store/apps/details?id=com.emcan.nass&pcampaignid=web_share" target="_blank">Live Demo</a>
                        </div>
                </div>
                <div class="project-card">
                    <img src="{{ asset('assets/images/shinerider.webp') }}" alt="" style="width: 100%; height: 100%;">
                    <h3>Shine Rider</h3>
                    <p>On-demand car cleaning app (iOS & Android) — Laravel APIs for service/package
                       booking and driver assignment, with live chat and real-time driver location
                       tracking.</p>
                    <div class="btn-group">
                        <a class="btn" href="https://www.shineriderbh.com" target="_blank">Live Demo</a>
                    </div>
                </div>
                <div class="project-card">
                    <img src="{{ asset('assets/images/mabrook.webp') }}" alt="" style="width: 100%; height: 100%;">
                    <h3>Mabrook</h3>
                    <p>Ceremony booking platform (iOS & Android) connecting users with photographers,
                       event halls, and related vendors. Built RESTful APIs and admin dashboard
                       endpoints for vendor and booking management.</p>
                    <div class="btn-group">
                        <a class="btn" href="https://apps.apple.com/app/mabrook/id6752712139" target="_blank">Live Demo</a>
                    </div> 
                </div>
              
            </div>
        </section>
        {{-- projects end --}}
        
        {{-- contact --}}
        <section id="contact" class="contact">
            <div class="input-box">
        
                <h2 class="section-title">Contact Me</h2>
        
                @if(session('success'))
                <div class="toast toast-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            
            @if($errors->any())
                <div class="toast toast-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>Please check the entered data.</span>
                </div>
            @endif
        
                <form action="{{ route('contact.send') }}" method="POST">
                {{-- <form action="" method="POST"> --}}
                    @csrf
        
                    <div class="input">
                        <input
                            type="email"
                            name="email"
                            placeholder="example@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                        <i class="fa-solid fa-envelope"></i>
                    </div>
        
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
        
                    <div class="input">
                        <input
                            type="text"
                            name="subject"
                            placeholder="Subject"
                            value="{{ old('subject') }}"
                            required
                        >
                        <i class="fa-solid fa-hashtag"></i>
                    </div>
        
                    @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
        
                    <div class="input">
                        <textarea
                            name="message"
                            placeholder="Write your message..."
                            rows="5"
                            required
                        >{{ old('message') }}</textarea>
                        <i class="fa-solid fa-message"></i>
                    </div>
        
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
        
                    <button type="submit" class="btn">
                        Send Message
                    </button>
        
                </form>
        
            </div>
        </section>
        {{-- contact end --}}
            

        {{-- footer --}}
        <footer>
            <ul>
                <li>
                    <a href="#about">About</a>
                    <a href="#experiance">Experience</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
            <P class="copyright">© All rights reserved | Radwa Gamal</P>
        </footer>
       <script src="https://kit.fontawesome.com/1c3e7f0d5b.js" crossorigin="anonymous"></script>
       <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
