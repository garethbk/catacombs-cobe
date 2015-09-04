<?php
/**
*	Template Name: Research Opportunities
*
*
*/

?>

<?php get_header(); ?>

<body class="cw">

<div class="research-container">

	<div class="head-area">
		<h1><?php echo get_the_title( $post->ID ); ?></h1>
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="content-area">
		<div id="canvas-container">
			<div id="cloud-wrapper">
			</div>
			<div id="cloud-wrapper-med">
			</div>
			<div id="cloud-wrapper-small">
			</div>
			<div id="cloud-wrapper-xs">
			</div>
		</div>
		<div id="course-select">
		<h2 class="transparent"></h2>
		</div>
		<div class="course-area">
			<?php
				$args = array( 'post_type' => 'cw_research', 'posts_per_page' => -1 );
				$research_loop = new WP_query( $args );
				while ( $research_loop->have_posts() ) : $research_loop->the_post();
					$category = strip_tags( get_the_term_list($post->ID, 'cw_research_type') );
					$category = strtolower($category);
					$category = str_replace(' ', '', $category);
					$category = str_replace('_', ' ', $category);
					echo '<div class="course-box animated ' . $category . '">';
					echo '<a href="' . get_post_meta($post->ID, "_url", true) . '" target="_blank" class="course-link"></a>';
					echo '<h2><a href="mailto:' . get_post_meta($post->ID, "_email", true) . '">' . get_post_meta($post->ID, "_prof", true) . '</a></h2>';
					echo '<h3>' . get_post_meta($post->ID, "_dept", true) . '</h3>';
					echo '<p>' . get_post_meta($post->ID, "_area", true) . '</p>';
					echo '</div>';
				endwhile;
			?>
		</div>

		<div class="research-info-box">
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$info_second = get_post_meta($post->ID, 'info_second', true);
					$info_second = strtoupper($info_second);
					echo $info_second;
					endwhile; else :
						_e( 'No content here' );
				endif;
			?>
		</div>

	</div>

</div>

<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/derp-cloud.js" type="text/javascript"></script>
</body>

</html>