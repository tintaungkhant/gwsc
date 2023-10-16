<?php

view("user.layout.header");
?>

<div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="flex flex-col p-8">
                    <img class="mx-auto w-full flex-shrink-0 rounded" src="/<?php echo $site["SiteImage"] ?>" alt="">
                    <h3 class="mt-6 text-lg font-medium text-gray-900"><?php echo $site["SiteName"] ?></h3>
                    <div class="mt-1 flex flex-grow flex-col justify-between">
                        <p class="text-sm text-gray-500">
                            <?php echo $site["SiteDescription"] ?>
                        </p>
                        <div class="mt-6">
                            <form action="/sites/<?php echo $site["SiteID"] ?>/book" method="POST" class="space-y-5">
                                <?php foreach ($pitch_types as $index => $pitch_type) : ?>
                                    <div class="relative flex items-start">
                                        <div class="flex h-6 items-center">
                                            <input id="PitchTypeID_<?php echo $pitch_type["PitchTypeID"] ?>" value="<?php echo $pitch_type["PitchTypeID"] ?>" name="PitchTypeID" type="radio" <?php echo $index == 0 ? "checked" : "" ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <label for="PitchTypeID_<?php echo $pitch_type["PitchTypeID"] ?>" class="font-medium text-gray-900"><?php echo $pitch_type["PitchTypeName"] ?></label>
                                            <span id="small-description" class="text-gray-500">$<?php echo $pitch_type["Fee"] ?> per person/</span>
                                            <span id="small-description" class="text-gray-500"><?php echo $pitch_type["Slot"] ?> slot(s) left</span>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                <div>
                                    <?php if (authUser()) { ?>
                                        <button class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Book Now</button>
                                    <?php } else { ?>
                                        <a href="/login" class="btn-default">Login To Book</a>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Features</h4>
                            <?php foreach ($site["features"] as $feature) : ?>
                                <a href="/features" class="mb-2 inline-block bg-indigo-100 text-black text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg border border-indigo-400 whitespace-nowrap"><?php echo $feature["FeatureIcon"] ?> <?php echo $feature["FeatureName"] ?></a>
                            <?php endforeach ?>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Location</h4>
                            <div><?php echo $site["SiteLocation"] ?></div>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Local Attractions</h4>
                            <div class="flex flex-wrap justify-between">
                                <?php foreach ($site["local_attractions"] as $local_attraction) : ?>
                                    <a href="/local-attractions/<?php echo $local_attraction["LocalAttractionID"] ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                                        <img class="mx-auto w-full h-48 object-cover flex-shrink-0 rounded" src="/<?php echo $local_attraction["LocalAttractionImage"] ?>" alt="">
                                        <h3 class="mt-6 text-sm font-medium text-gray-900"><?php echo $local_attraction["LocalAttractionName"] ?></h3>
                                        <div class="mt-1 flex flex-grow flex-col justify-between">
                                            <p class="text-sm text-gray-500">
                                                <?php echo truncateLongText($local_attraction["LocalAttractionDescription"]) ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Reviews</h4>
                            <?php if (count($reviews)) : ?>
                                <ul role="list" class="divide-y divide-gray-100">
                                    <?php foreach ($reviews as $review) : ?>
                                        <li class="flex justify-between gap-x-6 py-5">
                                            <div class="flex min-w-0 gap-x-4">
                                                <div class="min-w-0 flex-auto">
                                                    <p class="text-sm font-semibold leading-6 text-gray-900"><?php echo $review["UserFirstName"] ?> <?php echo $review["UserLastName"] ?></p>
                                                    <p class="mt-1 text-xs leading-5 text-gray-500"><?php echo $review["ReviewComment"] ?></p>
                                                </div>
                                            </div>
                                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                                <p class="mt-1 text-xs leading-5 text-gray-500">At <?php echo $review["ReviewCreatedAt"] ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php else : ?>
                                <p>There is no review yet</p>
                            <?php endif ?>
                            <?php if (authUser()) : ?>
                                <form action="/sites/<?php echo $site["SiteID"] ?>/review" method="POST">
                                    <input type="hidden" value="<?php echo $site["SiteID"] ?>" name="SiteID">
                                    <input type="hidden" value="<?php echo authUser()["UserID"] ?>" name="UserID">
                                    <div class="mb-3">
                                        <textarea rows="4" name="ReviewComment" id="ReviewComment" placeholder="What's on your mind?" class="input-box"></textarea>
                                    </div>
                                    <div>
                                        <button class="btn-default">Submit</button>
                                    </div>
                                </form>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>