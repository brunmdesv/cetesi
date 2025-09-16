# Organização do Header - Tema CETESI

## 📋 Visão Geral

O header do tema CETESI foi **completamente separado e organizado** para garantir que qualquer mudança relacionada ao header afete apenas os elementos do header, não outras partes do site.

## 🗂️ Estrutura de Arquivos

### Arquivos Principais do Header

```
wp-content/themes/cetesi/
├── header.php                           # Template principal do header
├── inc/
│   └── header-functions.php             # Todas as funções específicas do header
├── template-parts/header/
│   ├── site-branding.php               # Logo/título do site
│   ├── navigation.php                  # Menu de navegação
│   ├── cta-buttons.php                 # Botões CTA do header
│   ├── menu-toggle.php                 # Botão toggle do menu mobile
│   └── whatsapp-button.php             # Botão flutuante do WhatsApp
└── assets/
    ├── css/
    │   └── header.css                  # TODOS os estilos do header
    └── js/
        └── header.js                   # TODA a funcionalidade JS do header
```

## 🎯 Separação Completa

### ✅ O que está SEPARADO no header:

1. **Funções PHP** (`inc/header-functions.php`):
   - Configurações do header
   - Enfileiramento de scripts/css do header
   - Walker personalizado para menu mobile
   - Meta tags específicas do header
   - Funções de limpeza e otimização
   - Suporte a SVG
   - Configurações de ativação do tema

2. **Estilos CSS** (`assets/css/header.css`):
   - TODOS os estilos do header
   - Responsividade específica do header
   - Animações do menu mobile
   - Estilos dos botões CTA
   - Estilos do botão WhatsApp flutuante

3. **JavaScript** (`assets/js/header.js`):
   - Menu mobile interativo
   - Efeito de scroll no header
   - Animações e transições
   - Namespace isolado (`CetesiHeader`)

4. **Template Parts** (`template-parts/header/`):
   - Componentes modulares do header
   - Fácil manutenção e customização
   - Reutilização de componentes

### ✅ O que foi REMOVIDO do arquivo principal:

- **`functions.php`**: Removidas funções duplicadas do header
- **`style.css`**: Removidos todos os estilos do header
- **`header.php`**: Simplificado usando template-parts

## 🔧 Como Fazer Mudanças no Header

### Para alterar estilos do header:
```css
/* Edite APENAS o arquivo: assets/css/header.css */
.header {
    /* Suas mudanças aqui */
}
```

### Para alterar funcionalidades do header:
```javascript
// Edite APENAS o arquivo: assets/js/header.js
CetesiHeader.config.scrollThreshold = 150; // Exemplo
```

### Para alterar funções do header:
```php
// Edite APENAS o arquivo: inc/header-functions.php
function cetesi_header_setup() {
    // Suas mudanças aqui
}
```

### Para alterar componentes do header:
```php
// Edite os arquivos em: template-parts/header/
// Exemplo: template-parts/header/site-branding.php
```

## 🚀 Benefícios da Organização

1. **Isolamento Completo**: Mudanças no header não afetam outras partes
2. **Manutenção Fácil**: Cada aspecto do header tem seu próprio arquivo
3. **Performance**: Carregamento otimizado de recursos
4. **Modularidade**: Componentes reutilizáveis
5. **Debugging**: Mais fácil identificar problemas específicos do header

## 📱 Responsividade

A responsividade do header está **completamente isolada** em `assets/css/header.css`:

- Desktop (1025px+)
- Tablet (769px - 1024px)
- Mobile (768px-)
- Mobile Portrait (576px-)

## 🎨 Customização

### Para personalizar cores do header:
```css
/* Em assets/css/header.css */
:root {
    --header-bg: #ffffff;
    --header-text: #2c3e50;
    --header-primary: #2563eb;
}
```

### Para personalizar animações:
```javascript
// Em assets/js/header.js
config: {
    scrollThreshold: 100,
    animationDelay: 100,
    menuTransitionDuration: 300
}
```

## 🔍 Testes de Isolamento

Para verificar se o header está completamente isolado:

1. **Teste de CSS**: Altere uma cor em `header.css` - deve afetar apenas o header
2. **Teste de JS**: Altere uma animação em `header.js` - deve afetar apenas o header
3. **Teste de PHP**: Altere uma função em `header-functions.php` - deve afetar apenas o header

## 📝 Notas Importantes

- **NÃO edite** `style.css` para mudanças do header
- **NÃO edite** `functions.php` para funções do header
- **SEMPRE use** os arquivos específicos do header
- **Mantenha** a estrutura de diretórios organizada

## 🆘 Suporte

Se precisar de ajuda com mudanças no header, consulte:
- `inc/header-functions.php` para funções PHP
- `assets/css/header.css` para estilos
- `assets/js/header.js` para JavaScript
- `template-parts/header/` para componentes

---

**✅ Header completamente organizado e isolado!**
**🎯 Mudanças no header afetam APENAS o header!**
