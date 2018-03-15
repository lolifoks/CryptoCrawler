<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 3/7/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    public function postComment(Request $request, $postId)
    {
        if ($request->get("text")) {
            $commentsModel = new Comment();
            $commentsModel->text = $request->get("text");
            $commentsModel->post_id = $postId;
            try {
                $commentsModel->save();
                return redirect()->back()->with('success', "Comment added successfully.");
            } catch (QueryException $e) {
                \Log::error("Greska pri dodavanju komentara " . $e->getMessage());
                return redirect()->back()->with('warning', "Server error.". $e->getMessage());
            }

        }
        return redirect()->back()->with('warning', "Poruka ne sme biti prazna.");
    }

    public function editComment(Request $request, $commentId)
    {
        $commentModel = new Comment();
        try {
            $commentModel->text = $request->get('text');
            $commentModel->update($commentId);
            return response(null, 200);
        } catch (\Exception $e) {
            \Log::error("Greska pri izmeni komentara " . $e->getMessage());
            return response(null, 422);
        }

    }

    public function deleteComment($commentId)
    {
        $commentModel = new CommentsModel();
        if ($commentModel->find($commentId)) {
            try {
                if ($commentModel->delete($commentId)) {
                    return redirect()->back()->with("success", "Comment successfully deleted.");
                } else {
                    \Log::critical("Korisnik bez dozvoljenih prava pokusao da obrise komentar.");
                    return redirect()->back()->with("warning", "An error has occurred, please try again later.");
                }
            } catch (QueryException $e) {
                \Log::error("Greska pri brisanju komentara  " . $e->getMessage());
                return redirect()->back()->with("warning", "An error has occurred, please try again later.");
            }
        }
        return redirect()->back();
    }

    public function show($commentId)
    {
        $commentModel = new Comment();
        return response()->json($commentModel->find($commentId));
    }
}