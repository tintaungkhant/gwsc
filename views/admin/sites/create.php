<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Create Site</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="<?php echo route("admin/sites/store") ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="SiteName" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="SiteName" id="SiteName" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="SiteDescription" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea rows="4" name="SiteDescription" id="SiteDescription" class="input-box"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="SiteLocation" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                            <div class="mt-2">
                                <textarea rows="4" name="SiteLocation" id="SiteLocation" class="input-box"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="SiteImage" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2">
                                <input type="file" name="SiteImage" id="SiteImage" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Features" class="block text-sm font-medium leading-6 text-gray-900">Features</label>
                            <div class="mt-2">
                                <?php foreach ($features as $index => $feature) : ?>
                                    <div class="relative flex items-start">
                                        <div class="flex h-6 items-center">
                                            <input id="feature_<?php echo $index ?>" value="<?php echo $feature["FeatureID"] ?>" name="FeatureIDs[<?php echo $index ?>]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <label for="feature_<?php echo $index ?>" class="font-medium text-gray-900"><?php echo $feature["FeatureName"] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="LocalAttraction" class="block text-sm font-medium leading-6 text-gray-900">Local Attractions</label>
                            <div class="mt-2">
                                <?php foreach ($local_attractions as $index => $local_attraction) : ?>
                                    <div class="relative flex items-start">
                                        <div class="flex h-6 items-center">
                                            <input id="local_attraction_<?php echo $index ?>" value="<?php echo $local_attraction["LocalAttractionID"] ?>" name="LocalAttractionIDs[<?php echo $index ?>]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <label for="local_attraction_<?php echo $index ?>" class="font-medium text-gray-900"><?php echo $local_attraction["LocalAttractionName"] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Create Site</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("admin.layout.footer");
?>