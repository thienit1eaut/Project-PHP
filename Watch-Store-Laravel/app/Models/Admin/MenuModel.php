<?php

namespace App\Models\Admin;

use App\Models\Admin\AdminModel;

class MenuModel extends AdminModel
{
    protected $table = 'menu';

    protected $fillable = ['id','name','link','clazz','img','icon','parent','ord','note','group_id','act','hot','nofollow','content','created_at','updated_at'];

}
