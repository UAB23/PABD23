<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <!-- Add your CSS and JS includes here -->
</head>
<body>
    <h1>Forum</h1>

    <?php foreach ($categories as $category): ?>
        <h2><?php echo $category->name; ?></h2>
        <ul>
            <?php foreach ($latestThreads[$category->id] as $thread): ?>
                <li>
                    <a href="/threads/<?php echo $thread->id; ?>"><?php echo $thread->title; ?></a>
                    <p>Posted by: <?php echo $thread->user->name; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

    <!-- Add more HTML content as needed -->

</body>
</html>