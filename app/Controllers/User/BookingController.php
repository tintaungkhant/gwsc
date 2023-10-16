<?php

namespace App\Controllers\User;

use App\Models\AvailableSite;
use App\Models\Booking;
use App\Models\PitchType;
use App\Models\Site;

class BookingController
{

    public function index($routeParams)
    {
        $site = new Site;
        $site = $site->firstByIDWithRelations($routeParams["site_id"]);

        $pitch_type = new PitchType;
        $pitch_type = $pitch_type->firstPitchType($routeParams["site_id"], request()->get("PitchTypeID"));

        return view("user.sites.booking", ["site" => $site, "pitch_type" => $pitch_type]);
    }

    public function book($routeParams)
    {
        $data = request()->all();

        $validator = validator($data, [
            "BookingSiteID" => ["required"],
            "BookingPitchTypeID" => ["required"],
            "BookingSlot" => ["required"],
            "BookingFirstName" => ["required"],
            "BookingLastName" => ["required"],
            "BookingEmail" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/sites/".$routeParams["site_id"]."/book?PitchTypeID=".request()->get("BookingPitchTypeID"));
        }

        $booking = new Booking;
        $booking = $booking->create($data);

        (new AvailableSite)->updateSlot($data["BookingSiteID"], $data["BookingPitchTypeID"], $data["BookingSlot"]);

        return redirect("/booking/".$booking["BookingID"]);
    }

    public function show($routeParams){
        $booking = new Booking;
        $booking = $booking->firstByID($routeParams["booking_id"]);

        $site = new Site;
        $site = $site->firstByIDWithRelations($booking["BookingSiteID"]);

        $pitch_type = new PitchType;
        $pitch_type = $pitch_type->firstPitchType($booking["BookingSiteID"], $booking["BookingPitchTypeID"]);

        return view("user.sites.booking_success", ["booking" => $booking, "site" => $site, "pitch_type" => $pitch_type]);
    }
}
