@extends('template.app')
@section('title', 'Somos a maior plataforma de empregos para profissionais brasileiros')
@section('style')
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #000;
            background-color: #fff;
        }

        nav {
            border-bottom: 1px solid #e5e5e5;
            padding: 1.5rem 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        nav a {
            text-decoration: none;
            color: #000;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #627EEA;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 4rem 0;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.25rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #627EEA;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #4c63d2;
        }

        /* Features Section */
        .features {
            padding: 4rem 0;
            background-color: #fafafa;
        }

        .features h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #627EEA;
        }

        .feature-card p {
            color: #666;
        }

        /* Pricing Section */
        .pricing {
            padding: 4rem 0;
        }

        .pricing h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .pricing-card {
            border: 2px solid #e5e5e5;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            border-color: #627EEA;
        }

        .pricing-card.featured {
            border-color: #627EEA;
            position: relative;
        }

        .pricing-card.featured::before {
            content: 'BEST VALUE';
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #627EEA;
            color: #fff;
            padding: 0.25rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .plan-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .plan-price {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .plan-period {
            color: #666;
            margin-bottom: 1rem;
        }

        .plan-savings {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.5rem;
            border-radius: 4px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .plan-savings.empty {
            background-color: transparent;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 2rem;
            text-align: left;
        }

        .plan-features li {
            padding: 0.5rem 0;
            color: #666;
        }

        .plan-features li::before {
            content: '✓ ';
            color: #627EEA;
            font-weight: 700;
        }

        .plan-button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .plan-button:hover {
            background-color: #627EEA;
        }

        .pricing-card.featured .plan-button {
            background-color: #627EEA;
        }

        .pricing-card.featured .plan-button:hover {
            background-color: #4c63d2;
        }

        /* Jobs Section */
        .jobs {
            padding: 4rem 0;
            background-color: #fafafa;
        }

        .jobs h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .job-card {
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: box-shadow 0.3s ease;
        }

        .job-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .job-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .job-title a {
            color: #000;
            text-decoration: none;
        }

        .job-title a:hover {
            color: #627EEA;
        }

        .job-company {
            color: #666;
            margin-bottom: 0.5rem;
        }

        .job-meta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            font-size: 0.875rem;
            color: #999;
        }

        /* Blog Section */
        .blog {
            padding: 4rem 0;
        }

        .blog h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .blog-card {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .blog-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .blog-image {
            width: 100%;
            height: 200px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .blog-title a {
            color: #000;
            text-decoration: none;
        }

        .blog-title a:hover {
            color: #627EEA;
        }

        .blog-excerpt {
            color: #666;
            margin-bottom: 1rem;
        }

        .blog-date {
            font-size: 0.875rem;
            color: #999;
        }

        footer {
            border-top: 1px solid #e5e5e5;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
            color: #666;
        }

        footer a {
            color: #627EEA;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            nav ul {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
@endsection
@section('content')
<!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Remote Yoyota</h1>
            <p>Your gateway to remote job opportunities worldwide. Let our automatic application service work for you while you focus on what matters.</p>
            <a href="#pricing" class="cta-button">Try Auto Apply Service</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Automatic Job Applications Service</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Smart Automation</h3>
                    <p>Advanced system that analyzes your profile and finds the best opportunities matching your skills and experience.</p>
                </div>
                <div class="feature-card">
                    <h3>Time Saving</h3>
                    <p>Don't waste time searching for jobs. We focus on the ones that really matter and apply on your behalf.</p>
                </div>
                <div class="feature-card">
                    <h3>Maximum Precision</h3>
                    <p>Targeted applications based on your experience and career goals, increasing your chances of success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <h2>Choose Your Plan</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="plan-name">Weekly</div>
                    <div class="plan-price">$1</div>
                    <div class="plan-period">per week</div>
                    <div class="plan-savings empty">&nbsp;</div>
                    <ul class="plan-features">
                        <li>Automatic applications</li>
                        <li>Profile matching</li>
                        <li>Weekly reports</li>
                        <li>Email support</li>
                    </ul>
                    <button class="plan-button">Start Weekly</button>
                </div>

                <div class="pricing-card featured">
                    <div class="plan-name">Monthly</div>
                    <div class="plan-price">$3.50</div>
                    <div class="plan-period">per month</div>
                    <div class="plan-savings">Save $0.83/month (19%)</div>
                    <ul class="plan-features">
                        <li>Automatic applications</li>
                        <li>Profile matching</li>
                        <li>Weekly reports</li>
                        <li>Priority support</li>
                    </ul>
                    <button class="plan-button">Start Monthly</button>
                </div>

                <div class="pricing-card">
                    <div class="plan-name">Quarterly</div>
                    <div class="plan-price">$9</div>
                    <div class="plan-period">per quarter</div>
                    <div class="plan-savings">Save $4/quarter (31%)</div>
                    <ul class="plan-features">
                        <li>Automatic applications</li>
                        <li>Profile matching</li>
                        <li>Weekly reports</li>
                        <li>Premium support</li>
                    </ul>
                    <button class="plan-button">Start Quarterly</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="jobs" id="jobs">
        <div class="container">
            <h2>Latest Job Opportunities</h2>

            <div class="job-card">
                <h3 class="job-title"><a href="#">Senior Frontend Developer</a></h3>
                <div class="job-company">Tech Solutions Inc.</div>
                <div class="job-meta">
                    <span>Remote</span>
                    <span>Full-time</span>
                    <span>$80k - $120k</span>
                </div>
            </div>

            <div class="job-card">
                <h3 class="job-title"><a href="#">Full Stack Engineer</a></h3>
                <div class="job-company">Innovation Labs</div>
                <div class="job-meta">
                    <span>San Francisco, CA</span>
                    <span>Full-time</span>
                    <span>$100k - $150k</span>
                </div>
            </div>

            <div class="job-card">
                <h3 class="job-title"><a href="#">Backend Developer</a></h3>
                <div class="job-company">Cloud Systems</div>
                <div class="job-meta">
                    <span>Remote</span>
                    <span>Contract</span>
                    <span>$70k - $100k</span>
                </div>
            </div>

            <div class="job-card">
                <h3 class="job-title"><a href="#">DevOps Engineer</a></h3>
                <div class="job-company">DataFlow Corp</div>
                <div class="job-meta">
                    <span>New York, NY</span>
                    <span>Full-time</span>
                    <span>$90k - $130k</span>
                </div>
            </div>

            <div class="job-card">
                <h3 class="job-title"><a href="#">Mobile Developer (React Native)</a></h3>
                <div class="job-company">AppWorks Studio</div>
                <div class="job-meta">
                    <span>Remote</span>
                    <span>Full-time</span>
                    <span>$75k - $110k</span>
                </div>
            </div>
        </div>
    </section>
@endsection
