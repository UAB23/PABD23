<?php
require 'vendor/autoload.php';

use Illuminate\View\Factory;

$views = __DIR__ . '/views'; // Specify the path to your Blade template files
$cache = __DIR__ . '/cache'; // Specify the path to store the compiled Blade views

$blade = new Factory(new \Illuminate\Filesystem\Filesystem(), $cache);
$blade->addNamespace('default', $views);

$data = [
    'categories' => $forum->getCategories(),
    'threads' => $forum->getThreads(1),
    'posts' => $forum->getPosts(1)
];

$html = $blade->make('default.forum', $data)->render();
echo $html;

<h1>Forum</h1>

<h2>Categories</h2>
<ul>
    @foreach ($categories as $category)
        <li>{{ $category['name'] }}</li>
    @endforeach
</ul>

<h2>Threads</h2>
<ul>
    @foreach ($threads as $thread)
        <li>{{ $thread['title'] }}</li>
    @endforeach
</ul>

<h2>Posts</h2>
<ul>
    @foreach ($posts as $post)
        <li>{{ $post['content'] }}</li>
    @endforeach
</ul>