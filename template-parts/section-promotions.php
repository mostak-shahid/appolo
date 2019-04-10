<?php 
global $appolo_options;
$title = $appolo_options['sections-promotions-title'];
$content = $appolo_options['sections-promotions-content'];
$slides = $appolo_options['sections-promotions-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_promotions', $page_details ); 
?>
<section id="section-promotions" <?php if(@$appolo_options['sections-promotions-background-type'] == 1) echo 'class="'.@$appolo_options['sections-promotions-background'].'"';?>>
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_promotions', $page_details ); ?>
			<?php if ($title) : ?>				
				<div class="title-wrapper">
					<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
				</div>
			<?php endif; ?>
			<?php if ($content) : ?>				
				<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
			<?php endif; ?>
			<?php  do_action( 'action_after_promotions', $page_details ); ?>
			<?php if ($slides) : ?>
			<div class="promotions">
				<div class="row">
					<?php foreach ($slides as $slide) : ?>
						<div class="col-lg-6">
							<div class="promotion-wrapper position-relative bg-white text-center">
								<div class="sub-title"><?php echo @$slide['title'] ?></div>
								<h3 class="title"><?php echo @$slide['link_title'] ?></h3>
								<?php 
								if ($slide['attachment_id']) : 
									$attachment_alt = get_post_meta( $slide['attachment_id'], '_wp_attachment_image_alt', true );
									?>

									<img src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" alt="<?php echo $attachment_alt ?>" class="img-fluid" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['width'] ?>">
								<?php endif ?>
								<?php if (@$slide['link_url']) : ?>
									<a class="hidden-link" href="<?php echo esc_url( do_shortcode( $slide['link_url'] ) ) ?>" <?php if ($slide['target']) echo 'target="_blank"' ?>>Learn More</a>
								<?php endif; ?>
							</div>						
						</div>
	
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_promotions', $page_details  ); ?>