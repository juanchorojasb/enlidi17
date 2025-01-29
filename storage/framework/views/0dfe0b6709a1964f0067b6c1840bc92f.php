<?php $__env->startSection('title', 'Bienvenido a Enlidi'); ?>

<?php $__env->startSection('content'); ?>

    <section id="home" class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo e(asset('assets/images/bg.jpg')); ?>');">
        <div class="absolute inset-0 bg-primary bg-opacity-70"></div> 
        <div class="container mx-auto px-4 py-48 relative z-10 text-center"> 
            <h1 class="text-white text-center font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl" style="text-shadow: 1px 1px 2px black;">
                Construyendo un Futuro Energético Sostenible
            </h1>
            <p class="text-lg md:text-xl text-white mb-8 mt-4 font-light">En Enlidi, colaboramos con empresas del sector industrial e inmobiliario para implementar soluciones energéticas innovadoras y sostenibles que contribuyan a un mundo mejor.</p>
            <div class="flex justify-center space-x-4">
                <a href="<?php echo e(url('/register')); ?>" class="bg-white hover:bg-gray-100 text-primary font-bold py-3 px-6 rounded-md transition duration-300 ease-in-out">Financia tu proyecto</a>
                <a href="<?php echo e(url('/register')); ?>" class="bg-transparent hover:bg-white hover:text-primary text-white font-bold py-3 px-6 rounded-md transition duration-300 ease-in-out border-2 border-white">Iniciar</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-16 mt-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (isset($component)) { $__componentOriginal40edf33d2c377a0037b40037f6cdc014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40edf33d2c377a0037b40037f6cdc014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.info-card','data' => ['title' => 'Más de','subtitle' => '50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Más de','subtitle' => '50']); ?>
                    <p class="text-base">Proyectos Financiados</p>
                    <p class="mt-4 text-gray-600 text-sm">Enlidi es tu socio estratégico en la financiación de proyectos de energía limpia y sostenible que están transformando el sector industrial e inmobiliario.</p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $attributes = $__attributesOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $component = $__componentOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__componentOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal40edf33d2c377a0037b40037f6cdc014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40edf33d2c377a0037b40037f6cdc014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.info-card','data' => ['title' => 'Hasta','subtitle' => '30%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Hasta','subtitle' => '30%']); ?>
                    <p class="text-base">De Ahorro Energético</p>
                    <p class="mt-4 text-gray-600 text-sm">Nuestras soluciones energéticas innovadoras permiten a las empresas del sector industrial e inmobiliario reducir costos y maximizar su eficiencia energética.</p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $attributes = $__attributesOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $component = $__componentOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__componentOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal40edf33d2c377a0037b40037f6cdc014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40edf33d2c377a0037b40037f6cdc014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.info-card','data' => ['title' => 'Más de','subtitle' => '100 MW']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Más de','subtitle' => '100 MW']); ?>
                    <p class="text-base">De Energía Generada</p>
                    <p class="mt-4 text-gray-600 text-sm">Estamos comprometidos con la generación de energía limpia y sostenible, contribuyendo a la construcción de un mundo mejor para todos.</p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $attributes = $__attributesOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__attributesOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40edf33d2c377a0037b40037f6cdc014)): ?>
<?php $component = $__componentOriginal40edf33d2c377a0037b40037f6cdc014; ?>
<?php unset($__componentOriginal40edf33d2c377a0037b40037f6cdc014); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    
    

    <section id="about" class="py-16 bg-gray-100 mt-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="md:pr-8">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Liderando la Transformación Energética en los Sectores Industrial e Inmobiliario</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Desde nuestra fundación en 2015, Enlidi ha trabajado en estrecha colaboración con empresas de diversos sectores para financiar y desarrollar proyectos que están ayudando a construir un futuro más sostenible.</p>
                    <a href="<?php echo e(url('/about')); ?>" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300 ease-in-out">Aprende Más</a>
                </div>
                <div class="mt-8 md:mt-0">
                    <img src="<?php echo e(asset('assets/images/about.jpg')); ?>" alt="Sobre Nosotros" class="w-full h-auto rounded-lg shadow-lg">
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
                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-mobile','title' => 'Aplicaciones Móviles']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-mobile','title' => 'Aplicaciones Móviles']); ?>
                            Gestiona tus financiamientos desde cualquier lugar con nuestras aplicaciones móviles, diseñadas para el sector industrial e inmobiliario.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-users','title' => 'Programas Empresariales']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-users','title' => 'Programas Empresariales']); ?>
                            Enlidi ofrece programas personalizados para empresas del sector industrial e inmobiliario.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-globe','title' => 'Cobertura Global']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-globe','title' => 'Cobertura Global']); ?>
                            Estamos presentes en varios países, apoyando a empresas globales en su transición energética.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-user','title' => 'Perfiles Corporativos']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-user','title' => 'Perfiles Corporativos']); ?>
                            Registra el perfil de tu empresa para acceder a financiamientos personalizados y beneficios exclusivos.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="lg:col-span-1 flex justify-center items-center my-8">
                    <img src="<?php echo e(asset('assets/images/mobile.png')); ?>" alt="App Móvil" class="lg:h-full w-auto object-contain">
                </div>

                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-cogs','title' => 'Implementación Rápida']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-cogs','title' => 'Implementación Rápida']); ?>
                            Ofrecemos soluciones energéticas con configuraciones rápidas para empresas que buscan eficiencia inmediata.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.feature-card','data' => ['icon' => 'fa-support','title' => 'Soporte 24/7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('feature-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-support','title' => 'Soporte 24/7']); ?>
                            Nuestro equipo de soporte especializado está disponible 24/7 para ayudar a las empresas en su transición energética.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $attributes = $__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__attributesOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8)): ?>
