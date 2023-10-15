<?php

namespace App\Controllers\User;

use App\Models\RSSFeed;

class RSSFeedController
{
    public function index()
    {
        $rss_feed = new RSSFeed;
        $rss_feeds = $rss_feed->getAll();

        return view("user.rss_feeds.index", ["rss_feeds" => $rss_feeds]);
    }
}
