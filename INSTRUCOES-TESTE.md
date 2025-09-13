# 🚀 Instruções para Testar o Tema CETESI

## ✅ Configuração Concluída

### O que já foi feito:
- ✅ **Banco de dados** `cetesi_test` criado
- ✅ **wp-config.php** configurado com credenciais do XAMPP
- ✅ **Tema CETESI** copiado para `/wp-content/themes/cetesi-theme/`
- ✅ **Estrutura completa** do tema instalada

---

## 🎯 Próximos Passos para Testar

### 1. **Iniciar o XAMPP**
1. Abra o **XAMPP Control Panel**
2. Inicie o **Apache** (clique em "Start")
3. Inicie o **MySQL** (clique em "Start")
4. Ambos devem ficar **verdes** ✅

### 2. **Acessar o WordPress**
1. Abra seu navegador
2. Acesse: **http://localhost/cetesi/wordpress**
3. Você verá a tela de instalação do WordPress

### 3. **Completar a Instalação**
1. **Escolha o idioma**: Português (Brasil)
2. Clique em **"Vamos começar!"**
3. **Dados do banco** (já configurados):
   - Nome do banco: `cetesi_test`
   - Usuário: `root`
   - Senha: (deixe vazio)
   - Host: `localhost`
4. Clique em **"Enviar"**

### 4. **Configurar o Site**
1. **Título do site**: CETESI - Centro Técnico de Educação Superior Integrada
2. **Nome de usuário**: `admin` (ou o que preferir)
3. **Senha**: Crie uma senha forte
4. **E-mail**: Seu e-mail
5. Clique em **"Instalar WordPress"**

### 5. **Ativar o Tema CETESI**
1. Faça login no painel administrativo
2. Vá em **Aparência > Temas**
3. Encontre o tema **"CETESI"**
4. Clique em **"Ativar"**

---

## 🧪 Testes a Realizar

### **A. Homepage**
- [ ] Acesse a página inicial
- [ ] Verifique se o hero section aparece
- [ ] Teste os badges (4 tags na mesma linha)
- [ ] Verifique os botões "Ver Cursos" e "Fale Conosco"
- [ ] Teste o botão WhatsApp flutuante

### **B. Sistema de Cursos**
1. **Criar um curso**:
   - Vá em **Cursos > Adicionar Novo**
   - Título: "Técnico em Enfermagem"
   - Conteúdo: Descrição do curso
   - Categoria: "Técnicos"
   - Campos personalizados:
     - Duração: "18 meses"
     - Carga Horária: "1.200 horas"
     - Estágio: "300 horas"
     - Modalidade: "Presencial"
     - Preço: "R$ 2.500,00"
   - Publique o curso

2. **Testar a página do curso**:
   - Acesse o curso criado
   - Verifique se todos os campos aparecem
   - Teste o botão "Saiba Mais"

### **C. Página de Cursos**
- Acesse **Cursos** no menu
- Verifique se o curso criado aparece
- Teste os filtros por categoria
- Teste a responsividade

### **D. Formulário de Contato**
- Vá em **Páginas > Adicionar Nova**
- Título: "Contato"
- Adicione o shortcode: `[contact-form-7]`
- Publique a página
- Teste o formulário

### **E. Customização**
- Vá em **Aparência > Personalizar**
- Teste as **Cores do Tema**
- Configure as **Informações de Contato**
- Adicione um **Logo**
- Salve as alterações

---

## 🔧 Solução de Problemas

### **Se der erro de banco de dados:**
```sql
-- Acesse: http://localhost/phpmyadmin
-- Crie o banco: cetesi_test
-- Charset: utf8mb4_unicode_ci
```

### **Se der erro de permissão:**
```bash
# No PowerShell (como Administrador)
icacls "C:\xampp\htdocs\cetesi" /grant Everyone:F /T
```

### **Se der erro de memória:**
```php
// Adicione no wp-config.php
ini_set('memory_limit', '256M');
```

### **Se o tema não aparecer:**
1. Verifique se a pasta está em: `/wp-content/themes/cetesi-theme/`
2. Verifique se todos os arquivos estão lá
3. Recarregue a página de temas

---

## 📱 Teste de Responsividade

### **Desktop** (> 1024px):
- [ ] Layout com 4 colunas para cursos
- [ ] Menu horizontal
- [ ] Todos os elementos visíveis

### **Tablet** (768px - 1024px):
- [ ] Layout com 2 colunas
- [ ] Menu ainda horizontal
- [ ] Elementos redimensionados

### **Mobile** (< 768px):
- [ ] Layout com 1 coluna
- [ ] Menu hambúrguer
- [ ] Botões redimensionados
- [ ] Texto legível

---

## 🎨 Personalização Rápida

### **Cores:**
- **Primária**: #10b981 (verde)
- **Secundária**: #3b82f6 (azul)
- **Accent**: #f59e0b (laranja)

### **Fontes:**
- **Títulos**: Poppins
- **Texto**: Inter

### **Informações de Contato:**
- **Telefone**: (11) 99999-9999
- **WhatsApp**: 5511999999999
- **E-mail**: contato@cetesi.com.br
- **Endereço**: Rua das Flores, 123 - Centro - São Paulo/SP

---

## 🚀 Próximos Passos

1. **Teste todas as funcionalidades**
2. **Crie conteúdo de exemplo**
3. **Personalize as cores e informações**
4. **Teste em diferentes dispositivos**
5. **Configure os menus**
6. **Adicione mais cursos**

---

## 📞 Suporte

Se encontrar algum problema:
1. Verifique se o XAMPP está rodando
2. Verifique se o banco de dados existe
3. Verifique se todos os arquivos estão no lugar
4. Teste em modo incógnito do navegador

**Boa sorte com os testes! 🎉**
