<ul class="thumbnails">
    <?php foreach($photos as $photo): ?>
        <li class="span3"><a class="<?php echo $groupalias; ?> thumbnail" href="<?php echo $photo->url; ?>"><img src="<?php echo $photo->getUrl("small"); ?>" alt="<?php echo $photo->name; ?>" /></a></li>
    <?php endforeach; ?>
</ul>