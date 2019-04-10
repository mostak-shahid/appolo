<?php global $appolo_options; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="Md. Mostak Shahid">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<input id="loader-status" type="hidden" value="<?php echo $appolo_options['misc-page-loader'] ?>">
<?php if ($appolo_options['misc-page-loader']) : ?>
    <div class="se-pre-con">
    <?php if ($appolo_options['misc-page-loader-image']['url']) : ?>
        <img class="img-responsive animation <?php echo $appolo_options['misc-page-loader-image-animation'] ?>" src="<?php echo do_shortcode( $appolo_options['misc-page-loader-image']['url'] ); ?>">
    <?php else : ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <?php endif; ?>
    </div>
<?php endif; ?>
	<div id="top-header" <?php if(@$appolo_options['sections-top-header-background-type'] == 1) echo 'class="'.@$appolo_options['sections-top-header-background'].'"';?>>
		<div class="content-wrap">
			<div class="content-area text-center"><?php echo @$appolo_options['top-header-content'] ?></div>
		</div>
	</div>

	<header id="main-menu">
		<nav class="navbar navbar-expand-md <?php echo @$appolo_options['sections-menu-type'] . ' ' .@$appolo_options['sections-menu-background']?>">			
			<a class="navbar-brand d-md-none d-lg-none" href="#">
				<?php if (has_site_icon()) : ?>
					<img class="img-responsive img-fluid" src="<?php echo get_site_icon_url(32)?>" alt="Logo">
				<?php else : ?>
					<?php echo bloginfo( 'name' ); ?>
				<?php endif; ?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu([
				'menu'            => 'mainmenu',
				'theme_location'  => 'mainmenu',
				'container'       => 'div',
				'container_id'    => 'collapsibleNavbar',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav ml-auto',
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				//'walker'          => new bs4navwalker()
				]);
			?>
		</nav>
	</header>
	<?php if (!is_front_page()) : ?>
		<section id="page-title" <?php if(@$appolo_options['sections-title-background-type'] == 1) echo 'class="'.@$appolo_options['sections-title-background'].'"';?>>
			<div class="content-wrap">
				<div class="container">
					<?php 
					if (is_home()) :
						$page_for_posts = get_option( 'page_for_posts' );
						$title = get_the_title($page_for_posts);
					elseif (is_category()) :
						$title = single_cat_title("", false);
					elseif (is_404()) :
						$title = '404 Page';
					elseif (is_shop()) :
						$shop_page_id = wc_get_page_id( 'shop' );
						$title = get_the_title($shop_page_id);
					else :
						$title = get_the_title();
					endif; 
					?>
					<span class="heading"><?php echo $title ?></span>
				</div>
			</div>
		</section>
		<?php if (@$appolo_options['sections-breadcrumbs-option']) : ?>
		<section id="section-breadcrumbs" <?php if(@$appolo_options['sections-breadcrumbs-background-type'] == 1) echo 'class="'.@$appolo_options['sections-breadcrumbs-background'].'"';?>>
			<div class="content-wrap">
				<div class="container">
					<?php mos_breadcrumbs(); ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php endif ?>