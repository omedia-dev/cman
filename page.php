<?php
get_header();

// Hero Search

?>

  <div class="container inner-page">
    
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="link-default">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
      </ol>
    </nav>

    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php if(get_field('inner-img')) : ?>
    <img src="<?php the_field('inner-img'); ?>" alt="<?php the_title(); ?>" class="img-fluid post-thumb">
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>
    <div class="content pb-3">
        <?php the_content(); ?>
    </div> <!-- //.content -->
    <?php endwhile; ?>



    <?php if (have_rows('feat')) : ?>
    <section class="section-features">
        <h2 class="section-title"><?php the_field('feat-title'); ?></h2>
        <div class="row">

            <?php while (have_rows('feat')) : the_row(); ?>
            <div class="col-md-4 mb-5">
                <div class="bg-grey">
                <div class="row feature-item">
                    <div class="col-3 col-md-3">
                    <img src="<?php the_sub_field('icon'); ?>" alt="" class="float-md-left">
                    </div>
                    <div class="col-8 col-md-9">
                    <h4><?php the_sub_field('title'); ?></h4>
                    <p><?php the_sub_field('descr'); ?></p>
                    </div>
                </div>
                </div> <!-- //.bg-grey -->
            </div> <!-- //.col -->
            <?php endwhile; ?>

        </div> <!-- //.row -->
    </section> <!-- //.section-features -->
    <?php endif; ?>


    <?php get_template_part('/includes/contacts-tabs'); ?>
    
  </div> <!-- //.container -->



<!-- //Hero Search -->
<?php


get_footer(); ?>