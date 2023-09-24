<?php

namespace App\Models;

class Site extends Model
{
    protected $table = "sites";

    protected $primaryKey = "SiteID";

    public function getAllWithFeatures()
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

    public function firstByIDWithFeatures($id)
    {
        $query = "SELECT sites.*, GROUP_CONCAT(features.FeatureID) AS FeatureIDs
        FROM sites
        LEFT JOIN site_feature ON sites.SiteID = site_feature.SiteID
        LEFT JOIN features ON site_feature.FeatureID = features.FeatureID
        WHERE sites.SiteID = '$id'
        GROUP BY sites.SiteID";

        $site = db()->query($query)->first();

        $feature_ids =  $site["FeatureIDs"] ? explode(",", $site["FeatureIDs"]) : [];

        foreach ($feature_ids as $feature_id) {
            $site["features"][] = (new Feature)->firstByID($feature_id);
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
}
