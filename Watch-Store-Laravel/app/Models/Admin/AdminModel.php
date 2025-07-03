<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $fillable = [];

    public function getDataIntable($table, $pp) {

        return DB::table($table)->paginate($pp);

    }

    public function insertData($dataInsert, $table) {

        //dd(DB::table($table));

        try {

            DB::beginTransaction();

            $lastId = DB::table($table)->insertGetId($dataInsert);

            DB::commit();

            return $lastId;

        } catch (\Exception $e) {

            //echo $e;

            DB::rollBack();

            return -1;

        }
        
    }

    public function getTagInNuyRountes($link = null, $id = null, $table = null, $ext = null) {

        $query = DB::table('routes');

        if (!is_null($link)) {
            $query->where('link', $link);
        }

        if (!is_null($id)) {
            $query->where('tag_id', '!=', $id);
        }

        if (!is_null($table)) {
            $query->where('table', $table);
        }

        return $query->get()->toArray();

    }
}