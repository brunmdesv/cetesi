<?php
/**
 * Arquivo de diagnóstico para o header mobile
 * Acesse: http://localhost/cetesi/wp-content/themes/cetesi-theme/debug-mobile-header.php
 */

// Verificar se estamos no WordPress
if (!defined('ABSPATH')) {
    // Carregar WordPress
    require_once('../../../wp-load.php');
}

echo "<h1>Diagnóstico do Header Mobile - CETESI Theme</h1>";

echo "<h2>1. Informações do Tema</h2>";
echo "<p><strong>Tema Ativo:</strong> " . get_template() . "</p>";
echo "<p><strong>Versão:</strong> " . wp_get_theme()->get('Version') . "</p>";

echo "<h2>2. Verificação de Arquivos</h2>";
$mobile_header_file = get_template_directory() . '/template-parts/header/mobile-header.php';
echo "<p><strong>Arquivo mobile-header.php:</strong> " . (file_exists($mobile_header_file) ? '✅ Existe' : '❌ Não encontrado') . "</p>";

echo "<h2>3. Verificação de Funções</h2>";
echo "<p><strong>Função cetesi_fallback_menu:</strong> " . (function_exists('cetesi_fallback_menu') ? '✅ Existe' : '❌ Não encontrada') . "</p>";
echo "<p><strong>Classe Cetesi_Mobile_Menu_Walker:</strong> " . (class_exists('Cetesi_Mobile_Menu_Walker') ? '✅ Existe' : '❌ Não encontrada') . "</p>";

echo "<h2>4. Verificação de Menus</h2>";
$menus = wp_get_nav_menus();
echo "<p><strong>Menus Registrados:</strong></p>";
if (empty($menus)) {
    echo "<p>❌ Nenhum menu encontrado</p>";
} else {
    echo "<ul>";
    foreach ($menus as $menu) {
        echo "<li>✅ {$menu->name} (ID: {$menu->term_id})</li>";
    }
    echo "</ul>";
}

echo "<h2>5. Verificação de Location do Menu</h2>";
$menu_locations = get_nav_menu_locations();
echo "<p><strong>Locations de Menu:</strong></p>";
if (empty($menu_locations)) {
    echo "<p>❌ Nenhum location de menu configurado</p>";
} else {
    echo "<ul>";
    foreach ($menu_locations as $location => $menu_id) {
        $menu = wp_get_nav_menu_object($menu_id);
        $menu_name = $menu ? $menu->name : 'Menu não encontrado';
        echo "<li>✅ {$location}: {$menu_name} (ID: {$menu_id})</li>";
    }
    echo "</ul>";
}

echo "<h2>6. Teste de Template Part</h2>";
echo "<p><strong>Testando get_template_part:</strong></p>";
echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px 0;'>";
echo "<h3>Header Mobile (se funcionando):</h3>";
if (file_exists($mobile_header_file)) {
    // Capturar output
    ob_start();
    include $mobile_header_file;
    $mobile_header_output = ob_get_clean();
    
    if (!empty($mobile_header_output)) {
        echo "✅ Template carregado com sucesso<br>";
        echo "<details><summary>Ver HTML gerado</summary><pre>" . htmlspecialchars($mobile_header_output) . "</pre></details>";
    } else {
        echo "❌ Template não gerou output";
    }
} else {
    echo "❌ Arquivo não encontrado";
}
echo "</div>";

echo "<h2>7. Verificação de CSS</h2>";
$style_file = get_template_directory() . '/style.css';
echo "<p><strong>Arquivo style.css:</strong> " . (file_exists($style_file) ? '✅ Existe' : '❌ Não encontrado') . "</p>";

if (file_exists($style_file)) {
    $css_content = file_get_contents($style_file);
    $has_mobile_css = strpos($css_content, '.mobile-header') !== false;
    echo "<p><strong>CSS do header mobile:</strong> " . ($has_mobile_css ? '✅ Encontrado' : '❌ Não encontrado') . "</p>";
}

echo "<h2>8. Verificação de JavaScript</h2>";
$header_file = get_template_directory() . '/header.php';
echo "<p><strong>Arquivo header.php:</strong> " . (file_exists($header_file) ? '✅ Existe' : '❌ Não encontrado') . "</p>";

if (file_exists($header_file)) {
    $header_content = file_get_contents($header_file);
    $has_mobile_js = strpos($header_content, 'toggleMobileHeaderMenu') !== false;
    echo "<p><strong>JavaScript do header mobile:</strong> " . ($has_mobile_js ? '✅ Encontrado' : '❌ Não encontrado') . "</p>";
}

echo "<h2>9. Teste de Responsividade</h2>";
echo "<p>Para testar a responsividade, redimensione a janela do navegador para menos de 768px de largura.</p>";
echo "<p>O header mobile deve aparecer automaticamente.</p>";

echo "<h2>10. Próximos Passos</h2>";
echo "<ol>";
echo "<li>Verifique se o tema 'cetesi-theme' está ativo no WordPress</li>";
echo "<li>Configure um menu no WordPress Admin > Aparência > Menus</li>";
echo "<li>Atribua o menu ao location 'primary'</li>";
echo "<li>Teste em diferentes tamanhos de tela</li>";
echo "</ol>";

echo "<hr>";
echo "<p><em>Diagnóstico gerado em: " . date('d/m/Y H:i:s') . "</em></p>";
?>
