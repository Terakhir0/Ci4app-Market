<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cari', 'Cari::index');
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/daftar', 'Auth::daftar');
$routes->get('/daftar_list', 'Daftar_list::index');
$routes->get('/keranjangGuest/index', 'KeranjangGuest::index');
$routes->get('/daftar_list/genre', 'Daftar_list::genre');
$routes->get('/keranjang/hapus/(:any)', 'Keranjang::hapus/$1');
$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/save', 'Auth::save');
$routes->post('/profile/update/(:any)', 'Profile::update/$1');
$routes->post('/profile/uang/(:any)', 'Profile::uang/$1');
$routes->post('/profile/ubah_p/(:any)', 'Profile::ubah_p/$1');
$routes->get('/tambah', 'Tambah::index');
$routes->post('/tambah/tambah_produk', 'Tambah::tambah_produk');
$routes->post('/tambah/tambah_genre', 'Tambah::tambah_genre');
$routes->post('/edit/produk/(:any)', 'Edit::produk/$1');
$routes->post('/edit/edit_genre/(:any)', 'Edit::edit_genre/$1');
$routes->delete('/edit/(:num)', 'Edit::delete/$1');
$routes->delete('/edit/delete_genre/(:num)', 'Edit::delete_genre/$1');
$routes->post('/keranjang/save', 'Keranjang::save');
$routes->post('/keranjang/saveCariGenre', 'Keranjang::saveCariGenre');
$routes->post('/keranjangGuest/guest_save', 'KeranjangGuest::guest_save');
$routes->post('/keranjangGuest/guest_saveCariGenre', 'KeranjangGuest::guest_saveCariGenre');
$routes->delete('/keranjangGuest/guest_delete/(:num)', 'KeranjangGuest::guest_delete/$1');

$routes->post('/order/beli/(:num)', 'Order::beli/$1');
$routes->get('/order/beli/(:num)', 'Order::beli/$1');
$routes->get('/order/(:num)', 'Order::index/$1');
$routes->post('/order/beli_keranjang', 'Order::beli_keranjang');
$routes->post('/order/(:any)', 'Order::index/$1');
$routes->get('/keranjang/reset', 'Keranjang::reset');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/profile/(:any)', 'Profile::index/$1');
$routes->get('/riwayat/(:any)', 'Riwayat::index/$1');
$routes->get('/keranjang/(:any)', 'keranjang::index/$1');
$routes->get('/edit/(:any)', 'Edit::index/$1');
$routes->get('/single/(:any)', 'Single::index/$1');
$routes->get('/cari/genre/(:any)', 'Cari::genre/$1');
$routes->get('/genres', 'Genres::index/$1');
$routes->get('/keranjangGuest/guest_reset', 'KeranjangGuest::guest_reset');