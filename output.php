<?php 
$content = get_field('text') ? get_field('text') : "Click 'Switch to Edit' to edit this block";
?>
<div class="agf_blockslug align<?=$block['align'];?> <?=$block['className'];?>">
	<h1><?=$content;?></h1>
</div>