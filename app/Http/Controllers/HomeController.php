<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;
use App\Models\ForumComment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $forum = new Forum();
        $results = $forum->getForums();

        return view('Home', compact('results'));
    }

    public function ForumDetail($forum_id)
    {
        $forum = Forum::where('forum_id', $forum_id)->first();
        $results = ForumComment::where('forum_id', $forum_id)->get();

        return view('ForumDetail', compact('forum','results'));
    }

    public function SaveForumDetailAction(Request $request, $forum_id)
    {
        $comment = new ForumComment();

        $comment->forum_id = $forum_id;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->user_id;
        $comment->created_at = Carbon::now();
        $comment->updated_at = Carbon::now();

        $comment->save();

        return redirect()->to('forum-detail/'.$forum_id);
    }

    public function NewForum()
    {
        $forum = null;

        return view('EditForum', compact('forum'));
    }

    public function EditForum($forum_id)
    {
        $forum = Forum::where('forum_id', $forum_id)->first();

        return view('EditForum', compact('forum'));
    }

    public function NewForumAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'classCode' => 'required|exists:learning_classes,class_code',
            'image' => 'required|max:2048',

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $image = $request->file('image');
        $imageName = Carbon::now()->timestamp.'_'.$image->getClientOriginalName();
        Storage::putFileAs('public/files/forums/', $image, $imageName);


        $forum = new Forum();
        $forum->title = $request->title;
        $forum->forum_description = $request->description;
        $forum->class_code = $request->classCode;
        $forum->forum_image = $imageName;

        $forum->save();

        return redirect()->to('/')->with(['success' => 'Forum Saved!']);
    }

    public function EditForumAction(Request $request, $forum_id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'classCode' => 'required|exists:learning_classes,class_code',
            'image' => 'max:2048',

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $image = $request->file('image');

        if($image != null){
            $imageName = Carbon::now()->timestamp.'_'.$image->getClientOriginalName();
            Storage::putFileAs('public/files/forums/', $image, $imageName);
        }
        else{
            $imageName = Forum::where('forum_id', $forum_id)->first()->forum_image;
        }

        Forum::where('forum_id', $forum_id)
        ->update(['title' => $request->title, 'forum_description' => $request->description,
        'class_code' => $request->classCode, 'forum_image' => $imageName]);


        return redirect()->to('/')->with(['success' => 'Forum Saved!']);
    }

    public function DeleteForumAction($forum_id)
    {
        $result = Forum::where('forum_id', $forum_id)->delete();

        if($result > 0)
            return redirect()->to('/')->with(['success' => 'Forum Deleted!']);
        else
            return redirect()->to('/')->with(['fail' => 'Delete Forum Failed!']);
    }
}
