<?php

namespace App\Models;

class User extends Model
{
    protected $table = "users";

    protected $primaryKey = "UserID";

    public function firstByUsernameAndPassword($email, $hasedPassword)
    {
        $query = "SELECT * FROM $this->table WHERE UserEmail = '$email' AND UserPassword = '$hasedPassword'";

        return db()->query($query)->first();
    }
}
