<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '. I added text very close to the title</h1>' ); ?>
		I added this text to demonstrate I can modify my website from my text edit! 
		<br>
		<br>
		<!-- <?php
		if ( get_field( 'company_logo' ) ){  ?>
			<p> Logo here! <?php the_field( 'company_logo' )?> </p>
	<?php } ?> -->
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>


	<div class="entry-content">

	<!-- added ACF field -->
	<?php
		if ( get_field( 'phone_number' ) ){  ?>
			<p> My super-updated phone number is: <?php the_field( 'phone_number' )?> </p>
	<?php } ?>

	<?php
		if ( get_field( 'email' ) ){  ?>
			<p> My email address is <?php the_field( 'email' )?> </p>
	<?php } ?>

	<?php
		if ( get_field( 'address' ) ){  ?>
			<p> My address is: <?php the_field( 'address' )?> </p>
	<?php } ?>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
		?>

</article><!-- #post-<?php the_ID(); ?> -->
