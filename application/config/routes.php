<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['installSoftware'] = 'home/installSoftware';
$route['loginUser'] = 'home/loginUser';
$route['logout-user'] = 'home/logoutUser';

$route['dashboard'] = 'Dashboard';

$route['dashboard/warehouses'] = 'Warehouses';
$route['dashboard/warehouse/delete'] = 'Warehouses/Delete';
$route['dashboard/warehouse/addWarehouse'] = 'Warehouses/AddWarehouse';
$route['dashboard/warehouse/updateWarehouse'] = 'Warehouses/UpdateWarehouse';

$route['dashboard/categories'] = 'Categories';
$route['dashboard/category/addCategory'] = 'Categories/AddCategory';
$route['dashboard/category/updateCategory'] = 'Categories/UpdateCategory';
$route['dashboard/category/delete'] = 'Categories/Delete';


$route['dashboard/units'] = 'Units';
$route['dashboard/unit/addUnit'] = 'Units/AddUnit';
$route['dashboard/unit/delete'] = 'Units/Delete';
$route['dashboard/unit/updateUnit'] = 'Units/UpdateUnit';

$route['dashboard/contacts'] = 'Contacts';
$route['dashboard/contact/addContact'] = 'Contacts/AddContact';
$route['dashboard/contact/delete'] = 'Contacts/Delete';
$route['dashboard/contact/fetchContact/(:num)'] = 'Contacts/FetchContact/$1';
$route['dashboard/contact/updateContact'] = 'Contacts/UpdateContact/';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
