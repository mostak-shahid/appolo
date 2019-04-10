<?php 
global $appolo_options;
$title = $appolo_options['sections-services-title'];
$content = $appolo_options['sections-services-content'];
$slides = $appolo_options['sections-services-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_services', $page_details ); 
?>
<section id="section-services" <?php if(@$appolo_options['sections-services-background-type'] == 1) echo 'class="'.@$appolo_options['sections-services-background'].'"';?>>
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_services', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
			<?php do_action( 'action_after_services', $page_details ); ?>
			<?php if ($slides) : ?>
			<div class="services">
				<div class="row">
					<?php foreach ($slides as $slide) : ?>
						<div class="col-lg-4">
							<div class="card sevice-unit position-relative">
								<?php 
								if ($slide['attachment_id']) : 
									$attachment_alt = get_post_meta( $slide['attachment_id'], '_wp_attachment_image_alt', true );
									?>

									<img src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" alt="<?php echo $attachment_alt ?>" class="img-fluid card-img-top image-one" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['height'] ?>">
								<?php endif ?>	
								<?php 
								if ($slide['photo_attachment_id']) : 
									$attachment_alt = get_post_meta( $slide['photo_attachment_id'], '_wp_attachment_image_alt', true );
									?>

									<img src="<?php echo wp_get_attachment_url( $slide['photo_attachment_id'] ) ?>" alt="<?php echo $attachment_alt ?>" class="img-fluid card-img-top image-two" width="<?php echo $slide['photo_width'] ?>" height="<?php echo $slide['photo_height'] ?>">
								<?php endif ?>								
								<div class="card-body">
									<h5 class="card-title"><?php echo @$slide['title'] ?></h5>
									<div class="card-text"><?php echo @$slide['description'] ?></div>
									<?php if (@$slide['link_title']) : ?>
										<span class="btn"><?php echo do_shortcode( $slide['link_title'] ) ?></span>
									<?php endif; ?>
								</div>
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
<?php do_action( 'action_below_services', $page_details  ); ?>