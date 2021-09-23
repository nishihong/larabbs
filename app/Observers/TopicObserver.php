<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // dd($topic->body);
        $topic->body = clean($topic->body, 'user_topic_body'); //????好像没生效
        // dd($topic->body);

        $topic->excerpt = make_excerpt($topic->body);
    }
}
