<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\Admin\AvailableSiteController;
use App\Controllers\Admin\FeatureController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\LocalAttractionController;
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\PitchTypeController;
use App\Controllers\Admin\SiteController;

return [
    [
        "middleware" => "",
        "prefix" => "/admin",
        "routes" => [
            "/" => [HomeController::class, "index"],

            "/login" => [LoginController::class, "index"],
            "/post-login" => [LoginController::class, "login"],

            "/sites" => [SiteController::class, "index"],
            "/sites/create" => [SiteController::class, "create"],
            "/sites/store" => [SiteController::class, "store"],
            "/sites/{site_id}/edit" => [SiteController::class, "edit"],
            "/sites/{site_id}/update" => [SiteController::class, "update"],
            "/sites/{site_id}/delete" => [SiteController::class, "delete"],

            "/admins" => [AdminController::class, "index"],
            "/admins/create" => [AdminController::class, "create"],
            "/admins/store" => [AdminController::class, "store"],
            "/admins/{admin_id}/edit" => [AdminController::class, "edit"],
            "/admins/{admin_id}/update" => [AdminController::class, "update"],
            "/admins/{admin_id}/delete" => [AdminController::class, "delete"],

            "/pitch-types" => [PitchTypeController::class, "index"],
            "/pitch-types/create" => [PitchTypeController::class, "create"],
            "/pitch-types/store" => [PitchTypeController::class, "store"],
            "/pitch-types/{pitch_type_id}/edit" => [PitchTypeController::class, "edit"],
            "/pitch-types/{pitch_type_id}/update" => [PitchTypeController::class, "update"],
            "/pitch-types/{pitch_type_id}/delete" => [PitchTypeController::class, "delete"],

            "/features" => [FeatureController::class, "index"],
            "/features/create" => [FeatureController::class, "create"],
            "/features/store" => [FeatureController::class, "store"],
            "/features/{feature_id}/edit" => [FeatureController::class, "edit"],
            "/features/{feature_id}/update" => [FeatureController::class, "update"],
            "/features/{feature_id}/delete" => [FeatureController::class, "delete"],

            "/local-attractions" => [LocalAttractionController::class, "index"],
            "/local-attractions/create" => [LocalAttractionController::class, "create"],
            "/local-attractions/store" => [LocalAttractionController::class, "store"],
            "/local-attractions/{local_attraction_id}/edit" => [LocalAttractionController::class, "edit"],
            "/local-attractions/{local_attraction_id}/update" => [LocalAttractionController::class, "update"],
            "/local-attractions/{local_attraction_id}/delete" => [LocalAttractionController::class, "delete"],

            "/available-sites" => [AvailableSiteController::class, "index"],
            "/available-sites/create" => [AvailableSiteController::class, "create"],
            "/available-sites/store" => [AvailableSiteController::class, "store"],
            "/available-sites/{available_site_id}/edit" => [AvailableSiteController::class, "edit"],
            "/available-sites/{available_site_id}/update" => [AvailableSiteController::class, "update"],
            "/available-sites/{available_site_id}/delete" => [AvailableSiteController::class, "delete"],
        ]
    ]
];