<?php

view("user.layout.header");
?>

<div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <form>
                    <div class="mb-3">
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <select id="PitchTypeID" name="PitchTypeID" class="combined-select-box">
                                    <?php foreach ($pitch_types as $pitch_type) : ?>
                                        <option value="<?php echo $pitch_type["PitchTypeID"] ?>" <?php echo $pitch_type["PitchTypeID"] == $pitch_type_id ?  "selected" : "" ?>><?php echo $pitch_type["PitchTypeName"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <input type="text" name="SiteName" id="SiteName" value="<?php echo $site_name ?>" class="combined-input-box" placeholder="Campsite name">
                        </div>
                    </div>
                    <button class="btn-default">Search</button>
                </form>
                <div class="flex flex-wrap justify-between">
                    <?php foreach ($sites as $site) : ?>
                        <a href="<?php echo route("sites/" . $site["SiteID"]) ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                            <img class="mx-auto w-full h-48 object-cover flex-shrink-0 rounded" src="<?php echo publicPath($site["SiteImage"]) ?>" alt="">
                            <h3 class="mt-6 text-sm font-medium text-gray-900"><?php echo $site["SiteName"] ?></h3>
                            <div class="mt-1 flex flex-grow flex-col justify-between">
                                <p class="text-sm text-gray-500">
                                    <?php echo truncateLongText($site["SiteDescription"]) ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>