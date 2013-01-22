<script src="http://beta.openbadges.org/issuer.js"></script>
<script language="Javascript">
	function claim_badge()
	{
		OpenBadges.issue(['<?php echo site_url() . 'assets/assertions/' . $badge->instance->assertion_uri;?>'], function(errors, successes) { window.location = "<?php echo site_url();?>claim/complete/<?php echo $badge->instance->id;?>"; });
	}
</script>

<div class="container">
	<div class="page-header">
		<section>
			<h1>
				Claim Badge
				<small><?php echo $badge->badge->badge_name;?></small>
			</h1>
		</section>
	</div>

	<div class="row">
		<section class="span12" id="badge_summary">
			<table class="table table-striped table-bordered table-condensed">
			<tr style="width: 580px !important">
				<td style="width: 80px; text-align: center !important"><img src="<?php echo site_url() . 'assets/uploads/' . $badge->badge->badge_image;?>" style="width: 60px; height: 60px; margin: 10px"></td>
				<td style="width: 400px"><span class="badge_name"><h4><?php echo $a_badge->badge->badge_name;?></h4></span>
					<p><?php echo $badge->badge->description;?></p>
					<p>Criteria:</p>
					<ul>
						<?php foreach($badge->objectives as $objective): ?>
							<li><?php echo $objective->objective_text; ?></li>
						<?php endforeach; ?>
					</ul>
				</td>
				<td style="width: 100px; vertical-align: middle; text-align: center">
					<span onClick="claim_badge()" class="btn btn-small btn-success">Send to Backpack</span>
				</td>
				</tr>
			</table>
		</section>
	<div>
</div>