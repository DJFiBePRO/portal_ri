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
        <main style="height:60%;" class="downloads">
          <div class="downloads__content">
            <div class="downloads__title">
              <h4>Descargas</h4>
            </div>
            <div class="main__download">
              <div class="download__item"><a href="{{asset('download/gestion/Manual Identidad Corporativa Dirección de Vinculación.pdf')}}" class="download__link">Manual Identidad Corporativa</a></div>
              <div class="download__item"><a href="{{asset('download/gestion/Manual de Usuario SEGDDV - ESPOCH.pdf')}}" class="download__link">Manual de Usuario SEGDDV</a></div>
              <div class="download__item"><a href="{{asset('download/gestion/MANUAL DE USUARIO SUBSISTEMA DE PROYECTOS Y CONVENIOS-VINCULACIÓN.pdf')}}" class="download__link">Manual de Usuario Subsistema de Proyectos y Convenios - Vinculación</a></div>
            </div>
            <div class="main__download">
              <div class="download__item"><a href="{{asset('download/gestion/actividades de vinculacion.pdf')}}" class="download__link">Actividades de Vinculación</a></div>
              <div class="download__item"><a href="{{asset('download/gestion/conoce el sistema de gestion.pdf')}}" class="download__link">Conoce el sistema de gestión</a></div>
              <div class="download__item"><a href="{{asset('download/gestion/conoce los proyectos y convenios.pdf')}}" class="download__link">Conoce los proyectos y convenios</a></div>
            </div>
            <div class="main__download">
              <div class="download__item"><a href="{{asset('download/gestion/direccionamiento estrategico.pdf')}}" class="download__link">Direccionamiento estratégico</a></div>
            </div>
          </div>
        </main>
        <footer class="footer">
          <div class="footer__content">
            <div class="footer__button">
              <a class="footer__button_back" href="#">
                <img src="img/modelos/icono descargar.svg" alt="icono descargar">
                <span>Descargar</span>
              </a>
              <a class="footer__button_back" href="{{ url('/modelos')}}">
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
