<?php 
global $appolo_options;
$sections = $appolo_options['archive-page-sections']['Enabled'];
$layout = $appolo_options['archive-page-layout'];
?><?php get_header() ?>
<section id="archive" class="page-content <?php if(@$appolo_options['sections-content-background-type'] == 1) echo @$appolo_options['sections-content-background'];?>">
	<div class="content-wrap">
		<div class="container-fluid">
		<?php if ($layout != 'ns') : ?>
			<div class="row">
				<div class="col-lg-8 <?php if ($layout == 'ls') echo 'order-lg-last'?>">
		<?php endif; ?>
			<?php if ( have_posts() ) :?>
				<div id="blogs" class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-6">							
							<?php get_template_part( 'content', get_post_format() ) ?>
						</div>
					<?php endwhile;?>						
				</div>
				<div class="pagination-wrapper">
				<?php
					the_posts_pagination( array(
						'show_all' => false,
						'screen_reader_text' => " ",
						'prev_text'          => 'Prev',
						'next_text'          => 'Next',
					) );
				?>
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>			
		<?php if ($layout != 'ns') : ?>		
				</div>
				<div class="col-lg-4 <?php if ($layout == 'ls') echo 'order-lg-first'?>">
					<?php get_sidebar();?>
				</div>
			</div>
			<?php endif; ?>
		</div>	
	</div>
</section>
<?php get_footer() ?>