<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    
    
</head>
<body>
<header>
    
</header>
<!-- Authentication Links -->
<nav class="main-header">
    <a href="<?php echo e(url('/')); ?>">
        <img id="logo" src="<?php echo e(asset('img/LOGO.png')); ?>"> </img>
    </a>
    <div id="main-menu" >
        <button><img id="hamburger" src="<?php echo e(asset('img/hamburger.png')); ?>" /></button>
        <ul id="navigation">
            <?php if(auth()->guard()->guest()): ?>
                <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
            <?php else: ?>
                <li> Bonjour <?php echo e(Auth::user()->name); ?></li>
                <?php if(Auth::user()): ?>
                        <li><a href="<?php echo e(route('mes_histoires')); ?>">Mes histoires</a></li>
                        <li><a href="<?php echo e(route('creer_histoire')); ?>">Ajouter une histoire</a></li>
                        <li><a href="<?php echo e(route('creer_chapitre')); ?>">Ajouter un chapitre</a></li>
                        <li><a href="<?php echo e(route('lier_chapitre')); ?>">Lier un chapitre</a></li>

                <?php endif; ?>
                <li><a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div id="main">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<!-- Scripts -->

<footer>

<div class="first-footer">
    <p class="second-footer"> Marathon du Web - 2018 - <img src="<?php echo e(asset('img/hopeful.png')); ?>" id="hopeful"/></p>
</div>


</footer>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>