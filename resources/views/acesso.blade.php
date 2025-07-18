<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Portal - Gov-Assai</title>
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="header">
                <div class="gov-header">
                    <div class="gov-seal"><img src="{{ asset('assets/brasao.png') }}" alt=""></div>
                    <div>
                        <img src="" alt="Governo do Paraná" class="logo">
                    </div>
                </div>
                <h1>Portal Gov-Assai</h1>
                <p>Sistema Unificado de Acesso aos Portais Governamentais</p>
            </div>

            <div class="login-content">
                <button id="loginBtn" class="gov-login-btn">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Acessar com Gov-Assai
                </button>

                <div class="gov-info">
                    <h3>Acesso Unificado</h3>
                    <p>✓ Portal da Educação</p>
                    <p>✓ Portal da Saúde</p>
                    <p>✓ Portal de Obras e Serviços</p>
                    <p>✓ Portal da Transparência</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay de Loading -->
    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <div class="loading-content">
            <div class="spinner-large"></div>
            <p>Autenticando...</p>
        </div>
    </div>

</body>
</html>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.header {
    text-align: center;
    padding: 40px 30px 30px;
    background: linear-gradient(135deg, #f8faff 0%, #eff6ff 100%);
    border-bottom: 3px solid #1e40af;
}

.header h1 {
    color: #1e40af;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.header p {
    color: #475569;
    font-size: 16px;
    line-height: 1.5;
}

.gov-login-btn {
    width: 100%;
    background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
    color: white;
    border: none;
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
    box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
}

.gov-login-btn:hover {
    background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(30, 64, 175, 0.4);
}

.modal-header h2 {
    color: #1e40af;
    font-size: 24px;
    font-weight: 700;
}

.form-group input:focus {
    outline: none;
    border-color: #1e40af;
    background: white;
    box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
}

.forgot-password {
    color: #1e40af;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.submit-btn {
    width: 100%;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 14px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.submit-btn:hover:not(:disabled) {
    background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
}

.register-link {
    color: #1e40af;
    text-decoration: none;
    font-weight: 500;
}

.spinner-large {
    width: 50px;
    height: 50px;
    border: 4px solid #e2e8f0;
    border-radius: 50%;
    border-top-color: #1e40af;
    animation: spin 1s ease-in-out infinite;
    margin: 0 auto 20px;
}

/* Adicionar estilo para o brasão/logo do governo */
.gov-header {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.gov-seal {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 18px;
}

/* Estilo para informações governamentais */
.gov-info {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 16px;
    margin-top: 20px;
}

.gov-info h3 {
    color: #1e40af;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
}

.gov-info p {
    color: #475569;
    font-size: 14px;
    margin-bottom: 6px;
}
</style>
<script>
    showSuccessMessage(message) {
    this.hideLoadingOverlay();
    
    // Criar overlay de sucesso
    const successOverlay = document.createElement('div');
    successOverlay.innerHTML = `
        <div style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            z-index: 3000;
            display: flex;
            align-items: center;
            justify-content: center;
        ">
            <div style="text-align: center;">
                <div style="
                    width: 60px;
                    height: 60px;
                    background: #059669;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 20px;
                    animation: successPulse 0.6s ease-out;
                ">
                    <svg width="30" height="30" fill="white" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 style="color: #1e40af; font-size: 24px; margin-bottom: 10px;">
                    Acesso Autorizado
                </h2>
                <p style="color: #475569; font-size: 16px;">
                    ${message}
                </p>
                <p style="color: #6b7280; font-size: 14px; margin-top: 10px;">
                    Redirecionando para o portal...
                </p>
            </div>
        </div>
    `;
    
    document.body.appendChild(successOverlay);
}

handleForgotPassword() {
    alert('Redirecionando para recuperação de senha do Gov-Assai...\n\nEm caso de dúvidas, entre em contato com o suporte técnico.');
}

handleRegister() {
    alert('Para criar uma conta no Gov-Assai, procure o setor responsável em sua secretaria ou entre em contato com o suporte técnico.');
}
</script>
