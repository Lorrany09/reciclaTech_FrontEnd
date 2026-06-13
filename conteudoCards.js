const itensDoar = ["Celulares", "Notebooks", "Roteadores", "Acessórios"];
const itensNaoDoar = ["Pilhas", "Baterias vazadas", "Lâmpadas", "Equipamentos quebrados"];
//trocar depois para as imagens definitivas
const imagensItensDoar = [
    {
        titulo: "Celulares",
        img: "/img/celulares.jpg",
        alt: "Imagem de celulares"        
    },
    {
        titulo: "Notebooks",
        img: "/img/notebooks.jpg",
        alt: "Imagem de notebooks"
    },
    {
        titulo: "Roteadores",
        img: "/img/roteadores.jpg",
        alt: "Imagem de roteadores"
    },
    {
        titulo: "Acessórios",
        img: "/img/acessorios.jpg",
        alt: "Imagem de acessórios de computador"
    },
]
//trocar depois para as imagens definitivas
const imagensItensNaoDoar = [
    {
        titulo: "Pilhas",
        img: "/img/pilhas.jpg",
        alt: "Imagem de pilhas usadas"
    },
    {
        titulo: "Baterias vazadas",
        img: "/img/bateriasVazadas.jpg",
        alt: "Imagem de baterias vazadas"
    },
    {
        titulo: "Lâmpadas",
        img: "/img/lampada.jpg",
        alt: "Imagem de lâmpadas"
    },
    {
        titulo: "Equipamentos quebrados",
        img: "/img/equipamentosQuebrados.jpg",
        alt: "Imagem de equipamentos tecnologicos quebrados"
    },
]

function cardItensDoar() {
    const lista = document.getElementById("lista");
    itensDoar.forEach(x => {
        const li = document.createElement("li");
        li.innerHTML = `<img src="/img/setinha.svg">`;
        li.textContent = x;
        li.onclick = function() {
            trocarImagensItensDoar.call(li);
            const todosLis = document.querySelectorAll("#lista li");
            todosLis.forEach(item => {
                item.classList.remove("selecionado");
            });
            this.classList.add("selecionado");
        };
        lista.appendChild(li);
    });
}

function cardItensNaoDoar() {
    const lista = document.getElementById("lista2");
    itensNaoDoar.forEach(x => {
        const li = document.createElement("li");
        li.textContent = x;
        li.onclick = function() {
            trocarImagensItensNaoDoar.call(li);
            const todosLis = document.querySelectorAll("#lista2 li");
            todosLis.forEach(item => {
                item.classList.remove("selecionado");
            });
            this.classList.add("selecionado");
        };
        lista.appendChild(li);
    });
}

function trocarImagensItensDoar() {
    const foto = document.getElementById("foto");
    const textoLi = this.textContent;
    imagensItensDoar.forEach(x => {
        if(textoLi === x.titulo){
            foto.src = x.img;
            foto.alt = x.alt;
        }
    });
}

function trocarImagensItensNaoDoar() {
    const foto = document.getElementById("foto2");
    const textoLi = this.textContent;
    imagensItensNaoDoar.forEach(x => {
        if(textoLi === x.titulo){
            foto.src = x.img;
            foto.alt = x.alt;
        }
    });
}

cardItensDoar();
cardItensNaoDoar();