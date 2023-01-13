@servers(['aws' => '-i D:\\espagodev\dev.pem ubuntu@ec2-3-131-101-33.us-east-2.compute.amazonaws.com','localhost' => 'lapi.test','lot' => '-i D:\\espagodev\LightsailDefaultKey-eu-west-3.pem ubuntu@15.237.141.99'])
{{-- @servers([ 'aws' => ['ubuntu@3.18.107.107']]) --}}
{{-- php vendor/bin/envoy run git:clone --on=aws --}}
{{-- envoy run git:pull --on=aws --}}
{{-- envoy run lot_pull --on=lot --}}
{{-- php vendor/bin/envoy run lot_pull --on=lot --}}
{{-- php vendor/bin/envoy run git:pull --on=aws --}}

{{-- php vendor/bin/envoy run lot_migrate --on=lot --}}

@include('vendor/autoload.php')

@setup

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
@endsetup

@macro('app:deploy', ['on' => $on])
    down
    git:pull
    migrate
    composer:install
    assets:install
    cache:clear
    up
@endmacro


@task('git:clone', ['on' => $on])
    cd {{ $app_dir1 }}
    echo "hemos entrado al directorio /var/www";
   sudo  git clone {{ $origin }};
    echo "repositorio clonado correctamente";
@endtask

@task('tour_mv', ['on' => $on])
    cd {{ $app_dir1 }}
    echo "hemos entrado al directorio /var/www";
     sudo mv tour prueba.lotogam.com
    echo "carpeta renombrada correctamente";
@endtask


@task('git:pull', ['on' => $on])
    cd {{ $app_dir }}
    echo "hemos entrado al directorio {{ $app_dir }}";
    {{-- sudo git pull origin {{ $branch }} --allow-unrelated-histories --}}
   sudo git pull origin {{ $branch }}
    echo "código actualizado correctamente";
@endtask

@task('origen', ['on' => $on])
    cd {{ $app_dir }}
    echo "hemos entrado al directorio {{ $app_dir }}";
     {{-- sudo git fetch origin
    sudo git reset --hard origin/master  --}}
    sudo git remote remove origin 
    sudo git remote add origin git@github.com:espagodev/tour.git
    echo "origen actualizado correctamente";
@endtask

@task('ls', ['on' => $on])
    cd {{ $app_dir1 }}
    ls -la
@endtask


@task('composer', ['on' => $on])
    cd {{ $app_dir }}
 sudo   composer install --no-dev
@endtask

@task('autoload', ['on' => $on])
    cd {{ $app_dir }}
 sudo   composer dump-autoload
@endtask

@task('env', ['on' => $on])
    cd {{ $app_dir }}
    sudo  cp .env.example .env
     echo "Se crea archivo env";
@endtask

@task('key:generate', ['on' => $on])
    cd {{ $app_dir }}
    sudo php artisan key:generate
     echo "Se genero la llave";
@endtask

@task('storage', ['on' => $on])
    cd {{ $app_dir }}
    sudo chown -R www-data:root storage/
     echo "Se dieron permisos a storage";
@endtask

@task('bootstrap', ['on' => $on])
    cd {{ $app_dir }}
    sudo chown -R www-data bootstrap/cache/
     echo "Se dieron permisos a bootstrap";
@endtask

@task('migrate', ['on' => $on])
    cd {{ $app_dir }}
    php artisan migrate
    {{-- sudo php artisan migrate --path=app/database/migrations/2021_08_14_125310_create_loterias_users_table.php --}}
   {{-- sudo php artisan migrate:refresh --seed --}}
   {{-- sudo php artisan migrate --force --}}
@endtask

@task('install:passport', ['on' => $on])
    cd {{ $app_dir }}
   sudo  php artisan passport:install
    echo "Se crearon las llaves passport";
@endtask

@task('passport', ['on' => $on])
    cd {{ $app_dir }}
     php artisan passport:client --password
    echo "Se crearon las llaves password";
@endtask

@task('assets:install', ['on' => $on])
    cd {{ $app_dir }}
    yarn install
@endtask

@task('up', ['on' => $on])
    cd {{ $app_dir }}
    php artisan up
@endtask

