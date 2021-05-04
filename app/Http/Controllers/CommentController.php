<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function index()
    {
        return Auth::user()->role == 1 ?
            redirect()->route('user.comments') :
            redirect()->route('business.comments');
    }

    function create(Business $business)
    {
        return view('comment.create', ['business' => $business]);
    }

    function store(Request $request, Business $business)
    {

        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $app = new comment([

            'user_id' => Auth::user()->id,
            'bus_id' => $business->id,
            'comment' => $request->input('comment'),
        ]);

        $user = User::find(Auth::user()->id);
        $user->comments()->save($app);

        return redirect()
            ->route('user.comments')
            ->with('success', "Created comment for {$business->name}");
    }

    function edit(Request $request, Comment $com)
    {
        return view('comment.edit', ['com' => $com]);
    }

    function update(Request $request, Comment $com)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        $com->comment = $request->input('comment');
        $com->save();

        return redirect()->route('user.comments');
    }

    function delete(Request $request, Comment $com)
    {
        $com->delete();
        return redirect()
            ->route('user.comments')
            ->with('success', "Deleted comment for {$com->business->name}");
    }
}
