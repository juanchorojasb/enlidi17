@extends('layouts.public')

@section('title', 'Bienvenido a Enlidi')

@section('content')

    <section id="home" class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/images/bg.jpg') }}');">
        <div class="absolute inset-0 bg-primary bg-opacity-70"></div> {{-- Ajuste de opacidad --}}
        <div class="container mx-auto px-4 py-48 relative z-10 text-center"> {{-- Incremento de padding vertical --}}
            <h1 class="text-white text-center font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl" style="text-shadow: 1px 1px 2px black;">
                Construyendo un Futuro Energético Sostenible
            </h1>
            <p class="text-lg md:text-xl text-white mb-8 mt-4 font-light">En Enlidi, colaboramos con empresas del sector industrial e inmobiliario para implementar soluciones energéticas innovadoras y sostenibles que contribuyan a un mundo mejor.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ url('/register') }}" class="bg-white hover:bg-gray-100 text-primary font-bold py-3 px-6 rounded-md transition duration-300 ease-in-out">Financia tu proyecto</a>
                <a href="{{ url('/register') }}" class="bg-transparent hover:bg-white hover:text-primary text-white font-bold py-3 px-6 rounded-md transition duration-300 ease-in-out border-2 border-white">Iniciar</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-16 mt-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-info-card title="Más de" subtitle="50">
                    <p class="text-base">Proyectos Financiados</p>
                    <p class="mt-4 text-gray-600 text-sm">Enlidi es tu socio estratégico en la financiación de proyectos de energía limpia y sostenible que están transformando el sector industrial e inmobiliario.</p>
                </x-info-card>

                <x-info-card title="Hasta" subtitle="30%">
                    <p class="text-base">De Ahorro Energético</p>
                    <p class="mt-4 text-gray-600 text-sm">Nuestras soluciones energéticas innovadoras permiten a las empresas del sector industrial e inmobiliario reducir costos y maximizar su eficiencia energética.</p>
                </x-info-card>

                <x-info-card title="Más de" subtitle="100 MW">
                    <p class="text-base">De Energía Generada</p>
                    <p class="mt-4 text-gray-600 text-sm">Estamos comprometidos con la generación de energía limpia y sostenible, contribuyendo a la construcción de un mundo mejor para todos.</p>
                </x-info-card>
            </div>
        </div>
    </section>

    {{--  Se comenta la sección de administrador --}}
    {{--  @if(auth()->check() && auth()->user()->hasRole('admin'))
        <div class="container mx-auto px-4 mb-8 text-center">
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Panel de Administración</a>
        </div>
    @endif  --}}

    <section id="about" class="py-16 bg-gray-100 mt-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="md:pr-8">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Liderando la Transformación Energética en los Sectores Industrial e Inmobiliario</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Desde nuestra fundación en 2015, Enlidi ha trabajado en estrecha colaboración con empresas de diversos sectores para financiar y desarrollar proyectos que están ayudando a construir un futuro más sostenible.</p>
                    <a href="{{ url('/about') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300 ease-in-out">Aprende Más</a>
                </div>
                <div class="mt-8 md:mt-0">
                    <img src="{{ asset('assets/images/about.jpg') }}" alt="Sobre Nosotros" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-16 mt-10">
    <div class="container mx-auto px-4">
        <h6 class="text-center text-lg font-semibold text-primary mb-2 uppercase">CARACTERÍSTICAS Y VENTAJAS</h6>
        <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-10">La Mejor Opción en Financiamiento Energético</h3>
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                    <x-feature-card icon="fa-mobile" title="Aplicaciones Móviles">
                        Gestiona tus financiamientos desde cualquier lugar con nuestras aplicaciones móviles, diseñadas para el sector industrial e inmobiliario.
                    </x-feature-card>

                    <x-feature-card icon="fa-users" title="Programas Empresariales">
                        Enlidi ofrece programas personalizados para empresas del sector industrial e inmobiliario.
                    </x-feature-card>

                    <x-feature-card icon="fa-globe" title="Cobertura Global">
                        Estamos presentes en varios países, apoyando a empresas globales en su transición energética.
                    </x-feature-card>

                    <x-feature-card icon="fa-user" title="Perfiles Corporativos">
                        Registra el perfil de tu empresa para acceder a financiamientos personalizados y beneficios exclusivos.
                    </x-feature-card>
                </div>
            </div>

            <div class="lg:col-span-1 flex justify-center items-center my-8">
                <img src="{{ asset('assets/images/mobile.png') }}" alt="App Móvil" class="lg:h-full w-auto object-contain">
            </div>

            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                    <x-feature-card icon="fa-cogs" title="Implementación Rápida">
                        Ofrecemos soluciones energéticas con configuraciones rápidas para empresas que buscan eficiencia inmediata.
                    </x-feature-card>

                    <x-feature-card icon="fa-support" title="Soporte 24/7">
                        Nuestro equipo de soporte especializado está disponible 24/7 para ayudar a las empresas en su transición energética.
                    </x-feature-card>
                    <x-feature-card icon="fa-laptop" title="Estadísticas Detalladas">
                        Proporcionamos análisis exhaustivos para optimizar tus proyectos energéticos, ayudando a construir un mundo mejor.
                    </x-feature-card>

                    <x-feature-card icon="fa-envelope-open-o" title="Boletín Informativo">
                        Mantente informado con nuestras actualizaciones y novedades del sector industrial e inmobiliario.
                    </x-feature-card>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="fintech" class="py-16 bg-gray-100 mt-10">
    <div class="container mx-auto px-4">
        <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-8">Fintech: Impulsando la Revolución de la Energía Limpia</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="md:pr-8">
                <p class="text-gray-600 leading-relaxed mb-4">
                    En Enlidi, reconocemos el poder transformador de la tecnología financiera para acelerar la adopción de energías limpias. Nuestra plataforma fintech está diseñada para simplificar el proceso de inversión y financiación de proyectos sostenibles en el sector industrial e inmobiliario.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Con Enlidi, los inversores y desarrolladores de proyectos pueden conectarse de manera eficiente, transparente y segura, eliminando las barreras tradicionales y fomentando un crecimiento sostenible.
                </p>
                <ul class="list-disc list-inside text-gray-600 mb-4 space-y-2">
                    <li><strong>Proceso simplificado:</strong> Accede a financiamiento de manera rápida y sencilla a través de nuestra plataforma digital.</li>
                    <li><strong>Transparencia total:</strong> Sigue el progreso de tus inversiones y proyectos con actualizaciones en tiempo real.</li>
                    <li><strong>Seguridad garantizada:</strong> Implementamos las mejores prácticas de seguridad para proteger tus datos e inversiones.</li>
                    <li><strong>Soporte experto:</strong> Nuestro equipo está listo para asistirte en cada paso, asegurando que tus proyectos alcancen su máximo potencial.</li>
                </ul>
            </div>
            <div class="mt-8 md:mt-0">
                <img src="{{ asset('assets/images/fintech.jpg') }}" alt="Fintech para Energía Limpia" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
        <div class="mt-10 text-center">
            <a href="#contact" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300 ease-in-out">Contáctanos para Saber Más</a>
        </div>
    </div>
