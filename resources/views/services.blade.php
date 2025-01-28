@extends('layouts.app')

@section('title', 'Servicios - Enlidi')

@section('content')
<section class="py-5 bg-light-gray">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Servicios Profesionales</h1>
                <p class="text-gray-600 leading-relaxed mb-6">
                    En Enlidi, ofrecemos una gama completa de servicios diseñados para facilitar la transición energética y promover la sostenibilidad. Desde financiamiento de proyectos hasta consultoría en eficiencia energética, estamos aquí para apoyar a nuestros clientes en cada paso del camino.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-2">
                        <i class="fa fa-check text-primary"></i>
                        <div class="flex-grow">
                            <h4 class="font-semibold text-gray-700">Creación de Comunidades Sostenibles</h4>
                            <p class="text-gray-600">Fomentamos la creación de comunidades que prioricen el uso de energías limpias y prácticas sostenibles.</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fa fa-check text-primary"></i>
                        <div class="flex-grow">
                            <h4 class="font-semibold text-gray-700">Espacios de Trabajo Eficientes</h4>
                            <p class="text-gray-600">Asesoramos en la implementación de soluciones energéticas que optimicen los espacios de trabajo, reduciendo costos y aumentando la eficiencia.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('assets/images/services.jpg') }}" alt="Servicios Enlidi" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Nuestras Características</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Incrementa tu Productividad con Nuestros Servicios</h3>
        <p class="text-gray-600 leading-relaxed mb-6">Ofrecemos soluciones innovadoras y efectivas para maximizar el rendimiento energético y financiero de nuestros clientes. Nuestro enfoque está en la sostenibilidad y la eficiencia.</p>
        <a href="{{ url('/contact') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Saber Más</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <span class="fa fa-cogs text-primary text-3xl"></span>
                </div>
                <div>
                    <h6 class="font-semibold text-gray-700 mb-2"><a href="#url" class="hover:underline">Enfoque Innovador</a></h6>
                    <p class="text-gray-600 leading-relaxed">Nuestro equipo utiliza las últimas tecnologías y métodos para asegurar resultados óptimos y sostenibles.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <span class="fa fa-clock-o text-primary text-3xl"></span>
                </div>
                <div>
                    <h6 class="font-semibold text-gray-700 mb-2"><a href="#url" class="hover:underline">Optimización del Tiempo</a></h6>
                    <p class="text-gray-600 leading-relaxed">Implementamos estrategias que ahorran tiempo y recursos, permitiendo a nuestros clientes enfocarse en su negocio principal.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <span class="fa fa-thumbs-up text-primary text-3xl"></span>
                </div>
                <div>
                    <h6 class="font-semibold text-gray-700 mb-2"><a href="#url" class="hover:underline">Soporte 24/7</a></h6>
                    <p class="text-gray-600 leading-relaxed">Ofrecemos soporte continuo para garantizar que todos los proyectos se mantengan en el camino correcto y se resuelvan rápidamente cualquier problema.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h3 class="text-center text-3xl font-bold text-gray-800 mb-6">Conoce Nuestros Mejores Servicios</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-solar-panel"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Financiamiento de Proyectos Energéticos</a></h4>
                <p class="text-gray-600 leading-relaxed">Proveemos financiamiento para proyectos de energía solar, eólica y otras energías renovables, asegurando un futuro sostenible.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-leaf"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Consultoría en Eficiencia Energética</a></h4>
                <p class="text-gray-600 leading-relaxed">Nuestros expertos asesoran en la optimización del uso de energía, ayudando a reducir costos y mejorar la sostenibilidad.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-handshake-o"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Asesoría en Negocios Justos</a></h4>
                <p class="text-gray-600 leading-relaxed">Promovemos prácticas empresariales éticas, asegurando que todos los proyectos sean justos y beneficien a todas las partes involucradas.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-users"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Capacitación y Desarrollo</a></h4>
                <p class="text-gray-600 leading-relaxed">Ofrecemos programas de capacitación para asegurar que los equipos de trabajo estén preparados para implementar soluciones energéticas innovadoras.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-money"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Inversiones Financieras</a></h4>
                <p class="text-gray-600 leading-relaxed">Brindamos asesoramiento en inversiones financieras en proyectos de energía, asegurando retornos sostenibles y beneficios económicos.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <span class="text-primary text-4xl mb-4 inline-block"><i class="fa fa-globe"></i></span>
                <h4 class="text-xl font-semibold text-gray-700 mb-3"><a href="#feature" class="hover:underline">Soluciones Globales</a></h4>
                <p class="text-gray-600 leading-relaxed">Implementamos soluciones energéticas que tienen un impacto global, contribuyendo a la reducción de la huella de carbono.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-primary text-center">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-white mb-4">¿Tienes Alguna Pregunta?</h3>
        <p class="text-white mb-6">Estamos aquí para ayudarte con todas tus necesidades de financiamiento y consultoría energética.</p>
        <div class="mt-4">
            <h4 class="mt-4 text-white text-xl">Llámanos: <a href="tel:+5761234567" class="text-white hover:underline">+57 6 123 4567</a> </h4>
        </div>
        <a href="{{ url('/contact') }}" class="mt-6 inline-block bg-white hover:bg-gray-100 text-primary font-bold py-2 px-6 rounded-md transition duration-300">Contáctanos</a>
    </div>
</section>
@endsection