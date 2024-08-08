<?php

declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootsrap.php';

$User = new \App\User();

$User->delete(5);