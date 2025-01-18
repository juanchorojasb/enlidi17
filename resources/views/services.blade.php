@extends('layouts.app')

@section('title', 'Servicios - Enlidi')

@section('content')
<!--/header-->
<div class="inner-banner">
</div>
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Servicios</li>
        </ul>
    </div>
</section>
<!-- services page block grids -->
<section class="w3l-services py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row bottom-ab-grids">
            <div class="col-lg-6 bottom-ab-left align-self">
                <h3 class="title-big mb-4">Nuestros Servicios Profesionales</h3>
                <p>En Enlidi, ofrecemos una gama completa de servicios diseñados para facilitar la transición energética y promover la sostenibilidad. Desde financiamiento de proyectos hasta consultoría en eficiencia energética, estamos aquí para apoyar a nuestros clientes en cada paso del camino.</p>
                <div class="cont-4 mt-lg-5 mt-4">
                    <div class="list mb-4">
                        <span class="fa fa-check"></span>
                        <div class="list-info">
                            <h4>Creación de Comunidades Sostenibles</h4>
                            <p>Fomentamos la creación de comunidades que prioricen el uso de energías limpias y prácticas sostenibles.</p>
                        </div>
                    </div>
                    <div class="list">
                        <span class="fa fa-check"></span>
                        <div class="list-info">
                            <h4>Espacios de Trabajo Eficientes</h4>
                            <p>Asesoramos en la implementación de soluciones energéticas que optimicen los espacios de trabajo, reduciendo costos y aumentando la eficiencia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bottom-right-grids mt-lg-0 mt-5">
                <img src="{{ asset('assets/images/services.jpg') }}" alt="Servicios Enlidi" class="radius-image img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- //services page block grids -->
<section class="w3l-content-4 py-5" id="features">
    <div class="content-4-main py-lg-5 py-md-4 py-2">
        <div class="container">
            <div class="content-info-in row">
                <div class="content-left col-lg-6">
                    <h3 class="title-small">Nuestras Características</h3>
                    <h3 class="title-big">Incrementa tu Productividad con Nuestros Servicios</h3>
                    <p class="mt-4">Ofrecemos soluciones innovadoras y efectivas para maximizar el rendimiento energético y financiero de nuestros clientes. Nuestro enfoque está en la sostenibilidad y la eficiencia.</p>
                    <a class="btn btn-style btn-primary mt-md-5 mt-4" href="{{ url('/contact') }}">Saber Más</a>
                </div>
                <div class="content-right col-lg-6 pl-lg-4 mt-lg-0 mt-md-5 mt-5">
                    <div class="row content4-right-grids mb-lg-5 mb-4">
                        <div class="col-2 content4-right-icon">
                            <div class="content4-icon">
                                <span class="fa fa-cogs"></span>
                            </div>
                        </div>
                        <div class="col-10 content4-right-info">
                            <h6><a href="#url">Enfoque Innovador</a></h6>
                            <p>Nuestro equipo utiliza las últimas tecnologías y métodos para asegurar resultados óptimos y sostenibles.</p>
                        </div>
                    </div>
                    <div class="row content4-right-grids mb-lg-5 mb-4">
                        <div class="col-2 content4-right-icon">
                            <div class="content4-icon">
                                <span class="fa fa-clock-o"></span>
                            </div>
                        </div>
                        <div class="col-10 content4-right-info">
                            <h6><a href="#url">Optimización del Tiempo</a></h6>
                            <p>Implementamos estrategias que ahorran tiempo y recursos, permitiendo a nuestros clientes enfocarse en su negocio principal.</p>
                        </div>
                    </div>
                    <div class="row content4-right-grids">
                        <div class="col-2 content4-right-icon">
                            <div class="content4-icon">
                                <span class="fa fa-thumbs-up"></span>
                            </div>
                        </div>
                        <div class="col-10 content4-right-info">
                            <h6><a href="#url">Soporte 24/7</a></h6>
                            <p>Ofrecemos soporte continuo para garantizar que todos los proyectos se mantengan en el camino correcto y se resuelvan rápidamente cualquier problema.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /bottom-grids-->
<section class="w3l-bottom-grids-6 w3l-services py-5" id="services">
    <div class="container py-lg-5 py-md-4">
        <h6 class="title-small text-center">Nuestros Servicios</h6>
        <h3 class="title-big mb-md-5 mb-4 text-center">Conoce Nuestros Mejores Servicios</h3>
        <div class="grids-area-hny main-cont-wthree-fea row">
            <div class="col-lg-4 col-md-6 grids-feature">
                <div class="area-box">
                    <span class="fa fa-solar-panel mt-0"></span>
                    <h4><a href="#feature" class="title-head">Financiamiento de Proyectos Energéticos</a></h4>
                    <p>Proveemos financiamiento para proyectos de energía solar, eólica y otras energías renovables, asegurando un futuro sostenible.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-leaf mt-0"></span>
                    <h4><a href="#feature" class="title-head">Consultoría en Eficiencia Energética</a></h4>
                    <p>Nuestros expertos asesoran en la optimización del uso de energía, ayudando a reducir costos y mejorar la sostenibilidad.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-handshake-o mt-0"></span>
                    <h4><a href="#feature" class="title-head">Asesoría en Negocios Justos</a></h4>
                    <p>Promovemos prácticas empresariales éticas, asegurando que todos los proyectos sean justos y beneficien a todas las partes involucradas.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-lg-5 mt-4">
                <div class="area-box">
                    <span class="fa fa-users mt-0"></span>
                    <h4><a href="#feature" class="title-head">Capacitación y Desarrollo</a></h4>
                    <p>Ofrecemos programas de capacitación para asegurar que los equipos de trabajo estén preparados para implementar soluciones energéticas innovadoras.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-lg-5 mt-4">
                <div class="area-box">
                    <span class="fa fa-money mt-0"></span>
                    <h4><a href="#feature" class="title-head">Inversiones Financieras</a></h4>
                    <p>Brindamos asesoramiento en inversiones financieras en proyectos de energía, asegurando retornos sostenibles y beneficios económicos.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-lg-5 mt-4">
                <div class="area-box">
                    <span class="fa fa-globe mt-0"></span>
                    <h4><a href="#feature" class="title-head">Soluciones Globales</a></h4>
                    <p>Implementamos soluciones energéticas que tienen un impacto global, contribuyendo a la reducción de la huella de carbono.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //bottom-grids-->
<!-- middle -->
<div class="middle py-5" id="call">
    <div class="container py-lg-3">
        <div class="welcome-left text-center py-md-5 py-3">
            <h3 class="title-big">¿Tienes Alguna Pregunta?</h3>
            <h3 class="mt-4">Llámanos: <a href="tel:+1 123 456 789">+1 123 456 789</a> </h3>
            <p class="mt-4">Estamos aquí para ayudarte con todas tus necesidades de financiamiento y consultoría energética. Contáctanos para obtener más información sobre cómo podemos apoyar tus proyectos.</p>
            <a href="{{ url('/contact') }}" class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2">Contáctanos</a>
        </div>
    </div>
</div>
<!-- //middle -->
@endsection