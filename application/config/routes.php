<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'public/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route[config_item("auth")] = 'auth/auth/a';
$route[config_item("auth").'/get_login'] = 'auth/auth/get_login';
$route[config_item("auth").'/logout'] = 'auth/auth/logout';
// $route[config_item("cpanel").'home'] = 'cpanel/Home';


//======= HOME ========
$route['index'] = 'public/home';

$route['home'] = 'public/home';
//===== BERITA =====
$route['berita'] = 'public/berita';
$route['berita/lainnya'] = 'public/berita/get_berita_populer';
$route['berita/detail/(:num)/(:any)'] = 'public/berita/detail/$1/$2';
$route['berita/page/(:num)'] = 'public/berita/paging';

//=====KATEGORI=====
$route['kategori/(:num)/(:any)'] = 'public/kategori/index/$1/$2';
$route['kategori/(:num)/(:any)/page/(:num)'] = 'public/kategori/paging';


$route['agenda'] = 'public/agenda';
$route['agenda/page/(:num)'] = 'public/agenda/paging';
$route['agenda/detail/(:num)/(:any)'] = 'public/agenda/detail/$1/$2';

$route['litbang'] = 'public/litbang';
$route['litbang/page/(:num)'] = 'public/litbang/paging';
$route['litbang/detail/(:num)/(:any)'] = 'public/litbang/detail/$1/$2';
$route['litbang/file/download/(:any)'] = 'public/litbang/download/$1';



$route['jasakip'] = 'public/jasakip';
$route['jasakip/page/(:num)'] = 'public/jasakip/paging';
$route['jasakip/detail/(:num)'] = 'public/jasakip/detail/$1';
$route['jasakip/file/download/(:any)'] = 'public/jasakip/download/$1';
//===HALAMAN========
$route['page/(:any)'] = "public/halaman/index/$1";



//====ALBUM======
$route['album'] = 'public/album';
$route['album/detail/(:num)'] = 'public/album/detail/$1';
$route['album/page/(:num)'] = 'public/album/paging';
// $route['album/json/(:num)'] = 'public/album/image_json/$1';

$route['video'] = 'public/video';
$route['video/page/(:num)'] = 'public/video/paging';
$route['video/detail/(:num)/(:any)'] = 'public/video/detail/$1/$2';

$route['search'] = 'public/search';
$route['search/page/(:any)/(:num)'] = 'public/search/paging/$1/$2';

$route['kontak'] = 'public/kontak';
$route['kontak/action'] = 'public/kontak/action';
$route['kontak/captcha'] = 'public/kontak/captcha_json';
