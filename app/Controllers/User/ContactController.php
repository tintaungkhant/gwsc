<?php

namespace App\Controllers\User;

use App\Models\Contact;
use App\Models\Site;

class ContactController
{
    public function index()
    {
        return view("user.contact.index");
    }

    public function contact(){
        $data = request()->all();

        $validator = validator($data, [
            "ContactType" => ["required"],
            "ContactFirstName" => ["required"],
            "ContactLastName" => ["required"],
            "ContactEmail" => ["required"],
            "ContactDescription" => ["required"],
            "Agreed" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/contact");
        }

        unset($data["Agreed"]);

        $contact = new Contact;
        $contact = $contact->create($data);

        return view("user.contact.success");
    }
}
