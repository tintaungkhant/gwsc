<?php

view("user.layout.header");
?>

<div>
    <div class="flow-root">
        <div class="-mx-4 -my-2">
            <div class="min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <h1 class="font-medium text-lg">Popular Sites</h1>
                <div class="slider">
                    <?php foreach ($top_sites as $top_site) : ?>
                        <div>
                            <a href="/sites/<?php echo $top_site["SiteID"] ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full">
                                <img class="mx-auto w-full h-72 object-cover object-center flex-shrink-0 rounded" src="/<?php echo $top_site["SiteImage"] ?>" alt="">
                                <h3 class="mt-6 text-lg text-center font-medium text-gray-900"><?php echo $top_site["SiteName"] ?></h3>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="my-20 flex mx-auto justify-between items-center w-full lg:w-1/2">
                    <div class="text-center p-6 rounded bg-teal-50">
                        <i class="fa-solid fa-tents text-4xl text-gray-500 mb-3"></i>
                        <h2 class="text-lg font-medium">11 Camps</h2>
                    </div>
                    <div class="text-center p-6 rounded bg-teal-50">
                    <i class="fa-solid fa-users text-4xl text-gray-500 mb-3"></i>
                        <h2 class="text-lg font-medium">11 Users</h2>
                    </div>
                    <div class="text-center p-6 rounded bg-teal-50">
                    <i class="fa-solid fa-message text-4xl text-gray-500 mb-3"></i>
                        <h2 class="text-lg font-medium">11 Bookings</h2>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <h1 class="font-medium text-lg">Available Sites</h1>
                    <a href="/sites" class="btn-default">Explore More</a>
                </div>
                <div class="flex flex-wrap justify-between">
                    <?php foreach ($sites as $site) : ?>
                        <a href="/sites/<?php echo $site["SiteID"] ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                            <img class="mx-auto w-full h-48 object-cover flex-shrink-0 rounded" src="/<?php echo $site["SiteImage"] ?>" alt="">
                            <h3 class="mt-6 text-sm font-medium text-gray-900"><?php echo $site["SiteName"] ?></h3>
                            <div class="flex items-center">
                                <i class="fa-solid fa-eye text-sm text-gray-500 mr-1"></i><span class="text-sm"><?php echo $site["SiteViewCount"] ?></span>
                            </div>
                            <div class="mt-1 flex flex-grow flex-col justify-between">
                                <p class="text-sm text-gray-500">
                                    <?php echo truncateLongText($site["SiteDescription"]) ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
                <div id="ww_a3c5cebd70be6" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>More forecasts: <a href="https://sharpweather.com/weather_connecticut/10_days/" id="ww_a3c5cebd70be6_u" target="_blank">Connecticut weather 10 days</a></div>
                <script async src="https://app2.weatherwidget.org/js/?id=ww_a3c5cebd70be6"></script>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer", ["show_footer_map" => true]);
?>