@task('down', ['on' => $on])
    cd {{ $app_dir }}
    php artisan down
@endtask

@task('cache', ['on' => $on])
    cd {{ $app_dir }}
     {{-- sudo php artisan optimize --}}
     sudo php artisan config:clear
    echo "caché limpiada correctamente";
@endtask

@task('link', ['on' => $on])
    cd {{ $app_dir }}
    sudo php artisan storage:link
    echo "se crea el enlace simbólico";
@endtask


@task('rm', ['on' => $on])
    sudo rm -r {{ $app_dir }}
@endtask


{{-- API.LOTOGAM.COM --}}

@task('lot_clone', ['on' => $on])
    cd {{ $app_dir1 }}
    echo "hemos entrado al directorio /var/www";
   sudo  git clone {{ $origin }};
    echo "repositorio clonado correctamente";
@endtask

@task('lot_mv', ['on' => $on])
    cd {{ $app_dir1 }}
    echo "hemos entrado al directorio /var/www";
     sudo mv apiloto.espagodev.com api.lotogam.com
    echo "carpeta renombrada correctamente";
@endtask


@task('lot_pull', ['on' => $on])
    cd {{ $app_dir_api }}
    echo "hemos entrado al directorio {{ $app_dir_api }}";
    {{-- sudo git pull origin {{ $branch }} --allow-unrelated-histories --}}
    sudo git pull origin {{ $branch }}
    echo "código actualizado correctamente";
@endtask

@task('lot_origen', ['on' => $on])
    cd {{ $app_dir_api }}
    echo "hemos entrado al directorio {{ $app_dir_api }}";
     {{-- sudo git fetch origin
    sudo git reset --hard origin/master  --}}
    sudo git remote remove origin 
    sudo git remote add origin git@github.com:espagodev/apiloto.espagodev.com.git
    echo "origen actualizado correctamente";
@endtask

@task('lot_ls', ['on' => $on])
    cd {{ $app_dir_api }}
    ls -ln
@endtask


@task('lot_composer', ['on' => $on])
    cd {{ $app_dir_api }}
 sudo   composer install --no-dev
@endtask

@task('lot_autoload', ['on' => $on])
    cd {{ $app_dir_api }}
 sudo   composer dump-autoload
@endtask

@task('lot_env', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo  cp .env.example .env
     echo "Se crea archivo env";
@endtask

@task('lot_key', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo php artisan key:generate
     echo "Se genero la llave";
@endtask

@task('lot_storage', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo chown -R www-data:root storage/
     echo "Se dieron permisos a storage";
@endtask

@task('lot_bootstrap', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo chown -R www-data bootstrap/cache/
     echo "Se dieron permisos a bootstrap";
@endtask

@task('lot_migrate', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo php artisan migrate
    {{-- sudo php artisan migrate --path=app/database/migrations/2021_08_14_125310_create_loterias_users_table.php --}}
   {{-- sudo php artisan migrate:refresh --seed --}}
   {{-- sudo php artisan migrate --force --}}
@endtask

@task('lot_pass', ['on' => $on])
    cd {{ $app_dir_api }}
   sudo  php artisan passport:install
    echo "Se crearon las llaves passport";
@endtask

@task('lot_passport', ['on' => $on])
    cd {{ $app_dir_api }}
     php artisan passport:client --password
    echo "Se crearon las llaves password";
@endtask

@task('lot_assets:install', ['on' => $on])
    cd {{ $app_dir_api }}
    yarn install
@endtask

@task('lot_up', ['on' => $on])
    cd {{ $app_dir_api }}
    php artisan up
@endtask

@task('lot_down', ['on' => $on])
    cd {{ $app_dir_api }}
    php artisan down
@endtask

@task('lot_cache', ['on' => $on])
    cd {{ $app_dir_api }}
     sudo php artisan config:cache
    echo "caché limpiada correctamente";
@endtask

@task('lot_link', ['on' => $on])
    cd {{ $app_dir_api }}
    sudo php artisan storage:link
    echo "se crea el enlace simbólico";
@endtask


@task('lot_rm', ['on' => $on])
    sudo rm -r {{ $app_dir_api }}
@endtask