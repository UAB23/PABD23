<?php

use Illuminate\Database\Seeder;
use config\Models\Category;
use config\Models\Thread;
use config\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Categories
        $category1 = Category::create([
            'name' => '- probleme intampinate'
        ]);

        $category2 = Category::create([
            'name' => '- symphony'
        ]);

        // Create Posts in the symphony category
        $thread1 = Thread::create([
            'title' => 'First Thread',
            'content' => 'This is the first thread in the symphony category',
            'category_id' => $category2->id
        ]);

        Post::create([
            'content' => 'This is a post in the first thread of the symphony category',
            'thread_id' => $thread1->id
        ]);

        $thread2 = Thread::create([
            'title' => 'Second Thread',
            'content' => 'This is the second thread in the symphony category',
            'category_id' => $category2->id
        ]);

        Post::create([
            'content' => 'This is a post in the second thread of the symphony category',
            'thread_id' => $thread2->id
        ]);

    }
}