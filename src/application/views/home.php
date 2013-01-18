<div class="container">
	<div class="page-header">
		<section>
			<h1>
				Badge Profile
				<small><?php echo $user->fname . ' ' . $user->lname; ?></small>
			</h1>
		</section>
	</div>

	<div class="row">
		<section class="span12" id="badges_waiting">
			<h2>Badges to be Collected</h2>
		</section>

		<section class="span12" id="badges_waiting">
			<h2>Partially Completed Badges</h2>
		</section>

		<section class="span12" id="badges_waiting">
			<h2>Completed and Collected Badges</h2>
		</section>
	</div>
</div>

<?php echo '<pre>';
print_r($completed);
echo '</pre>'; ?>