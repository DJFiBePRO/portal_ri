<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/modelos.css">
    <link rel="icon" href="{{ asset('img/iconos/vincu.ico') }}">
    <title>Modelos de gestión</title>
  </head>
  <body>
    <div class="page">
      <div class="page page__content">
        <header style="height:20%" class="header">
          <div class="header__item"><a href="https://www.espoch.edu.ec"><img src="img/modelos/logo espoch.svg" alt="logo ESPOCH" class="header__item_espoch"></a></div>
          <nav class="header__menu">
            <ul class="main__menu">
              <li class="main__menu_item"><a class="main__menu_link desactivado" href="#">Sistema de Gestión por Procesos</a></li>
              <li class="main__menu_item"><a class="main__menu_link activado" href="http://cimogsys.espoch.edu.ec/DV_Proyectos_Convenios/public/">Sub Sistema de Gestión Proyectos y Convenios</a></li>
              <li class="main__menu_item"><a class="main__menu_link activado" href="http://cimogsys.espoch.edu.ec:8080/SEGDDV_IU/">Sub Sistema de Gestión Documental</a></li>
              <li class="main__menu_item"><a class="main__menu_link desactivado" href="#">Sub Sistema de Seguimiento a Graduados</a></li>
            </ul>
          </nav>
          <div class="header__item"><a href="#"><img src="img/modelos/logo gestion.svg" alt="logo Modelos de gestión" class="header__item_gestion"></a></div>
        </header>
        <main class="main">
          <div class="main__content">
            <div class="main__logo">
              <a href="{{ url('/')}}"><img src="img/modelos/logo vinculacion.svg" alt="Logo Vinculación ESPOCH" class="main__logo_vinculacion"></a>
            </div>
            <div class="main__description">
              <p class="main__description_paragraph">La Dirección de Vinculación de la Escuela Superior Politécnica de Chimborazo en compromiso con la satisfacción de nuestros estudiantes, sociedad, institución, compañeros y el país estamos implementado un nuevo Modelo de Gestión basado en procesos que nos permita alcanzar altos estándares de calidad en cumplimento de nuestros objetivos por una ESPOCH de excelencia.</p>
            </div>

          </div>
        </main>
        <footer class="footer">
          <div class="footer__content">
            <div class="footer__button">
              <a class="footer__button_back" href="{{ url('/modelos-descargas')}}">
                <img src="img/modelos/icono descargar.svg" alt="icono descargar">
                <span>Descargar</span>
              </a>
              <a class="footer__button_back" href="{{ url('/')}}">
                <img src="img/modelos/icono regresar.svg" alt="icono regresar">
                <span>Regresar</span>
              </a>
            </div>
            <div class="footer__information">
              <p>Dirección de Vinculación - ESPOCH</p>
              <p>Términos de Uso | Políticas de Privacidad | Acerca de | Créditos</p>
            </div>
            <div class="footer__social-media">
              <a class="footer__social-media_logo" href="http://cimogsys.com/" target="_blank"><img src="img/modelos/icono cimogsys.svg" alt="Logo CIMOGSYS"></a>
              <a class="footer__social-media_logo" href="https://www.facebook.com/vinculacionESPOCH/" target="_blank"><img src="img/modelos/facebook.svg" alt="Logo Facebook"></a>
              <a class="footer__social-media_logo" href="https://twitter.com/VinculacionRio" target="_blank"><img src="img/modelos/twitter.svg" alt="Logo Logo Twitter"></a>
              <a class="footer__social-media_logo" href="https://www.instagram.com/vinculacion.espoch/" target="_blank"><img src="img/modelos/instagram.svg" alt="Logo Instagram"></a>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
