<?php

$router->get('', 'PagesController@dashboard');
$router->post('', 'PagesController@dashboard');
$router->get('tables', 'PagesController@tables');
$router->get('config', 'PagesController@config');
$router->post('config', 'PagesController@config');

$router->post('services_offered', 'ServicesController@create_so');
$router->delete('services_offered', 'ServicesController@delete_so');
$router->put('services_offered', 'ServicesController@update_so');
$router->get('services_offered', 'ServicesController@read_so');

$router->post('services_provided', 'ServicesController@create_sp');
$router->delete('services_provided', 'ServicesController@delete_sp');
$router->put('services_provided', 'ServicesController@update_sp');
$router->get('services_provided', 'ServicesController@read_sp');

$router->get('time_saved', 'ServicesController@time_saved');

?>
