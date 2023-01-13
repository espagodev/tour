<?php $on = isset($on) ? $on : null; ?>
<?php $app_dir_api = isset($app_dir_api) ? $app_dir_api : null; ?>
<?php $app_dir = isset($app_dir) ? $app_dir : null; ?>
<?php $app_dir1 = isset($app_dir1) ? $app_dir1 : null; ?>
<?php $branch = isset($branch) ? $branch : null; ?>
<?php $origin = isset($origin) ? $origin : null; ?>
<?php $__container->servers('aws' => '-i D:\\espagodev\LightsailDefaultKey-eu-west-3.pem ubuntu@15.237.141.99'); ?>
<?php /* <?php $__container->servers([ 'aws' => ['ubuntu@3.18.107.107']]); ?> */ ?>
<?php /* php vendor/bin/envoy run git:clone --on=aws */ ?>
<?php /* envoy run git:pull --on=aws */ ?>
<?php /* envoy run lot_pull --on=lot */ ?>
<?php /* php vendor/bin/envoy run lot_pull --on=lot */ ?>
<?php /* php vendor/bin/envoy run git:pull --on=aws */ ?>

<?php /* php vendor/bin/envoy run lot_migrate --on=lot */ ?>

 <?php require_once('vendor/autoload.php'); ?>

<?php

    $origin = 'git@github.com:espagodev/tour.git';
    // $origin = 'https://github.com/espagodev/apiloto.espagodev.com.git
    //             Username: espagodev
    //             Password: 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';
    $branch = isset($branch) ? $branch : 'main';
    $app_dir1 = '/var/www';
    $app_dir = '/var/www/prueba.lotogam.com';

    $app_dir_api = '/var/www/prueba.lotogam.com';
    if ( !isset($on)) {
        throw new Exception('La variable --on no está definida');
    }
?>

<?php $__container->startMacro('app:deploy', ['on' => $on]); ?>
    down
    git:pull
    migrate
    composer:install
    assets:install
    cache:clear
    up
<?php $__container->endMacro(); ?>


<?php $__container->startTask('git:clone', ['on' => $on]); ?>
    cd <?php echo $app_dir1; ?>

    echo "hemos entrado al directorio /var/www";
   sudo  git clone <?php echo $origin; ?>;
    echo "repositorio clonado correctamente";
<?php $__container->endTask(); ?>



