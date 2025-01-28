@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('assets/images/blog2.jpg') }}" alt="Enlidi" class="rounded-lg shadow-md">
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">La Historia de Enlidi</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Enlidi nace de la necesidad de optimizar el proceso de transformación energética y su financiamiento. Desde nuestro inicio en 2015, nos hemos comprometido a impulsar proyectos que promuevan la sostenibilidad y la conservación del medio ambiente. Nuestra misión es brindar soluciones financieras que faciliten la transición hacia fuentes de energía limpias y renovables.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Nuestros valores se centran en negocios justos y éticos, asegurando que cada proyecto que financiamos no solo beneficie a nuestros clientes, sino también al planeta. Contamos con un equipo de trabajo confiable y altamente capacitado, dedicado a ofrecer un servicio excepcional y a construir relaciones duraderas basadas en la confianza y la transparencia.
                    </p>
                    <a href="{{ url('/services') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Conoce Nuestros Servicios</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold text-primary">50+</p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-2">Proyectos Financiados</h3>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary">30%</p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-2">Ahorro Energético</h3>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary">100 MW+</p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-2">Energía Generada</h3>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary">95%</p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-2">Satisfacción del Cliente</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h3 class="text-center text-3xl font-bold text-gray-800 mb-6">Nuestros Servicios</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-solar-panel fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700 mb-2"><a href="#feature" class="hover:underline">Financiamiento de Proyectos Energéticos</a></h4>
                        <p class="text-gray-600 leading-relaxed">Proveemos soluciones de financiamiento para proyectos de energía renovable, asegurando la sostenibilidad y eficiencia de cada inversión.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-leaf fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700 mb-2"><a href="#feature" class="hover:underline">Consultoría en Eficiencia Energética</a></h4>
                        <p class="text-gray-600 leading-relaxed">Ofrecemos servicios de consultoría para optimizar el uso de la energía y reducir costos operativos en empresas e industrias.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-handshake-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700 mb-2"><a href="#feature" class="hover:underline">Asesoría en Negocios Justos</a></h4>
                        <p class="text-gray-600 leading-relaxed">Nos comprometemos con prácticas empresariales éticas y justas, promoviendo la equidad y la responsabilidad social en cada proyecto.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700 mb-2"><a href="#feature" class="hover:underline">Equipo Confiable</a></h4>
                        <p class="text-gray-600 leading-relaxed">Nuestro equipo está compuesto por expertos altamente capacitados, dedicados a proporcionar un servicio excepcional y soluciones personalizadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16" id="team">
        <div class="container mx-auto px-4">
            <h3 class="title-big text-center text-3xl font-bold text-gray-800 mb-8">Conoce a Nuestro Equipo</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/images/t1.jpg') }}" alt="Lorena García" class="w-full" />
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <ul class="flex space-x-4">
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-twitter fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-linkedin fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Lorena García</h3>
                        <span class="text-gray-600 text-sm">Directora</span>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/images/t2.jpg') }}" alt="Juan Pérez" class="w-full" />
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <ul class="flex space-x-4">
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-twitter fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-linkedin fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Juan Pérez</h3>
                        <span class="text-gray-600 text-sm">Gerente de Proyectos</span>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/images/t3.jpg') }}" alt="Ana Torres" class="w-full" />
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <ul class="flex space-x-4">
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-twitter fa-2x"></i></a></li>
                                <li><a href="#" class="text-white hover:text-primary"><i class="fa fa-linkedin fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Ana Torres</h3>
                        <span class="text-gray-600 text-sm">Consultora en Energía</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h6 class="text-primary font-semibold text-lg">Testimonios</h6>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-800">Qué Dicen Nuestros Clientes</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600 italic mb-4">
                        "Enlidi ha sido un socio fundamental en nuestro camino hacia la sostenibilidad. Su equipo nos ha brindado un apoyo excepcional y sus soluciones financieras han sido clave para el éxito de nuestros proyectos."
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/team1.jpg') }}" alt="Cliente 1" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Maria Rodríguez</h4>
                            <p class="text-gray-600 text-sm">Cliente</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600 italic mb-4">
                        "Gracias a Enlidi, hemos podido implementar soluciones energéticas innovadoras y sostenibles. Su compromiso con la excelencia y el medio ambiente es incomparable."
                    </p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('assets/images/team2.jpg') }}" alt="Cliente 2" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Carlos Méndez</h4>
                            <p class="text-gray-600 text-sm">Cliente</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600 italic mb-4">
                        "El equipo de Enlidi es altamente profesional y siempre están dispuestos a ayudar. Han superado nuestras expectativas en todos los aspectos."
                    </p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('assets/images/team3.jpg') }}" alt="Cliente 3" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Laura González</h4>
                            <p class="text-gray-600 text-sm">Cliente</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600 italic mb-4">
                        "Enlidi nos ha permitido transformar nuestra empresa con soluciones energéticas sostenibles. Su enfoque en negocios justos y sostenibilidad es lo que los hace destacar."
                    </p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('assets/images/team4.jpg') }}" alt="Cliente 4" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Juan López</h4>
                            <p class="text-gray-600 text-sm">Cliente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection