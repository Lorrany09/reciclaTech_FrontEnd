// 1. Novos dados para o carrossel "Sobre"
const listaSobre = [
    {
        imagem: '../img/dica1.jpg', 
        titulo: 'Onde descartar pilhas?',
        descricao: 'Saiba quais são os pontos de coleta específicos para pilhas e baterias na sua região.'
    },
    {
        imagem: '../img/dica2.jpg',
        titulo: 'Como limpar dados',
        descricao: 'Aprenda a formatar seu celular ou notebook de forma segura antes de fazer a doação.'
    },
    {
        imagem: '../img/dica3.jpg',
        titulo: 'Reciclagem de Placas',
        descricao: 'Entenda como as placas de circuito são processadas para extração de metais valiosos.'
    },
    {
        imagem: '../img/dica4.jpg',
        titulo: 'Impacto Ambiental',
        descricao: 'Veja o quanto de lixo eletrônico é gerado anualmente e como podemos reduzir isso.'
    },
    {
        imagem: '../img/dica5.jpg',
        titulo: 'quinta dica',
        descricao: 'Veja a melhor dica de todo o universo observavel.'
    }
];

// 2. Selecionando o trilho exclusivo deste carrossel
const trilhoSobre = document.getElementById('trilho-sobre');

// 3. Injetando a estrutura de card
listaSobre.forEach(item => {
    const cardHTML = `
        <div class="card">
            <div class="imagem-card-container">
                <img class="imagem-doacao" src="${item.imagem}" alt="Foto de ${item.titulo}" style="width:100%; height:200px; object-fit:cover;">
            </div>
            <div class="descricao-doacao" style="padding: 15px;">
                <p class="fw-bold titulo-sobre">${item.titulo}</p>
                <p class="descricao text-muted">${item.descricao}</p>
            </div>
            <div class="rodape-card d-flex justify-content-end" style="padding: 15px; text-align:center;">
                <a href="#" class="botao-card gradiente-bts-principais botao-transicao" >Saiba mais</a>
            </div>
        </div>
    `;
    trilhoSobre.innerHTML += cardHTML;
});

// 4. Lógica de movimento separada
const btnAvancarSobre = document.getElementById('btn-avancar-sobre');
const btnVoltarSobre = document.getElementById('btn-voltar-sobre');

let posicaoAtualSobre = 0;

btnAvancarSobre.addEventListener('click', () => {
    const totalDeCardsSobre = document.querySelectorAll('#trilho-sobre .card').length;
    const limiteSobre = totalDeCardsSobre - 3; 

    if (posicaoAtualSobre < limiteSobre) {
        posicaoAtualSobre++;
        atualizarCarrosselSobre();
    }
});

btnVoltarSobre.addEventListener('click', () => {
    if (posicaoAtualSobre > 0) {
        posicaoAtualSobre--;
        atualizarCarrosselSobre();
    }
});

function atualizarCarrosselSobre() {
    const card = document.querySelector('#trilho-sobre .card');
    if (!card) return; 
    
    const larguraCard = card.offsetWidth;
    const gap = 20; 
    const distancia = (larguraCard + gap) * posicaoAtualSobre;
    
    trilhoSobre.style.transform = `translateX(-${distancia}px)`;
}