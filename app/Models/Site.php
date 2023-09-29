<?php

namespace App\Models;

class Site extends Model
{
    protected $table = "sites";

    protected $primaryKey = "SiteID";

    public function getAllWithRelations()
    {
        $query  = "SELECT sites.*, GROUP_CONCAT(features.FeatureID) AS FeatureIDs
        FROM sites
        LEFT JOIN site_feature ON sites.SiteID = site_feature.SiteID
        LEFT JOIN features ON site_feature.FeatureID = features.FeatureID
        GROUP BY sites.SiteID";

        $sites = db()->query($query)->get();

        foreach ($sites as $index => $site) {
            $feature_ids =  $site["FeatureIDs"] ? explode(",", $site["FeatureIDs"]) : [];

            foreach ($feature_ids as $feature_id) {
                $site["features"][] = (new Feature)->firstByID($feature_id);
            }

            $sites[$index] = $site;
        }

        return $sites;
    }

    public function getAllAvailableSites($pitch_type = "", $keyword = "")
    {
        $query  = "SELECT
        available_sites.AvailableSiteID,
        sites.SiteID,
        sites.SiteName,
        sites.SiteDescription,
        sites.SiteImage,
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
        available_sites.Slot > 0 ";

        if ($pitch_type) {
            $query .= "AND pitch_types.PitchTypeID = $pitch_type ";
        }

        if ($keyword) {
            $query .= "AND sites.SiteName LIKE '%$keyword%' ";
        }

        $query .= "ORDER BY sites.SiteName";

        $sites = db()->query($query)->get();

        return $sites;
    }

    public function firstByIDWithRelations($id)
    {
        $query = "SELECT sites.*, GROUP_CONCAT(features.FeatureID) AS FeatureIDs, GROUP_CONCAT(local_attractions.LocalAttractionID) AS LocalAttractionIDs
        FROM sites
        LEFT JOIN site_feature ON sites.SiteID = site_feature.SiteID
        LEFT JOIN features ON site_feature.FeatureID = features.FeatureID
        LEFT JOIN site_local_attraction ON sites.SiteID = site_local_attraction.SiteID
        LEFT JOIN local_attractions ON site_local_attraction.LocalAttractionID = local_attractions.LocalAttractionID
        WHERE sites.SiteID = '$id'
        GROUP BY sites.SiteID";

        $site = db()->query($query)->first();

        $feature_ids =  $site["FeatureIDs"] ? explode(",", $site["FeatureIDs"]) : [];

        foreach ($feature_ids as $feature_id) {
            $site["features"][] = (new Feature)->firstByID($feature_id);
        }

        $local_attraction_ids =  $site["LocalAttractionIDs"] ? explode(",", $site["LocalAttractionIDs"]) : [];

        foreach ($local_attraction_ids as $local_attraction_id) {
            $site["local_attractions"][] = (new LocalAttraction)->firstByID($local_attraction_id);
        }

        return $site;
    }

    public function syncFeatures($site_id, $feature_ids)
    {
        $query = "DELETE FROM site_feature WHERE SiteID = '$site_id'";

        db()->query($query);

        foreach ($feature_ids as $feature_id) {
            $query = "INSERT INTO site_feature (SiteID, FeatureID) VALUES ('$site_id', '$feature_id')";

            db()->query($query);
        }
    }

    public function syncLocalAttractions($site_id, $local_attractions)
    {
        $query = "DELETE FROM site_local_attraction WHERE SiteID = '$site_id'";

        db()->query($query);

        foreach ($local_attractions as $local_attraction) {
            $query = "INSERT INTO site_local_attraction (SiteID, LocalAttractionID) VALUES ('$site_id', '$local_attraction')";

            db()->query($query);
        }
    }
}
