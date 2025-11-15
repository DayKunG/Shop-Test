<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'ร้านค้า'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="<?php echo e(route('products.index')); ?>" class="text-2xl font-bold text-blue-600">ร้านค้า</a>
                <div class="flex gap-4 items-center">
                    <?php if(auth()->guard()->check()): ?>
                        <span class="text-gray-700">สวัสดี, <?php echo e(Auth::user()->name); ?></span>
                        <a href="<?php echo e(route('cart.index')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            ตะกร้า
                        </a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                ออกจากระบบ
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:text-blue-800">เข้าสู่ระบบ</a>
                        <a href="<?php echo e(route('register')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            สมัครสมาชิก
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <?php if(session('message')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>

<?php /**PATH C:\Users\COMPUTER.DIY\shop-project\resources\views/layouts/app.blade.php ENDPATH**/ ?>