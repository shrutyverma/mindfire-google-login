# Laravel Social Login

This package provides an easy way to quickly set up [AdminLTE v3](https://adminlte.io/themes/v3/) with [Laravel](https://laravel.com/) (6 or higher). It has no requirements and dependencies besides **Laravel**, so you can start building your admin panel immediately. The package provides a [blade template](https://laravel.com/docs/8.x/blade).

## Installation


1. Create project folder in your htdocs folder & Copy the code to your project folder
	
2. Setup your db infromation in .env file using .env.example

3. Run the command to setup database
  
	```bash
	php artisan migrate
	```
   
4. open config/services.php provide your google & facebook detail.

5. setup your app key 

	```bash
	php artisan key:generate
	```
6. now open in browser including yourdomain/projectfolder.