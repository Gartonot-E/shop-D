<? get_header() ?>

<section class="about-company">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="title"><?=$post->post_title;?></h2>
                <h2 class="sub-title">Наша миссия</h2>
                <p><?=$post->post_content?></p>
            </div>
            <div class="col-md-4">
                <p>200</p>
                <p>миллионов</p>
                <p>человек ежегодно посещают наши магазины</p>
            </div>
        </div>
        
        <? $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <img style="width: 100%;" src="<?=$img[0]?>">

    </div>
</section>

<? get_footer() ?>