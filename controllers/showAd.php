<?php

declare(strict_types=1);
/** @var TYPE_NAME $id */

$ad = (new \App\Ads())->getAd($id);

view(path: '/single-ad', args: ['ad' => $ad]);

?>

