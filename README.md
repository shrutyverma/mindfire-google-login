
## Steps Followed

1. make project folder name "mindfire" in Xampp/htdocs.

2. created the laravel setup by running command within mindfire folder:composer create-project --prefer-dist laravel/laravel

3. move index.php and .htaccess file from your public folder to project main folder and
Open index.php and replace require __DIR__.'/../vendor/autoload.php'; with require __DIR__.'/vendor/autoload.php'; and $app = require_once __DIR__.'/../bootstrap/app.php'; with $app = require_once __DIR__.'/bootstrap/app.php';

4. SETUP ADMINLTE IN Laravel

    4.1 On the root folder of your Laravel project, require the package using composer:
		composer require jeroennoten/laravel-adminlte
	
    4.2 Install the required package resources using the next command:
		php artisan adminlte:install
	   
    4.3 install laravel/ui package using composer:
		composer require laravel/ui
		php artisan ui vue --auth
		
    4.4 make the view replacements executing the next artisan command:
		php artisan adminlte:install --only=auth_views
		
    4.5 setup database using command:php artisan migrate
   
5. SETUP SOCIAL LOGIN PLUGIN "socilalite"

	5.1 In your laravel project run the following command to install Laravel Socialite.
		composer require laravel/socialite
	
	5.2 Once the package is installed open ‘config/app.php’ file and add the following line in 	`providers` array:
		Laravel\Socialite\SocialiteServiceProvider::class,
		
		Now add the following line in `aliases` array.

		'Socialite' => Laravel\Socialite\Facades\Socialite::class,
		
	5.3 In LoginController added function for social login and handleProviderCallback.
	
	5.4 Create Routes for Social Login in Laravel by adding social login handler as required like:
		Route::get('/login/{social}','App\Http\Controllers\Auth\LoginController@socialLogin')->where('social','facebook|google');
		Route::get('/login/{social}/callback','App\Http\Controllers\Auth\LoginController@handleProviderCallback')->where('social','facebook|google');
	
	5.5 open config/services.php file and add the social login Oauth login credential in it.
