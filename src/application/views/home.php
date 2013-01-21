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
			<div style="min-height: 100px">
			<?php if((isset($unawarded)) AND (sizeof($unawarded) > 0)): ?>
			<table class="table table-striped table-bordered table-condensed">
			<?php foreach($unawarded as $a_badge): ?>
			<tr style="width: 580px !important">
				<td style="width: 80px; text-align: center !important"><img src="<?php echo site_url() . 'assets/uploads/' . $a_badge->badge->badge_image;?>" style="width: 60px; height: 60px; margin: 10px"></td>
				<td style="width: 400px"><span class="badge_name"><h4><?php echo $a_badge->badge->badge_name;?></h4></span>
					<p><?php echo $a_badge->badge->description;?></p>
					<p>Criteria:</p>
					<ul>
						<?php foreach($a_badge->objectives as $objective): ?>
							<li><?php echo $objective->objective_text; ?></li>
						<?php endforeach; ?>
					</ul>
				</td>
				<td style="width: 100px; vertical-align: middle; text-align: center">
					<p><a href="<?php echo site_url(); ?>claim/<?php echo $a_badge->badge_earned->id;?>">Claim This Badge</a></p>
					<p><a href="#">Remove Badge</a></p>
					<p><a href="<?php echo site_url(); ?>badge/<?php echo $a_badge->badge->id;?>">View Badge Details</a></p>
				</td>
				</tr>
			<?php endforeach;?>
			</table>
			<?php endif; ?>
			</div>
		</section>

		<section class="span12" id="badges_waiting">
			<h2>Partially Completed Badges</h2>
			<div style="min-height: 100px">
			<?php if((isset($partial)) AND (sizeof($partial) > 0)): ?>
			<table class="table table-striped table-bordered table-condensed">
			<?php foreach($partial as $a_badge): ?>
			<tr style="width: 580px !important">
				<td style="width: 80px; text-align: center !important"><img src="<?php echo site_url() . 'assets/uploads/' . $a_badge->badge->badge_image;?>" style="width: 60px; height: 60px; margin: 10px"></td>
				<td style="width: 400px"><span class="badge_name"><h4><?php echo $a_badge->badge->badge_name;?></h4></span>
					<p><?php echo $a_badge->badge->description;?></p>
					<p>Criteria:</p>
					<ul>
						<?php foreach($a_badge->objectives as $objective): ?>
							<li><?php echo $objective->objective_text; ?></li>
						<?php endforeach; ?>
					</ul>
				</td>
				</tr>
			<?php endforeach;?>
			</table>
			<?php endif; ?>
			</div>
		</section>

		<section class="span12" id="badges_waiting">
			<h2>Completed and Collected Badges</h2>
			<?php if((isset($awarded)) AND (sizeof($awarded) > 0)): ?>
			<table class="table table-striped table-bordered table-condensed">
			<?php foreach($awarded as $a_badge): ?>
			<tr style="width: 580px !important">
				<td style="width: 80px; text-align: center !important"><img src="<?php echo site_url() . 'assets/uploads/' . $a_badge->badge->badge_image;?>" style="width: 60px; height: 60px; margin: 10px"></td>
				<td style="width: 500px"><span class="badge_name"><h4><?php echo $a_badge->badge->badge_name;?></h4></span>
					<p><?php echo $a_badge->badge->description;?></p>
					<p>Criteria:</p>
					<ul>
						<?php foreach($a_badge->objectives as $objective): ?>
							<li><?php echo $objective->objective_text; ?></li>
						<?php endforeach; ?>
					</ul>
				</td>
				</tr>
			<?php endforeach;?>
			</table>
			<?php endif; ?>
		</section>
	</div>
</div>