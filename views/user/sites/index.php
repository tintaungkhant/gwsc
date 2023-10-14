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
                                <select id="PitchTypeID" name="PitchTypeID" class="h-full rounded-md border-0 bg-transparent py-0 pl-3 pr-7 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                    <?php foreach ($pitch_types as $pitch_type) : ?>
                                        <option value="<?php echo $pitch_type["PitchTypeID"] ?>" <?php echo $pitch_type["PitchTypeID"] == $pitch_type_id ?  "selected" : "" ?>><?php echo $pitch_type["PitchTypeName"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <input type="text" name="SiteName" id="SiteName" value="<?php echo $site_name ?>" class="block w-full rounded-md border-0 py-1.5 pl-40 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Campsite name">
                        </div>
                    </div>
                    <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
                </form>
                <div class="flex flex-wrap justify-between">
                    <?php foreach ($sites as $site) : ?>
                        <a href="/sites/<?php echo $site["SiteID"] ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                            <img class="mx-auto w-full h-48 object-cover flex-shrink-0 rounded" src="/<?php echo $site["SiteImage"] ?>" alt="">
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