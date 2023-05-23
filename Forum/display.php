<?php

use config\Models\Category;
use config\Models\Thread;
use config\Models\Post;

// Fetch the categories from the database
$categories = Category::all();

// Fetch the latest threads for each category
$latestThreads = [];
foreach ($categories as $category) {
    $latestThreads[$category->id] = Thread::where('category_id', $category->id)->latest()->take(5)->get();
}

// Render the forum content using an HTML template
require_once 'path/to/your/template/forum_template.php';