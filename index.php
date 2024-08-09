<?php

declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootsrap.php';

$User = new \App\User();

$ads = new \App\Ads();

$ads->createAds('ads', 'malumotlar', 1, 1,1, 'Chilonzor', 50, 3);