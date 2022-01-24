'use strict';

var edMenu = function edMenu(navId, menuId) {
  var nav = document.getElementById('menu'),
    menu = document.getElementById(menuId),
    toggleButton = document.getElementById(navId + '-toggle');
  console.log(menu);

  function showNav() {
    nav.classList.toggle('show-menu');
  }

  // si el nav y toggle existen mostrar u ocultar menu
  if (nav) {
    if (toggleButton) {
      toggleButton.addEventListener('click', showNav);
    } else {
      console.error('Not found ' + navId + '-toggle Id');
    }
  } else {
    console.error('Not found ' + navId + ' Id');
  }

  if (menu) {
    (function () {
      var showSubMenu = function showSubMenu(e) {
        if (e.target.classList.contains('expand-submenu')) {
          e.preventDefault();
          e.target.classList.toggle('active');
          e.target.previousElementSibling.classList.toggle('show-submenu');
        }
      };

      // open external links in new tab

      var menuItems = menu.querySelectorAll('li');
      var menuLinks = menu.querySelectorAll('a');
      var menuLinksLength = menuLinks.length;
      var menuItemsLength = menuItems.length;

      while (menuLinksLength--) {
        var menuLink = menuLinks[menuLinksLength];
        if (menuLink.href.indexOf('http') == 0) {
          menuLink.setAttribute('target', '_blank');
        }
      }

      // show submenus
      menu.addEventListener('click', function (e) {
        showSubMenu(e);
      });

      while (menuItemsLength--) {
        var menuItem = menuItems[menuItemsLength];
        // Detectar si un item es padre de un submenu
        if (menuItem.querySelector('ul') != null) {
          menuItem.classList.add('parent-submenu');

          //Crear toggle button para submenus
          var expandSubmenu = document.createElement('div');
          expandSubmenu.classList.add('expand-submenu');
          menuItem.appendChild(expandSubmenu);
        }
      }
    })();
  } else {
    console.error('Not found ' + menuId + ' Id');
  }
};

/* $('body').on({
  'mousewheel': function mousewheel(e) {
    if (e.target.id == 'el') return;
    e.preventDefault();
    e.stopPropagation();
  }
});
*/

$('a[href^="#"]').on('click', function (event) {
  var target = $(this.getAttribute('href'));
  if (target.length) {
    event.preventDefault();
    $('html, body').stop().animate(
      {
        scrollTop: target.offset().top,
      },
      100
    );
  }
});

$('.menu-act').on('click', function () {
  //$('.ed-menu').closest('.ed-item').slideToggle();
  //$('#element').animate({width: 'toggle'});

  $('.menu-items').animate({ width: 'toggle' });
});
$('.menu-items ul li').on('click', function () {
  event.stopPropagation();
  $(this).children('ul').slideToggle();
});
//# sourceMappingURL=main.js.map
/*
$(function () {
  var $win = $(window);
  var $pos = 100;
  $win.scroll(function () {
    if ($win.scrollTop() <= $pos) $('nav').removeClass('sticky');else {
      $('nav').addClass('sticky');
    }
  });
});
//# sourceMappingURL=main.js.map
*/
