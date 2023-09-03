<?php

namespace App\Models;

class Admin {
    protected $table = "Admins";

    protected $primaryKey = "AdminID";

    public function firstByUsernameAndPassword($username, $hasedPassword){
        $query = "SELECT * FROM $this->table WHERE AdminUsername = '$username' AND AdminPassword = '$hasedPassword'";

        return db()->query($query)->first();
    }
}