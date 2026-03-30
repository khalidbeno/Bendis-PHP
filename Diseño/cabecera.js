const header = document.querySelector('#header');

// Detecta el desplazamiento de la ventana
window.addEventListener('scroll', () => {
    if (window.scrollY > 950) { // Si el desplazamiento es mayor a 50px
        header.classList.add('scroll-active'); // Añade la clase
    } else {
        header.classList.remove('scroll-active'); // Elimina la clase
    }
});