<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal da Saúde de Assaí</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gov-login-btn {
            width: 100%;
            background-color: #02944D;
            border: none;
            color: white;
            border-radius: 8px;
            padding: 16px 24px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
            margin-top: 20px;
            position: relative;
        }

        .gradient-bg {
            background-color: linear-gradient(135deg, #93c5fd 0%, #dbeafe 100%);    
        }

        .hero-pattern {
            background-image: url('{{ asset('assets/hero.jpg') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .hero-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('assets/hero.jpg') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(5px) brightness(0.4);
            z-index: 1;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(30, 64, 175, 0.98);
            z-index: 50;
            padding-top: 80px;
        }

        .mobile-menu.active {
            display: block;
        }

        @media (max-width: 1024px) {
            .desktop-nav {
                display: none !important;
            }
        }

        @media (max-width: 768px) {
            .gallery {
                height: 220px;
            }
        }

        @media (max-width: 640px) {
            .gallery {
                height: 120px;
            }
        }

        .ubs {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #f0f4f8;
            padding: 32px 40px;
            border-radius: 8px;
            margin: 32px 0;
            min-height: 400px;
            gap: 20px;
        }

        .principal {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: stretch;
            margin-top: 3rem;
            width: 100%;
            gap: 32px;
        }

        .ubs-title {
            flex: 0 0 340px;
            text-align: left;
            margin-bottom: 0;
            align-self: stretch;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-left: 120px;
            margin-right: 100px;
            min-width: 260px;
            max-width: 340px;
        }

        .ubs-title h1 {
            color: #1e40af;
        }

        .ubs-title p {
            color: #4b5563;
        }

        .block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            background-color: #ffffff;
            padding: 20px 24px;
            height: 270px;
            width: 280px;
            border-radius: 8px;
            text-align: left;
            margin-left: auto;
            box-shadow: 0 2px 8px rgba(30, 64, 175, 0.04);
            transition: background 0.2s, color 0.2s;
        }

        .block h2 {
            color: #1e40af;
            font-size: 1.25rem;
            margin-bottom: 5px;
            text-align: left;
            font-weight: bold;
        }

        .end-unidade {
            color: #4f72e7ff;
            font-size: 0.95rem;
            margin-bottom: 5px;
            text-align: left;
        }

        .block span:not([class]) {
            color: #4b5563;
            font-size: 0.95rem;
            text-align: left;
        }

        .block:hover {
            background-color: #1e40af;
            cursor: pointer;
        }

        .block:hover h2,
        .block:hover .end-unidade,
        .block:hover span {
            color: #fff;
        }

        @media (max-width: 900px) {
            .ubs {
                flex-direction: column;
                gap: 32px;
                padding: 24px 10px;
                align-items: stretch;
            }

            .ubs-title {
                flex: unset;
                margin-bottom: 16px;
                text-align: center;
                align-items: center;
            }

            .block {
                margin-left: 0;
                align-items: center;
                text-align: center;
            }
        }

        @media (max-width: 1100px) {
            .principal {
                flex-direction: column;
                gap: 24px;
                align-items: stretch;
            }

            .ubs-title {
                max-width: 100%;
                min-width: unset;
                margin-bottom: 16px;
                text-align: center;
                align-items: center;
            }
        }

        .ubs-carousel-wrapper {
            overflow: hidden;
            width: 900px;
            max-width: 100%;
        }

        .ubs-carousel {
            display: flex;
            transition: transform 0.5s;
            will-change: transform;
            gap: 16px;
            /* largura total = quantidade de blocks * largura do block */
            width: max-content;
        }

        .ubs-carousel .block {
            flex: 0 0 240px;
            /* impede compressão dos blocks */
            width: 280px;
            margin-left: 0;
            margin-right: 0;
        }

        @media (max-width: 900px) {
            .ubs-carousel-wrapper {
                width: 540px;
            }

            .ubs-carousel .block {
                flex: 0 0 260px;
            }
        }

        @media (max-width: 640px) {
            .ubs-carousel-wrapper {
                width: 270px;
            }

            .ubs-carousel .block {
                flex: 0 0 260px;
            }
        }
    </style>
</head>

<body class="font-sans">
    <!-- Header -->
    <header class="bg-blue-900 text-white">
        <!-- Main navigation -->
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-16 h-16 bg-blue rounded-full flex items-center justify-center border-4 border-blue-900">
                        <img src="{{ asset('assets/brasao.png') }}" alt="Brasão Assaí" class="w-12 h-12">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">PORTAL</h1>
                        <h2 class="text-lg">DE SAÚDE</h2>
                        <p class="text-xs opacity-80">ASSAÍ</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="desktop-nav hidden lg:flex items-center space-x-8">
                    <a href="#home" class="hover:text-blue-200 transition-colors">Home</a>
                    <a href="#structure" class="hover:text-blue-200 transition-colors">Unidades</a>
                    <a href="#specialties" class="hover:text-blue-200 transition-colors">Especialidades</a>
                    <a href="#contact" class="hover:text-blue-200 transition-colors">Contato</a>
                    <div class="container mx-auto px-4 flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <input type="search" placeholder="Buscar" class="w-48 h-8 px-3 rounded text-black text-sm">
                            <button class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
            </div>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden flex flex-col justify-center items-center w-10 h-10 rounded focus:outline-none"
                onclick="toggleMobileMenu()" aria-label="Abrir menu">
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-menu lg:hidden">
            <div class="flex flex-col space-y-4 items-center justify-center h-full">
                <button onclick="toggleMobileMenu()"
                    class="absolute top-6 right-6 text-white text-3xl focus:outline-none" aria-label="Fechar menu">
                    <i class="fas fa-times"></i>
                </button>
                <a href="#home" class="hover:text-blue-200 transition-colors py-2 text-xl font-bold">Home</a>
                <a href="#structure" class="hover:text-blue-200 transition-colors py-2 text-xl font-bold">Unidades</a>
                <a href="#specialties"
                    class="hover:text-blue-200 transition-colors py-2 text-xl font-bold">Especialidades</a>
                <a href="#contact" class="hover:text-blue-200 transition-colors py-2 text-xl font-bold">Contato</a>
            </div>
        </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative gradient-bg hero-pattern min-h-screen flex items-center overflow-hidden">
        <div class="container mx-auto px-4 flex items-center justify-between relative z-10">
            <div class="flex-1 max-w-2xl">
                <h1 class="text-5xl font-bold text-white mb-6 leading-tight">ARRAIÁ DA VACINA | NESTE SÁBADO 19/07
                </h1>
                <button
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 text-lg rounded-md transition-colors">
                    Saiba Mais ->
                </button>
            </div>
            <div class="flex-1 flex justify-end">
                <img src="{{ asset('assets/images.png') }}" alt="Médicos profissionais"
                    class="rounded-lg shadow-lg max-w-lg">
            </div>
            <div class="back">
                <img </div>
            </div>

            <!-- Security badge -->
            <div class="absolute bottom-8 right-8 bg-green-500 p-3 rounded-lg">
                <i class="fas fa-lock text-white text-2xl"></i>
            </div>
    </section>

    <!-- Galeria interativa de imagens.-->
    <section class="ubs">
        <div class="principal">
            <div class="ubs-title">
                <h1 class="text-4xl font-bold text-blue-900 mb-6">Unidades de Saúde em Assaí</h1>
                <p class="text-lg text-gray-600">Conheça nossas unidades e serviços disponíveis.</p>
            </div>
            <div class="ubs-carousel-wrapper overflow-hidden " style="width: 840px; max-width: 100%;">
                <div class="ubs-carousel flex transition-transform duration-500 gap-4" style="will-change: transform;">
                    <div class="block">
                        <h2>Centro de Saúde/ Secretaria de Saúde</h2>
                        <span class="end-unidade">Rua Manoel Ribas, s/n - Centro</span><br>
                        <span>Telefone: <strong>3262-8400</strong></span><br>
                        <span>Horário: <strong>07:00h – 17:00h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Posto de Saúde Vila Nova Esperança </h2>
                        <span class="end-unidade">Rua Vicente Ilario da Cruz, s/n – Vila Esperança</span><br>
                        <span>Telefone: <strong>3262-5582</strong></span><br>
                        <span>Horário: <strong>07:00h – 17:00h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Posto de Saúde Vila Nova</h2>
                        <span class="end-unidade">Rua Primavera, s/n – Vila Nova</span><br>
                        <span>Telefone: <strong>3262-3105</strong></span><br>
                        <span>Horário: <strong>07:00h – 17:00h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Posto Pau D'Alho do Sul </h2>
                        <span class="end-unidade">Rua Principal, s/n – Distrito Pau D'Alho do Sul</span><br>
                        <span>Telefone: <strong>3211-1116</strong></span><br>
                        <span>Horário: <strong> 07:30h – 16:30h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Clínica da Mulher </h2>
                        <span class="end-unidade">Rua Getúlio Vargas, s/n – Centro</span><br>
                        <span>Telefone: <strong>3262-2373</strong></span><br>
                        <span>Horário: <strong>07:30h – 16:30h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Policlínica</h2>
                        <span class="end-unidade"> Av Rio de Janeiro, s/n – Centro</span><br>
                        <span>Telefone: <strong>3262-0865</strong></span><br>
                        <span>Horário: <strong>07:30h – 17:00h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Hospital Municipal de Assaí</h2>
                        <span class="end-unidade"> Rua Manoel Ribas, 1530 – Centro</span><br>
                        <span>Telefone: <strong>3262-4080</strong></span><br>
                        <span>Horário: <strong>24 horas</strong></span>
                    </div>
                    <div class="block">
                        <h2>Fármacia Municipal</h2>
                        <span class="end-unidade">Av Rio de Janeiro, s/n – Centro</span><br>
                        <span>Telefone: <strong>3262-0064</strong></span><br>
                        <span>Horário: <strong>07:30h – 17:00h</strong></span>
                    </div>
                    <div class="block">
                        <h2>Sede Endemias </h2>
                        <span class="end-unidade">Rua Tancredo Neves, s/n – Conjunto Assaí</span><br>
                        <span>Horário: <strong>07:30h – 17:00h</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center mt-6 space-x-4">
            <button id="ubs-prev"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full focus:outline-none">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="ubs-next"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full focus:outline-none">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>


    <!-- Services Section -->
    <section class="py-16 bg-gray-50">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-900 mb-4">Calendário de Vacinas</h2>
        </div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <div
                    class="bg-blue-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 text-center card-hover">
                    <i class="fas fa-person-cane text-5xl mb-4"></i>
                    <h3 class="text-sm font-bold mb-6 leading-tight">IDOSOS</h3>
                    <a href="{{ asset('assets/Calendário Idoso.pdf') }}" target="_blank" style="text-decoration: none;"
                        class="bg-orange-500 hover:bg-orange-600 text-white w-full py-2 rounded-md transition-colors inline-block text-center">Acesse
                        o Calendário</a>
                </div>
                <div
                    class="bg-blue-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 text-center card-hover">
                    <i class="fas fa-person-pregnant text-5xl mb-4"></i>
                    <h3 class="text-sm font-bold mb-6 leading-tight">GESTANTES</h3>
                    <a href="{{ asset('assets/Calendário Nacional de Vacinação - Gestante.pdf') }}" target="_blank" style="text-decoration: none;"
                        class="bg-blue-500 hover:bg-blue-600 text-white w-full py-2 rounded-md transition-colors">Acesse
                        o Calendário</a>
                </div>
                <div
                    class="bg-blue-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 text-center card-hover">
                    <i class="fas fa-baby text-5xl mb-4"></i>
                    <h3 class="text-sm font-bold mb-6 leading-tight">CRIANÇAS</h3>
                    <a href="{{ asset('assets/Calendário Nacional de Vacinação - Criança (4).pdf') }}" target="_blank" style="text-decoration: none;"
                        class="bg-red-500 hover:bg-red-600 text-white w-full py-2 rounded-md transition-colors">Acesse o
                        Calendário
    </a>
                </div>
                <div
                    class="bg-blue-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 text-center card-hover">
                    <i class="fas fa-person text-5xl mb-4"></i>
                    <h3 class="text-sm font-bold mb-6 leading-tight">ADULTOS</h3>
                    <a href="{{ asset('assets/Calendário Nacional de Vacinação - Adulto.pdf') }}" target="_blank" style="text-decoration: none;"
                        class="bg-purple-500 hover:bg-purple-600 text-white w-full py-2 rounded-md transition-colors">Acesse o Calendário</a>
                </div>
                <div
                    class="bg-blue-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 text-center card-hover">
                    <i class="fas fa-people-group text-5xl mb-4"></i>
                    <h3 class="text-sm font-bold mb-6 leading-tight">ADOLESCENTES E JOVENS</h3>
                    <a
                        class="bg-green-500 hover:bg-green-600 text-white w-full py-2 rounded-md transition-colors">Acesse o Calendário</button>
    </a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-blue-900 mb-4">Notícias e Novidades</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Fique por dentro das últimas novidades, campanhas de saúde e atualizações da Secretária de Saúde de
                    Assaí.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=300&h=200&fit=crop"
                            alt="Nova Unidade de Cardiologia" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            15 Jan 2025
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Nova Unidade de Cardiologia Inaugurada</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Hospital Evangélico inaugura moderna unidade de cardiologia com equipamentos de última
                            geração para melhor atendimento aos pacientes.
                        </p>
                        <button class="text-blue-600 hover:text-blue-700 flex items-center">
                            Ler mais <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=300&h=200&fit=crop"
                            alt="Campanha de Vacinação" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            12 Jan 2025
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Campanha de Vacinação Contra Gripe</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Iniciamos nossa campanha anual de vacinação contra gripe. Proteja-se e proteja sua família.
                        </p>
                        <button class="text-blue-600 hover:text-blue-700 flex items-center">
                            Ler mais <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=300&h=200&fit=crop"
                            alt="Programa de Residência" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            10 Jan 2025
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Novo Programa de Residência Médica</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Abertas as inscrições para o programa de residência médica 2025. Venha fazer parte da nossa
                            equipe.
                        </p>
                        <button class="text-blue-600 hover:text-blue-700 flex items-center">
                            Ler mais <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded transition-colors">
                    Ver Todas as Notícias
                </button>
            </div>
        </div>
    </section>

    <!-- Avisos Section (Destaque + Carrossel) -->
    <section id="avisos" class="py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-blue-900 mb-4">Avisos Importantes</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Fique atento aos avisos publicados pela equipe do Portal de Saúde de Assaí e pela comunidade.
                    Informações úteis, mudanças de horários, campanhas e comunicados oficiais.
                </p>
            </div>
            <div class="flex flex-col lg:flex-row gap-12 items-start max-w-6xl mx-auto">
                <!-- Carrossel de avisos -->
                <div class="relative flex-1 w-full">
                    <div id="avisos-carousel" class="overflow-hidden">
                        <div class="avisos-slide flex transition-transform duration-500"
                            style="will-change: transform;">
                            <!-- Slide 1 -->
                            <div class="flex min-w-full space-x-8">
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=400&h=200&fit=crop"
                                        alt="Aviso 2" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-bullhorn text-blue-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Comunidade</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Campanha de Doação de Sangue</h3>
                                    <p class="text-gray-600 mb-2 text-sm">Participe da campanha de doação de sangue no
                                        Hospital Municipal dia 10/08 das 8h às 12h.</p>
                                    <span class="text-xs text-gray-400">28/07/2024</span>
                                </div>
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?w=400&h=200&fit=crop"
                                        alt="Aviso 3" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-info-circle text-green-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Equipe Portal Saúde</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Novo Canal de Atendimento Online
                                    </h3>
                                    <p class="text-gray-600 mb-2 text-sm">Agora você pode tirar dúvidas e agendar
                                        consultas pelo nosso canal de atendimento online disponível no site.</p>
                                    <span class="text-xs text-gray-400">25/07/2024</span>
                                </div>
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?w=400&h=200&fit=crop"
                                        alt="Aviso 4" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-calendar-alt text-red-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Comunidade</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Evento de Saúde Mental</h3>
                                    <p class="text-gray-600 mb-2 text-sm">Participe da palestra gratuita sobre saúde
                                        mental no Centro Comunitário dia 22/08 às 19h.</p>
                                    <span class="text-xs text-gray-400">20/07/2024</span>
                                </div>
                            </div>
                            <!-- Slide 2 -->
                            <div class="flex min-w-full space-x-8">
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1506784365847-bbad939e9335?w=400&h=200&fit=crop"
                                        alt="Aviso 5" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-star text-purple-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Equipe Portal Saúde</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Reconhecimento de Profissionais
                                    </h3>
                                    <p class="text-gray-600 mb-2 text-sm">Parabenizamos os profissionais de saúde
                                        premiados este mês pelo excelente atendimento à comunidade.</p>
                                    <span class="text-xs text-gray-400">18/07/2024</span>
                                </div>
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?w=400&h=200&fit=crop"
                                        alt="Aviso 6" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-bell text-orange-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Comunidade</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Alerta: Vacinação Infantil</h3>
                                    <p class="text-gray-600 mb-2 text-sm">Não esqueça de atualizar a carteirinha de
                                        vacinação das crianças. Procure o posto mais próximo.</p>
                                    <span class="text-xs text-gray-400">15/07/2024</span>
                                </div>
                                <div class="bg-white rounded-lg shadow-lg p-6 card-hover w-1/3">
                                    <img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?w=400&h=200&fit=crop"
                                        alt="Aviso 7" class="rounded-lg mb-4 w-full h-32 object-cover">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-user-md text-teal-600 text-xl"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Equipe Portal Saúde</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-blue-900 mb-1">Novo Médico na Unidade</h3>
                                    <p class="text-gray-600 mb-2 text-sm">A unidade básica de saúde recebe novo médico
                                        clínico geral a partir de agosto.</p>
                                    <span class="text-xs text-gray-400">10/07/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-6 space-x-4">
                        <button id="avisos-prev"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full focus:outline-none">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="avisos-next"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full focus:outline-none">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 text-white py-12 sm:py-16 relative overflow-hidden">

        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 50px 50px;">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 mb-8 sm:mb-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div
                            class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-accent-gold to-yellow-500 rounded-2xl flex items-center justify-center">
                            <img src="{{ asset('assets/brasao.png') }}" alt="Logo Prefeitura" class="w-8 h-8 sm:w-12 sm:h-12">
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold">Prefeitura Municipal de Assaí</h3>
                            <p class="text-blue-200 text-sm sm:text-base">Inovando a cada nascer do Sola</p>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6 max-w-md text-sm sm:text-base">Trabalhando
                        incansavelmente para o desenvolvimento e bem-estar de todos os cidadãos assaienses, construindo
                        um futuro próspero e sustentável.</p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="https://www.facebook.com/prefeituraassai/?locale=pt_BR"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-600 hover:bg-blue-500 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook text-lg sm:text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/prefeituraassai/?hl=en"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-pink-600 hover:bg-pink-500 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram text-lg sm:text-xl"></i>
                        </a>
                        <a href="https://www.youtube.com/@prefeituradeassaiassai1062"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-red-600 hover:bg-red-500 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-youtube text-lg sm:text-xl"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6">Contato</h3>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-accent-gold"></i>
                            <span class="text-gray-300 text-sm sm:text-base">contato@assai.pr.gov.br</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-accent-gold"></i>
                            <span class="text-gray-300 text-sm sm:text-base">(43) 3262-1234</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-accent-gold"></i>
                            <span class="text-gray-300 text-sm sm:text-base">Centro, Assaí - PR</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6">Links Úteis</h3>
                    <div class="space-y-2 sm:space-y-3">
                        <a href="#"
                            >Portal
                            da Transparência</a>
                        <a href="#"
                            >Licitações</a>
                        <a href="#"
                            >Concursos</a>
                        <a href="#"
                           >Ouvidoria</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 sm:pt-8 text-center">
                <p class="text-gray-400 text-sm sm:text-base">&copy; 2025 Prefeitura Municipal de Assaí. Todos os
                    direitos reservados.</p>
            </div>
        </div>
    </div>    
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.querySelector('.mobile-menu');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
                // Close mobile menu if open menu toggle
                const mobileMenu = document.querySelector('.mobile-menu');
                mobileMenu.classList.remove('active');
            });
        });

        // Form submission
        function submitForm(event) {
            event.preventDefault();
            alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
            event.target.reset();
        }

        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
            } else {
                header.style.boxShadow = 'none';
            }
        });

        // Carrossel de avisos (3 cards por página)
        const avisosSlide = document.querySelector('.avisos-slide');
        const avisosPrev = document.getElementById('avisos-prev');
        const avisosNext = document.getElementById('avisos-next');
        let avisosIndex = 0;
        const avisosTotal = avisosSlide.children.length;
        function updateAvisosCarousel() {
            avisosSlide.style.transform = `translateX(-${avisosIndex * 100}%)`;
        }
        avisosPrev.addEventListener('click', () => {
            avisosIndex = avisosIndex === 0 ? avisosTotal - 1 : avisosIndex - 1;
            updateAvisosCarousel();
        });
        avisosNext.addEventListener('click', () => {
            avisosIndex = avisosIndex === avisosTotal - 1 ? 0 : avisosIndex + 1;
            updateAvisosCarousel();
        });

        // Carrossel de blocks da section UBS
        const ubsCarousel = document.querySelector('.ubs-carousel');
        const ubsBlocks = document.querySelectorAll('.ubs-carousel .block');
        const ubsPrev = document.getElementById('ubs-prev');
        const ubsNext = document.getElementById('ubs-next');
        let ubsIndex = 0;
        const ubsPerPage = 3;
        const ubsTotal = ubsBlocks.length;

        function updateUbsCarousel() {
            ubsCarousel.style.transform = `translateX(-${ubsIndex * (100 / ubsPerPage)}%)`;
        }

        ubsPrev.addEventListener('click', () => {
            ubsIndex = ubsIndex === 0 ? Math.ceil(ubsTotal / ubsPerPage) - 1 : ubsIndex - 1;
            updateUbsCarousel();
        });

        ubsNext.addEventListener('click', () => {
            ubsIndex = ubsIndex === Math.ceil(ubsTotal / ubsPerPage) - 1 ? 0 : ubsIndex + 1;
            updateUbsCarousel();
        });

        // Responsividade: ajusta o número de blocks por página conforme a tela
        function handleUbsResize() {
            let perPage = 3;
            if (window.innerWidth <= 900 && window.innerWidth > 640) perPage = 2;
            if (window.innerWidth <= 640) perPage = 1;
            if (perPage !== ubsPerPage) {
                ubsIndex = 0;
                updateUbsCarousel();
            }
        }
        window.addEventListener('resize', handleUbsResize);

        const gallery = document.getElementById('gallery');
        const blocks = document.querySelectorAll('.block');

        // Inicializa com a primeira imagem do card
        let currentImage = "{{ asset('assets/img1.jpeg') }}";
        gallery.style.backgroundImage = `url('${currentImage}')`;

        blocks.forEach(block => {
            const newImage = block.getAttribute('data-bg');
            block.addEventListener('mouseenter', () => {
                if (newImage !== currentImage) {
                    gallery.style.backgroundImage = `url('${newImage}')`;
                    currentImage = newImage;
                }
            });
            // Não há mais mouseleave — a imagem persiste
        });

    </script>
</body>

</html>