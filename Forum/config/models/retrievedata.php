<?php

use config\Models\Category;
use config\Models\Thread;
use config\Models\Post;
use config\Models\User;

$categories = Category::all();

$thread = new Thread();
$thread->title = 'New Thread';
$thread->content = 'Thread content';
$thread->category_id = 1; // Assuming category with ID 1 exists
$thread->save();

$posts = Thread::find(1)->posts;

$user = Post::find(1)->user;