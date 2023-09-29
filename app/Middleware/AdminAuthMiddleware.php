<?php 

namespace App\Middleware;

class AdminAuthMiddleware {
    public function handle(){
        if(!authAdmin()){
            return redirect("/admin/login");
        }
    }
}