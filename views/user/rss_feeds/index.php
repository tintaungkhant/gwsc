<?php header("Content-type: text/xml"); ?>
<?xml version='1.0' encoding='UTF-8' ?>
<rss version='2.0'>
    <channel>
        <title>Global Wild Swimming and Camping</title>
       

<?php 
if (isset($_SERVER['HTTPS']) &&
($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
$protocol = 'https://';
}
else {
$protocol = 'http://';
}
foreach($rss_feeds as $rss_feed):
?>
<item>
    <title><?php echo $rss_feed["RSSFeedTitle"]?></title>
    <description><?php echo $rss_feed["RSSFeedDescription"]?></description>
    <url><?php echo $protocol.$_SERVER['SERVER_NAME'].$rss_feed["RSSFeedURI"]?></url>
</item>
<?php 
endforeach;
?>
</channel>
</rss>
