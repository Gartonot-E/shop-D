<? get_header() ?>

<section class="cs_about cs_blocks_structure">
    <div class="container">
        <h2 class="title"><?=$post->post_title;?></h2>
        <h2 class="sub-title">ЧТО МЫ МОЖЕМ РАССКАЗАТЬ О СЕБЕ</h2>
        <p><?=$post->post_content?></p>

        <? $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <img style="width: 100%;" src="<?=$img[0]?>">

    </div>
</section>

<? get_footer() ?>