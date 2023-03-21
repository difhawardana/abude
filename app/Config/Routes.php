<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/API/Barang/Dibeli', 'API\Barang::dibeli');
$routes->get('/API/Barang/Dijual', 'API\Barang::dijual');
$routes->resource("/API/Barang", ['controller' => 'API\Barang']);
$routes->resource("/API/Cabang", ['controller' => 'API\Cabang']);
$routes->resource("/API/User", ['controller' => 'API\User']);
$routes->resource("/API/Perusahaan", ['controller' => 'API\Perusahaan']);
$routes->resource("/API/Supplier", ['controller' => 'API\Supplier']);
$routes->resource("/API/Perihal", ['controller' => 'API\Perihal']);
// $routes->post('/', 'Auth::index');


$routes->group('api', ["filter" => "cors", "auth"],  function($routes) {
	$routes->get('users', 'API\User::index');
	$routes->post('users', 'API\User::create');
	$routes->get('users/(:num)', 'API\User::show/$1');
	$routes->patch('users/(:num)', 'API\User::update/$1');
	$routes->delete('users/(:num)', 'API\User::delete/$1');
});

$routes->post('API/users/token', 'API\Auth::loginUser', ['filter' => 'cors']);




// $routes->get('barang','Barang::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
