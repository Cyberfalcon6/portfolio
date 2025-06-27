<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWSTRONG TECHNICAL COMPANY - Land Services</title>
    <style>
        :root {
            --light-bg: #f1f8fd;
            --accent: #f6c667;
            --primary: #c70039;
            --primary-dark: #900c27;
            --text-color: #333;
            --text-inverse: #fff;
            --card-bg: #fff;
            --body-bg: var(--light-bg);
        }

        [data-theme="dark"] {
            --light-bg: #1a1a1a;
            --primary: #e63946;
            --primary-dark: #8a0a1a;
            --text-color: #f1f1f1;
            --text-inverse: #333;
            --card-bg: #2d2d2d;
            --body-bg: #121212;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }
        html{
            scroll-behavior: smooth;
        }
        body {
            background-color: var(--body-bg);
            color: var(--text-color);
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        /* Header Styles */
        header {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo img {
            height: 100px;
            border-radius: 50%;
            padding: 5px;
        }
        
        .logo-text {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--text-inverse);
        }
        
        .logo-text span {
            color: var(--accent);
        }
        
        nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        
        nav a {
            color: var(--text-inverse);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--accent);
        }
        
        .contact-btn {
            background-color: var(--accent);
            color: var(--primary-dark);
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .contact-btn:hover {
            background-color: #e4b14a;
        }
        
        /* Theme and Language Toggle */
        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-inverse);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .theme-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .language-selector {
            position: relative;
            margin-left: 1rem;
        }
        
        .language-btn {
            background: none;
            border: none;
            color: var(--text-inverse);
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .language-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: var(--primary-dark);
            border-radius: 4px;
            padding: 0.5rem 0;
            min-width: 120px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
        }
        
        .language-dropdown.show {
            display: block;
        }
        
        .language-dropdown button {
            width: 100%;
            text-align: left;
            padding: 0.5rem 1rem;
            background: none;
            border: none;
            color: var(--text-inverse);
            cursor: pointer;
        }
        
        .language-dropdown button:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Hero Section */
        .hero {
            background-color: var(--primary);
            color: var(--text-inverse);
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: url('stafs/background.jpeg');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        
        .hero h1 span {
            color: var(--accent);
        }
        
        .hero-tagline {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .hero-description {
            max-width: 700px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .hero-btns {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        
        .primary-btn {
            background-color: var(--accent);
            color: var(--primary-dark);
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .primary-btn:hover {
            background-color: #e4b14a;
        }
        
        .secondary-btn {
            background-color: transparent;
            color: var(--text-inverse);
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            border: 2px solid var(--text-inverse);
            transition: background-color 0.3s;
        }
        
        .secondary-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Section Styles */
        .section {
            padding: 4rem 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title {
            color: var(--primary-dark);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            color: var(--primary);
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Mission Section */
        .mission-container {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .mission-content {
            flex: 1;
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 2rem;
            border-radius: 8px;
        }
        
        .mission-title {
            color: var(--accent);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .mission-description {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .mission-link {
            display: inline-block;
            color: var(--accent);
            margin-top: 1rem;
            font-weight: 500;
            text-decoration: none;
        }
        
        .mission-image {
            flex: 1;
            border-radius: 8px;
            overflow: hidden;
            background-color: #0066cc;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Mission & Vision Container */
        .mission-vision-container {
            display: flex;
            gap: 2rem;
            align-items: center;
            justify-content: center;
            margin: 2rem 0;
        }

        /* Mission Image */
        .mission-image img {
            width: 100%;
            height: auto;
            max-width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Flip Card Container */
        .mission-vision-container {
            perspective: 1000px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 2rem 0;
        }

        /* Flip Card */
        .flip-card {
            width: 100%;
            max-width: 600px;
            height: 300px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        /* Flip Card Inner */
        .flip-card-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        /* Front and Back Faces */
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Front Face */
        .flip-card-front {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
        }

        /* Back Face */
        .flip-card-back {
            background-color: var(--accent);
            color: var(--primary-dark);
            transform: rotateY(180deg);
        }

        /* Flip Effect */
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }
        
        /* Programs Section */
        .programs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .program-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .program-header {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 1rem;
            font-weight: bold;
        }
        
        .program-body {
            padding: 1.5rem;
        }
        
        .program-features {
            list-style-type: none;
            margin: 1rem 0;
        }
        
        .program-features li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
        }
        
        .program-features li::before {
            content: "✓";
            color: var(--primary);
            margin-right: 0.5rem;
            font-weight: bold;
        }
        
        /* Competitions Section */
        .competition-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .competition-title {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }
        
        .competition-prize {
            color: var(--accent);
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .competition-description {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .competition-date {
            margin-bottom: 1rem;
            color: #666;
        }
        
        /* Threat Analysis Section */
        .threat-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .threat-title {
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        .threat-description {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .threat-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .trend-label {
            color: #666;
        }
        
        .trend-value {
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        
        /* Portfolio Section */
        .portfolio-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            height: 300px;
            background-color: #333;
            margin-bottom: 1.5rem;
        }
        
        .portfolio-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1.5rem;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
        }
        
        .portfolio-title {
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }
        
        .portfolio-description {
            margin-bottom: 1rem;
            opacity: 0.9;
        }
        
        .portfolio-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .portfolio-tag {
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        
        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .team-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .team-image {
            width: 100%;
            height: auto;
            max-width: 250px;
        }

        .team-image.team-members {
            max-width: 400px;
        }
        
        .team-info {
            padding: 1.5rem;
        }
        
        .team-name {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }
        
        .team-position {
            color: var(--accent);
            margin-bottom: 1rem;
        }
        
        /* History Section */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: var(--accent);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: var(--accent);
            border-radius: 50%;
            top: 15px;
            right: -12px;
            z-index: 1;
        }
        
        .timeline-item.left {
            left: 0;
        }
        
        .timeline-item.right {
            left: 50%;
        }
        
        .timeline-item.right::after {
            left: -12px;
        }
        
        .timeline-year {
            position: absolute;
            top: 12px;
            right: -110px;
            background-color: var(--accent);
            color: var(--primary-dark);
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }
        
        .timeline-item.right .timeline-year {
            left: -110px;
            right: auto;
        }
        
        .timeline-title {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 3rem 0 1rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-brand {
            display: flex;
            flex-direction: column;
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: var(--text-inverse);
        }
        
        .footer-logo span {
            color: var(--accent);
        }
        
        .footer-tagline {
            color: var(--accent);
            margin-bottom: 0.5rem;
        }
        
        .footer-description {
            margin-bottom: 1rem;
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-links a {
            color: var(--text-inverse);
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        .service-image img {
            width: 100%;
            height: auto;
            max-width: 300px;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }    
        
        .social-links a:hover {
            color: var(--accent);
        }
        
        .footer-column h3 {
            color: var(--accent);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .footer-links {
            list-style-type: none;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: var(--text-inverse);
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.3s;
        }
        
        .footer-links a:hover {
            opacity: 1;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0.7;
            font-size: 0.9rem;
        }
        
        /* Responsive styles */
        @media (max-width: 992px) {
            .mission-container {
                flex-direction: column;
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item.right {
                left: 0;
            }
            
            .timeline-item::after {
                left: 18px;
                right: auto;
            }
            
            .timeline-item.right::after {
                left: 18px;
            }
            
            .timeline-year {
                right: auto;
                left: 80px;
            }
            
            .timeline-item.right .timeline-year {
                left: 80px;
            }
        }
        
        @media (max-width: 768px) {
            header nav {
                display: none;
            }
            
            .hero h1 {
                font-size: 3rem;
            }

            .mission-vision-container {
                flex-direction: column;
            }

            .flip-card {
                height: 400px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero-tagline {
                font-size: 1.2rem;
            }

            .hero-btns {
                flex-direction: column;
                align-items: center;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-content">
            <a href="#" class="logo" class="text-decoration-none">
                <img src="stafs/logo.png" alt="Logo">
                <div class="logo-text">NST<span> ldt</span></div>
            </a>
            <nav>
                <a href="#" data-i18n="nav.home">Home</a>
                <a href="#services" onclick="scrollToSection('services'); return false;" data-i18n="nav.services">Services</a>
                <a href="#portfolio" data-i18n="nav.portfolio">Portfolio</a>
                <a href="#about" data-i18n="nav.about">Contacts</a>
                <button class="theme-toggle" id="themeToggle">🌓</button>
                
            </nav>
            <a href="#contact" class="contact-btn" data-i18n="nav.contact">Contact Us</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <h1 data-i18n="hero.title">NEWSTRONG TECHNICAL COMPANY <span>Ltd</span></h1>
            <p class="hero-tagline" data-i18n="hero.tagline">Strong and quality service</p>
            <p class="hero-description" data-i18n="hero.description">What we can do for you is the most important, and as for the price, you pay what you can</p>
            <div class="hero-btns">
                <a href="#services" class="primary-btn" data-i18n="hero.servicesBtn">Explore Services</a>
                <a href="#about" class="secondary-btn" data-i18n="hero.learnBtn">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="mission.title">Our Mission & Vision</h2>
                <p class="section-subtitle" data-i18n="mission.subtitle">To provide</p>
            </div>
            <div class="mission-vision-container">
                <!-- Flip Card for Mission and Vision -->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Front Side (Mission) -->
                        <div class="flip-card-front">
                            <h3 class="mission-title" data-i18n="mission.missionTitle">Our Mission</h3>
                            <p class="mission-description" data-i18n="mission.missionText">
                                To provide exceptional land surveying, land division, and innovative online services that empower individuals and organizations to make informed decisions about their properties and resources. We are committed to delivering accurate, reliable, and cost-effective solutions tailored to our clients' needs.
                            </p>
                            <a href="#" class="mission-link" data-i18n="mission.seeVision">Click to see our vision</a>
                        </div>
                        <!-- Back Side (Vision) -->
                        <div class="flip-card-back">
                            <h3 data-i18n="mission.visionTitle">Our Vision</h3>
                            <p class="vision-description" data-i18n="mission.visionText">
                                To be the leading provider of land-related services, recognized for our innovation, precision, and dedication to enhancing the value and sustainability of land resources for future generations.
                            </p>
                            <a href="#" class="mission-link" data-i18n="mission.seeMission">Click to see our mission</a>
                        </div>
                    </div>
                </div>

                <!-- Mission Image Section -->
                <div class="mission-image">
                    <img src="stafs/mission.jfif" alt="Mission Image" style="width: 100%; height: auto; max-width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                </div>
            </div>
        </div>
    </section>

    <!-- Services sections Section -->
    <section class="section" id="services" style="background-color: var(--light-bg);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="services.title">Our Services</h2>
                <p class="section-subtitle" data-i18n="services.subtitle">Providing expert land surveying, land division, and innovative online services to meet your needs</p>
            </div>
            <!-- Services grids -->
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-header" data-i18n="services.naturalResources.title">Valuation of Natural resources</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.naturalResources.feature1">Land Appraisal</li>
                            <li data-i18n="services.naturalResources.feature2">Environmental Impact Assessment</li>
                            <li data-i18n="services.naturalResources.feature3">Natural Resource Mapping</li>
                            <li data-i18n="services.naturalResources.feature4">Geospatial Analysis</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/natural_resource.jfif" alt="Natural Resources Valuation">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header" data-i18n="services.building.title">Building House Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.building.feature1">Architectural Design</li>
                            <li data-i18n="services.building.feature2">Structural Engineering</li>
                            <li data-i18n="services.building.feature3">Construction Management</li>
                            <li data-i18n="services.building.feature4">Interior Design</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/bulding_house.jfif" alt="Building House service">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header" data-i18n="services.landSubdivision.title">Land Subdivision Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.landSubdivision.feature1">Land Parcel Division</li>
                            <li data-i18n="services.landSubdivision.feature2">Boundary Surveying</li>
                            <li data-i18n="services.landSubdivision.feature3">Cadastral Mapping</li>
                            <li data-i18n="services.landSubdivision.feature4">Land Use Planning</li>
                            <li data-i18n="services.landSubdivision.feature6">Title Deed Processing</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/land_subdivision.jpeg" alt="Land Subdivision Services">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header" data-i18n="services.realEstate.title">Real Estate Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.realEstate.feature1">Lease and Rental Services</li>
                            <li data-i18n="services.realEstate.feature2">Relocation and Moving</li>
                            <li data-i18n="services.realEstate.feature3">Legal and Documentation</li>
                            <li data-i18n="services.realEstate.feature4">Property Deals</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/real_estate.jpeg" alt="Real Estate Services">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header" data-i18n="services.branding.title">Branding Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.branding.feature1">Logo Designing</li>
                            <li data-i18n="services.branding.feature2">Banner printing</li>
                            <li data-i18n="services.branding.feature3">Sticker printing</li>
                            <li data-i18n="services.branding.feature4">Business card printing</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/branding.jpeg" alt="Branding Services">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header" data-i18n="services.landSubdivision.title">Online Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.landSubdivision.feature1">Irembo services</li>
                            <li data-i18n="services.landSubdivision.feature2">RRA Services</li>
                            <li data-i18n="services.landSubdivision.feature3">Tin registration and other RDB services</li>
                            <li data-i18n="services.landSubdivision.feature4">IECEMS Services</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/online_services.png" alt="Online Services">
                        </div>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-header" data-i18n="services.landSubdivision.title">Construction Services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.landSubdivision.feature1">Concrete Block Production</li>
                            <li data-i18n="services.landSubdivision.feature2">Construction Materials Supply</li>
                            <li data-i18n="services.landSubdivision.feature3">Masonary Work</li>
                            <li data-i18n="services.landSubdivision.feature4">Driveway and Wolking Construction</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/amapave.png" alt="cONSTRUCTION Services">
                        </div>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-header" data-i18n="services.landSubdivision.title">Driving school services</div>
                    <div class="program-body">
                        <ul class="program-features">
                            <li data-i18n="services.landSubdivision.feature1">Driving Lessons</li>
                            <li data-i18n="services.landSubdivision.feature2">Motor & Car Road Rules Training</li>
                            <li data-i18n="services.landSubdivision.feature3">Traffic Law Education</li>
                            <li data-i18n="services.landSubdivision.feature4">Driver Education</li>
                        </ul>
                        <div class="service-image">
                            <img src="stafs/driving.png" alt="DARIVING SCHOOL Services">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
        <!-- About Section -->
         <section class="section" id="about" style="background-color: var(--light-bg);">
            <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="services.title">Our Contacts</h2>
            </div>
            <div class="programs-grid">
                <div class="program-card">
                <div class="program-header" data-i18n="services.landSubdivision.title">RUTSIRO BRANCH</div>
                    <div class="program-body">
                        <div class="service-image">
                            <img src="stafs/main.jpeg" alt="Rutsiro Branch ">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                <div class="program-header" data-i18n="services.landSubdivision.title">RUBAVU BRANCH</div>
                    <div class="program-body">
                        <div class="service-image">
                            <img src="stafs/rubavu.jpeg" alt="Rubavu Branch">
                        </div>
                    </div>
                </div>

                <div class="program-card">
                <div class="program-header" data-i18n="services.landSubdivision.title">GAKERI BRANCH</div>
                    <div class="program-body">
                        <div class="service-image">
                            <img src="stafs/gakeri.jpeg" alt="Gakeri Branch">
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    
    <section class="section" id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="portfolio.title">Our Portfolio</h2>
                <p class="section-subtitle" data-i18n="portfolio.subtitle">Trusted by leading organizations worldwide</p>
            </div>
            <div class="portfolio-scroll-container">
                <div class="portfolio-scroll">                    <!-- Portfolio Card 3: Residential Construction -->
                    <div class="portfolio-card">
                        <div class="portfolio-content">
                            <h3 class="portfolio-title" data-i18n="portfolio.project3.title">Residential Construction</h3>
                            <p class="portfolio-description" data-i18n="portfolio.project3.description">Managed the construction of 20+ residential homes with high-quality standards</p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag" data-i18n="portfolio.project3.tag1">Architectural Design</span>
                                <span class="portfolio-tag" data-i18n="portfolio.project3.tag2">Construction Management</span>
                                <span class="portfolio-tag" data-i18n="portfolio.project3.tag3">Interior Design</span>
                            </div>
                            <a href="#" class="primary-btn" data-i18n="portfolio.viewBtn">View Project Details</a>
                        </div>
                    </div>

                    <div class="portfolio-card">
                        <div class="portfolio-content">
                            <h3 class="portfolio-title" data-i18n="portfolio.project4.title">Signage and Branding</h3>
                            <p class="portfolio-description" data-i18n="portfolio.project4.description">Designed and installed custom signage for 10+ local businesses</p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag" data-i18n="portfolio.project4.tag1">Custom Signage</span>
                                <span class="portfolio-tag" data-i18n="portfolio.project4.tag2">Branding</span>
                                <span class="portfolio-tag" data-i18n="portfolio.project4.tag3">Vehicle Wraps</span>
                            </div>
                            <a href="#" class="primary-btn" data-i18n="portfolio.viewBtn">View Project Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="history.title">Our History</h2>
                <p class="section-subtitle" data-i18n="history.subtitle">Milestones in our journey to serve our community</p>
            </div>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h3 class="timeline-title" data-i18n="history.event1.title">Company Founded</h3>
                        <p data-i18n="history.event1.description"><b>NEWSTRONG TECHNICAL COMPANY ltd</b> was Founded by IRADUKUNDA Adrien</p>
                    </div>
                    <div class="timeline-year">2020</div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact" style="background-color: var(--light-bg);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-i18n="contact.title">Contact Us</h2>
                <p class="section-subtitle" data-i18n="contact.subtitle">Get in touch with our team for inquiries</p>
            </div>
            <div class="competition-card">
                <h3 class="competition-title" data-i18n="contact.contactInfo">Contact Information</h3>
                <p class="competition-description" data-i18n="contact.email">Email: newstrongtechnicalcompany@gmail.com</p>
                <p class="competition-description" data-i18n="contact.phone">Phone: +250 784 408 617</p>
                <p class="competition-description" data-i18n="contact.address">Address: RN11, Congo-nil, Rutsiro, Rwanda</p>
                <a href="mailto:newstrongtechnicalcompany@gmail.com" class="primary-btn" data-i18n="contact.emailBtn">Send Email</a>
            </div>
        </div>
    </section>
        
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="footer-logo">NST<span>ldt</span></div>
                    <p class="footer-tagline" data-i18n="footer.tagline">Strong and quality service</p>
                </div>
                <div>
                    <p class="text-center">
                        &copy;<?php echo date("Y");?> Newstrong technical company ltd
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
    function scrollToSection(id) {
    document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
}
</script>
</html>