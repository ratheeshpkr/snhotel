<div class="snhotel-container">
	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_before_single_offer' ); ?>
		</div>
	</div>

	<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="snhotel-row">
			<div class="snhotel-full bg">
		    	<?php do_action( 'snhotel_before_single_offer_summary' ); ?>
		    </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
	        	<?php do_action( 'snhotel_single_offer_summary' ); ?>
	        </div>
		</div>

		<div class="snhotel-row">
			<div class="snhotel-full">
			    <?php do_action( 'snhotel_after_single_offer_summary' ); ?>
			</div>
		</div>

	</article>

	<div class="snhotel-row">
		<div class="snhotel-full">
			<?php do_action( 'snhotel_after_single_offer' ); ?>
		</div>
	</div>
</div>
