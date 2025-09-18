const fs = require('fs');

// Ler o arquivo CSS
const cssContent = fs.readFileSync('style.css', 'utf8');

// Encontrar todos os blocos @media (max-width: 768px)
const mobileBlocks = [];
const regex = /@media \(max-width: 768px\) \{[^}]+\}/gs;
let match;

while ((match = regex.exec(cssContent)) !== null) {
    mobileBlocks.push(match[0]);
}

// Extrair apenas o conteúdo dentro dos blocos (sem @media)
const mobileContent = mobileBlocks.map(block => {
    return block.replace(/@media \(max-width: 768px\) \{\s*/, '').replace(/\s*\}$/, '');
}).join('\n\n');

// Remover todos os blocos @media (max-width: 768px) do arquivo original
let cleanedContent = cssContent.replace(/@media \(max-width: 768px\) \{[^}]+\}/gs, '');

// Adicionar um único bloco consolidado no final
const consolidatedBlock = `\n\n/* ========================================
   MOBILE RESPONSIVE (≤768px) - CONSOLIDADO
   ======================================== */
@media (max-width: 768px) {
${mobileContent}
}`;

// Adicionar o bloco consolidado ao final do arquivo
cleanedContent += consolidatedBlock;

// Salvar o arquivo consolidado
fs.writeFileSync('style-consolidated-mobile.css', cleanedContent);

console.log('Breakpoints de 768px consolidados com sucesso!');
console.log(`Encontrados ${mobileBlocks.length} blocos de 768px`);
