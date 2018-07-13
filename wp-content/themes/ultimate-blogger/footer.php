<?php
/**
 * The template for displaying the footer.
 * @package 
 */
?>
  	<div class="copyright-wrapper footer-wp">
    	<div class="container">
      		<div class="footerinner">
        		<div class="row">
		          	<div class="col-md-3 col-sm-3">
		          		<?php dynamic_sidebar('footer-1');?>
		          	</div>
		          	<div class="col-md-3 col-sm-3">
		              	<?php dynamic_sidebar('footer-2');?>
		          	</div>
		          	<div class="col-md-3 col-sm-3">
		          		<?php dynamic_sidebar('footer-3');?>
		          	</div>
		          	<div class="col-md-3 col-sm-3">
		          		<?php dynamic_sidebar('footer-4');?>
		          	</div>
        		</div>
      		</div>
    	</div>    
  	</div>
  	<div class="inner">
      	<div class="copyright text-center">
        	<p><?php echo esc_html( get_theme_mod( 'ultimate_blogger_footer_copy' ,__( 'Ultimate Blogger Theme By','ultimate-blogger' ))); ?> <?php ultimate_blogger_link_credit(); ?></p>
      	</div>
      	<div class="clear"></div>
    </div>

<?php wp_footer(); ?>
</body>
</html>