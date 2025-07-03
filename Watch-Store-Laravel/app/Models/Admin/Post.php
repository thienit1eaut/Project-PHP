<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','name','img','act','created_at','updated_at'];
    //protected $table = 'sys_account';

    public function __construct()
    {
        dd($this);
    }
}