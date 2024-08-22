<?php

declare(strict_types=1);
/** @var TYPE_NAME $id */

$ad = (new \App\Ads())->getAd($id);

$ad->image = "../assets/images/ads/$ad->image";

view(path: 'single-ad', args: ['ad' => $ad]);

?>

