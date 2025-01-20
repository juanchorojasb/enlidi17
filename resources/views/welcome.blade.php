@extends('layouts.app')

@section('title', 'Bienvenido a Enlidi')

@section('content')
<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2" style="background-image: url('{{ asset('assets/images/bg.jpg') }}');">
                        <div class="banner-info">
                            <div class="container">
                                <div class="flex justify-center items-center" style="min-height: 250px">
                                    <div class="text-center">
                                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">Construyendo un Futuro Energético Sostenible</h1>
                                        <p class="text-lg md:text-xl mt-3 text-white font-weight-300">En Enlidi, colaboramos con empresas del sector industrial e inmobiliario para implementar soluciones energéticas innovadoras y sostenibles que contribuyan a un mundo mejor.</p>
                                        <div class="flex justify-center mt-5">
                                            <a href="#url" class="px-6 py-3 bg-primary text-white rounded-md font-bold transition duration-300 ease-in-out hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary-dark focus:ring-opacity-50">Conoce Más</a>
                                            <a href="#url" class="px-6 py-3 bg-transparent text-white rounded-md font-bold transition duration-300 ease-in-out hover:bg-gray-200 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary-dark focus:ring-opacity-50 ml-2" style="border: 2px solid #7b59d0;">Sobre Nosotros</a>
                                        </div>
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
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
                <h4 class="text-3xl font-bold text-gray-800">
                    Más de
                </h4>
                <p class="mt-4 text-5xl font-bold text-primary">
                    50
                </p>
                <p class="mt-2 text-gray-600">
                    Proyectos Financiados
                </p>
                <p class="mt-4 text-gray-600">
                    Enlidi es tu socio estratégico en la financiación de proyectos de energía limpia y sostenible que están transformando el sector industrial e inmobiliario.
                </p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold text-gray-800">
                    Hasta
                </h4>
                <p class="mt-4 text-5xl font-bold text-primary">
                    30%
                </p>
                <p class="mt-2 text-gray-600">
                    De Ahorro Energético
                </p>
                <p class="mt-4 text-gray-600">
                    Nuestras soluciones energéticas innovadoras permiten a las empresas del sector industrial e inmobiliario reducir costos y maximizar su eficiencia energética.
                </p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold text-gray-800">
                    Más de
                </h4>
                <p class="mt-4 text-5xl font-bold text-primary">
                    100 MW
                </p>
                <p class="mt-2 text-gray-600">
                    De Energía Generada
                </p>
                <p class="mt-4 text-gray-600">
                    Estamos comprometidos con la generación de energía limpia y sostenible, contribuyendo a la construcción de un mundo mejor para todos.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800">Liderando la Transformación Energética en los Sectores Industrial e Inmobiliario</h2>
             <div class="mt-8">
                <img src="{{ asset('assets/images/solar_panel.png') }}" alt="Energía Sostenible" class="w-full h-auto" />
            </div>
            <p class="mt-4 text-gray-600">En Enlidi, desde 2015, trabajamos en conjunto con empresas de diversos sectores para financiar proyectos que construyen un futuro más sostenible.</p>
            <a href="#" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Aprende Más</a>
        </div>
    </section>
@endsection