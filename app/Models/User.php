<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public function tableName(): string
    {
        return 'users';
    }
}