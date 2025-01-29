<?php $__env->startSection('title', 'Dashboard de Usuario'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido, <?php echo e(Auth::user()->name); ?>!</h1>

    <section id="project-registration" class="mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center space-x-4">
                <i class="fa fa-folder-open text-primary text-3xl"></i>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Registro de Proyectos</h4>
                    <p class="text-gray-600">Registra tus proyectos y contribuye a un futuro sostenible.</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('user.projects.create')); ?>" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-plus mr-2"></i> Registrar Nuevo Proyecto
                </a>
            </div>
        </div>
    </section>

    <?php if($projects->isNotEmpty()): ?>
        <section id="registered-projects" class="mb-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Tus Proyectos Registrados</h4>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="py-2 px-4 border-b text-left">Nombre del Proyecto</th>
                                <th class="py-2 px-4 border-b text-left">Nombre del Cliente</th>
                                <th class="py-2 px-4 border-b text-left">Ciudad</th>
                                <th class="py-2 px-4 border-b text-left">Estado</th>
                                <th class="py-2 px-4 border-b text-left">Fecha de Creación</th>
                                <th class="py-2 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b"><?php echo e($project->name); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo e($project->client_name); ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo e($project->city); ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <?php if($project->status == 'En evaluación'): ?>
                                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">En evaluación</span>
                                        <?php elseif($project->status == 'Aprobado'): ?>
                                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Aprobado</span>
                                        <?php elseif($project->status == 'Rechazado'): ?>
                                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Rechazado</span>
                                        <?php else: ?>
                                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold"><?php echo e($project->status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-2 px-4 border-b"><?php echo e($project->created_at->format('d/m/Y')); ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="<?php echo e(route('user.projects.show', $project->id)); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                            <i class="fa fa-eye mr-1"></i> Ver
                                        </a>
                                        <a href="<?php echo e(route('user.projects.edit', $project->id)); ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                            <i class="fa fa-pencil mr-1"></i> Editar
                                        </a>
                                        <form action="<?php echo e(route('user.projects.destroy', $project->id)); ?>" method="POST" class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center" onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">
                                                <i class="fa fa-trash mr-1"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if($projects->hasPages()): ?>
                <div class="mt-4">
                    <?php echo e($projects->links()); ?>

                </div>
                <?php endif; ?>
            </div>
        </section>
    <?php else: ?>
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-4" role="alert">
            <strong class="font-bold">Información:</strong>
            <span class="block sm:inline">No tienes proyectos registrados actualmente.</span>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\enlidi17\resources\views/user/dashboard.blade.php ENDPATH**/ ?>