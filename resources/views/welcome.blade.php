@extends('layouts.app')

@section('title', 'Bienvenido a Enlidi')

@section('content')
<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>Impulsando la Revolución Energética Sostenible</h5>
                                        <p class="mt-md-4 mt-3">En Enlidi, conectamos a inversionistas con proyectos innovadores de energía renovable, impulsando el cambio hacia un futuro más limpio y sostenible.</p>
                                        @if (Route::has('login'))
                                            <div class="mt-sm-5 mt-4">
                                                @auth
                                                    <a href="{{ url('/dashboard') }}" class="btn btn-style btn-primary mr-2">Ir al Dashboard</a>
                                                @else
                                                    <a href="{{ route('login') }}" class="btn btn-style btn-primary mr-2">Iniciar Sesión</a>

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="btn btn-style btn-outline-light">Registrarse</a>
                                                    @endif
                                                @endauth
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-5 col-md-8 img offset-lg-1 mt-lg-0 mt-4">
                                        <img src="{{ asset('assets/images/solar_panel.png') }}" alt="Energía Sostenible" class="img-fluid radius-image-curve" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</section>

<section id="about" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-solar-panel"></span>
                        </div>
                        <div class="info">
                            <p>Más de</p>
                            <h4><a href="#url">50</a></h4>
                            <h5>Proyectos Financiados</h5>
                        </div>
                    </div>
                    <p class="mt-4">Enlidi es tu socio estratégico en la financiación de proyectos de energía limpia y sostenible que están transformando el sector industrial e inmobiliario.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-leaf"></span>
                        </div>
                        <div class="info">
                            <p>Hasta</p>
                            <h4><a href="#url">30%</a></h4>
                            <h5>De Ahorro Energético</h5>
                        </div>
                    </div>
                    <p class="mt-4">Nuestras soluciones energéticas innovadoras permiten a las empresas del sector industrial e inmobiliario reducir costos y maximizar su eficiencia energética.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-lightbulb"></span>
                        </div>
                        <div class="info">
                            <p>Más de</p>
                            <h4><a href="#url">100 MW</a></h4>
                            <h5>De Energía Generada</h5>
                        </div>
                    </div>
                    <p class="mt-4">Estamos comprometidos con la generación de energía limpia y sostenible, contribuyendo a la construcción de un mundo mejor para todos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-index3" id="about">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-7 mb-lg-0 mb-md-5 mb-4 align-self">
                    <h3 class="title-left mx-0">Liderando la Transformación Energética en los Sectores Industrial e Inmobiliario</h3>
                    <p class="mt-md-4 mt-3">En Enlidi, desde 2015, trabajamos en conjunto con empresas de diversos sectores para financiar proyectos que construyen un futuro más sostenible.</p>
                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="{{ url('/about') }}">Aprende Más</a>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative">
                        <img src="{{ asset('assets/images/about.jpg') }}" alt="Sobre Nosotros" class="radius-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w3l-mobile-content-6 py-5">
    <div class="mobile-info py-lg-5 py-md-4 py-2">
        <div class="container">
            <h6 class="title-small text-center">Características y Ventajas</h6>
            <h3 class="title-big mb-5 text-center">La Mejor Opción en Financiamiento Energético</h3>
            <div class="row mobile-info-inn mx-lg-0">
                <div class="col-lg-4 mobile-right text-right">
                    <div class="row mobile-right-grids mb-lg-5 mb-4">
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Aplicaciones Móviles</a></h6>
                            <p>Gestiona tus financiamientos desde cualquier lugar con nuestras aplicaciones móviles, diseñadas para el sector industrial e inmobiliario.</p>
                        </div>
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-mobile"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mobile-right-grids mb-lg-5 mb-4">
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Programas Empresariales</a></h6>
                            <p>Enlidi ofrece programas personalizados para empresas del sector industrial e inmobiliario.</p>
                        </div>
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mobile-right-grids">
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Cobertura Global</a></h6>
                            <p>Estamos presentes en varios países, apoyando a empresas globales en su transición energética.</p>
                        </div>
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-globe"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mobile-left px-lg-5">
                    <img src="{{ asset('assets/images/mobile.png') }}" class="img-fluid radius-image" alt="">
                </div>
                <div class="col-lg-4 mobile-right">
                    <div class="row mobile-right-grids mb-lg-5 mb-4">
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Perfiles Corporativos</a></h6>
                            <p>Registra el perfil de tu empresa para acceder a financiamientos personalizados y beneficios exclusivos.</p>
                        </div>
                    </div>
                    <div class="row mobile-right-grids mb-lg-5 mb-4">
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-cogs"></span>
                            </div>
                        </div>
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Implementación Rápida</a></h6>
                            <p>Ofrecemos soluciones energéticas con configuraciones rápidas para empresas que buscan eficiencia inmediata.</p>
                        </div>
                    </div>
                    <div class="row mobile-right-grids">
                        <div class="col-2 mobile-right-icon">
                            <div class="mobile-icon">
                                <span class="fa fa-support"></span>
                            </div>
                        </div>
                        <div class="col-10 mobile-right-info">
                            <h6><a href="#url">Soporte 24/7</a></h6>
                            <p>Nuestro equipo de soporte especializado está disponible 24/7 para ayudar a las empresas en su transición energética.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-bottom-grids-6 py-5" id="advantages">
    <div class="container py-lg-5 py-md-4 py-2">
        <h6 class="title-small text-center">Nuestros Servicios</h6>
        <h3 class="title-big mb-md-5 mb-4 text-center">Ventajas y Detalles</h3>
        <div class="grids-area-hny main-cont-wthree-fea row pt-3">
            <div class="col-lg-3 ceo-text mb-lg-0 mb-4">
                <div class="">
                    <span class="fa fa-quote-left"></span>
                    <p>En Enlidi, la innovación y la sostenibilidad son nuestra prioridad. Confía en nosotros para transformar tu futuro energético.</p>
                    <div class="author align-items-center mt-4 mb-1">
                        <div class="img-circle">
                            <img src="{{ asset('assets/images/team2.jpg') }}" class="mr-3 img-fluid" alt="...">
                        </div>
                        <div class="author-info">
                            <a href="#author">Lorena García</a> <br> <span class="meta-value">Directora, Enlidi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature">
                <div class="area-box">
                    <span class="fa fa-laptop"></span>
                    <h4><a href="#feature" class="title-head">Estadísticas Detalladas</a></h4>
                    <p>Proporcionamos análisis exhaustivos para optimizar tus proyectos energéticos, ayudando a construir un mundo mejor.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature mt-md-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-envelope-open-o"></span>
                    <h4><a href="#feature" class="title-head">Boletín Informativo</a></h4>
                    <p>Mantente informado con nuestras actualizaciones y novedades del sector industrial e inmobiliario.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-line-chart"></span>
                    <h4><a href="#feature" class="title-head">Metas Financieras</a></h4>
                    <p>Alcanzamos tus objetivos financieros con planes estratégicos personalizados para el sector industrial e inmobiliario.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-statistics" id="statistical">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-3 py-2">
            <h6 class="title-small text-center">Estadísticas Energéticas</h6>
            <h3 class="title-big mb-md-5 mb-4 text-center">Información Estadística</h3>
            <div class="row">
                <div class="col-lg-4 align-self w3l-progressblock pr-lg-4">
                    <p class="mb-4">Nuestros servicios financieros se basan en procedimientos energéticos perfeccionados a lo largo de los años, que han permitido a las empresas del sector industrial e inmobiliario destacarse en la sostenibilidad.</p>
                    <div class="progress-info info1">
                        <h6 class="progress-tittle">Consultoría Financiera <span class="">80%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-info info2">
                        <h6 class="progress-tittle">Proyectos Sostenibles <span class="">95%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-info info3">
                        <h6 class="progress-tittle">Consultoría Energética <span class="">90%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-info info4">
                        <h6 class="progress-tittle">Soporte 24/7 <span class="">75%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-info info2 mb-0">
                        <h6 class="progress-tittle">Banca en Línea <span class="">95%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5 align-self">
                    <div class="position-relative">
                        <div class="progress-circles">
                            <div class="circle1">
                                <div id="progress" data-dimension="170" data-text="65%" data-fontsize="30" data-percent="65" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15" data-bordersize="5" data-animationstep="2"></div>
                                <h4>Economía</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress1" data-dimension="170" data-text="75%" data-fontsize="30" data-percent="75" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15" data-bordersize="5" data-animationstep="2
                                <div id="progress1" data-dimension="170" data-text="75%" data-fontsize="30" data-percent="75" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15" data-bordersize="5" data-animationstep="2"></div>
                                <h4>Estabilidad</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress2" data-dimension="170" data-text="90%" data-fontsize="30" data-percent="90" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15" data-bordersize="5" data-animationstep="2"></div>
                                <h4>Innovación</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress3" data-dimension="170" data-text="100%" data-fontsize="30" data-percent="100" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15" data-bordersize="5" data-animationstep="2"></div>
                                <h4>Garantía</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4">
                    <img src="{{ asset('assets/images/stats.jpg') }}" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-forms-9 py-5">
    <div class="container py-lg-3">
        <div class="row align-items-center">
            <div class="main-midd col-lg-7 text-lg-right">
                <h4 class="title-big">Elige Tu Financiamiento Energético Ahora</h4>
            </div>
            <div class="col-lg-5 mt-lg-0 mt-4">
                <a class="btn btn-style btn-dark" href="#services">Conoce Más</a>
            </div>
        </div>
    </div>
