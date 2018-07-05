<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
    	return $user->isAuthorOf($topic);
        //return $topic->user_id == $user->id;
        //return true;
    }

    public function destroy(User $user, Topic $topic)
    {
    	return $user->isAuthorOf($topic);
    	//return $topic->user_id == $user->id;
        //return true;
    }

    //删除话题 删除话题的所有回复
    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}
