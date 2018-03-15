<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 2/17/2018
 * Time: 12:56 AM
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class User
{
    public $username;
    public $password;
    public $email;
    public $table = 'users';

    public function save() {
        return \DB::table($this->table)->insertGetId([
            'name' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'role_id' => 2

        ]);
        return $result;
    }

    public function login()
    {
        return \DB::table($this->table)
            ->join("roles", "users.role_id", "=", "role.id")
            ->where([
                ['username', '=', $this->username],
                ['password', '=',md5($this->password)]
            ])->select("users.*", "role.name as role")
            ->get()->first();
    }

    public function selectAll()
    {
        return \DB::table($this->table)
            ->join("role", "role_id", "=", "role.id")
            ->select("users.*", "role.name")
            ->get();
    }

    public function selectOne($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)->first();
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)
            ->update([

                'name' => $this->last_name,
                'password' => md5($this->password),
                'email' => $this->email,

                'role_id' => 2
            ]);
    }

}