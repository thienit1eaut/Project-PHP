<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class SysAccount extends AdminModel
{
    protected $fillable = ['id','name','username','password','group','act','role','email','img','note','created_at','updated_at'];
    protected $table = 'sys_account';

    public function getUserSystemAdmin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('act', 1);
        $q = $this->db->get();
        $arr = $q->toArray();
        if(count($arr) > 0) {
            return $arr;
        }
        else {
            return array();
        }
    }
}