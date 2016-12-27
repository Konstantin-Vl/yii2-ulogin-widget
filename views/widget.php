<?php
	/** @var string $class */
	/** @var string[] $buttons */
	/** @var string $id */
	/** @var string $initOptions */
?>
<div id="<?= $id ?>" class="<?= $class ?>" data-ulogin="<?= $initOptions ?>">
	<?php foreach ($buttons as $button): ?>
		<?= $button ?>
	<?php endforeach ?>
</div>