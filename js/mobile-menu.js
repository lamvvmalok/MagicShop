/**
 * JavaScript para el menú móvil
 * Maneja la funcionalidad del offcanvas menu en dispositivos móviles
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Inicializar el offcanvas menu
    const offcanvasElement = document.getElementById('navbarNav');
    const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    
    // Botón del menú móvil
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    // Cerrar el menú cuando se hace clic en un enlace
    const navLinks = document.querySelectorAll('#navbarNav .nav-link');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Solo cerrar en dispositivos móviles
            if (window.innerWidth < 992) {
                offcanvas.hide();
            }
        });
    });
    
    // Cerrar el menú cuando se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (offcanvasElement.classList.contains('show') && 
            !offcanvasElement.contains(event.target) && 
            !navbarToggler.contains(event.target)) {
            offcanvas.hide();
        }
    });
    
    // Manejar el cambio de tamaño de ventana
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            offcanvas.hide();
        }
    });
    
    // Agregar clase activa al botón del menú cuando está abierto
    offcanvasElement.addEventListener('show.bs.offcanvas', function() {
        navbarToggler.classList.add('active');
    });
    
    offcanvasElement.addEventListener('hide.bs.offcanvas', function() {
        navbarToggler.classList.remove('active');
    });
    
    console.log('Menú móvil inicializado correctamente');
}); 