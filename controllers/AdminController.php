<?php

namespace Controller;

use App\Ads;

class AdminController
{
 public function index(): void
 {
     $ads = (new Ads())->getAds();
     view('dashboard/showAds', ['ads' => $ads]);
 }
}