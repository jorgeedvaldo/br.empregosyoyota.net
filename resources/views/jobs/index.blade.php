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

    <!-- Seção de Vagas -->
    <section class="jobs" id="jobs">
        <div class="container">
            <h2>Últimas Oportunidades de Vagas</h2>

            {{-- Itera sobre as vagas passadas pelo controller --}}
            @forelse($jobs as $job)
                <div class="job-card">
                    <h3 class="job-title"><a href="{{ route('jobs.job-detail', $job->slug) }}">{{ $job->title }}</a></h3>
                    <div class="job-company">{{ $job->company }}</div>
                    <div class="job-meta">
                        <span>{{ $job->location }}</span>
                        {{-- Campos como "Full-time" e a faixa salarial não estão no seu modelo Job atualmente.
                           Se você quiser exibi-los, precisaria adicioná-los ao modelo Job e à tabela de banco de dados.
                           Por exemplo, se tivesse 'employment_type' e 'salary_range':
                           <span>{{ $job->employment_type }}</span>
                           <span>{{ $job->salary_range }}</span>
                        --}}
                    </div>
                </div>
            @empty
                <p>Nenhuma vaga encontrada no momento.</p>
            @endforelse

            <div class="pagination">
                {{ $jobs->links('template.pagination') }}
            </div>
        </div>
    </section>
@endsection
