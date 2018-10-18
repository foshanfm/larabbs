<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ReplyTransformer;
use App\Http\Requests\Api\ReplyRequest;
use App\Models\Topic;
use App\Models\Reply;

class RepliesController extends Controller
{
    //
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
    	$reply->content = $request->content;
    	$reply->topic_id = $topic->id;
    	$reply->user_id = $this->user()->id;
    	$reply->save();

    	return $this->response->item($reply, new ReplyTransformer())
    		->setStatusCode(201);
    }
}