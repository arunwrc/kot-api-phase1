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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
//Admin Login
$route['admin/login'] = 'Login_api/adminLogin';
$route['admin/logout'] = 'Login_api/adminLogout';
$route['activeuser/admin'] = 'Login_api/ActiveAdminUser';
//Organisation
$route['organisation/login'] = 'Login_api/organisationLogin';
$route['organisation/logout'] = 'Login_api/organisationLogout';
$route['activeuser/organisation'] = 'Login_api/ActiveOrganisationUser';
$route['organisation/create'] = 'Organisations_api/Add';
$route['organisation/list'] = 'Organisations_api/ViewAll';
$route['organisation/view/(:any)'] = 'Organisations_api/View/$1';
$route['organisation/update/(:any)'] = 'Organisations_api/Update/$1';
$route['organisation/delete/(:any)'] = 'Organisations_api/Delete/$1';
//User
$route['user/login'] = 'Login_api/userLogin';
$route['user/logout'] = 'Login_api/userLogout';
$route['activeuser/user'] = 'Login_api/ActiveUser';
$route['user/create'] = 'Users_api/Add';
$route['user/list'] = 'Users_api/ViewAll';
$route['user/view/(:any)'] = 'Users_api/View/$1';
$route['user/update/(:any)'] = 'Users_api/Update/$1';
$route['user/delete/(:any)'] = 'Users_api/Delete/$1';
//Itemcategories
$route['itemcategories/create'] = 'Itemcategories_api/Add';
$route['itemcategories/list'] = 'Itemcategories_api/ViewAll';
$route['itemcategories/view/(:any)'] = 'Itemcategories_api/View/$1';
$route['itemcategories/update/(:any)'] = 'Itemcategories_api/Update/$1';
$route['itemcategories/delete/(:any)'] = 'Itemcategories_api/Delete/$1';
//Items
$route['items/create'] = 'Items_api/Add';
$route['items/list'] = 'Items_api/ViewAll';
$route['items/view/(:any)'] = 'Items_api/View/$1';
$route['items/update/(:any)'] = 'Items_api/Update/$1';
$route['items/delete/(:any)'] = 'Items_api/Delete/$1';
//Tables
$route['tables/create'] = 'Tables_api/Add';
$route['tables/list'] = 'Tables_api/ViewAll';
$route['tables/view/(:any)'] = 'Tables_api/View/$1';
$route['tables/update/(:any)'] = 'Tables_api/Update/$1';
$route['tables/delete/(:any)'] = 'Tables_api/Delete/$1';
//Orders
$route['orders/create'] = 'Orders_api/Add';
$route['orders/list'] = 'Orders_api/ViewAll';
$route['orders/view/(:any)'] = 'Orders_api/View/$1';
$route['orders/update/(:any)'] = 'Orders_api/Update/$1';
$route['orders/delete/(:any)'] = 'Orders_api/Delete/$1';
//Reservation
$route['reservations/create'] = 'Reservations_api/Add';
$route['reservations/list'] = 'Reservations_api/ViewAll';
$route['reservations/view/(:any)'] = 'Reservations_api/View/$1';
$route['reservations/update/(:any)'] = 'Reservations_api/Update/$1';
$route['reservations/delete/(:any)'] = 'Reservations_api/Delete/$1';


$route['translate_uri_dashes'] = FALSE;
