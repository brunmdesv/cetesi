<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CETESI - Site em Construção</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #2563eb 0%, #10b981 100%);
            --gradient-hero: linear-gradient(135deg, #1e40af 0%, #059669 100%);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            --space-3xl: 4rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--gradient-hero);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Animações de fundo */
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 70px;
            height: 70px;
            top: 10%;
            left: 70%;
            animation-delay: 1s;
        }

        .shape:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 40%;
            left: 5%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(180deg);
            }
        }

        /* Container principal */
        .maintenance-container {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 600px;
            padding: var(--space-xl);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin: var(--space-lg);
        }

        /* Logo */
        .logo-section {
            margin-bottom: var(--space-xl);
        }

        .logo {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-md);
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .logo i {
            font-size: 2rem;
            color: white;
            z-index: 1;
        }

        .site-name {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .site-tagline {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Conteúdo principal */
        .main-content {
            margin-bottom: var(--space-xl);
        }

        .construction-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-lg);
            animation: pulse 2s infinite;
            box-shadow: var(--shadow-md);
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: var(--shadow-md);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
            }
        }

        .construction-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .main-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            line-height: 1.2;
        }

        .main-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: var(--space-lg);
            line-height: 1.6;
        }

        .progress-section {
            margin-bottom: var(--space-xl);
        }

        .progress-label {
            font-size: 0.95rem;
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: var(--space-sm);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: rgba(37, 99, 235, 0.1);
            border-radius: var(--radius-full);
            overflow: hidden;
            margin-bottom: var(--space-xs);
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
            width: 75%;
            animation: progressFill 2s ease-out;
            position: relative;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes progressFill {
            0% {
                width: 0%;
            }
            100% {
                width: 75%;
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .progress-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Features em construção */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: var(--space-md);
            margin-bottom: var(--space-xl);
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.8);
            padding: var(--space-lg);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(37, 99, 235, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-color);
        }

        .feature-icon {
            width: 35px;
            height: 35px;
            background: var(--gradient-primary);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-sm);
        }

        .feature-icon i {
            font-size: 1.1rem;
            color: white;
        }

        .feature-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .feature-description {
            font-size: 0.8rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        /* Contato */
        .contact-section {
            background: rgba(16, 185, 129, 0.1);
            padding: var(--space-lg);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(16, 185, 129, 0.2);
            margin-bottom: var(--space-lg);
        }

        .contact-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-xs);
        }

        .contact-title i {
            color: var(--secondary-color);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-xs);
            align-items: center;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: var(--space-xs);
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .contact-item i {
            color: var(--secondary-color);
            width: 16px;
        }

        /* Footer */
        .maintenance-footer {
            margin-top: var(--space-lg);
            padding-top: var(--space-md);
            border-top: 1px solid rgba(37, 99, 235, 0.1);
        }

        .footer-text {
            color: var(--text-secondary);
            font-size: 0.8rem;
            margin-bottom: var(--space-sm);
        }

        .developer-info {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-xs);
        }

        .developer-info i {
            color: var(--accent-color);
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .maintenance-container {
                margin: var(--space-md);
                padding: var(--space-lg);
            }

            .site-name {
                font-size: 1.8rem;
            }

            .main-title {
                font-size: 1.8rem;
            }

            .main-subtitle {
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .feature-card {
                padding: var(--space-md);
            }

            .contact-info {
                align-items: flex-start;
            }

            .contact-item {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .maintenance-container {
                margin: var(--space-sm);
                padding: var(--space-md);
            }

            .site-name {
                font-size: 1.6rem;
            }

            .main-title {
                font-size: 1.6rem;
            }

            .logo {
                width: 70px;
                height: 70px;
            }

            .logo i {
                font-size: 1.8rem;
            }

            .construction-icon {
                width: 60px;
                height: 60px;
            }

            .construction-icon i {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Animações de fundo -->
    <div class="background-animation">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <!-- Container principal -->
    <div class="maintenance-container">
        <!-- Logo e nome do site -->
        <div class="logo-section">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h1 class="site-name">CETESI</h1>
            <p class="site-tagline">Centro de Ensino Técnico em Saúde Integrado</p>
        </div>

        <!-- Conteúdo principal -->
        <div class="main-content">
            <div class="construction-icon">
                <i class="fas fa-tools"></i>
            </div>
            
            <h2 class="main-title">Site em Construção</h2>
            <p class="main-subtitle">
                Estamos trabalhando duro para trazer uma experiência incrível para você! 
                Em breve, você terá acesso a todos os nossos cursos técnicos em saúde.
            </p>

            <!-- Barra de progresso -->
            <div class="progress-section">
                <div class="progress-label">Progresso do Desenvolvimento</div>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
                <div class="progress-text">75% Concluído</div>
            </div>
        </div>

        <!-- Features em construção -->
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="feature-title">Cursos Técnicos</h3>
                <p class="feature-description">
                    Cursos técnicos em enfermagem, farmácia e outras áreas da saúde
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="feature-title">Matrículas Online</h3>
                <p class="feature-description">
                    Sistema completo de matrícula e acompanhamento acadêmico
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="feature-title">Certificações</h3>
                <p class="feature-description">
                    Certificados reconhecidos pelo MEC e válidos em todo território nacional
                </p>
            </div>
        </div>

        <!-- Contato -->
        <div class="contact-section">
            <h3 class="contact-title">
                <i class="fas fa-phone"></i>
                Entre em Contato
            </h3>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>QNN 02, St. N Qnn 2 Conjunto e, LOTE 04 - Sala 102, Ceilândia - DF</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>(61) 3351-4511</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>contato@cetesi.com.br</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="maintenance-footer">
            <p class="footer-text">
                © 2025 CETESI - Centro de Ensino Técnico em Saúde Integrado. Todos os direitos reservados.
            </p>
            <div class="developer-info">
                <i class="fas fa-code"></i>
                <span>Desenvolvido por Bruno Maykon</span>
            </div>
        </div>
    </div>

    <script>
        // Animação adicional para os cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.feature-card');
            
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.style.animation = 'fadeInUp 0.6s ease-out forwards';
            });
        });

        // Adicionar CSS para animação fadeInUp
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .feature-card {
                opacity: 0;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