<?php $__container->startTask('git:pull', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    echo "hemos entrado al directorio <?php echo $app_dir; ?>";
    <?php /* sudo git pull origin <?php echo $branch; ?> --allow-unrelated-histories */ ?>
   sudo git pull origin <?php echo $branch; ?>

    echo "código actualizado correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('origen', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    echo "hemos entrado al directorio <?php echo $app_dir; ?>";
     <?php /* sudo git fetch origin
    sudo git reset --hard origin/master  */ ?>
    sudo git remote remove origin 
    sudo git remote add origin git@github.com:espagodev/tour.git
    echo "origen actualizado correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('ls', ['on' => $on]); ?>
    cd <?php echo $app_dir1; ?>

    ls -la
<?php $__container->endTask(); ?>


<?php $__container->startTask('composer', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

 sudo   composer install --no-dev
<?php $__container->endTask(); ?>

<?php $__container->startTask('autoload', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

 sudo   composer dump-autoload
<?php $__container->endTask(); ?>

<?php $__container->startTask('env', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    sudo  cp .env.example .env
     echo "Se crea archivo env";
<?php $__container->endTask(); ?>

<?php $__container->startTask('key:generate', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    sudo php artisan key:generate
     echo "Se genero la llave";
<?php $__container->endTask(); ?>

<?php $__container->startTask('storage', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    sudo chown -R www-data:root storage/
     echo "Se dieron permisos a storage";
<?php $__container->endTask(); ?>

<?php $__container->startTask('bootstrap', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    sudo chown -R www-data bootstrap/cache/
     echo "Se dieron permisos a bootstrap";
<?php $__container->endTask(); ?>

<?php $__container->startTask('migrate', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    php artisan migrate
    <?php /* sudo php artisan migrate --path=app/database/migrations/2021_08_14_125310_create_loterias_users_table.php */ ?>
   <?php /* sudo php artisan migrate:refresh --seed */ ?>
   <?php /* sudo php artisan migrate --force */ ?>
<?php $__container->endTask(); ?>

<?php $__container->startTask('install:passport', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

   sudo  php artisan passport:install
    echo "Se crearon las llaves passport";
<?php $__container->endTask(); ?>

<?php $__container->startTask('passport', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

     php artisan passport:client --password
    echo "Se crearon las llaves password";
<?php $__container->endTask(); ?>

<?php $__container->startTask('assets:install', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    yarn install
<?php $__container->endTask(); ?>

<?php $__container->startTask('up', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    php artisan up
<?php $__container->endTask(); ?>

<?php $__container->startTask('down', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    php artisan down
<?php $__container->endTask(); ?>

<?php $__container->startTask('cache', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

     sudo php artisan config:cache
    echo "caché limpiada correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('link', ['on' => $on]); ?>
    cd <?php echo $app_dir; ?>

    sudo php artisan storage:link
    echo "se crea el enlace simbólico";
<?php $__container->endTask(); ?>


<?php $__container->startTask('rm', ['on' => $on]); ?>
    sudo rm -r <?php echo $app_dir; ?>

<?php $__container->endTask(); ?>


<?php /* API.LOTOGAM.COM */ ?>

<?php $__container->startTask('lot_clone', ['on' => $on]); ?>
    cd <?php echo $app_dir1; ?>

    echo "hemos entrado al directorio /var/www";
   sudo  git clone <?php echo $origin; ?>;
    echo "repositorio clonado correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_mv', ['on' => $on]); ?>
    cd <?php echo $app_dir1; ?>

    echo "hemos entrado al directorio /var/www";
     sudo mv apiloto.espagodev.com api.lotogam.com
    echo "carpeta renombrada correctamente";
<?php $__container->endTask(); ?>


<?php $__container->startTask('lot_pull', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    echo "hemos entrado al directorio <?php echo $app_dir_api; ?>";
    <?php /* sudo git pull origin <?php echo $branch; ?> --allow-unrelated-histories */ ?>
    sudo git pull origin <?php echo $branch; ?>

    echo "código actualizado correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_origen', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    echo "hemos entrado al directorio <?php echo $app_dir_api; ?>";
     <?php /* sudo git fetch origin
    sudo git reset --hard origin/master  */ ?>
    sudo git remote remove origin 
    sudo git remote add origin git@github.com:espagodev/apiloto.espagodev.com.git
    echo "origen actualizado correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_ls', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    ls -ln
<?php $__container->endTask(); ?>


<?php $__container->startTask('lot_composer', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

 sudo   composer install --no-dev
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_autoload', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

 sudo   composer dump-autoload
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_env', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo  cp .env.example .env
     echo "Se crea archivo env";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_key', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo php artisan key:generate
     echo "Se genero la llave";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_storage', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo chown -R www-data:root storage/
     echo "Se dieron permisos a storage";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_bootstrap', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo chown -R www-data bootstrap/cache/
     echo "Se dieron permisos a bootstrap";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_migrate', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo php artisan migrate
    <?php /* sudo php artisan migrate --path=app/database/migrations/2021_08_14_125310_create_loterias_users_table.php */ ?>
   <?php /* sudo php artisan migrate:refresh --seed */ ?>
   <?php /* sudo php artisan migrate --force */ ?>
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_pass', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

   sudo  php artisan passport:install
    echo "Se crearon las llaves passport";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_passport', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

     php artisan passport:client --password
    echo "Se crearon las llaves password";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_assets:install', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    yarn install
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_up', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    php artisan up
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_down', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    php artisan down
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_cache', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

     sudo php artisan config:cache
    echo "caché limpiada correctamente";
<?php $__container->endTask(); ?>

<?php $__container->startTask('lot_link', ['on' => $on]); ?>
    cd <?php echo $app_dir_api; ?>

    sudo php artisan storage:link
    echo "se crea el enlace simbólico";
<?php $__container->endTask(); ?>


<?php $__container->startTask('lot_rm', ['on' => $on]); ?>
    sudo rm -r <?php echo $app_dir_api; ?>

<?php $__container->endTask(); ?>