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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'User_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Specific routes for `admin` come first
$route['admin'] = 'Admin_controller/login';
$route['admin/register'] = 'Admin_controller/register';
$route['admin/signup'] = 'Admin_controller/signup';
$route['admin/signin'] = 'Admin_controller/signin';
$route['admin/logout'] = 'Admin_controller/logout';
$route['admin/dashboard'] = 'Admin_controller/dashboard';
$route['admin/papers'] = 'Admin_controller/papers';
$route['admin/upload'] = 'Admin_controller/upload';
$route['paper/upload'] = 'Admin_controller/upload_paper';
$route['serveFile/(:any)'] = 'User_controller/serveFile/$1';

// Routes for `medium` and other specific patterns
$route['medium'] = 'User_controller/medium';

// Catch-all routes go last
$route['(:any)'] = 'User_controller/grade/$1';
$route['(:any)/(:any)'] = 'User_controller/term/$1/$2';
$route['(:any)/(:any)/(:any)'] = 'User_controller/download/$1/$2/$3';