</section>

<section id="estadisticas" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-10">Impulsando la Transición Energética en Latinoamérica</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto">
                    <i class="fa fa-chart-line text-primary text-3xl"></i>
                </div>
                <h4 class="text-xl font-semibold text-gray-800 mt-4">+51%</h4>
                <p class="text-gray-600 mt-2">Crecimiento en capacidad renovable en la región (2015-2022)</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto">
                    <i class="fa fa-bolt text-primary text-3xl"></i>
                </div>
                <h4 class="text-xl font-semibold text-gray-800 mt-4">64%</h4>
                <p class="text-gray-600 mt-2">Generación a partir de fuentes renovables en 2022</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto">
                    <i class="fa fa-chart-bar text-primary text-3xl"></i>
                </div>
                <h4 class="text-xl font-semibold text-gray-800 mt-4">2.3%</h4>
                <p class="text-gray-600 mt-2">Aumento promedio anual en la demanda de electricidad (2022-2050)</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto">
                    <i class="fa fa-users text-primary text-3xl"></i>
                </div>
                <h4 class="text-xl font-semibold text-gray-800 mt-4">16.2M</h4>
                <p class="text-gray-600 mt-2">Personas sin acceso a energía eléctrica en la región</p>
            </div>
        </div>

        <div class="mt-10 text-center">
            <p class="text-gray-600 text-sm">
                En la última década, los países de América Latina y el Caribe han implementado esfuerzos para reducir sus emisiones. Entre 2015 y 2022, la región aumentó su capacidad renovable en un 51%, alcanzando ese último año el 64% de generación a partir de fuentes renovables. Sin embargo, el ritmo debe acelerarse. A medida que la población crece y la economía se desarrolla, se prevé que la demanda de electricidad aumente un promedio anual del 2.3% de 2022 a 2050. Sin cambios significativos en las matrices energéticas y en los planes de expansión, América Latina y el Caribe no alcanzarán el objetivo de cero emisiones netas para 2050.
            </p>
            <p class="text-gray-600 text-sm mt-4">
                América Latina y el Caribe tienen una oportunidad histórica para lograr el acceso universal a la energía eléctrica de manera justa e inclusiva, sobre todo si consideramos que 16.2 millones de personas en la región aún carecen de este acceso.
            </p>
        </div>
    </div>
