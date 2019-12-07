<?php get_header(); ?>
<div class="container inner-page mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php wp_title(""); ?></li>
        </ol>
    </nav>
    <?php while (have_posts()) : the_post(); ?>
        <!-- <h1 class="page-title"><?php wp_title(""); ?></h1> -->
        <div class="text content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>