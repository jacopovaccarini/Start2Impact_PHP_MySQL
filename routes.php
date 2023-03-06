<?php

$router->get('', 'PagesController@dashboard');
$router->post('', 'PagesController@dashboard');
$router->get('tables', 'PagesController@tables');
$router->get('config', 'PagesController@config');
$router->post('config', 'PagesController@config');

$router->post('services_offered', 'ServicesController@create_so');
$router->delete('services_offered/{id}', 'ServicesController@delete_so');
$router->put('services_offered/{id}', 'ServicesController@update_so');
$router->get('services_offered', 'ServicesController@read_so');

$router->post('services_provided', 'ServicesController@create_sp');
$router->delete('services_provided/{id}', 'ServicesController@delete_sp');
$router->put('services_provided/{id}', 'ServicesController@update_sp');
$router->get('services_provided', 'ServicesController@read_sp');

$router->get('filter_date', 'ServicesController@filter_date');
$router->get('filter_type', 'ServicesController@filter_type');
$router->get('filter_date_type', 'ServicesController@filter_date_type');
$router->get('time_saved', 'ServicesController@time_saved');

?>
