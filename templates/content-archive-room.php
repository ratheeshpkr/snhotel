<div class="snhotel-container">
	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_before_archive_room' ); ?>
		</div>
	</div>

	<article itemscope itemtype="http://schema.org/Room" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="snhotel-row">
			<div class="snhotel-full bg">
		    	<?php do_action( 'snhotel_before_archive_room_summary' ); ?>
		    </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
	        	<?php do_action( 'snhotel_archive_room_summary' ); ?>
	        </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
			    <?php do_action( 'snhotel_after_archive_room_summary' ); ?>
			</div>
		</div>

	</article>

	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_after_archive_room' ); ?>
		</div>
	</div>
</div>