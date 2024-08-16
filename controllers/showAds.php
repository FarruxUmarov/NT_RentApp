<?php

declare(strict_types=1);

$ads = new App\Ads();
$allAds = $ads->getAds();

view('/partials/content.php', ['ads' => $allAds]);
