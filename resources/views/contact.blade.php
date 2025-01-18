@extends('layouts.app')

@section('title', 'Contacto - Enlidi')

@section('content')
<!--/header-->
<div class="inner-banner">
</div>
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contacto</li>
        </ul>
    </div>
</section>
<div class="w3l-contact-info py-5" id="contact">
    <div class="container py-lg-5 py-md-4">
        <div class="title text-center">
            <h3 class="title-big">Ponte en contacto con nosotros</h3>
            <p class="mt-2 mx-lg-5">Estamos aquí para ayudarte con todas tus necesidades de financiamiento y consultoría energética. Contáctanos para obtener más información sobre cómo podemos apoyar tus proyectos.</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- Puedes añadir cualquier información adicional aquí -->
            </div>
            <div class="align-self mt-lg-0 mt-md-5 mt-4">
                <div class="contact-infos">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-map-marker"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Dirección</h3>
                            <p>Enlidi, Carrera 23 #45-67, Manizales, Colombia</p>
                        </div>
                    </div>
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-phone"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Llámanos</h3>
                            <p><a href="tel:+57 6 123 4567">+57 6 123 4567</a></p>
                        </div>
                    </div>
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-envelope"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Envíanos un correo</h3>
                            <p> <a href="mailto:info@enlidi.com">info@enlidi.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31820.584038340166!2d-75.5147135!3d5.0622745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e476ff83f5e3b47%3A0x8c5d5bf9ef9ed6a5!2sManizales%2C%20Caldas%2C%20Colombia!5e0!3m2!1sen!2sin!4v1615464638056!5m2!1sen!2sin"
                    frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 form-inner-cont mt-lg-0 mt-sm-5 mt-4">
                <form action="https://sendmail.w3layouts.com/submitForm" method="post" class="signin-form">
                    <div class="form-input">
                        <input type="text" name="w3lName" id="w3lName" placeholder="Tu nombre">
                    </div>
                    <div class="form-input">
                        <input type="email" name="w3lSender" id="w3lSender" placeholder="Tu correo electrónico"
                            required="">
                    </div>
                    <div class="form-input">
                        <textarea name="w3lMessage" id="w3lMessage" placeholder="Tu mensaje" required=""></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-style btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
@endsection