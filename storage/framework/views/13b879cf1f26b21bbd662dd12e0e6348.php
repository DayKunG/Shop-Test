

<?php $__env->startSection('title', 'ตะกร้าสินค้า'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart.index');

$__html = app('livewire')->mount($__name, $__params, 'lw-3892801402-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\COMPUTER.DIY\shop-project\resources\views/cart/index.blade.php ENDPATH**/ ?>