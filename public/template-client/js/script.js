(function($) {

  "use strict";

  var initPreloader = function() {
    $(document).ready(function($) {
    var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).load(function() {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const restaurantItems = document.querySelectorAll('.restaurant-item');

    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase();
        restaurantItems.forEach(item => {
            const restaurantName = item.querySelector('.post-title a').textContent.toLowerCase();
            if (restaurantName.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
  const categoryLinks = document.querySelectorAll('.category-link');
  const productItems = document.querySelectorAll('.product-item');
  const viewAllButton = document.querySelector('.view-all-btn');

  categoryLinks.forEach(link => {
      link.addEventListener('click', function(e) {
          e.preventDefault();
          const categoryId = this.getAttribute('data-category');
          filterProductsByCategory(categoryId);
          highlightSelectedCategory(this);
      });
  });

  if (viewAllButton) {
      viewAllButton.addEventListener('click', function(e) {
          e.preventDefault();
          showAllProducts();
          categoryLinks.forEach(link => link.classList.remove('active-category'));
      });
  }

  function filterProductsByCategory(categoryId) {
      productItems.forEach(item => {
          const itemContainer = item.closest('.col');
          if (itemContainer.getAttribute('data-category') === categoryId) {
              itemContainer.style.display = 'block';
          } else {
              itemContainer.style.display = 'none';
          }
      });
  }

  function showAllProducts() {
      productItems.forEach(item => {
          const itemContainer = item.closest('.col');
          itemContainer.style.display = 'block';
      });
  }

  function highlightSelectedCategory(selectedLink) {
      categoryLinks.forEach(link => link.classList.remove('active-category'));
      selectedLink.classList.add('active-category');
  }

  const style = document.createElement('style');
  style.textContent = `
      .active-category {
          background-color: #f8f9fa;
          border-radius: 10px;
          box-shadow: 0 0 5px rgba(0,0,0,0.1);
      }
  `;
  document.head.appendChild(style);
});

  // init Chocolat light box
	var initChocolat = function() {
		Chocolat(document.querySelectorAll('.image-link'), {
		  imageSize: 'contain',
		  loop: true,
		})
	}

  document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const savedCategory = urlParams.get('active_category') || localStorage.getItem('activeCategory');
    const savedScrollPosition = urlParams.get('scroll_position') || localStorage.getItem('scrollPosition');
    
    // Vérifier si nous sommes sur la même page que celle où le scroll a été sauvegardé
    const currentPageUrl = window.location.pathname;
    const savedPageUrl = localStorage.getItem('lastPageUrl');

    const categoryLinks = document.querySelectorAll('.category-link');
    const viewAllBtn = document.querySelector('.view-all-btn');
    const productItems = document.querySelectorAll('.product-item');
    const activeCategoryInputs = document.querySelectorAll('.active-category-input');
    const scrollPositionInputs = document.querySelectorAll('.scroll-position-input');
    const addToCartForms = document.querySelectorAll('.add-to-cart-form');

    function applyFilter(categoryId) {
        // Mettre à jour les classes des catégories
        categoryLinks.forEach(link => {
            if (link.dataset.category === categoryId) {
                link.classList.add('active-category');
            } else {
                link.classList.remove('active-category');
            }
        });

        // Filtrer les produits
        const productCols = document.querySelectorAll('.product-grid .col');
        productCols.forEach(col => {
            if (categoryId && col.dataset.category !== categoryId) {
                col.style.display = 'none';
            } else {
                col.style.display = '';
            }
        });

        // Sauvegarder
        localStorage.setItem('activeCategory', categoryId);
        activeCategoryInputs.forEach(input => input.value = categoryId);
    }

    function resetFilter() {
        categoryLinks.forEach(link => link.classList.remove('active-category'));
        document.querySelectorAll('.product-grid .col').forEach(col => col.style.display = '');
        localStorage.removeItem('activeCategory');
        activeCategoryInputs.forEach(input => input.value = '');
    }

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.dataset.category;
            applyFilter(categoryId);
        });
    });

    if (viewAllBtn) {
        viewAllBtn.addEventListener('click', function(e) {
            e.preventDefault();
            resetFilter();
        });
    }

    addToCartForms.forEach(form => {
        form.addEventListener('submit', function() {
            const currentScrollPosition = window.scrollY;
            localStorage.setItem('scrollPosition', currentScrollPosition);
            localStorage.setItem('lastPageUrl', window.location.pathname);

            const scrollInput = this.querySelector('.scroll-position-input');
            if (scrollInput) scrollInput.value = currentScrollPosition;

            // Marquer comme refresh
            localStorage.setItem('isRefreshing', 'true');
            setTimeout(() => localStorage.removeItem('isRefreshing'), 1000);
        });
    });

    if (savedCategory) applyFilter(savedCategory);
    
    // Seulement restaurer le scroll si nous sommes sur la même page
    if (savedScrollPosition && (currentPageUrl === savedPageUrl || !savedPageUrl)) {
        setTimeout(() => {
            window.scrollTo(0, parseInt(savedScrollPosition));
        }, 100);
    } else {
        // Si nous sommes sur une nouvelle page, effacer la position de défilement
        localStorage.removeItem('scrollPosition');
    }

    // Sauvegarder l'URL de la page actuelle
    localStorage.setItem('lastPageUrl', currentPageUrl);

    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (link) {
            const href = link.getAttribute('href');
            // Si on clique sur un lien qui va vers une autre page
            if (href && href !== '#' && !href.startsWith('#') && href !== currentPageUrl) {
                // Nettoyer le localStorage sauf si on ajoute au panier
                if (!localStorage.getItem('isRefreshing')) {
                    localStorage.removeItem('activeCategory');
                    localStorage.removeItem('scrollPosition');
                }
            }
        }
    });

    window.addEventListener('beforeunload', function() {
        if (!localStorage.getItem('isRefreshing')) {
            localStorage.removeItem('activeCategory');
            localStorage.removeItem('scrollPosition');
        }
    });
});


  var initSwiper = function() {

    var swiper = new Swiper(".main-swiper", {
      speed: 500,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var category_swiper = new Swiper(".category-carousel", {
      slidesPerView: 8,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".category-carousel-next",
        prevEl: ".category-carousel-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        991: {
          slidesPerView: 5,
        },
        1500: {
          slidesPerView: 8,
        },
      }
    });

    $(".products-carousel").each(function(){
      var $el_id = $(this).attr('id');

      var products_swiper = new Swiper("#"+$el_id+" .swiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        speed: 500,
        navigation: {
          nextEl: "#"+$el_id+" .products-carousel-next",
          prevEl: "#"+$el_id+" .products-carousel-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
          991: {
            slidesPerView: 4,
          },
          1500: {
            slidesPerView: 5,
          },
        }
      });

    });

    // filer
    


    // product single page
    var thumb_slider = new Swiper(".product-thumbnail-slider", {
      slidesPerView: 5,
      spaceBetween: 20,
      // autoplay: true,
      direction: "vertical",
      breakpoints: {
        0: {
          direction: "horizontal"
        },
        992: {
          direction: "vertical"
        },
      },
    });

    var large_slider = new Swiper(".product-large-slider", {
      slidesPerView: 1,
      // autoplay: true,
      spaceBetween: 0,
      effect: 'fade',
      thumbs: {
        swiper: thumb_slider,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  // input spinner
  var initProductQty = function(){

    $('.product-qty').each(function(){
      
      var $el_product = $(this);
      var quantity = 0;
      
      $el_product.find('.quantity-right-plus').click(function(e){
        e.preventDefault();
        quantity = parseInt($el_product.find('#quantity').val());
        $el_product.find('#quantity').val(quantity + 1);
      });

      $el_product.find('.quantity-left-minus').click(function(e){
        e.preventDefault();
        quantity = parseInt($el_product.find('#quantity').val());
        if(quantity>0){
          $el_product.find('#quantity').val(quantity - 1);
        }
      });

    });

  }

  // init jarallax parallax
  var initJarallax = function() {
    jarallax(document.querySelectorAll(".jarallax"));

    jarallax(document.querySelectorAll(".jarallax-keep-img"), {
      keepImg: true,
    });
  }

  // document ready
  $(document).ready(function() {
    
    initPreloader();
    initSwiper();
    initProductQty();
    initJarallax();
    initChocolat();

  }); // End of a document

})(jQuery);