</section>
    <section class="py-16 bg-gray-100 mt-10">
        <div class="container mx-auto px-4 text-center">
            <h4 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Elige Tu Financiamiento Energético Ahora</h4>
            <a href="#services" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Conoce Más</a>
        </div>
    </section>

    <section id="blog" class="py-16 mt-10">
      <div class="container mx-auto px-4">
          <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-8">Últimas Noticias</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
              {{--  Ejemplo de un post de blog, repite este bloque para cada post  --}}
              <x-blog-post image="{{ asset('assets/images/blog1.jpg') }}" date="Septiembre 17, 2020" title="7 Servicios Financieros que Pueden Ahorrar Dinero a los Jubilados">
                  Descubre cómo las nuevas políticas de financiamiento están impulsando la adopción de energías limpias en Latinoamérica y el papel de Enlidi en este cambio.
              </x-blog-post>

              <x-blog-post image="{{ asset('assets/images/blog2.jpg') }}" date="Octubre 5, 2020" title="Innovaciones en Tecnología Solar para la Industria">
                  Explora las últimas innovaciones en tecnología solar y cómo están transformando la eficiencia energética en el sector industrial.
              </x-blog-post>

              <x-blog-post image="{{ asset('assets/images/blog3.jpg') }}" date="Noviembre 22, 2020" title="Almacenamiento de Energía: El Futuro de la Sostenibilidad">
                  Analizamos el impacto del almacenamiento de energía en la sostenibilidad y cómo las empresas pueden beneficiarse de esta tecnología emergente.
              </x-blog-post>
          </div>
          <div class="mt-10 text-center">
              <a href="#blog" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Ver Todos los Artículos</a>
          </div>
      </div>
  </section>

    {{-- Sección de Finanzas --}}
    <section id="finanzas" class="py-16 bg-gray-100 mt-10">
        <div class="container mx-auto px-4">
            <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-8">Finanzas y Cifras del Sector Energético 2024</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-2xl font-semibold text-gray-800 mb-4">Indicadores Financieros Clave</h4>
                    <p class="text-gray-600 mb-4">
                        El sector energético en Latinoamérica muestra una tendencia positiva en inversiones hacia energías renovables. En 2023, la inversión en energía solar y eólica aumentó un 30%, reflejando un fuerte compromiso con la transición energética.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-4">
                        <li>Crecimiento anual del sector renovable: 25%</li>
                        <li>Inversión en energías limpias proyectada para 2024: USD 50 mil millones</li>
                        <li>Retorno promedio de inversión en proyectos solares: 15%</li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-2xl font-semibold text-gray-800 mb-4">El Rol de Enlidi en la Financiación</h4>
                    <p class="text-gray-600 mb-4">
                        Enlidi se ha posicionado como un líder en la financiación de proyectos energéticos sostenibles en Latinoamérica. Ofrecemos soluciones a medida que se ajustan a las necesidades específicas de cada proyecto, impulsando así la adopción de tecnologías limpias y eficientes.
                    </p>
                    <p class="text-gray-600">
                        Nuestro enfoque en la innovación financiera y la colaboración con consultores y empresas nos permite ofrecer condiciones favorables y accesibles, acelerando la transición hacia un modelo energético más sostenible.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sección para Consultores --}}
    <section id="consultores" class="py-16 mt-10"><div class="container mx-auto px-4">
            <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-8">Enlidi para Consultores: Potenciando la Transición Energética</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-2xl font-semibold text-gray-800 mb-4">Respaldo Integral en el Proceso de Financiamiento</h4>
                    <p class="text-gray-600 mb-4">
                        En Enlidi, entendemos los desafíos que enfrentan los consultores energéticos en Latinoamérica. Por eso, ofrecemos un respaldo completo en el proceso de financiamiento de proyectos, desde la evaluación inicial hasta la implementación final.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Nuestro equipo de expertos trabaja de la mano con los consultores para identificar las mejores opciones de financiamiento, agilizar los trámites y asegurar el éxito de cada proyecto.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-4 space-y-2">
                        <li>Asesoramiento personalizado en cada etapa del proyecto.</li>
                        <li>Acceso a una red de inversores comprometidos con la sostenibilidad.</li>
                        <li>Herramientas digitales para la gestión eficiente de la financiación.</li>
                        <li>Capacitación continua sobre las últimas tendencias en financiamiento energético.</li>
                    </ul>
                    <a href="#" class="mt-6 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Conviértete en un Consultor Asociado</a>
                </div>
                <div>
                    <img src="{{ asset('assets/images/consultor.jpg') }}" alt="Consultor" class="w-full h-auto rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

@endsection