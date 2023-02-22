<?php

$router->get('', 'PagesController@dashboard');
$router->post('', 'PagesController@dashboard');
$router->get('tables', 'PagesController@tables');
$router->get('config', 'PagesController@config');
$router->post('config', 'PagesController@config');

$router->post('create_so', 'ServicesController@create_so');
$router->post('delete_so', 'ServicesController@delete_so');
$router->post('update_so', 'ServicesController@update_so');
$router->get('read_so', 'ServicesController@read_so');

$router->post('create_sp', 'ServicesController@create_sp');
$router->post('delete_sp', 'ServicesController@delete_sp');
$router->post('update_sp', 'ServicesController@update_sp');
$router->get('read_sp', 'ServicesController@read_sp');

$router->get('filter_date', 'ServicesController@filter_date');
$router->get('filter_type', 'ServicesController@filter_type');
$router->get('filter_date_type', 'ServicesController@filter_date_type');
$router->get('time_saved', 'ServicesController@time_saved');

?>
