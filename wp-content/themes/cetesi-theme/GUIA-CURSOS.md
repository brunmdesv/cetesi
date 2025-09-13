# Guia para Criar Cursos no WordPress

## Problema Resolvido ✅

O problema dos links "Saiba Mais" na página inicial foi corrigido! Agora eles levam diretamente para as páginas individuais dos cursos quando existem no WordPress, ou para a página de listagem quando não existem.

## Como Funciona Agora

### Função Criada
Foi criada a função `cetesi_get_course_link($course_slug)` no `functions.php` que:
- Busca um curso específico pelo slug no WordPress
- Se encontrar, retorna o link direto para a página do curso
- Se não encontrar, retorna o link para a página de listagem (`/cursos/`)

### Links Atualizados na Página Inicial
Os seguintes cursos agora têm links específicos:

#### Cursos Online
- **Procedimentos e Técnicas na Sala de Vacina** → `procedimentos-e-tecnicas-na-sala-de-vacina`

#### Cursos Técnicos
- **Técnico em Enfermagem** → `tecnico-em-enfermagem`
- **Técnico em Radiologia** → `tecnico-em-radiologia`
- **Nutrição e Dietética** → `nutricao-e-dietetica`

#### Cursos Livres
- **Análise Clínica** → `analise-clinica`

## Como Criar Cursos no WordPress

### 1. Acesse o Admin do WordPress
- Vá para `http://localhost/cetesi/wordpress/wp-admin/`
- Faça login com suas credenciais

### 2. Criar um Novo Curso
- No menu lateral, clique em **"Cursos"**
- Clique em **"Adicionar Novo"**

### 3. Configurar o Curso

#### Título
- Use exatamente o nome do curso (ex: "Técnico em Enfermagem")

#### Slug (URL)
- WordPress gera automaticamente baseado no título
- Para cursos específicos, ajuste manualmente:
  - `tecnico-em-enfermagem`
  - `tecnico-em-radiologia`
  - `procedimentos-e-tecnicas-na-sala-de-vacina`
  - `analise-clinica`
  - `nutricao-e-dietetica`

#### Conteúdo
- Adicione uma descrição completa do curso
- Use o editor visual do WordPress

#### Campos Personalizados
Configure os seguintes campos personalizados:

- `_curso_duracao` → Ex: "18 meses"
- `_curso_carga_horaria` → Ex: "1.200 horas"
- `_curso_estagio` → Ex: "300 horas"
- `_curso_modalidade` → Ex: "presencial" ou "online"
- `_curso_preco` → Ex: "R$ 2.500"
- `_curso_link_inscricao` → URL para inscrição

#### Imagem Destacada
- Adicione uma imagem representativa do curso

#### Categoria
- Selecione a categoria apropriada (Técnicos, Online, Livres, Qualificação)

### 4. Publicar
- Clique em **"Publicar"**

## Cursos Prioritários para Criar

Para que os links da página inicial funcionem perfeitamente, crie estes cursos primeiro:

1. **Técnico em Enfermagem** (slug: `tecnico-em-enfermagem`)
2. **Procedimentos e Técnicas na Sala de Vacina** (slug: `procedimentos-e-tecnicas-na-sala-de-vacina`)
3. **Técnico em Radiologia** (slug: `tecnico-em-radiologia`)
4. **Análise Clínica** (slug: `analise-clinica`)
5. **Nutrição e Dietética** (slug: `nutricao-e-dietetica`)

## Testando os Links

Após criar os cursos:

1. Acesse a página inicial
2. Clique em "Saiba Mais" de qualquer curso
3. Se o curso existir no WordPress → vai direto para a página do curso
4. Se não existir → vai para a página de listagem (`/cursos/`)

## Benefícios da Solução

✅ **Navegação Direta**: Usuários vão direto para o curso específico
✅ **Fallback Inteligente**: Se o curso não existir, vai para a listagem
✅ **SEO Otimizado**: Links diretos são melhores para SEO
✅ **UX Melhorada**: Menos cliques para chegar ao conteúdo desejado
✅ **Flexibilidade**: Fácil de adicionar novos cursos

## Próximos Passos

1. Criar os cursos prioritários no WordPress
2. Testar todos os links da página inicial
3. Adicionar mais cursos conforme necessário
4. Configurar campos personalizados para cada curso

---

**Nota**: A página individual do curso (`single-curso.php`) já está completamente otimizada e pronta para receber os cursos criados no WordPress!
