<?php

namespace App\Http\Controllers;

use App\Jobs\CommentPostJob;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $data = $request->only(['subject', 'body', 'article_id']);

        $validator = Validator::make($data, [
            'subject' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], 403);
        }

        CommentPostJob::dispatch($data)->delay(now()->addMinutes(10));

        // dispatch(new CommentPostJob($data))->delay(now()->addMinutes(10));

        return response()->json(['status' => 'ok'], 200);
    }
}
