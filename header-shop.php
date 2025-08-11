<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charSet="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="
					<?php echo get_template_directory_uri(); ?>/_next/static/css/5d3bd2e6f60ad559.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
						<?php echo get_template_directory_uri(); ?>/_next/static/css/c6e29ed0d44aec79.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
							<?php echo get_template_directory_uri(); ?>/_next/static/css/97924461c38f61c9.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
								<?php echo get_template_directory_uri(); ?>/_next/static/css/3cd83cfe34ca397f.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
									<?php echo get_template_directory_uri(); ?>/_next/static/css/ef46db3751d8e999.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
										<?php echo get_template_directory_uri(); ?>/_next/static/css/5c4826c56b72a529.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="
											<?php echo get_template_directory_uri(); ?>/_next/static/css/fb32ae888a35a686.css@dpl=dpl_6F2jjskHFwK7A4KpnWfLzEoFBiYu.css" data-precedence="next" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/search-style.css" />
    

    <meta name="next-size-adjust" content="" />
    <title>Power | Tienda de Muebles</title>
    <meta name="description" content="Power - Tienda de muebles y decoración para el hogar" />
    <meta name="author" content="Createx Studio" />
    <link rel="manifest" href="../manifest.webmanifest" />
    <meta name="keywords" content="online shop,e-commerce,online store,market,multipurpose,product landing,cart,checkout,react,nextjs,bootstrap,ui kit,light and dark mode,gallery,slider,mobile,pwa" />
    <link rel="icon" href="../favicon.ico" type="image/x-icon" sizes="48x48" />
    <link rel="icon" href="../icon.png@4af0ce5d5005ca1b" type="image/png" sizes="32x32" />
    <link rel="apple-touch-icon" href="https://cartzilla-react.createx.studio/apple-icon.png?1149520c0bc715cf" type="image/png" sizes="180x180" />
    <script>
      document.querySelectorAll('body link[rel="icon"], body link[rel="apple-touch-icon"]').forEach(el => document.head.appendChild(el))
    </script>
  </head>
  <body class="__className_d65c78">
  
<!-- DEBUG: Header Shop cargado correctamente -->

<!-- Top Bar -->
<div class="position-relative d-flex justify-content-between z-1 py-3 container">
  <div class="animate-underline nav">
    <span class="text-secondary-emphasis fs-xs me-1">Contáctanos <span class="d-none d-sm-inline">24/7</span>
    </span>
    <a href="tel:+15053753082" data-rr-ui-event-key="tel:+15053753082" class="animate-target fs-xs fw-semibold p-0 nav-link">+1 50 537 53 082</a>
  </div>
  <a class="text-secondary-emphasis fs-xs text-decoration-none d-none d-md-inline" href="furniture.html#">🔥 La Mayor Venta de la Historia 50% de Descuento</a>
  <ul class="gap-4 nav">
  </ul>
</div>

