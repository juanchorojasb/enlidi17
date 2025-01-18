@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')

<!-- Inner Banner -->
<div class="inner-banner">
</div>

<!-- Breadcrumb -->
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Sobre Nosotros</li>
        </ul>
    </div>
</section>

<!-- About Section -->
<section class="w3l-index3" id="about">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('assets/images/blog2.jpg') }}" alt="Enlidi" class="radius-image img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 align-self">
                    <h3 class="title-big mx-0">La Historia de Enlidi</h3>
                    <p class="mt-md-4 mt-3">Enlidi nace de la necesidad de optimizar el proceso de transformación energética y su financiamiento. Desde nuestro inicio en 2015, nos hemos comprometido a impulsar proyectos que promuevan la sostenibilidad y la conservación del medio ambiente. Nuestra misión es brindar soluciones financieras que faciliten la transición hacia fuentes de energía limpias y renovables.</p>
                    <p class="mt-md-4 mt-3">Nuestros valores se centran en negocios justos y éticos, asegurando que cada proyecto que financiamos no solo beneficie a nuestros clientes, sino también al planeta. Contamos con un equipo de trabajo confiable y altamente capacitado, dedicado a ofrecer un servicio excepcional y a construir relaciones duraderas basadas en la confianza y la transparencia.</p>
                    <a class="btn btn-style btn-primary mt-md-5 mt-4" href="{{ url('/services') }}">Conoce Nuestros Servicios</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="w3l-stats py-5" id="stats">
    <div class="gallery-inner container py-lg-5 py-md-4">
        <div class="row stats-con">
            <div class="col-md-3 col-6 stats_info counter_grid">
                <p class="counter">50+</p>
                <h3>Proyectos Financiados</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid1">
                <p class="counter">30%</p>
                <h3>Ahorro Energético</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid mt-md-0 mt-4">
                <p class="counter">100 MW+</p>
                <h3>Energía Generada</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid2 mt-md-0 mt-4">
                <p class="counter">95%</p>
                <h3>Satisfacción del Cliente</h3>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="w3l-servicesblock3 py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="welcome-left">
            <h3 class="title-big mb-md-5 mb-4 mx-auto text-center">Nuestros Servicios</h3>
            <div class="grids-area-hny main-cont-wthree-fea row pt-4">
                <div class="col-lg-6 col-md-6 grids-feature">
                    <span class="fa fa-solar-panel"></span>
                    <div class="area-box">
                        <h4><a href="#feature" class="title-head">Financiamiento de Proyectos Energéticos</a></h4>
                        <p class="my-3">Proveemos soluciones de financiamiento para proyectos de energía renovable, asegurando la sostenibilidad y eficiencia de cada inversión.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grids-feature mt-md-0 mt-4">
                    <span class="fa fa-leaf"></span>
                    <div class="area-box">
                        <h4><a href="#feature" class="title-head">Consultoría en Eficiencia Energética</a></h4>
                        <p class="my-3">Ofrecemos servicios de consultoría para optimizar el uso de la energía y reducir costos operativos en empresas e industrias.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grids-feature mt-lg-5 mt-4">
                    <span class="fa fa-handshake-o"></span>
                    <div class="area-box">
                        <h4><a href="#feature" class="title-head">Asesoría en Negocios Justos</a></h4>
                        <p class="my-3">Nos comprometemos con prácticas empresariales éticas y justas, promoviendo la equidad y la responsabilidad social en cada proyecto.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 grids-feature mt-lg-5 mt-4">
                    <span class="fa fa-users"></span>
                    <div class="area-box">
                        <h4><a href="#feature" class="title-head">Equipo Confiable</a></h4>
                        <p class="my-3">Nuestro equipo está compuesto por expertos altamente capacitados, dedicados a proporcionar un servicio excepcional y soluciones personalizadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="w3l-team py-5" id="team">
    <div class="container py-lg-5 py-md-4 py-2">
        <h3 class="title-big mb-md-5 mb-4 text-center">Conoce a Nuestro Equipo</h3>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="{{ asset('assets/images/t1.jpg') }}" alt="Lorena García" class="img-fluid radius-image" />
                    </div>
                    <div class="content">
                        <h3 class="title">Lorena García</h3>
                        <span class="post">Directora</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="{{ asset('assets/images/t2.jpg') }}" alt="Juan Pérez" class="img-fluid radius-image" />
                    </div>
                    <div class="content">
                        <h3 class="title">Juan Pérez</h3>
                        <span class="post">Gerente de Proyectos</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="{{ asset('assets/images/t3.jpg') }}" alt="Ana Torres" class="img-fluid radius-image" />
                    </div>
                    <div class="content">
                        <h3 class="title">Ana Torres</h3>
                        <span class="post">Consultora en Energía</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="w3l-clients-1" id="testimonials">
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="heading align-self text-center">
                <h6 class="title-small">Testimonios</h6>
                <h3 class="title-big mb-4">Qué Dicen Nuestros Clientes</h3>
            </div>
            <div class="testimonial-row py-md-4">
                <div id="owl-demo2" class="owl-two owl-carousel owl-theme mb-md-3 mb-sm-5 mb-4">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Enlidi ha sido un socio fundamental en nuestro camino hacia la sostenibilidad. Su equipo nos ha brindado un apoyo excepcional y sus soluciones financieras han sido clave para el éxito de nuestros proyectos.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <a href="#url" class="testi-img">
                                        <img src="{{ asset('assets/images/team1.jpg') }}" alt="" class="radius-image img-fluid">
                                    </a>
                                    <div class="peopl align-self">
                                        <h3>Maria Rodríguez</h3>
                                        <p class="identity">Cliente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Gracias a Enlidi, hemos podido implementar soluciones energéticas innovadoras y sostenibles. Su compromiso con la excelencia y el medio ambiente es incomparable.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <a href="#url" class="testi-img">
                                        <img src="{{ asset('assets/images/team2.jpg') }}" alt="" class="radius-image img-fluid">
                                    </a>
                                    <div class="peopl align-self">
                                        <h3>Carlos Méndez</h3>
                                        <p class="identity">Cliente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>El equipo de Enlidi es altamente profesional y siempre están dispuestos a ayudar. Han superado nuestras expectativas en todos los aspectos.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <a href="#url" class="testi-img">
                                        <img src="{{ asset('assets/images/team3.jpg') }}" alt="" class="radius-image img-fluid">
                                    </a>
                                    <div class="peopl align-self">
                                        <h3>Laura González</h3>
                                        <p class="identity">Cliente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Enlidi nos ha permitido transformar nuestra empresa con soluciones energéticas sostenibles. Su enfoque en negocios justos y sostenibilidad es lo que los hace destacar.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <a href="#url" class="testi-img">
                                        <img src="{{ asset('assets/images/team4.jpg') }}" alt="" class="radius-image img-fluid">
                                    </a>
                                    <div class="peopl align-self">
                                        <h3>Juan López</h3>
                                        <p class="identity">Cliente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection