<ul class="meta">
	<li class="post_date"><?php the_time('F jS, Y') ?></li>
	<li class="post_author"><?php the_author() ?></li>
	<li class="post_category"><?php the_category(', '); ?></li>
	<li class="post_comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?></li>
</ul>