</section>

<div class="w3l-ordercard py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <h3 class="title-big mb-5 text-center">Cómo Solicitar un Nuevo Financiamiento</h3>
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-sign-in"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Registro en Línea</h4>
                        <p class="desc">Regístrate en nuestra plataforma en línea para comenzar.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-file-text-o"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Completa un Formulario</h4>
                        <p class="desc">Llena el formulario con la información requerida para tu solicitud.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-pencil"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Firma un Acuerdo</h4>
                        <p class="desc">Revisa y firma el acuerdo de financiamiento.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-credit-card"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Uso del Financiamiento</h4>
                        <p class="desc">Empieza a usar tu financiamiento para tus proyectos energéticos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w3l-news" id="news">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <h3 class="title-big text-center">Últimas Noticias</h3>
            <div class="row mt-lg-5 mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="{{ asset('assets/images/blog1.jpg') }}" alt=""
                                                                        class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">7 Servicios Financieros que Pueden Ahorrar Dinero a los Jubilados</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="{{ asset('assets/images/blog2.jpg') }}" alt=""
                                                                        class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">8 Maneras de Promover el Uso de tu Aplicación Bancaria</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="{{ asset('assets/images/blog3.jpg') }}" alt=""
                                                                        class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">Cómo Progresar y Qué Traerá el 2020</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-style btn-primary mt-sm-5 mt-4" href="#blog">Ver Todos los Artículos</a>
            </div>
        </div>
    </section>
</div>
@endsection