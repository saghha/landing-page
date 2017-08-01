<?php
/**
 * The front page template.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();

?>
<section class="primero container-fluid">
	<div class="container margen">
		<hr class="feature-divider">
		<div class="feature" id="about">
	        <img class="feature-image img-circle img-responsive pull-right" src="http://placehold.it/500x500">
	        <h2 class="feature-heading">This First Heading
	            <span class="text-muted">Will Catch Your Eye</span>
	        </h2>
	        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
	    </div>
	</div>
</section>
<section class="segundo container-fluid">
	<div class="container margen">
		<hr class="feature-divider">
		<div class="feature" id="services">
	        <img class="feature-image img-circle img-responsive pull-left" src="http://placehold.it/500x500">
	        <h2 class="feature-heading">The Second Heading
	            <span class="text-muted">Is Pretty Cool Too.</span>
	        </h2>
	        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
	    </div>
    </div>
</section>
<section class="tercero container-fluid">
	<div class="container margen">
		<hr class="feature-divider">
		<div class="feature" id="contact">
	            <img class="feature-image img-circle img-responsive pull-right" src="http://placehold.it/500x500">
	            <h2 class="feature-heading">The Third Heading
	                <span class="text-muted">Will Seal the Deal.</span>
	            </h2>
	            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
	    </div>
	</div>
</section>

<?php

get_footer(); ?>