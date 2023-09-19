<?php

namespace App\Models;

class Admin extends Model
{
    protected $table = "admins";

    protected $primaryKey = "AdminID";

    public function firstByUsernameAndPassword($username, $hasedPassword)
    {
        $query = "SELECT * FROM $this->table WHERE AdminUsername = '$username' AND AdminPassword = '$hasedPassword'";

        return db()->query($query)->first();
    }
}
