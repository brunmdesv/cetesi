<?php
/**
 * Debug de Fontes - CETESI
 * 
 * Este arquivo ajuda a debugar problemas com fontes
 * Acesse: /wp-content/themes/cetesi/debug-fonts.php
 */

// Verificar se estamos no WordPress
if (!defined('ABSPATH')) {
    // Simular constantes do WordPress
    define('ABSPATH', dirname(__FILE__) . '/../../');
}

// Definir constantes do tema
define('CETESI_VERSION', '1.0.0');
define('CETESI_THEME_DIR', dirname(__FILE__));
define('CETESI_THEME_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/cetesi');
define('CETESI_ASSETS_URL', CETESI_THEME_URL . '/assets');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug de Fontes - CETESI</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            padding: 20px;
            line-height: 1.6;
            background: #f5f5f5;
        }
        
        .debug-section {
            background: white;
            margin: 20px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .debug-title {
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .font-test {
            margin: 15px 0;
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #2563eb;
            border-radius: 4px;
        }
        
        .font-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .font-sample {
            font-size: 18px;
            margin: 10px 0;
            padding: 10px;
            background: white;
            border-radius: 4px;
        }
        
        .font-info {
            font-size: 12px;
            color: #666;
            font-family: monospace;
            background: #e9ecef;
            padding: 5px;
            border-radius: 3px;
        }
        
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .status.success {
            background: #d4edda;
            color: #155724;
        }
        
        .status.error {
            background: #f8d7da;
            color: #721c24;
        }
        
        .status.warning {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <h1>🔍 Debug de Fontes - CETESI</h1>
    
    <div class="debug-section">
        <h2 class="debug-title">📁 Verificação de Arquivos</h2>
        
        <?php
        $fontFiles = [
            'Inter_18pt-Regular.ttf' => CETESI_THEME_DIR . '/assets/fonts/Inter_18pt-Regular.ttf',
            'Inter_18pt-Bold.ttf' => CETESI_THEME_DIR . '/assets/fonts/Inter_18pt-Bold.ttf',
            'Poppins-Regular.ttf' => CETESI_THEME_DIR . '/assets/fonts/Poppins-Regular.ttf',
            'Poppins-Bold.ttf' => CETESI_THEME_DIR . '/assets/fonts/Poppins-Bold.ttf',
            'Poppins-ExtraBold.ttf' => CETESI_THEME_DIR . '/assets/fonts/Poppins-ExtraBold.ttf',
        ];
        
        foreach ($fontFiles as $fileName => $filePath) {
            $exists = file_exists($filePath);
            $size = $exists ? filesize($filePath) : 0;
            $status = $exists ? 'success' : 'error';
            $statusText = $exists ? 'OK' : 'ERRO';
            $sizeText = $exists ? number_format($size / 1024, 2) . ' KB' : 'N/A';
            
            echo "<div class='font-test'>";
            echo "<div class='font-name'>{$fileName} <span class='status {$status}'>{$statusText}</span></div>";
            echo "<div class='font-info'>Caminho: {$filePath}</div>";
            echo "<div class='font-info'>Tamanho: {$sizeText}</div>";
            echo "</div>";
        }
        ?>
    </div>
    
    <div class="debug-section">
        <h2 class="debug-title">🎨 Teste de Fontes</h2>
        
        <div class="font-test">
            <div class="font-name">Fonte Padrão do Sistema</div>
            <div class="font-sample" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                Esta é uma amostra da fonte padrão do sistema. CETESI - Escola de Cursos.
            </div>
            <div class="font-info">font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;</div>
        </div>
        
        <div class="font-test">
            <div class="font-name">Inter (Google Fonts)</div>
            <div class="font-sample" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                Esta é uma amostra da fonte Inter do Google Fonts. CETESI - Escola de Cursos.
            </div>
            <div class="font-info">font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;</div>
        </div>
        
        <div class="font-test">
            <div class="font-name">Poppins (Google Fonts)</div>
            <div class="font-sample" style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                Esta é uma amostra da fonte Poppins do Google Fonts. CETESI - Escola de Cursos.
            </div>
            <div class="font-info">font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;</div>
        </div>
    </div>
    
    <div class="debug-section">
        <h2 class="debug-title">🔧 Informações Técnicas</h2>
        
        <div class="font-test">
            <div class="font-name">Constantes do Tema</div>
            <div class="font-info">
                CETESI_VERSION: <?php echo CETESI_VERSION; ?><br>
                CETESI_THEME_DIR: <?php echo CETESI_THEME_DIR; ?><br>
                CETESI_THEME_URL: <?php echo CETESI_THEME_URL; ?><br>
                CETESI_ASSETS_URL: <?php echo CETESI_ASSETS_URL; ?>
            </div>
        </div>
        
        <div class="font-test">
            <div class="font-name">Informações do Servidor</div>
            <div class="font-info">
                User Agent: <?php echo $_SERVER['HTTP_USER_AGENT'] ?? 'N/A'; ?><br>
                Servidor: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?><br>
                PHP Version: <?php echo PHP_VERSION; ?><br>
                Sistema: <?php echo PHP_OS; ?>
            </div>
        </div>
        
        <div class="font-test">
            <div class="font-name">Arquivos CSS</div>
            <div class="font-info">
                fonts.css: <?php echo file_exists(CETESI_THEME_DIR . '/assets/css/fonts.css') ? 'OK' : 'ERRO'; ?><br>
                style.css: <?php echo file_exists(CETESI_THEME_DIR . '/style.css') ? 'OK' : 'ERRO'; ?><br>
                main.css: <?php echo file_exists(CETESI_THEME_DIR . '/assets/css/main.css') ? 'OK' : 'ERRO'; ?><br>
                header.css: <?php echo file_exists(CETESI_THEME_DIR . '/assets/css/header.css') ? 'OK' : 'ERRO'; ?>
            </div>
        </div>
    </div>
    
    <div class="debug-section">
        <h2 class="debug-title">📋 Próximos Passos</h2>
        
        <div class="font-test">
            <div class="font-name">Para Resolver Problemas de Fontes:</div>
            <div class="font-info">
                1. Verifique se todos os arquivos de fonte estão presentes<br>
                2. Teste o arquivo test-fonts.html no navegador<br>
                3. Verifique o console do navegador para erros<br>
                4. Teste em diferentes dispositivos e navegadores<br>
                5. Limpe o cache do navegador e do WordPress<br>
                6. Verifique se não há plugins conflitantes
            </div>
        </div>
    </div>
    
    <script>
        // Debug JavaScript
        console.log('=== DEBUG DE FONTES CETESI ===');
        
        // Verificar se as fontes estão sendo carregadas
        if (document.fonts) {
            document.fonts.ready.then(function() {
                console.log('Fontes carregadas:', document.fonts.size);
                document.fonts.forEach(function(font) {
                    console.log('Fonte disponível:', font.family, font.weight, font.style);
                });
            });
        }
        
        // Verificar variáveis CSS
        const root = document.documentElement;
        const computedStyle = getComputedStyle(root);
        
        console.log('--font-primary:', computedStyle.getPropertyValue('--font-primary'));
        console.log('--font-heading:', computedStyle.getPropertyValue('--font-heading'));
        console.log('--font-body:', computedStyle.getPropertyValue('--font-body'));
        
        // Verificar fontes aplicadas
        const body = document.body;
        const bodyFont = getComputedStyle(body).fontFamily;
        console.log('Body font-family:', bodyFont);
    </script>
</body>
</html>
