<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 2/15/2018
 * Time: 9:46 PM
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Menu
{
    public function getAll(){
        $result = DB::select("SELECT * FROM menu");
        return $result;
    }

    public $position;
    public $route;
    public $name;
    private $table = 'menu';

    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'link' => $this->route,
                'parent' => $this->position,
                'name' => $this->name
            ]);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
                'link' => $this->route,
                'parent' => $this->position,
                'name' => $this->name
            ]);
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function all()
    {
        return \DB::table($this->table)
            ->orderBy("parent", "asc")
            ->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)->where('id', $id)->get()->first();
    }

}