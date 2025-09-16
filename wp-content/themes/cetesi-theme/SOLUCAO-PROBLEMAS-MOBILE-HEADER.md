# Solução de Problemas - Header Mobile CETESI Theme

## 🔍 Diagnóstico

Se o header mobile não está funcionando, siga estes passos para identificar e resolver o problema:

### 1. **Verificar Tema Ativo**
- Acesse: `WordPress Admin > Aparência > Temas`
- Certifique-se de que o tema **"Cetesi Tema Institucional"** está ativo
- Se não estiver, ative-o clicando em "Ativar"

### 2. **Executar Diagnóstico Automático**
- Acesse: `http://localhost/cetesi/wp-content/themes/cetesi-theme/debug-mobile-header.php`
- Este arquivo verificará todos os componentes necessários
- Anote os erros encontrados

### 3. **Verificar Menu Configurado**
- Acesse: `WordPress Admin > Aparência > Menus`
- Crie um menu se não existir
- Adicione páginas/links ao menu
- **IMPORTANTE**: Atribua o menu ao location **"Menu Principal"**

### 4. **Testar Responsividade**
- Abra o site em uma janela pequena (< 768px de largura)
- Ou use as ferramentas de desenvolvedor do navegador (F12)
- O header mobile deve aparecer automaticamente

## 🛠️ Problemas Comuns e Soluções

### ❌ **Problema: Header mobile não aparece**
**Causa**: CSS não está sendo carregado ou tema não está ativo
**Solução**:
1. Verifique se o tema está ativo
2. Limpe o cache do navegador (Ctrl+F5)
3. Verifique se há erros no console do navegador (F12)

### ❌ **Problema: Menu não abre**
**Causa**: JavaScript não está funcionando
**Solução**:
1. Verifique se há erros no console do navegador (F12)
2. Certifique-se de que o jQuery está carregado
3. Verifique se não há conflitos com outros plugins

### ❌ **Problema: Menu aparece mas está vazio**
**Causa**: Nenhum menu configurado ou location incorreto
**Solução**:
1. Configure um menu no WordPress Admin
2. Atribua ao location "Menu Principal"
3. Adicione páginas/links ao menu

### ❌ **Problema: Estilos não aplicados**
**Causa**: CSS não está sendo carregado
**Solução**:
1. Verifique se o arquivo `style.css` existe
2. Limpe o cache do navegador
3. Verifique se há erros de sintaxe CSS

## 📱 Teste Manual

### Arquivo de Teste Standalone
- Acesse: `http://localhost/cetesi/wp-content/themes/cetesi-theme/test-mobile-header.html`
- Este arquivo testa apenas o HTML/CSS/JS do header mobile
- Se funcionar aqui, o problema está na integração com WordPress

### Verificação de Arquivos
Certifique-se de que estes arquivos existem:
- ✅ `template-parts/header/mobile-header.php`
- ✅ `header.php` (modificado)
- ✅ `style.css` (com CSS do mobile)
- ✅ `functions.php` (com funções necessárias)

## 🔧 Correções Implementadas

### 1. **Sintaxe PHP Corrigida**
- Corrigido erro de `<?php` sem fechamento no header.php
- Adicionado `add_action('after_setup_theme', 'cetesi_setup')`

### 2. **Funções Adicionadas**
- `cetesi_fallback_menu()` - Menu padrão quando nenhum menu está configurado
- `Cetesi_Mobile_Menu_Walker` - Walker personalizado para o menu mobile

### 3. **CSS Implementado**
- Estilos completos para header mobile
- Responsividade para diferentes tamanhos de tela
- Animações e transições suaves

### 4. **JavaScript Implementado**
- Funções para abrir/fechar menu mobile
- Event listeners para botões e overlay
- Prevenção de scroll quando menu aberto

## 📋 Checklist de Verificação

- [ ] Tema "Cetesi Tema Institucional" está ativo
- [ ] Menu configurado e atribuído ao location "Menu Principal"
- [ ] Arquivo `mobile-header.php` existe
- [ ] CSS do header mobile está no `style.css`
- [ ] JavaScript está no `header.php`
- [ ] Funções PHP estão no `functions.php`
- [ ] Testado em tela pequena (< 768px)
- [ ] Sem erros no console do navegador
- [ ] Cache do navegador limpo

## 🆘 Suporte Adicional

Se o problema persistir:

1. **Execute o diagnóstico**: `debug-mobile-header.php`
2. **Teste standalone**: `test-mobile-header.html`
3. **Verifique logs**: WordPress Admin > Ferramentas > Saúde do Site
4. **Console do navegador**: F12 > Console (verificar erros JavaScript)

## 📞 Informações Técnicas

- **Breakpoint**: 768px (header mobile aparece abaixo desta largura)
- **Z-index**: 1000 (header), 9999 (overlay)
- **Animações**: CSS transitions de 0.3s
- **Acessibilidade**: ARIA labels e navegação por teclado
- **Compatibilidade**: WordPress 6.0+, PHP 8.0+

---

**Última atualização**: 16/09/2025
**Versão**: 1.0.0
