@extends('template.app')

{{-- Define o título da página dinamicamente --}}
@section('title', $job->title . ' - ' . $job->company . ' | Remote Yoyota')




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
            background: #fff;
        }

        /* Nav */
        nav {
            border-bottom: 1px solid #e5e5e5;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        nav a {
            color: #000;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #627EEA;
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem 3rem;
        }

        /* Job Header */
        .job-header {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #000;
        }

        .job-title {
            font-size: 2.5em;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .job-company {
            font-size: 1.5em;
            color: #627EEA;
            margin-bottom: 1rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 1rem;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            font-size: 0.85em;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .meta-value {
            font-size: 1.1em;
            font-weight: 600;
            margin-top: 0.25rem;
        }

        /* Apply Button */
        .apply-section {
            margin: 2rem 0;
            text-align: center;
        }

        .btn-apply {
            background: #000;
            color: #fff;
            padding: 1rem 3rem;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-apply:hover {
            background: #627EEA;
            transform: translateY(-2px);
        }

        /* Auto Apply Promo */
        .auto-apply-promo {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #627EEA;
            border-radius: 8px;
            padding: 2rem;
            margin: 3rem 0;
            text-align: center;
        }

        .promo-badge {
            background: #627EEA;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .promo-title {
            font-size: 1.8em;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .promo-description {
            font-size: 1.1em;
            color: #333;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .promo-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }

        .promo-feature {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .feature-icon {
            font-size: 1.5em;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 0.95em;
            line-height: 1.5;
        }

        .btn-promo {
            background: #627EEA;
            color: #fff;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .btn-promo:hover {
            background: #4c63d2;
            transform: translateY(-2px);
        }

        /* Job Content */
        .job-section {
            margin: 2.5rem 0;
        }

        .section-title {
            font-size: 1.5em;
            margin-bottom: 1rem;
            font-weight: 700;
            border-bottom: 2px solid #000;
            padding-bottom: 0.5rem;
        }

        .job-description {
            font-size: 1.05em;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .job-list {
            list-style: none;
            padding-left: 0;
        }

        .job-list li {
            padding: 0.5rem 0 0.5rem 1.5rem;
            position: relative;
            font-size: 1.05em;
        }

        .job-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #627EEA;
            font-weight: bold;
            font-size: 1.5em;
            line-height: 1;
        }

        /* Tags */
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .tag {
            background: #f0f0f0;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
        }

        /* Footer */
        footer {
            margin-top: 4rem;
            padding: 2rem 0;
            border-top: 1px solid #e5e5e5;
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

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .job-title {
                font-size: 1.8em;
            }

            .job-company {
                font-size: 1.2em;
            }

            .job-meta {
                gap: 1rem;
            }

            .promo-features {
                grid-template-columns: 1fr;
            }

            .btn-apply,
            .btn-promo {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    {{-- Botão Voltar (Adicionado para melhor UX) --}}
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('jobs.index') }}" style="color: #627EEA; text-decoration: none; font-weight: 500;">&larr; Voltar para todas as vagas</a>
    </div>

    {{-- Job Header --}}
    <div class="job-header">
        <h1 class="job-title">{{ $job->title }}</h1>
        <div class="job-company">{{ $job->company }}</div>

        <div class="job-meta">
            <div class="meta-item">
                <span class="meta-label">Localização</span>
                <span class="meta-value">{{ $job->location ?? 'Não especificado' }}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Publicado</span>
                <span class="meta-value">{{ $job->created_at->diffForHumans() }}</span>
            </div>
        </div>

        @if($job->categories->count())
            <div class="tags">
                @foreach($job->categories as $category)
                    <span class="tag">{{ $category->name }}</span>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Apply Button --}}
    @if($job->apply)
        <div class="apply-section">
            <a href="{{ $job->apply }}" target="_blank" class="btn-apply">Candidatar-se Agora</a>
        </div>
    @endif

    {{-- Auto Apply Promo (conteúdo estático da inspiração) --}}
    <div class="auto-apply-promo">
        <div class="promo-badge">Serviço Premium</div>
        <h2 class="promo-title">Cansado de se Candidatar Manualmente?</h2>
        <p class="promo-description">
            Deixe nosso Serviço de Candidaturas Automáticas fazer o trabalho por você! Enviaremos candidaturas para vagas que correspondam ao seu perfil automaticamente, economizando horas do seu tempo.
        </p>

        <div class="promo-features">
            <div class="promo-feature">
                <span class="feature-icon">⚡</span>
                <div class="feature-text">
                    <strong>Automação Inteligente</strong><br>
                    Correspondência com IA para encontrar as melhores oportunidades
                </div>
            </div>
            <div class="promo-feature">
                <span class="feature-icon">⏰</span>
                <div class="feature-text">
                    <strong>Economize Tempo</strong><br>
                    Candidate-se a dezenas de vagas enquanto você foca nas entrevistas
                </div>
            </div>
            <div class="promo-feature">
                <span class="feature-icon">🎯</span>
                <div class="feature-text">
                    <strong>Máxima Precisão</strong><br>
                    Candidaturas direcionadas com base na sua experiência
                </div>
            </div>
        </div>

        <a href="{{ route('home', ['#pricing']) }}" class="btn-promo">Comece a partir de $1/semana</a> {{-- Ajustado para linkar para a seção de pricing da home --}}
    </div>

    {{-- Job Description --}}
    <div class="job-section">
        <h2 class="section-title">Sobre a Vaga</h2>
        <div class="job-description">
            {{-- O campo 'content' do seu Job model deve conter a descrição completa, possivelmente com HTML para formatação --}}
            {!! $job->content !!}
        </div>
    </div>

    {{-- Apply Button Bottom --}}
    @if($job->apply)
        <div class="apply-section">
            <a href="{{ $job->apply }}" target="_blank" class="btn-apply">Candidatar-se Agora</a>
        </div>
    @endif
@endsection
