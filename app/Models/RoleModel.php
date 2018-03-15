<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 04-Feb-18
 * Time: 01:08
 */

namespace App\Models;


class RoleModel
{
    public $name;

    public function selectAll()
    {
        return \DB::table("role")->get();
    }

    public function insert()
    {
       return \DB::table('role')
            ->insertGetId([
               'name' => $this->name
            ]);
    }

    public function delete($id)
    {
        return \DB::table("role")
            ->delete($id);
    }

    public function update($id)
    {
        return \DB::table('role')
            ->update([
               'name' => $this->name
            ]);
    }

    public function selectOne($id)
    {
        return \DB::table('role')
            ->where('id', $id)
            ->get()
            ->first();
    }
}