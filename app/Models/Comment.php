<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 3/7/2018
 * Time: 9:08 PM
 */

namespace App\Models;

use Illuminate\Support\Facades\Auth;
class Comment
{
    public $text;
    public $post_id;
    private $table = 'comment';


    public function save()
    {
        return \DB::table($this->table)
            ->insert([
                'text' => $this->text,
                'post_id' => $this->post_id,
                'user_id' => auth::id(),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
                'content' => $this->content,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function getPostComments($postId)
    {
        return \DB::table($this->table)
            ->join("users", "comment.user_id", "=", "users.id")
            ->where('post_id', $postId)
            ->select('comment.*', 'users.name')
            ->get();
    }

    public function delete($id)
    {
        if($this->canUserDeleteComment($id)) {
            return \DB::table($this->table)->delete($id);
        }
        return 0;
    }

    public function getUserComments($userId)
    {
        return \DB::table($this->table)->where('user_id', $userId)->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)->get()->first();
    }
    private function canUserDeleteComment($commentId)
    {
        $comment = $this->find($commentId);

        return $comment ? (session()->get('user')->role == 'admin') || ($comment->user_id == session()->get('user')->id) : false;
    }
}