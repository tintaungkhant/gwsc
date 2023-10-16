<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Contact Us</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <?php if (authUser()) { ?>
                    <?php
                    $user = authUser();
                    $first_name = $user["UserFirstName"];
                    $surname = $user["UserLastName"];
                    $email = $user["UserEmail"];
                    ?>
                    <form action="/post-contact" method="POST">
                        <div class="mb-3">
                            <label for="ContactType" class="block text-sm font-medium leading-6 text-gray-900">Issue</label>
                            <div class="mt-2">
                                <select name="ContactType" id="ContactType" class="input-box">
                                    <option value="account">Account Login or Registration</option>
                                    <option value="booking">Booking Problem</option>
                                    <option value="payment">Payment Problem</option>
                                    <option value="payment">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ContactFirstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                            <div class="mt-2">
                                <input type="text" name="ContactFirstName" disabled value="<?php echo $first_name ?>" id="ContactFirstName" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ContactLastName" class="block text-sm font-medium leading-6 text-gray-900">Surname</label>
                            <div class="mt-2">
                                <input type="text" name="ContactLastName" disabled value="<?php echo $surname ?>" id="ContactLastName" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ContactEmail" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="ContactEmail" disabled value="<?php echo $email ?>" id="ContactEmail" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ContactDescription" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea rows="4" name="ContactDescription" id="ContactDescription" class="input-box"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mt-2">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="Agreed" value="1" name="Agreed" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="Agreed" class="font-medium text-gray-900">By selecting this, you agree to our <a href="/privacy-policy" class="font-semibold text-indigo-600">privacy policy</a>.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Submit</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <a href="/login" class="mt-3 btn-default">Login to contact us</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>