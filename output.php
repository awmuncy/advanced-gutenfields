<?php 
$content = get_field('text') ? get_field('text') : "Click 'Switch to Edit' to edit this block";
?>
<div class="agf_blockslug align<?=$block['align'];?> <?=$block['className'];?>">
	<h1><?=$content;?></h1>
	<?php if(have_rows('my_repeater')){ ?>
		<div class="my_repeater">
			<?php while(have_rows('my_repeater')) { the_row(); ?>
				<div class="repeated_item">
					<?php the_sub_field('my_text');?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>