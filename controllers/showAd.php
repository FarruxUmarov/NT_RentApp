<?php

declare(strict_types=1);
/** @var TYPE_NAME $id */

//$ads = new App\Ads();
//$ad = $ads->getAd($id);
//
//view(path: '/single-ad', args: ['id' => $id]);

viewPartials('header');
viewPartials('navbar');

$ad = ((new \App\Ads())->getAd($id));
//viewPartials('content');
//viewPartials('footer');
?>
<div class="max-w-screen-lg mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Left Column: Property Info -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800"><?= $ad->title ?></h1>
            <div class="flex space-x-4 mt-2 text-green-600">
                <div class="flex items-center space-x-2">
                    <span class="icon-bed"></span>
                    <span><?= $ad->rooms ?> Rooms</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="icon-bath"><?= $ad->branch_id ?> (branch))</span>
                </div>
            </div>
            <p class="text-gray-600 mt-4"><?= $ad->description ?></p>
            <div class="flex space-x-4 mt-4">
            </div>
        </div>
        <!-- Right Column: Price and Map -->
        <div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <div class="text-gray-800 text-xl font-semibold"><?= $ad->price ?>$</div>
                <div class="text-green-600 text-sm"><?= $ad->status_id ?>(Status)</div>
                <div class="mt-4">
                    <p class="text-sm text-gray-500">__User</p>
                    <p class="text-sm text-gray-500">__Gender</p>
                    <p class="text-sm text-gray-500">__Contact</p>
                    <p class="text-sm text-gray-500"><?= $ad->created_at ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
