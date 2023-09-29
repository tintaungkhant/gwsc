<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Homepage</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Campsite</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">Campsite</span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Pitch</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">Campsite</span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Features</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">Campsite, Campsite, Campsite, Campsite</span>
                    </div>
                    <div class="mb-3">
                        <span class="inline-block text-sm font-medium leading-6 text-gray-900 w-full md:w-32">Price</span>
                        <span class="text-sm leading-6 text-gray-900 hidden md:inline"> - </span>
                        <span class="text-sm leading-6 text-gray-900">$32 per person</span>
                    </div>
                </div>
                <form action="/admin/sites/store" method="POST">
                    <div class="mb-3">
                        <label for="SiteEmail" class="block text-sm font-medium leading-6 text-gray-900">Number of person</label>
                        <div class="mt-2">
                            <input type="number" name="SiteEmail" id="SiteEmail" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="SiteName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                        <div class="mt-2">
                            <input type="text" name="SiteName" id="SiteName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="SiteName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                        <div class="mt-2">
                            <input type="text" name="SiteName" id="SiteName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="SiteEmail" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="SiteEmail" id="SiteEmail" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="SiteDescription" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                        <div class="mt-2">
                            <textarea rows="4" name="SiteDescription" id="SiteDescription" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.header");
?>