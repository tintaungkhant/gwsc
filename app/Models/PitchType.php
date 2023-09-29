<?php

namespace App\Models;

class PitchType extends Model
{
    protected $table = "pitch_types";

    protected $primaryKey = "PitchTypeID";

    public function getPitchTypes($site_id)
    {
        $query = "SELECT DISTINCT
        pitch_types.PitchTypeID,
        pitch_types.PitchTypeName,
        available_sites.Fee,
        available_sites.Slot
    FROM
        available_sites
    INNER JOIN
        pitch_types ON available_sites.PitchTypeID = pitch_types.PitchTypeID
    WHERE
        available_sites.SiteID = $site_id";

        $pitches = db()->query($query)->get();

        return $pitches;
    }

    public function firstPitchType($site_id, $pitch_type_id)
    {
        $query = "SELECT DISTINCT
        pitch_types.PitchTypeID,
        pitch_types.PitchTypeName,
        available_sites.Fee,
        available_sites.Slot
    FROM
        available_sites
    INNER JOIN
        pitch_types ON available_sites.PitchTypeID = pitch_types.PitchTypeID
    WHERE
        available_sites.SiteID = $site_id
    AND
    pitch_types.PitchTypeID = $pitch_type_id";

        $pitches = db()->query($query)->first();

        return $pitches;
    }
}
