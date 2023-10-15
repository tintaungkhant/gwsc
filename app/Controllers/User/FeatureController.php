<?php

namespace App\Controllers\User;

use App\Models\Feature;

class FeatureController
{
    public function index()
    {
        $feature = new Feature;
        $features = $feature->getAll();

        return view("user.features.index", ["features" => $features]);
    }
}
