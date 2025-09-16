# Fontes Personalizadas do Tema CETESI

## ✅ Fontes Locais Implementadas

O tema agora usa **fontes locais** para máxima performance e consistência! Todas as fontes estão configuradas e funcionando.

## 📁 Estrutura Atual

```
assets/fonts/
├── 📄 Inter_18pt-Regular.ttf      ← Fonte principal (corpo do texto)
├── 📄 Inter_18pt-Medium.ttf       ← Peso médio
├── 📄 Inter_18pt-SemiBold.ttf      ← Semi-negrito
├── 📄 Inter_18pt-Bold.ttf          ← Negrito
├── 📄 Inter_18pt-ExtraBold.ttf     ← Extra-negrito
├── 📄 Inter_18pt-Black.ttf         ← Preto
├── 📄 Inter_18pt-Light.ttf         ← Leve
├── 📄 Inter_18pt-Thin.ttf          ← Fino
├── 📄 Inter_18pt-ExtraLight.ttf    ← Extra-fino
├── 📄 Poppins-Regular.ttf          ← Fonte para títulos
├── 📄 Poppins-Medium.ttf            ← Poppins médio
├── 📄 Poppins-SemiBold.ttf          ← Poppins semi-negrito
├── 📄 Poppins-Bold.ttf              ← Poppins negrito
├── 📄 Poppins-ExtraBold.ttf         ← Poppins extra-negrito
├── 📄 Poppins-Black.ttf             ← Poppins preto
├── 📄 Poppins-Light.ttf             ← Poppins leve
├── 📄 Poppins-Thin.ttf              ← Poppins fino
├── 📄 Poppins-ExtraLight.ttf        ← Poppins extra-fino
└── 📄 README.md                     ← Este arquivo
```

## 🎯 Configuração Atual

### **Fonte Principal: Inter**
- ✅ **Corpo do texto**: Inter Regular (400)
- ✅ **Navegação**: Inter Medium (500)
- ✅ **Botões**: Inter SemiBold (600)
- ✅ **Elementos secundários**: Inter Regular (400)

### **Fonte para Títulos: Poppins**
- ✅ **Títulos H1-H6**: Poppins Bold (700)
- ✅ **Logo**: Poppins ExtraBold (800)
- ✅ **Elementos destacados**: Poppins SemiBold (600)

### **Sistema de Fallback**
1. **Primeiro**: Fontes locais (`CETESI-Inter`, `CETESI-Poppins`)
2. **Segundo**: Google Fonts (`Inter`, `Poppins`)
3. **Último**: Fontes do sistema

## ⚡ Benefícios das Fontes Locais

- ✅ **Performance**: Carregamento mais rápido
- ✅ **Consistência**: Mesma fonte em todos os dispositivos
- ✅ **Offline**: Funciona sem internet
- ✅ **Controle**: Você controla as versões das fontes

## 🎯 Configuração Atual

O tema está configurado para:
1. **Primeiro**: Tentar carregar fontes locais (`CETESI-Font`)
2. **Fallback**: Usar Google Fonts (`Inter`)
3. **Último recurso**: Fontes do sistema

## 📱 Compatibilidade

- ✅ **Desktop**: Windows, Mac, Linux
- ✅ **Mobile**: Android, iOS
- ✅ **Navegadores**: Chrome, Firefox, Safari, Edge
- ✅ **Formatos**: WOFF2, WOFF, TTF

## 🔍 Verificação

Para verificar se as fontes estão funcionando:

1. **Inspecione o elemento** no navegador
2. **Verifique** se `font-family` mostra `Inter` ou `CETESI-Font`
3. **Teste** em diferentes dispositivos
4. **Console**: Não deve haver erros de fonte

## 📝 Notas Importantes

- **Licença**: Inter é uma fonte open-source (SIL Open Font License)
- **Tamanho**: Arquivos locais ocupam ~2MB de espaço
- **Cache**: Navegadores fazem cache das fontes automaticamente
- **Fallback**: Sempre haverá uma fonte de fallback disponível