<?php $component = $__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8; ?>
<?php unset($__componentOriginal8a1da09f823c4dc4ebcb3f0fdc9afbe8); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="advantages" class="py-16 bg-gray-100 mt-10">
        <div class="container mx-auto px-4">
            <h3 class="text-center text-3xl font-bold text-gray-800 mb-8">Ventajas y Detalles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="col-span-1 lg:col-span-3">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <p class="text-gray-600 leading-relaxed mb-4">
                        <span class="fa fa-quote-left text-gray-600 mr-2"></span>    
                        En Enlidi, la innovación y la sostenibilidad son nuestra prioridad. Confía en nosotros para transformar tu futuro energético.</p>
                        <div class="flex items-center mt-4">
                            <img src="<?php echo e(asset('assets/images/team2.jpg')); ?>" alt="Lorena García" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Lorena García</h4>
                                <p class="text-gray-600">Directora, Enlidi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($component)) { $__componentOriginal352783f615603bc53edf068a852fcdb9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal352783f615603bc53edf068a852fcdb9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.advantage-card','data' => ['icon' => 'fa-laptop','title' => 'Estadísticas Detalladas']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('advantage-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-laptop','title' => 'Estadísticas Detalladas']); ?>
                    Proporcionamos análisis exhaustivos para optimizar tus proyectos energéticos, ayudando a construir un mundo mejor.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $attributes = $__attributesOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__attributesOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $component = $__componentOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__componentOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal352783f615603bc53edf068a852fcdb9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal352783f615603bc53edf068a852fcdb9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.advantage-card','data' => ['icon' => 'fa-envelope-open-o','title' => 'Boletín Informativo']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('advantage-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-envelope-open-o','title' => 'Boletín Informativo']); ?>
                    Mantente informado con nuestras actualizaciones y novedades del sector industrial e inmobiliario.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $attributes = $__attributesOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__attributesOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $component = $__componentOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__componentOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal352783f615603bc53edf068a852fcdb9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal352783f615603bc53edf068a852fcdb9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.advantage-card','data' => ['icon' => 'fa-line-chart','title' => 'Metas Financieras']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('advantage-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fa-line-chart','title' => 'Metas Financieras']); ?>
                    Alcanzamos tus objetivos financieros con planes estratégicos personalizados para el sector industrial e inmobiliario.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $attributes = $__attributesOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__attributesOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal352783f615603bc53edf068a852fcdb9)): ?>
<?php $component = $__componentOriginal352783f615603bc53edf068a852fcdb9; ?>
<?php unset($__componentOriginal352783f615603bc53edf068a852fcdb9); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    <section id="statistical" class="py-16 mt-10">
        <div class="container mx-auto px-4">
            <h6 class="text-center text-lg font-semibold text-primary mb-2">Estadísticas Energéticas</h6>
            <h3 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-10">Información Estadística</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                        <p class="text-4xl font-bold text-primary">65%</p>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mt-4">Economía</h4>
                </div>

                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                        <p class="text-4xl font-bold text-primary">75%</p>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mt-4">Estabilidad</h4>
                </div>

                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                        <p class="text-4xl font-bold text-primary">90%</p>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mt-4">Innovación</h4>
                </div>

                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center mx-auto">
                        <p class="text-4xl font-bold text-primary">100%</p>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mt-4">Garantía</h4>
                </div>
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
              
              <?php if (isset($component)) { $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog-post','data' => ['image' => ''.e(asset('assets/images/blog1.jpg')).'','date' => 'Septiembre 17, 2020','title' => '7 Servicios Financieros que Pueden Ahorrar Dinero a los Jubilados']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blog-post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(asset('assets/images/blog1.jpg')).'','date' => 'Septiembre 17, 2020','title' => '7 Servicios Financieros que Pueden Ahorrar Dinero a los Jubilados']); ?>
                  Descubre cómo las nuevas políticas de financiamiento están impulsando la adopción de energías limpias en Latinoamérica y el papel de Enlidi en este cambio.
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $attributes = $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $component = $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog-post','data' => ['image' => ''.e(asset('assets/images/blog2.jpg')).'','date' => 'Octubre 5, 2020','title' => 'Innovaciones en Tecnología Solar para la Industria']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blog-post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(asset('assets/images/blog2.jpg')).'','date' => 'Octubre 5, 2020','title' => 'Innovaciones en Tecnología Solar para la Industria']); ?>
                  Explora las últimas innovaciones en tecnología solar y cómo están transformando la eficiencia energética en el sector industrial.
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $attributes = $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $component = $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>

              <?php if (isset($component)) { $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog-post','data' => ['image' => ''.e(asset('assets/images/blog3.jpg')).'','date' => 'Noviembre 22, 2020','title' => 'Almacenamiento de Energía: El Futuro de la Sostenibilidad']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blog-post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(asset('assets/images/blog3.jpg')).'','date' => 'Noviembre 22, 2020','title' => 'Almacenamiento de Energía: El Futuro de la Sostenibilidad']); ?>
                  Analizamos el impacto del almacenamiento de energía en la sostenibilidad y cómo las empresas pueden beneficiarse de esta tecnología emergente.
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $attributes = $__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__attributesOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b)): ?>
<?php $component = $__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b; ?>
<?php unset($__componentOriginal1f0ba298d09d0e550e1cb310dc085e5b); ?>
<?php endif; ?>
          </div>
          <div class="mt-10 text-center">
              <a href="#blog" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition duration-300">Ver Todos los Artículos</a>
          </div>
      </div>
  </section>

    
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
                    <img src="<?php echo e(asset('assets/images/consultor.jpg')); ?>" alt="Consultor" class="w-full h-auto rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\enlidi17\resources\views/welcome.blade.php ENDPATH**/ ?>