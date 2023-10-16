<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Booking</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Campsite</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $site["SiteName"] ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Pitch</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $pitch_type["PitchTypeName"] ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Features</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">
                            <?php foreach ($site["features"] as $index => $feature) : ?>
                                <?php echo $feature["FeatureName"];
                                echo $index + 1 < count($site["features"]) ? ", " : "" ?>
                            <?php endforeach ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Price</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">$<?php echo $pitch_type["Fee"] ?> per person</span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Slot</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $pitch_type["Slot"] ?> slot(s) left</span>
                    </div>
                </div>
                <?php
                $user = authUser();
                if ($user) {
                    $first_name = $user["UserFirstName"];
                    $surname = $user["UserLastName"];
                    $email = $user["UserEmail"];
                } else {
                    $first_name = "";
                    $surname = "";
                    $email = "";
                }
                ?>
                <form action="/sites/<?php echo $site["SiteID"] ?>/post-book" method="POST">
                    <input type="hidden" name="BookingSiteID" value="<?php echo $site["SiteID"] ?>">
                    <input type="hidden" name="BookingPitchTypeID" value="<?php echo $pitch_type["PitchTypeID"] ?>">
                    <div class="mb-3">
                        <label for="BookingSlot" class="block text-sm font-medium leading-6 text-gray-900">Number of person</label>
                        <div class="mt-2">
                            <input type="number" max="<?php echo $pitch_type["Slot"] ?>" name="BookingSlot" id="BookingSlot" class="input-box">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="BookingFirstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                        <div class="mt-2">
                            <input type="text" name="BookingFirstName" value="<?php echo $first_name ?>" id="BookingFirstName" class="input-box">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="BookingLastName" class="block text-sm font-medium leading-6 text-gray-900">Surname</label>
                        <div class="mt-2">
                            <input type="text" name="BookingLastName" value="<?php echo $surname ?>" id="BookingLastName" class="input-box">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="BookingEmail" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="BookingEmail" value="<?php echo $email ?>" id="BookingEmail" class="input-box">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="BookingNote" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                        <div class="mt-2">
                            <textarea rows="4" name="BookingNote" id="BookingNote" class="input-box"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn-default">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>