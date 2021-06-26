<?php

namespace App\Http\Controllers\API;

use App\Defines\Comment;
use App\Events\CommentEvent;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $comment = $request->get('comment');

        $validator = Validator::make($comment, [
            'commentable_id' => 'numeric',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $type = null;

        switch ($comment['commentable_type']) {
            case Comment::LESSON:
                $type = Lesson::class;
        }

        if (is_null($type)) return response()->json([], Response::HTTP_BAD_REQUEST);

        try {
            $result = \App\Models\Comment::create([
                'content' => $comment['content'],
                'user_id' => Auth::user()->id,
                'commentable_id' => $comment['commentable_id'],
                'commentable_type' => $type
            ]);
        } catch (\Exception $exception) {
            return response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        event(new CommentEvent($result, $comment['commentable_id']));

        return response()->json([
            'data' => $result
        ], Response::HTTP_OK);
    }
}
