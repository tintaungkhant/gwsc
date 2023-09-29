<?php 

namespace App\Middleware;

class UserAuthMiddleware {
    public function handle(){
        if(!authUser()){
            return redirect("/login");
        }
    }
}