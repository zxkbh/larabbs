<?php

namespace App\Http\Controllers\Api;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Transformers\TopicTransformer;
use App\Http\Requests\Api\TopicRequest;

class TopicsController extends Controller
{
	//添加话题
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $this->user()->id;
        $topic->excerpt = '测试';//自己添加
        $topic->save();

        return $this->response->item($topic, new TopicTransformer())
            ->setStatusCode(201);
    }

    //编辑话题
    public function update(TopicRequest $request, Topic $topic)
	{
	    $this->authorize('update', $topic);

	    $topic->update($request->all());
	    return $this->response->item($topic, new TopicTransformer());
	}

    //删除话题
    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);

        $topic->delete();
        return $this->response->noContent();
    }


}
