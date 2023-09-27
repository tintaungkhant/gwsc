<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Available Site</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="/admin/available-sites/<?php echo $available_site["AvailableSiteID"] ?>/update" method="POST">
                        <div class="mb-3">
                            <label for="SiteID" class="block text-sm font-medium leading-6 text-gray-900">Site</label>
                            <div class="mt-2">
                                <select name="SiteID" id="SiteID" disabled class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <?php foreach ($sites as $site) : ?>
                                        <option value="<?php echo $site["SiteID"] ?>" <?php echo $site["selected"] ? "selected" : "" ?>><?php echo $site["SiteName"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="PitchTypeID" class="block text-sm font-medium leading-6 text-gray-900">Pitch Type</label>
                            <div class="mt-2">
                                <select name="PitchTypeID" disabled id="PitchTypeID" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <?php foreach ($pitch_types as $pitch_type) : ?>
                                        <option value="<?php echo $pitch_type["PitchTypeID"] ?>" <?php echo $pitch_type["selected"] ? "selected" : "" ?>><?php echo $pitch_type["PitchTypeName"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="LocalAttraction" class="block text-sm font-medium leading-6 text-gray-900">Is Availabe</label>
                            <div class="mt-2">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="local_attraction_1" value="1" <?php echo $available_site["IsAvailabe"] ? "checked" : "" ?> name="IsAvailabe" type="radio" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="local_attraction_1" class="font-medium text-gray-900">True</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="local_attraction_2" value="0" <?php echo !$available_site["IsAvailabe"] ? "checked" : "" ?> name="IsAvailabe" type="radio" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="local_attraction_2" class="font-medium text-gray-900">False</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Available Site</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("admin.layout.header");
?>