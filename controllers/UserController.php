<?php

namespace Controller;

use App\Ads;
class UserController
{
 public function loadprofile(): void
 {
     $ads = (new Ads())->getUserAds($_SESSION['user']['id']);
     view('profile', ['ads' => $ads], false);
 }
}