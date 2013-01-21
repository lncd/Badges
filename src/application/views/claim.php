<script src="http://beta.openbadges.org/issuer.js"></script>
<script language="Javascript">
	function claim_badge()
	{
		OpenBadges.issue(['<?php echo $assertion;?>'], function(errors, successes) { window.location = "<?php echo base_url();?>claim/award?badge=<?php echo $badge_details['id'];?>"; });
		
	}
</script>

<div class="container">
	<div class="page-header">
		<section>
			<h1>
				Claim Badge
				<small></small>
			</h1>
		</section>

		<?php echo '<pre>';
		print_r($badge);
		echo '</pre>';?>
	</div>
</div>