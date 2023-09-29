<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Create Available Site</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="/admin/available-sites/store" method="POST">
                        <div class="mb-3">
                            <label for="SiteID" class="block text-sm font-medium leading-6 text-gray-900">Site</label>
                            <div class="mt-2">
                                <select name="SiteID" id="SiteID" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <?php foreach ($sites as $site) : ?>
                                        <option value="<?php echo $site["SiteID"] ?>"><?php echo $site["SiteName"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="PitchTypeID" class="block text-sm font-medium leading-6 text-gray-900">Pitch Type</label>
                            <div class="mt-2">
                                <select name="PitchTypeID" id="PitchTypeID" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <?php foreach ($pitch_types as $pitch_type) : ?>
                                        <option value="<?php echo $pitch_type["PitchTypeID"] ?>"><?php echo $pitch_type["PitchTypeName"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Slot" class="block text-sm font-medium leading-6 text-gray-900">Slot</label>
                            <div class="mt-2">
                                <input type="number" name="Slot" id="Slot" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Fee" class="block text-sm font-medium leading-6 text-gray-900">Fee per person</label>
                            <div class="mt-2">
                                <input type="number" name="Fee" id="Fee" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Available Site</button>
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