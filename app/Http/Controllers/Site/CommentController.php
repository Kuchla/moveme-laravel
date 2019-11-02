<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\Place;
use App\Models\Site\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->dataComment['model_name'] == 'place') {
            $model = Place::where('id', $request->dataComment['model_id'])->first();
        } else {
            $model = Event::where('id', $request->dataComment['model_id'])->first();
        }

        $model->comments()->create([
            'text' => $request->dataComment['text'],
            'user_id' => Auth::id()
        ]);

        $modelName = $request->dataComment['model_name'];

        return view('site.home.partials._comments', compact('model', 'modelName'));
    }

    public function destroy(Request $request, Comment $comment)
    {
        $model = $comment->commentable;
        $comment->delete();

        $modelName = $request->modelName;

        return view('site.home.partials._comments', compact('model', 'modelName'));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->validation($request);

        $comment->text = $request->comment['text'];
        $comment->update();

        return back();
    }

    public function validation(Request $request)
    {
        $request->validate([
            'comment.text'       => 'required|min:4|max:50',
        ]);
    }
}
