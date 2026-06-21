const plataformaItens = ["Como funciona", "Ranking", "Ecopontos", "Doações"];
const linksItens = ["Sobre nós", "Termos de uso", "Política de privacidade", "Ajuda"];
const contatoItens = ["contato@reciclatech.com", "(11) 99999-9999", "IFCE, 1000", "Horário: Seg-Sex 9h às 18h"];

function carregarFooterPlataforma() {
    const lista = document.getElementById("listaFooterP");
    
    plataformaItens.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        lista.appendChild(li);
    });
}

function carregarFooterLinks() {
    const lista = document.getElementById("listaFooterL");
    
    linksItens.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        lista.appendChild(li);
    });
}

function carregarFooterContato() {
    const lista = document.getElementById("listaFooterC");
    
    contatoItens.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        lista.appendChild(li);
    });
}

carregarFooterPlataforma();
carregarFooterLinks();
carregarFooterContato();