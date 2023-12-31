<?php

view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Available Sites</h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="<?php echo route("admin/available-sites/create") ?>" class="btn-default">Create Site</a>
        </div>
    </div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Site Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pitch Type</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Slot</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fee</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach ($available_sites as $available_site) : ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo $available_site["AvailableSiteID"] ?></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $available_site["SiteName"] ?></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $available_site["PitchTypeName"] ?></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $available_site["Slot"] ?></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">$<?php echo $available_site["Fee"] ?></td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="<?php echo route("admin/available-sites/" . $available_site["AvailableSiteID"] . "/edit") ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <a href="<?php echo route("admin/available-sites/" . $available_site["AvailableSiteID"] . "/delete") ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("admin.layout.footer");
?>