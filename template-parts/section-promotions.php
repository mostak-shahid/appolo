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
		<div class="container-fluid">
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

					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_promotions', $page_details  ); ?>