<!-- Main Header -->
<header class="navbar-sticky sticky-top z-fixed px-2 container">
  <nav class="flex-nowrap bg-body rounded-pill shadow ps-0 mx-1 navbar navbar-expand-lg navbar-light">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark rounded-pill z-0 d-none d-block-dark"></div>
    
    <!-- Botón del menú móvil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegación">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Logo centrado en móvil -->
    <a class="navbar-brand position-relative z-1" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
    
    <!-- Menú offcanvas -->
    <div class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel" aria-hidden="true">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="navbarNavLabel">Menú</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <?php
          // Obtener el menú principal de WordPress
          $primary_menu = wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'navbar-nav',
              'fallback_cb' => false,
              'echo' => false,
              'walker' => new Bootstrap_5_Nav_Walker()
          ));
          
          if ($primary_menu) {
              // Reemplazar las clases para que coincidan con el diseño de Cartzilla
              $primary_menu = str_replace('class="nav-link', 'class="with-focus fs-sm nav-link', $primary_menu);
              $primary_menu = str_replace('class="dropdown-toggle nav-link', 'class="with-focus fs-sm dropdown-toggle nav-link', $primary_menu);
              $primary_menu = str_replace('class="dropdown-item', 'class="with-focus fs-sm dropdown-item', $primary_menu);
              
              // Agregar clases específicas de Cartzilla
              $primary_menu = str_replace('<li class="nav-item', '<li class="nav-item me-lg-n1 me-xl-0', $primary_menu);
              $primary_menu = str_replace('<li class="dropdown', '<li class="nav-item me-lg-n1 me-xl-0 dropdown', $primary_menu);
              
              // Marcar como activo si estamos en la página de tienda
              if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
                  $primary_menu = str_replace('href="' . home_url('/shop/') . '"', 'href="' . home_url('/shop/') . '" class="with-focus fs-sm nav-link active"', $primary_menu);
              }
              
              echo $primary_menu;
          } else {
              // Fallback si no hay menú configurado
              ?>
              <li class="nav-item me-lg-n1 me-xl-0">
                <a class="with-focus fs-sm nav-link<?php echo is_front_page() ? ' active' : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
              </li>
              <li class="nav-item me-lg-n1 me-xl-0">
                <a class="with-focus fs-sm nav-link<?php echo (is_shop() || is_product_category() || is_product_tag() || is_product()) ? ' active' : ''; ?>" href="<?php echo esc_url(home_url('/shop/')); ?>">Tienda</a>
              </li>
              <li class="nav-item me-lg-n1 me-xl-0">
                <a class="with-focus fs-sm nav-link" href="<?php echo esc_url(home_url('/my-account/')); ?>">Cuenta</a>
              </li>
              <li class="nav-item me-lg-n1 me-xl-0">
                <a class="with-focus fs-sm nav-link" href="<?php echo esc_url(home_url('/cart/')); ?>">Carrito</a>
              </li>
              <?php
          }
          ?>
        </ul>
      </div>
    </div>
    
        <!-- Elementos del lado derecho -->
    <div class="d-flex gap-sm-1 position-relative z-1">
               <!-- Buscador expandible -->
         <div class="search-container">
           <button type="button" id="searchToggle" class="btn-icon fs-lg rounded-circle animate-scale btn btn-secondary search-toggle-btn">
             <i class="ci-search animate-target"></i>
           </button>
           
           <div class="search-expandable" id="searchExpandable">
             <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
               <input type="hidden" name="post_type" value="product" />
               <div class="input-group">
                 <input type="search" name="s" placeholder="Buscar productos..." class="form-control search-input" value="<?php echo get_search_query(); ?>" autocomplete="off" required />
                 <button type="submit" class="btn btn-primary">
                   <i class="ci-search"></i>
                 </button>
               </div>
             </form>
             
             <!-- Resultados de búsqueda en tiempo real -->
             <div id="searchResults" class="search-results-dropdown">
               <div class="search-results-list"></div>
             </div>
           </div>
         </div>
      

      
      <!-- Carrito -->
      <div class="dropdown">
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="btn-icon fs-lg rounded-circle animate-scale btn btn-secondary">
          <i class="ci-cart animate-target"></i>
        </a>
      </div>
    </div>
  </nav>
