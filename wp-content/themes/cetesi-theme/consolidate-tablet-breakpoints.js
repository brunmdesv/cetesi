const fs = require('fs');

// Ler o arquivo CSS consolidado mobile
const cssContent = fs.readFileSync('style-consolidated-mobile.css', 'utf8');

// Encontrar todos os blocos @media (max-width: 1024px)
const tabletBlocks = [];
const regex = /@media \(max-width: 1024px\) \{[^}]+\}/gs;
let match;

while ((match = regex.exec(cssContent)) !== null) {
    tabletBlocks.push(match[0]);
}

// Extrair apenas o conteúdo dentro dos blocos (sem @media)
const tabletContent = tabletBlocks.map(block => {
    return block.replace(/@media \(max-width: 1024px\) \{\s*/, '').replace(/\s*\}$/, '');
}).join('\n\n');

// Remover todos os blocos @media (max-width: 1024px) do arquivo original
let cleanedContent = cssContent.replace(/@media \(max-width: 1024px\) \{[^}]+\}/gs, '');

// Adicionar um único bloco consolidado antes do bloco mobile
const consolidatedTabletBlock = `\n\n/* ========================================
   TABLET RESPONSIVE (≤1024px) - CONSOLIDADO
   ======================================== */
@media (max-width: 1024px) {
${tabletContent}
}`;

// Encontrar onde está o bloco mobile e inserir o tablet antes
const mobileBlockIndex = cleanedContent.indexOf('/* ========================================\n   MOBILE RESPONSIVE (≤768px) - CONSOLIDADO');
cleanedContent = cleanedContent.slice(0, mobileBlockIndex) + consolidatedTabletBlock + '\n' + cleanedContent.slice(mobileBlockIndex);

// Salvar o arquivo final consolidado
fs.writeFileSync('style-final-consolidated.css', cleanedContent);

console.log('Breakpoints de 1024px consolidados com sucesso!');
console.log(`Encontrados ${tabletBlocks.length} blocos de 1024px`);
