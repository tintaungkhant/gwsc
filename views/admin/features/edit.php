<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Feature</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="<?php echo route("admin/features/" . $feature["FeatureID"] . "/update") ?>" method="POST">
                        <div class="mb-3">
                            <label for="FeatureName" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="FeatureName" id="FeatureName" value="<?php echo $feature["FeatureName"] ?>" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="FeatureIcon" class="block text-sm font-medium leading-6 text-gray-900">Icon</label>
                            <div class="mt-2">
                                <input type="text" name="FeatureIcon" id="FeatureIcon" value="<?php echo $feature["FeatureIcon"] ? htmlspecialchars($feature["FeatureIcon"], ENT_QUOTES, 'UTF-8') : "" ?>" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="FeatureDescription" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea rows="4" name="FeatureDescription" id="FeatureDescription" class="input-box"><?php echo $feature["FeatureDescription"] ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Update Feature</button>
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