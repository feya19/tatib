<?php
namespace App\Models;

class Profil
{
    public function getUserData()
    {
        // Retrieve user data from session
        return \Core\Session::get('userdata');
    }
}
