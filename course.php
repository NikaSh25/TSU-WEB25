<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses | SkillBoost</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
    <?php require_once 'php/header.php' ?>
    <main>
        <section class="course-hero">
            <h2 class="course-hero__title">Courses</h2>
            <p class="course-hero__text">
                Go Beyond Basics—Unlock Expert Knowledge </p>
        </section>
        <?php
        if (!isset($_GET['slug'])) {
            die('No Post Specified In URL');
        }
        $slug = $_GET['slug'];
        $coursesJSON = file_get_contents(__DIR__ . "/courses/courses.json");
        $courses = json_decode($coursesJSON, true);

        $course = null;
        foreach ($courses as $c) {
            if ($c['slug'] == $slug) {
                $course = $c;
            }
        }
        if (!$course) {
            die('Post not found');
        }
        ?>

        <section class="course-details">
            <h2 class="course-details__title"><?php echo htmlspecialchars($course['title']) ?></h2>
            <div class="course-details__container">
                <video class="course-details__video" controls>
                    <source src="<?php echo htmlspecialchars($course['video']) ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="course-details__wrapper">
                    <div class="course-details__time">
                        <span class="course-details__lessons"><?php echo htmlspecialchars($course['lessons']) ?> lessons</span>
                        <span class="course-details__duration"><?php echo htmlspecialchars($course['duration']) ?></span>
                    </div>
                    <p class="course-details__author">By <?php echo htmlspecialchars($course['author']) ?></p>
                    <strong class="course-details__price">$<?php echo htmlspecialchars($course['price']) ?></strong>
                    <form action="php/add_to_cart.php" method="post">
                        <input type="hidden" name="slug" value="<?php echo htmlspecialchars($slug) ?>">
                        <button type="submit" class="course-details__cart">Add To Cart</button>
                    </form>
                </div>
            </div>
            <p class="course-details__overview"><?php echo htmlspecialchars($course['overview']) ?></p>
        </section>

    </main>
    <?php require_once 'php/footer.php' ?>
    <script src="js/script.js"></script>
</body>

</html>