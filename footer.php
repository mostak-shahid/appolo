<?php 
global $appolo_options;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <?php get_template_part( 'template-parts/section', 'widgets' ); ?>
  <footer id="footer" <?php if(@$appolo_options['sections-footer-background-type'] == 1) echo 'class="'.@$appolo_options['sections-footer-background'].'"';?>>
    <div class="content-wrap">
      <div class="container">
        <?php echo do_shortcode( $appolo_options['sections-footer-content'] ); ?>
      </div>
    </div>
  </footer>
<?php
if ($appolo_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($appolo_options['misc-settings-css']) : ?>
	<style>
		<?php echo $appolo_options['misc-settings-css'] ?>		
	</style>
<?php endif; ?>
<?php if ($appolo_options['misc-settings-js']) : ?>
	<script>
		<?php echo $appolo_options['misc-settings-js'] ?>	
	</script>
<?php endif; ?>
</body>
</html>