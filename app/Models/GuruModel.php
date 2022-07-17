<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuruModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_guru')->get();
    }

    public function detailData($idGuru)
    {
        return DB::table('tbl_guru')->where('id_guru', $idGuru)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_guru')->insert($data);
    }

    public function editData($data)
    {
        DB::table('tbl_guru')->where('id_guru', $data['id_guru'])->update($data);
    }

    public function deleteData($data)
    {
        DB::table('tbl_guru')->where('id_guru', $data['id_guru'])->delete();
    }
}
