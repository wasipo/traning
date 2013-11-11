<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>

		<div class="entry-meta">
			<?php twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->

		<?php endif; // is_single() ?>


	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="wrap_thumbnail">
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="entry-content has_thumbnail">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		</div><!-- .entry-content -->
	</div>
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>

	</div><!-- .entry-content -->
	<?php endif; ?>
	<div class="entry-content">
		<?php

			$headline = get_post_meta(get_the_id());
			$arrtmp = array();
			$abtmp = array();
			$defnum = 100;
			$id = $post->ID;

			/*
					データ整理
			*/

			foreach($headline as $key => $val)
			{
				if(!preg_match('/^_/', $key))
				{
					if(preg_match('/\d+$/',$key,$match))
					{
						$order = $match[0];
					} else {
						$order = $defnum;
						$defnum++;
					}
					$abtmp[$order] = array($key,$val);
				}
			}

			ksort($abtmp);

			/*
					データ出力
			*/

			$diff = array();
			foreach($abtmp as $order => $data)
			{				
				echo '<div class="article_content pos'.$id.'">';
				echo '<h2>'.preg_replace('/\d+$/', " ",$abtmp[$order][0]).'</h2>';
				echo '<p class="content_p">'.$abtmp[$order][1][0].'</p>';
				echo '</div>';
			}

			if(!is_single())
			{
				echo '<div class="poscon'.$id.'"><span class="cl_btn">続きを読む</span></div>';
			}

		?>
	</div><!-- .entry-content -->
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->

</article><!-- #post -->
