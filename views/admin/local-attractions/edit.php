<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Local Attraction</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="<?php echo route("admin/local-attractions/" . $local_attraction["LocalAttractionID"] . "/update") ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="LocalAttractionName" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="LocalAttractionName" id="LocalAttractionName" value="<?php echo $local_attraction["LocalAttractionName"] ?>" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="LocalAttractionImage" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2">
                                <input type="hidden" name="OldLocalAttractionImage" value="<?php echo $local_attraction["LocalAttractionImage"] ?>">
                                <input type="file" name="LocalAttractionImage" id="LocalAttractionImage" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="LocalAttractionDescription" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea rows="4" name="LocalAttractionDescription" id="LocalAttractionDescription" class="input-box"><?php echo $local_attraction["LocalAttractionDescription"] ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Update Local Attraction</button>
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