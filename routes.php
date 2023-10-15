<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\Admin\AvailableSiteController;
use App\Controllers\Admin\FeatureController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\LocalAttractionController;
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\LogoutController;
use App\Controllers\Admin\PitchTypeController;
use App\Controllers\Admin\SiteController;
use App\Controllers\User\BookingController;
use App\Controllers\User\ContactController;
use App\Controllers\User\FeatureController as UserFeatureController;
use App\Controllers\User\HomeController as UserHomeController;
use App\Controllers\User\LocalAttractionController as UserLocalAttractionController;
use App\Controllers\User\LoginController as UserLoginController;
use App\Controllers\User\LogoutController as UserLogoutController;
use App\Controllers\User\PrivacyPolicyController;
use App\Controllers\User\RegisterController;
use App\Controllers\User\RSSFeedController;
use App\Controllers\User\SiteController as UserSiteController;
use App\Middleware\AdminAuthMiddleware;
use App\Middleware\UserAuthMiddleware;

return [
    [
        "middleware" => "",
        "prefix" => "/admin",
        "routes" => [
            "/login" => [LoginController::class, "index"],
            "/post-login" => [LoginController::class, "login"],
        ]
    ],
    [
        "middleware" => AdminAuthMiddleware::class,
        "prefix" => "/admin",
        "routes" => [
            "/logout" => [LogoutController::class, "index"],

            "/" => [HomeController::class, "index"],

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
    ],
    [
        "middleware" => "",
        "prefix" => "",
        "routes" => [
            "/" => [UserHomeController::class, "index"],

            "/login" => [UserLoginController::class, "index"],
            "/post-login" => [UserLoginController::class, "login"],

            "/register" => [RegisterController::class, "index"],
            "/post-register" => [RegisterController::class, "register"],

            "/sites" => [UserSiteController::class, "index"],
            "/sites/{site_id}" => [UserSiteController::class, "show"],

            "/features" => [UserFeatureController::class, "index"],

            "/local-attractions/{local_attraction_id}" => [UserLocalAttractionController::class, "show"],

            "/contact" => [ContactController::class, "index"],
            "/post-contact" => [ContactController::class, "contact"],

            "/privacy-policy" => [PrivacyPolicyController::class, "index"],

            "/rss-feeds" => [RSSFeedController::class, "index"],
        ]
    ],
    [
        "middleware" => UserAuthMiddleware::class,
        "prefix" => "",
        "routes" => [
            "/logout" => [UserLogoutController::class, "index"],

            "/sites/{site_id}/review" => [UserSiteController::class, "review"],
            "/sites/{site_id}/book" => [BookingController::class, "index"],
            "/sites/{site_id}/post-book" => [BookingController::class, "book"],
            "/booking/{booking_id}" => [BookingController::class, "show"],
        ]
    ]
];
