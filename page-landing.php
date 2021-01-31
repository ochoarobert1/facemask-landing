<?php

/**
 * Template Name: Page Landing
 *
 * @package facemask
 * @subpackage facemask-mk01-theme
 * @since Mk. 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <?php the_post(); ?>
    <main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
        <div class="row no-gutters">
            <section class="landing-main-banner-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade" data-aos-delay="300">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="landing-video-container col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-12 order-sm-12 order-12">
                            <?php $video_webm = get_post_meta(get_the_ID(), 'mfm_video_webm', true); ?>
                            <?php $video_mp4 = get_post_meta(get_the_ID(), 'mfm_video_webm', true); ?>

                            <video autoplay muted loop class="video">
                                <source src="<?php echo $video_webm; ?>" type="video/webm" />
                                <source src="<?php echo $video_mp4; ?>" type="video/webm" />
                            </video>

                        </div>
                        <div class="landing-text-container col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-12 order-lg-12 order-md-1 order-sm-1 order-1" data-aos="fade" data-aos-delay="300">
                            <?php the_content(); ?>
                            <div class="qr-container">
                                <?php $bg_banner_id = get_post_meta(get_the_ID(), 'mfm_qr_image_id', true); ?>
                                <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                <img src="<?php echo esc_url( plugins_url( 'img/frame.png', __FILE__ ) ); ?>" alt="QR" class="img-fluid img-arrow" data-aos="fade" data-aos-delay="600" />
                                <div class="qr-text" data-aos="fade" data-aos-delay="700"><?php echo _e('Scan this and get the app!', 'facemask'); ?></div>
                            </div>
                            <div class="store-button-container">
                                <?php $bg_banner_id = get_post_meta(get_the_ID(), 'mfm_applestore_logo_id', true); ?>
                                <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                <a href="<?php echo get_post_meta(get_the_ID(), 'mfm_appstore_link', true); ?>">
                                    <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" data-aos="fade" data-aos-delay="700" />
                                </a>
                                <?php $bg_banner_id = get_post_meta(get_the_ID(), 'mfm_googlestore_logo_id', true); ?>
                                <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                <a href="<?php echo get_post_meta(get_the_ID(), 'mfm_googlestore_link', true); ?>">
                                    <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" data-aos="fade" data-aos-delay="700" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="landing-main-slider-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade" data-aos-delay="300">
                <img src="<?php echo esc_url( plugins_url( 'img/step-container-shape1.png', __FILE__ ) ); ?>" alt="shape1" class="img-fluid shape1" />
                <img src="<?php echo esc_url( plugins_url( 'img/step-container-shape2.png', __FILE__ ) ); ?>" alt="shape2" class="img-fluid shape2" />
                <div class="container">
                    <div class="row">
                        <div class="title-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade" data-aos-delay="200">
                            <h2><?php echo get_post_meta(get_the_ID(), 'mfm_slider_section_title', true); ?></h2>
                            <hr>
                        </div>
                        <?php $arr_steps = get_post_meta(get_the_ID(), 'mfm_slider_main_group', true); ?>
                        <?php $counter = count($arr_steps); ?>
                        <?php $divider = round($counter / 2); ?>
                        <div class="steps-container col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-6 order-6">
                            <div class="steps-container-wrapper">
                                <?php $y = 1; ?>
                                <?php for ($i = 0; $i < $divider; $i++) { ?>
                                    <?php $delay = 250 * $y; ?>
                                    <?php $class = ($i == 0) ? 'active' : ''; ?>
                                    <div id="step<?php echo $i; ?>" class="step-item <?php echo $class; ?>">
                                        <div class="step-number" data-id="<?php echo $i; ?>"><?php echo ($i + 1); ?></div>
                                        <div class="step-content" data-aos="fade-left" data-aos-delay="200">
                                            <h3><?php echo $arr_steps[$i]['title']; ?></h3>
                                            <?php echo apply_filters('the_content', $arr_steps[$i]['content']); ?>
                                        </div>
                                        <div class="step-indicator"></div>
                                    </div>
                                <?php $y++;
                                } ?>
                            </div>
                        </div>
                        <div class="slider-container col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-6 order-lg-6 order-md-6 order-sm-1 order-1" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($arr_steps as $item) { ?>
                                        <div class="swiper-slide">
                                            <?php $bg_banner_id = $item['image_id']; ?>
                                            <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                            <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid img-gallery-<?php echo $i; ?>" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-scrollbar"></div>
                            </div>

                        </div>
                        <div class="steps-container col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-12 order-lg-12 order-md-12 order-sm-12 order-12">
                            <div class="steps-container-wrapper">
                                <?php $y = 1; ?>
                                <?php for ($i = $divider; $i < $counter; $i++) { ?>
                                    <?php $delay = 250 * $y; ?>
                                    <div id="step<?php echo $i; ?>" class="step-item reverse">
                                        <div class="step-content" data-aos="fade-right" data-aos-delay="<?php echo $delay; ?>">
                                            <h3><?php echo $arr_steps[$i]['title']; ?></h3>
                                            <?php echo apply_filters('the_content', $arr_steps[$i]['content']); ?>
                                        </div>
                                        <div class="step-number" data-id="<?php echo $i; ?>"><?php echo ($i + 1); ?></div>
                                        <div class="step-indicator"></div>
                                    </div>
                                <?php $y++;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php $bg_banner_id = get_post_meta(get_the_ID(), 'mfm_about_main_bg_id', true); ?>
            <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
            <section class="landing-main-about-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade" data-aos-delay="300" style="background: url(<?php echo $bg_banner[0]; ?>);">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="title-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade" data-aos-delay="200">
                            <h2><?php echo get_post_meta(get_the_ID(), 'mfm_about_section_title', true); ?></h2>
                            <hr>
                        </div>
                        <div class="about-picture-container col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-12 order-12">
                            <div class="about-picture-content">
                                <?php $about_gallery = get_post_meta(get_the_ID(), 'mfm_about_gallery', true); ?>
                                <?php $i = 1; ?>
                                <?php foreach ($about_gallery as $key => $value) { ?>
                                    <?php $delay = 250 * $i; ?>
                                    <?php $bg_banner_id = $key; ?>
                                    <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                    <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid img-gallery-<?php echo $i; ?>" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" data-aos="fade" data-aos-delay="<?php echo $delay; ?>" />
                                <?php $i++;
                                } ?>
                            </div>
                        </div>
                        <div class="about-text-container col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 order-xl-12 order-lg-12 order-md-12 order-sm-1 order-1" data-aos="fade" data-aos-delay="500">
                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'mfm_about_text', true)); ?>
                            <div class="follow-up-content">
                                <?php echo get_post_meta(get_the_ID(), 'mfm_follow_up_text', true); ?>
                                <?php $social_arr = get_post_meta(get_the_ID(), 'mfm_follow_up_group', true); ?>
                                <?php foreach ($social_arr as $item) { ?>
                                    <a href="<?php echo $item['link_url']; ?>">
                                        <?php $bg_banner_id = $item['logo_id']; ?>
                                        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
                                        <img itemprop="image" content="<?php echo $bg_banner[0]; ?>" src="<?php echo $bg_banner[0]; ?>" title="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php wp_footer(); ?>
</body>

</html>