<?php

namespace App\Controllers\User;

use App\Models\User;

class LoginController
{
    public function index()
    {
        return view("user.login");
    }

    public function login(){
        if($this->isLocked()){
            $this->setLoginAttempts(0);

            setErrorMessages([
                "common" => ["Too many login fails. Try again in ".(ceil((session()->get("login_enables_at") - time()) / 60))."min!"]
            ]);

            return redirect("/login");
        }else if(!$this->getLoginAttempts()){
            $this->unlock();
        }

        $data = request()->all();

        $validator = validator($data, [
            "UserEmail" => ["required"],
            "UserPassword" => ["required"],
        ]);

        if (!$validator->validate()) {
            setErrorMessages($validator->getErrors());

            return redirect("/login");
        }

        $email = $data["UserEmail"];
        $password = $data["UserPassword"];

        $user = new User;
        $user = $user->firstByUsernameAndPassword($email, hash("md5", $password));

        if($user){
            session()->set("user", $user);
            
            return redirect("/");
        }else{
            $this->increaseLoginAttempts();

            if($this->getLoginAttempts() >= 3){
                $this->lock();

                setErrorMessages([
                    "common" => ["Too many login failed. Locked for 10min!"]
                ]);
            }else{

                setErrorMessages([
                    "common" => ["Your account credential is wrong!"]
                ]);
            }            
        }

        return redirect("/login");
    }

    protected function increaseLoginAttempts(){
        $this->setLoginAttempts($this->getLoginAttempts() + 1);
    }

    protected function getLoginAttempts(){
        return session()->get("login_attempts", 0);
    }

    protected function setLoginAttempts($attempts){
        return session()->set("login_attempts", $attempts);
    }

    protected function lock(){
        session()->set("login_enables_at", time() + 600);
    }

    protected function unlock(){
        session()->set("login_enables_at", 0);
        return session()->set("login_attempts", 0);
    }

    protected function isLocked(){
        return session()->get("login_enables_at", 0) > time();
    }
}
