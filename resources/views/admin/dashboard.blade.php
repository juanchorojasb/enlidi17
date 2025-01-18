@extends('layouts.admin')

@section('content')
<section class="w3l-main-slider" id="welcome">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg text-center">
                                    <h5>¡Bienvenido al panel de administración, {{ Auth::user()->name }}!</h5>
                                    <p class="mt-md-4 mt-3">Aquí puedes gestionar los proyectos, etapas y documentos de la plataforma.</p>
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
                            <span class="fa fa-folder-open"></span>
                        </div>
                        <div class="info">
                            <h4><a href="{{ route('projects.index') }}">Proyectos</a></h4>
                            <p class="mt-4">Accede a la lista de todos los proyectos y gestiona su estado.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-users"></span>
                        </div>
                        <div class="info">
                            <h4><a href="{{ route('users.index') }}">Usuarios</a></h4> 
                            <p class="mt-4">Gestiona los usuarios de la plataforma y sus roles.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-cogs"></span>
                        </div>
                        <div class="info">
                            <h4><a href="{{ route('settings.index') }}">Configuración</a></h4> 
                            <p class="mt-4">Configura los parámetros de la aplicación.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection