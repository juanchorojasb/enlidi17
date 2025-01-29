<div class="text-center">
    <?php if(isset($icon)): ?>
        <div class="text-primary text-4xl mb-4">
            <i class="fa <?php echo e($icon); ?>"></i>
        </div>
    <?php endif; ?>
    <h4 class="text-3xl font-bold text-gray-800">
        <?php echo e($title); ?>

    </h4>
    <?php if(isset($subtitle)): ?>
        <p class="mt-4 text-5xl font-bold text-primary">
            <?php echo e($subtitle); ?>

        </p>
    <?php endif; ?>
    <div class="mt-2 text-gray-600">
        <?php echo e($slot); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\enlidi17\resources\views/components/advantage-card.blade.php ENDPATH**/ ?>