</header>
<script>
document.addEventListener('DOMContentLoaded', function() {
  console.log('Script de búsqueda cargado');
  
  // Elementos del buscador expandible
  const searchToggle = document.getElementById('searchToggle');
  const searchExpandable = document.getElementById('searchExpandable');
  const searchInput = searchExpandable ? searchExpandable.querySelector('.search-input') : null;
  const searchResults = document.getElementById('searchResults');
  const searchResultsList = searchResults ? searchResults.querySelector('.search-results-list') : null;
  
  console.log('Elementos encontrados:', {
    searchToggle: !!searchToggle,
    searchExpandable: !!searchExpandable,
    searchInput: !!searchInput,
    searchResults: !!searchResults,
    searchResultsList: !!searchResultsList
  });
  
  // Variables para debounce
  let searchTimeout;
  
  // Función para realizar búsqueda AJAX
  function performSearch(query) {
    console.log('Buscando:', query);
    
    if (!searchResults || !searchResultsList) {
      console.error('Elementos de resultados no encontrados');
      return;
    }
    
    const formData = new FormData();
    formData.append('action', 'ajax_search_products');
    formData.append('query', query);
    formData.append('nonce', '<?php echo wp_create_nonce('ajax_search_nonce'); ?>');
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la respuesta del servidor');
      }
      return response.json();
    })
    .then(data => {
      console.log('Datos recibidos:', data);
      
      if (data.success && data.data) {
        const products = data.data;
        
        if (products && products.length > 0) {
          console.log('Productos encontrados, mostrando resultados...');
          displaySearchResults(products);
        } else {
          console.log('No se encontraron productos');
          searchResultsList.innerHTML = '<div class="p-3 text-center"><p class="text-muted mb-0">No se encontraron productos</p><small class="text-muted">Intenta con otras palabras</small></div>';
          searchResults.style.display = 'block';
        }
      } else {
        console.log('Error en la respuesta del servidor');
        searchResultsList.innerHTML = '<div class="p-3 text-center"><p class="text-danger mb-0">Error en la respuesta</p></div>';
        searchResults.style.display = 'block';
      }
    })
    .catch(error => {
      console.error('Error en búsqueda:', error);
      searchResultsList.innerHTML = '<div class="p-3 text-center"><p class="text-danger mb-0">Error al buscar productos</p><small class="text-muted">Inténtalo de nuevo</small></div>';
      searchResults.style.display = 'block';
    });
  }
  
  // Función para mostrar resultados
  function displaySearchResults(products) {
    console.log('Mostrando', products.length, 'productos');
    
    if (!searchResultsList) {
      console.error('searchResultsList no encontrado');
      return;
    }
    
    if (!searchResults) {
      console.error('searchResults no encontrado');
      return;
    }
    
    let html = '<div class="p-3">';
    html += '<div class="d-flex justify-content-between align-items-center mb-3">';
    html += '<small class="text-muted fw-semibold">Resultados encontrados</small>';
    html += '<span class="badge bg-primary">' + products.length + ' productos</span>';
    html += '</div>';
    
    products.forEach(product => {
      html += `
        <div class="search-result-item d-flex align-items-center p-3 border-bottom" style="transition: all 0.2s ease;">
          <div class="flex-shrink-0 me-3">
            <img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded shadow-sm">
          </div>
          <div class="flex-grow-1">
            <h6 class="mb-1">
              <a href="${product.url}" class="text-decoration-none text-dark fw-semibold" style="font-size: 0.9rem;">${product.name}</a>
            </h6>
            <div class="text-primary mb-1 fw-bold" style="font-size: 0.85rem;">${product.price}</div>
            ${product.categories ? '<small class="text-muted d-block">' + product.categories + '</small>' : ''}
          </div>
          <div class="flex-shrink-0 ms-2">
            <a href="${product.url}" class="btn btn-sm btn-outline-primary" title="Ver producto">
              <i class="ci-eye"></i>
            </a>
          </div>
        </div>
      `;
    });
    
    html += '</div>';
    
    console.log('HTML generado:', html);
    searchResultsList.innerHTML = html;
    
    // Forzar la visualización
    searchResults.style.display = 'block';
    searchResults.style.visibility = 'visible';
    searchResults.style.opacity = '1';
    
    console.log('Resultados mostrados. Display:', searchResults.style.display);
  }
  
  // Toggle del buscador expandible
  if (searchToggle && searchExpandable) {
    searchToggle.addEventListener('click', function(e) {
      e.preventDefault();
      searchExpandable.classList.toggle('expanded');
      searchToggle.classList.toggle('active');
      
      if (searchExpandable.classList.contains('expanded')) {
        setTimeout(() => {
          if (searchInput) {
            searchInput.focus();
          }
        }, 300);
      } else {
        if (searchResults) {
          searchResults.style.display = 'none';
        }
      }
    });
    
    // Cerrar al hacer clic fuera
    document.addEventListener('click', function(e) {
      if (!searchToggle.contains(e.target) && !searchExpandable.contains(e.target)) {
        searchExpandable.classList.remove('expanded');
        searchToggle.classList.remove('active');
        if (searchResults) {
          searchResults.style.display = 'none';
        }
      }
    });
  }
  
  // Búsqueda en tiempo real
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const query = this.value.trim();
      console.log('Texto ingresado:', query);
      
      clearTimeout(searchTimeout);
      
      if (query.length < 2) {
        if (searchResults) {
          searchResults.style.display = 'none';
        }
        return;
      }
      
      // Mostrar estado de carga inmediatamente
      if (searchResults && searchResultsList) {
        searchResultsList.innerHTML = '<div class="search-loading">Buscando productos...</div>';
        searchResults.style.display = 'block';
      }
      
      searchTimeout = setTimeout(function() {
        performSearch(query);
      }, 300);
    });
  }
  
  // Manejo de otros dropdowns
  document.querySelectorAll('.dropdown-toggle').forEach(function(el) {
    el.addEventListener('click', function(e) {
      var dropdownMenu = el.nextElementSibling;
      if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
        e.preventDefault();
        dropdownMenu.classList.toggle('show');
      }
    });
  });
});
</script></body>
</html>
