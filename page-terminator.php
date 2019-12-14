<?php
/**
 * Template Name: Страница терминатор
 *
 */
if( !is_super_admin() ){
    echo "error. Access denied";
    exit();
}

if( isset($_POST['ajax'])){
    get_template_part('includes/delete-feed-ajax');
    exit();
}



get_header(); ?>

<div class="container inner-page my-5">



<?php 
if( isset($_GET['terminate'])){

    $feed_url = urldecode($_GET['terminate']);



    $filter_array = array(
        array(
            'key'   => 'xml-feed',
            'value' => $feed_url,
        )
    );

    $target = array(
        'posts_per_page' => -1,
        'post_type' => 'any',
        'meta_query' => [
            'relation' => 'AND',
            $filter_array,
        ],
    );


    $enemy = get_posts( $target );

    $outputHtml = "";

    if($enemy){

        if(isset($_GET['yes'])){ ?>

        <div class="alert alert-success" role="alert">
            Запрос на удаление объявлений из XML-фида: <?php echo $feed_url; ?> выполнен<br>
            Список удаленных объявлений представлен ниже:
        </div>
        <div class="text-center my-4">
            <div class="btn-group btn-group-lg" role="group">
                <a href="<?php echo get_permalink(164); ?>" class="btn btn-success">Вернуться к XML-фидам</a>
            </div>
        </div>
        <ul class="list-group">
        <?php
            foreach ($enemy as $key=>$post) {
                
                wp_delete_post( $post->ID, true );
                echo '<li class="list-group-item">Удалено: ' . $post->post_title . "</li>";
            }
            echo "</ul>";
        } else {

            ?>

            <div class="alert alert-danger" role="alert">
                Вы собираетесь удалить все объявления добавленные XML-фидом: <?php echo $feed_url; ?><br>
                Объявления будут удалены без возможности восстановления.<br>
                Всего: <?php echo count($enemy); ?> шт. Список удаляемых объявлений представлен ниже:
            </div>
            <div class="text-center my-4">
                <div class="btn-group btn-group-lg" role="group">
                    <a href="<?php echo add_query_arg(["yes" => 1]); ?>" class="btn btn-danger">Подтвердить удаление</a>
                    <a href="<?php echo get_permalink(164); ?>" class="btn btn-light">Вернуться к XML-фидам</a>
                </div>
            </div>
            <ul class="list-group">
            <?php
            foreach ($enemy as $key=>$post) {
                
                echo '<li class="list-group-item"><a class="text-dark" href="' . get_permalink($post->ID) . '">' . $post->post_title . "</a></li>";
            
            }
            echo "</ul>";
        }

        
    } else { ?>
            <div class="alert alert-danger" role="alert">
               Постов из данного XML не найдено
            </div>
            <div class="text-center my-4">
                <div class="btn-group btn-group-lg" role="group">
                    <a href="<?php echo get_permalink(164); ?>" class="btn btn-info">Вернуться к XML-фидам</a>
                </div>
            </div>
    <?php }


} else { ?>

    <div class="alert alert-danger" role="alert">
        Ошибка. Не передан XML фид для удаления
    </div>
    <div class="text-center my-4">
        <div class="btn-group btn-group-lg" role="group">
            <a href="<?php echo get_permalink(164); ?>" class="btn btn-success">Вернуться к XML-фидам</a>
        </div>
    </div>

<?php } ?>



</div>

<?php get_footer();