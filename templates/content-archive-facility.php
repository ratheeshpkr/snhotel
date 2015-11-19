<div class="snhotel-container">
	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_before_archive_facility' ); ?>
		</div>
	</div>

	<article itemscope itemtype="http://schema.org/Facility" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="snhotel-row">
			<div class="snhotel-full bg">
		    	<?php do_action( 'snhotel_before_archive_facility_summary' ); ?>
		    </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
	        	<?php do_action( 'snhotel_archive_facility_summary' ); ?>
	        </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
			    <?php do_action( 'snhotel_after_archive_facility_summary' ); ?>
			</div>
		</div>

	</article>

	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_after_archive_facility' ); ?>
		</div>
	</div>
</div>