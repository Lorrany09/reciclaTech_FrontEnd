const doadoresRankingCompleto = [
    { nome: "Ana Souza", cidade: "Iguatu, CE", doacoes: 34, impacto: "86 kg reciclados", mes: 5620, semana: 1380, geral: 12450 },
    { nome: "Carlos Lima", cidade: "Iguatu, CE", doacoes: 28, impacto: "73 kg reciclados", mes: 4870, semana: 1210, geral: 10980 },
    { nome: "Marina Alves", cidade: "Cedro, CE", doacoes: 25, impacto: "68 kg reciclados", mes: 4390, semana: 990, geral: 9840 },
    { nome: "João Mendes", cidade: "Iguatu, CE", doacoes: 22, impacto: "57 kg reciclados", mes: 3910, semana: 860, geral: 8920 },
    { nome: "Beatriz Rocha", cidade: "Acopiara, CE", doacoes: 19, impacto: "49 kg reciclados", mes: 3460, semana: 740, geral: 7650 },
    { nome: "Rafael Nunes", cidade: "Iguatu, CE", doacoes: 17, impacto: "44 kg reciclados", mes: 2980, semana: 680, geral: 6980 },
    { nome: "Luciana Freitas", cidade: "Orós, CE", doacoes: 15, impacto: "39 kg reciclados", mes: 2640, semana: 610, geral: 6220 },
    { nome: "Pedro Martins", cidade: "Iguatu, CE", doacoes: 14, impacto: "35 kg reciclados", mes: 2310, semana: 550, geral: 5810 },
    { nome: "Camila Ribeiro", cidade: "Jucás, CE", doacoes: 12, impacto: "31 kg reciclados", mes: 1980, semana: 490, geral: 4970 },
    { nome: "Diego Oliveira", cidade: "Iguatu, CE", doacoes: 11, impacto: "27 kg reciclados", mes: 1740, semana: 420, geral: 4380 },
    { nome: "Fernanda Costa", cidade: "Cariús, CE", doacoes: 9, impacto: "24 kg reciclados", mes: 1510, semana: 360, geral: 3890 },
    { nome: "Você", cidade: "Iguatu, CE", doacoes: 8, impacto: "21 kg reciclados", mes: 1240, semana: 310, geral: 3210, atual: true }
];

const listaRanking = document.getElementById("ranking-lista");
const buscaRanking = document.getElementById("busca-ranking");
const periodoRanking = document.getElementById("periodo-ranking");
const contagemRanking = document.getElementById("ranking-contagem");

function normalizarTexto(texto) {
    return texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
}

function formatarPontos(valor) {
    return new Intl.NumberFormat("pt-BR").format(valor);
}

function criarLinhaRanking(doador, posicao, periodo) {
    const linha = document.createElement("div");
    linha.className = `ranking-linha${doador.atual ? " usuario-atual" : ""}`;
    linha.setAttribute("role", "row");

    const posicaoElemento = document.createElement("span");
    posicaoElemento.className = "ranking-numero";
    posicaoElemento.textContent = posicao;

    const doadorElemento = document.createElement("div");
    doadorElemento.className = "ranking-doador";
    doadorElemento.innerHTML = `
        <img src="../asset/img/User.png" alt="">
        <div><strong>${doador.nome}</strong><small>${doador.cidade}</small></div>
    `;

    const doacoesElemento = document.createElement("span");
    doacoesElemento.textContent = doador.doacoes;

    const impactoElemento = document.createElement("span");
    impactoElemento.className = "ranking-impacto";
    impactoElemento.textContent = doador.impacto;

    const pontosElemento = document.createElement("span");
    pontosElemento.className = "ranking-pontos";
    pontosElemento.textContent = `${formatarPontos(doador[periodo])} pts`;

    linha.append(posicaoElemento, doadorElemento, doacoesElemento, impactoElemento, pontosElemento);
    return linha;
}

function renderizarRanking() {
    if (!listaRanking || !buscaRanking || !periodoRanking || !contagemRanking) return;

    const termo = normalizarTexto(buscaRanking.value.trim());
    const periodo = periodoRanking.value;
    const ordenados = [...doadoresRankingCompleto].sort((a, b) => b[periodo] - a[periodo]);
    const filtrados = ordenados.filter(doador => normalizarTexto(doador.nome).includes(termo));

    listaRanking.replaceChildren();

    if (filtrados.length === 0) {
        const vazio = document.createElement("p");
        vazio.className = "ranking-vazio";
        vazio.textContent = "Nenhum doador encontrado.";
        listaRanking.appendChild(vazio);
    } else {
        filtrados.forEach(doador => {
            const posicaoReal = ordenados.indexOf(doador) + 1;
            listaRanking.appendChild(criarLinhaRanking(doador, posicaoReal, periodo));
        });
    }

    contagemRanking.textContent = `${filtrados.length} ${filtrados.length === 1 ? "doador encontrado" : "doadores encontrados"}`;
}

buscaRanking?.addEventListener("input", renderizarRanking);
periodoRanking?.addEventListener("change", renderizarRanking);
renderizarRanking();
