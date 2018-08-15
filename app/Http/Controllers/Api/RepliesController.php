<?php

namespace App\Http\Controllers\Api;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Reply;
use App\Models\User;
use App\Http\Requests\Api\ReplyRequest;
use App\Transformers\ReplyTransformer;

class RepliesController extends Controller
{
	// 回复话题
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic_id = $topic->id;
        $reply->user_id = $this->user()->id;
        $reply->save();

        return $this->response->item($reply, new ReplyTransformer())
            ->setStatusCode(201);
    }

    // 删除话题
    public function destroy(Topic $topic, Reply $reply)
    {
        if ($reply->topic_id != $topic->id) {
            return $this->response->errorBadRequest();
        }

        $this->authorize('destroy', $reply);
        $reply->delete();

        return $this->response->noContent();
    }

    //回复列表(游客可见)
    public function index(Topic $topic)
	{
	    $replies = $topic->replies()->paginate(20);

	    return $this->response->paginator($replies, new ReplyTransformer());
	}

	//某用户的所有回复信息
	public function userIndex(User $user)
	{
	    $replies = $user->replies()->paginate(20);

	    return $this->response->paginator($replies, new ReplyTransformer());
	}
}
