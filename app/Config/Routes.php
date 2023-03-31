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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/Auth/login', 'Auth::login');
$routes->get('/Auth/logout', 'Auth::logout');
$routes->get('/Barang', 'Barang::index');
$routes->get('/Cabang', 'Cabang::index');
$routes->get('/Dashboard', 'Dashboard::index');
$routes->get('/Pengeluaran', 'Pengeluaran::index');
$routes->get('/Perihal', 'Perihal::index');
$routes->get('/Perusahaan', 'Perusahaan::index');
$routes->get('/Supplier', 'Supplier::index');
$routes->get('/User', 'User::index');
$routes->get('/Transaksi', 'Transaksi::index');


$routes->post('/API/Login', 'API\Auth::login', ['filter' => 'CorsFilter']);


$routes->group('API', ["filter" => "AuthFilter"], function ($routes) {
	$routes->get('Barang/Dibeli', 'API\Barang::dibeli');
	$routes->get('Barang/Dijual', 'API\Barang::dijual');
	$routes->get('User/table', 'API\User::table');
	$routes->resource("Barang", ['controller' => 'API\Barang']);
	$routes->resource("Cabang", ['controller' => 'API\Cabang']);
	$routes->resource("User", ['controller' => 'API\User']);
	$routes->resource("Perusahaan", ['controller' => 'API\Perusahaan']);
	$routes->resource("Supplier", ['controller' => 'API\Supplier']);
	$routes->resource("Perihal", ['controller' => 'API\Perihal']);
	$routes->resource("Transaksi", ['controller' => 'API\Transaksi']);
	$routes->resource("TransaksiDetail", ['controller' => 'API\TransaksiDetail']);
	$routes->resource("Pengeluaran", ['controller' => 'API\Pengeluaran']);
	$routes->resource("PengeluaranDetail", ['controller' => 'API\PengeluaranDetail']);
});
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
