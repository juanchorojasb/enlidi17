@extends('layouts.app')

@section('title', 'Contacto - Enlidi')

@section('content')
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Ponte en contacto con nosotros</h2>
                <p class="text-gray-600 leading-relaxed mx-auto max-w-xl mb-10">Estamos aquí para ayudarte con todas tus necesidades de financiamiento y consultoría energética. Contáctanos para obtener más información sobre cómo podemos apoyar tus proyectos.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-start space-x-4 mb-6">
                        <div class="flex-shrink-0">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-map-marker fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold text-gray-800">Dirección</h5>
                            <p class="text-gray-600">Enlidi, Carrera 23 #45-67, Manizales, Colombia</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 mb-6">
                        <div class="flex-shrink-0">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold text-gray-800">Llámanos</h5>
                            <a href="tel:+5761234567" class="text-gray-600 hover:text-primary">+57 6 123 4567</a>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold text-gray-800">Envíanos un correo</h5>
                            <a href="mailto:info@enlidi.com" class="text-gray-600 hover:text-primary">info@enlidi.com</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <form action="#" method="post"> {{-- Reemplaza # por la ruta correcta para enviar el formulario --}}
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="sr-only">Nombre</label>
                            <input type="text" name="name" id="name" placeholder="Tu nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="sr-only">Correo electrónico</label>
                            <input type="email" name="email" id="email" placeholder="Tu correo electrónico" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="sr-only">Mensaje</label>
                            <textarea name="message" id="message" placeholder="Tu mensaje" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-10">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31820.584038340166!2d-75.5147135!3d5.0622745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e476ff83f5e3b47%3A0x8c5d5bf9ef9ed6a5!2sManizales%2C%20Caldas%2C%20Colombia!5e0!3m2!1sen!2sin!4v1615464638056!5m2!1sen!2sin" class="w-full h-96 rounded-lg shadow-md" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection