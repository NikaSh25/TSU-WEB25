<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News And Blogs | SkillBoost</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
    <?php require_once 'php/header.php' ?>
    <main>
        <section class="blog-hero">
            <h2 class="blog-hero__title">News and Blog</h2>
            <p class="blog-hero__text">
                "Explore inspiring stories and practical advice designed to fuel your
                continuous growth."
            </p>
        </section>
        <?php
        if (!isset($_GET['slug'])) {
            die('No Post Specified In URL');
        }
        $slug = $_GET['slug'];
        $postsJson = file_get_contents(__DIR__ . '/blogs/posts.json');
        $posts = json_decode($postsJson, true);

        $post = null;
        foreach ($posts as $p) {
            if ($p['slug'] === $slug) {
                $post = $p;
                break;
            }
        }
        if (!$post) {
            die('Post not found');
        }
        ?>

        <article class="post">
            <h3 class="post__name"><?php echo htmlspecialchars($post['title']); ?></h3>
            <img
                class="post__image"
                src="<?php echo htmlspecialchars($post['image']); ?>"
                alt="<?php echo htmlspecialchars($post['alt']); ?>" />
            <div class="post__details">
                <p class="post__author-name">By <?php echo htmlspecialchars($post['author']); ?></p>
                <time class="post__author-date" datetime="<?php echo htmlspecialchars($post['date']); ?>">
                    <?php echo htmlspecialchars($post['date']); ?>
                </time>
            </div>

            <p class="post__text">
                <?php echo nl2br(htmlspecialchars($post['content'])); ?>
            </p>
        </article>



    </main>
    <?php require_once 'php/footer.php' ?>
    <script src="js/script.js"></script>
</body>

</html>