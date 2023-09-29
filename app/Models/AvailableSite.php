<?php

namespace App\Models;

class AvailableSite extends Model
{
    protected $table = "available_sites";

    protected $primaryKey = "AvailableSiteID";

    public function createOrUpdate($data)
    {
        $query = "SELECT * FROM available_sites WHERE SiteID = " . $data["SiteID"] . " AND PitchTypeID = " . $data["PitchTypeID"] . " LIMIT 1";

        $old_data = db()->query($query)->first();

        if ($old_data) {
            $columns = $this->generateUpdateData($data)["columns"];
            
            $query = "UPDATE $this->table SET $columns WHERE $this->primaryKey = '".$old_data["AvailableSiteID"]."'";

            db()->query($query);

            return $this->firstByID($old_data["AvailableSiteID"]);
        }

        return $this->create($data);
    }

    public function getAllWithRelations()
    {
        $query  = "SELECT
        available_sites.AvailableSiteID,
        sites.SiteID,
        sites.SiteName,
        pitch_types.PitchTypeID,
        pitch_types.PitchTypeName,
        available_sites.Slot,
        available_sites.Fee
    FROM
        sites
    INNER JOIN
        available_sites ON sites.SiteID = available_sites.SiteID
    INNER JOIN
        pitch_types ON available_sites.PitchTypeID = pitch_types.PitchTypeID
    ORDER BY 
        sites.SiteName";

        $sites = db()->query($query)->get();

        return $sites;
    }

    public function firstByIDWithRelations($id)
    {
        $query  = "SELECT
        available_sites.AvailableSiteID,
        sites.SiteID,
        sites.SiteName,
        pitch_types.PitchTypeID,
        pitch_types.PitchTypeName,
        available_sites.Slot,
        available_sites.Fee
    FROM
        sites
    INNER JOIN
        available_sites ON sites.SiteID = available_sites.SiteID
    INNER JOIN
        pitch_types ON available_sites.PitchTypeID = pitch_types.PitchTypeID
    WHERE
        available_sites.AvailableSiteID = $id";

        $site = db()->query($query)->first();

        return $site;
    }
}
