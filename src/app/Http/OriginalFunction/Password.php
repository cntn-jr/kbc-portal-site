<?php

use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

    function checkPasswordAdmin($password1, $password2){
        $admin = Administrator::first();
        if(Hash::check($password1, $admin->password1) && Hash::check($password2, $admin->password2))
            return true;
        return false;
    }