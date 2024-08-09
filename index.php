<?php

declare(strict_types=1);


require 'vendor/autoload.php';
require 'bootsrap.php';

$user = new \App\User();

$ads = new \App\Ads();

$branch = new \App\Branch();

$status = new \App\Status();

//var_dump($User->getUser(2));

//$ads->create('ads', 'malumot', 1, 1,1, 'Samarqand', 50, 3);
//var_dump($ads->delete(6));

//$branch->update(1,'ads', 'Fargona');
//var_dump($branch->delete(1));

//$status->update(1,'Sarvar');
var_dump($status->delete(1));
?>


