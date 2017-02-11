<!--?php /* Template name: Rank */ ?-->
<?php
/**
 * The template for displaying custom page of the ranking of authors and editors of posts.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php
						$users = get_users('orderby=post_count&order=desc');
						$allowed_roles = array('editor', 'author');
						foreach ( $users as $user ) {
							if( array_intersect($allowed_roles, $user->roles ) ) {
								echo '<span>' . get_avatar($user->user_email) . '</span>';
								echo '<p><a href="' . get_author_posts_url( $user->ID , $user->user_nicename ) . '">' . esc_html( $user->display_name ) .'</a></p>'; 
								echo '<p>' . get_user_meta($user->ID, 'description', true) . '</p>';
								echo '<br>';
							}
						}
					?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
