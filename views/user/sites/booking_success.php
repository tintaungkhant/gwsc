<?php

view("user.layout.header");
?>

<div>
    <div class="rounded-md bg-green-50 p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fa-regular fa-circle-check text-lg text-green-800"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">Booking Complete</p>
            </div>
        </div>
    </div>
    <div class="flow-root mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Booking ID</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $booking["BookingID"] ?></span>
                    </div>
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
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Number of person</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $booking["BookingSlot"] ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Total Price</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm font-bold leading-6 text-green-600">$<?php echo $booking["BookingSlot"] * $pitch_type["Fee"] ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">First Name</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $booking["BookingFirstName"] ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Last Name</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $booking["BookingLastName"] ?></span>

                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Email</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900"><?php echo $booking["BookingEmail"] ?></span>
                    </div>

                    <div class="mb-3">
                        <spam class="text-sm font-medium leading-6 text-gray-900">Note</spam>
                        <p><?php echo $booking["BookingNote"] ?></p>
                    </div>
                    <div class="mb-3">
                        <a href="/sites" class="btn-default">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>