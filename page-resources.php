<?php
/**
*	Template Name: Resources
*
*
*/

?>

<?php get_header(); ?>

<body class="cw">

<div class="resource-container">

	<div class="head-area">
		<h1><?php echo get_the_title( $post->ID ); ?></h1>
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="content-area">
		<div class="resource-info-box">
		<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				$info_first = get_post_meta($post->ID, 'info_first', true);
				$info_first = strtoupper($info_first);
				$info_second = get_post_meta($post->ID, 'info_second', true);
				$info_second = strtoupper($info_second);
				echo $info_first;
				endwhile; else :
					_e( 'No content here' );
			endif;
		?>
		</div>
		<div class="resource-area">
			<div class="resource-group" id="vcu">
			<h2>VCU</h2>
				<?php
					$args = array( 'post_type' => 'cw_resources', 'posts_per_page' => -1 );
					$resources_loop = new WP_query( $args );
					while ( $resources_loop->have_posts() ) : $resources_loop->the_post();
						$category = strip_tags( get_the_term_list($post->ID, 'cw_resource_type') );
						$category = strtolower($category);
						$category = str_replace(' ', '', $category);
						if ($category == 'vcu') {
							$title = get_the_title($post->ID);
							$titleID = strtolower($title);
							$titleID = str_replace(' ', '', $titleID);
							$url = get_post_meta($post->ID, "_url", true);
							$phone = get_post_meta($post_>ID, "_phone", true);
							echo '<div class="new-resource">';
							echo '<div class="resource-name"><h3>' . $title . '</h3><span class="arrow" id="arrow-' . $titleID . '">&#8635;</span></div>';
							echo '<div class="resource-content" id="content-' . $titleID . '"><p>' . $url . '</p><p>' . $phone . '</p></div>';
							echo '</div>';
						}
					endwhile;
				?>
			</div>
			<div class="resource-group" id="state">
			<h2>State</h2>
				<?php
					$args = array( 'post_type' => 'cw_resources', 'posts_per_page' => -1 );
					$resources_loop = new WP_query( $args );
					while ( $resources_loop->have_posts() ) : $resources_loop->the_post();
						$category = strip_tags( get_the_term_list($post->ID, 'cw_resource_type') );
						$category = strtolower($category);
						$category = str_replace(' ', '', $category);
						if ($category == 'state') {
							$title = get_the_title($post->ID);
							$url = get_post_meta($post->ID, "_url", true);
							$phone = get_post_meta($post_>ID, "_phone", true);
							echo '<div class="new-resource">';
							echo '<div class="resource-name"><h3>' . $title . '</h3></div>';
							echo '<div class="resource-content"><p>' . $url . '</p><p>' . $phone . '</p></div>';
							echo '</div>';
						}
					endwhile;
				?>
			</div>
		</div>

		<div class="resource-info-box">
			<?php echo $info_second; ?>
		</div>

	</div>

</div>


<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/resources.js" type="text/javascript"></script>
</body>

</html>