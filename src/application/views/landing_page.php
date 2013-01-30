<div class="container">
	<div class="page-header">
		<section>
			<h1>
				Welcome to Badges
			</h1>
		</section>
	</div>
	<div class="row">
		<section class="span12">
			<?php if($this->session->userdata('user_id')): ?>
				<h3>Logged in</h3>
			<?php else: ?> 
				<p>Please login to Badges in order to continue.</p>
				<a href="<?php echo site_url();?>landing_page/sign_in" class="btn btn-large">Sign In</a>
			<?php endif;?>
		</section>

		<section class="span6">
		</section>
	</div>
</div>