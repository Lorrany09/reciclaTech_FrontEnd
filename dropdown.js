function mostrarDropdown() {
    const menu = document.querySelector(".dropdown");
    const displayAtual = window.getComputedStyle(menu).display;

    if (displayAtual === "none") {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
}