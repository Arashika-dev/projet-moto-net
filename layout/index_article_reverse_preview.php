<div class="row p-2 my-5">
    <?php if ($isLeftAligned) { ?>
        <div class="col-lg-4">
            <div class="border">
                <img class='img-fluid h-100' src='uploads/articles/<?php echo $row['image_cover'] ?>' alt='Image article'/>
            </div>
        </div>
    <?php } ?>

    <div class="col-lg-8 d-flex align-items-center">
        <div class="h-75 d-flex flex-column justify-content-between">
            <h3 class="text-center"><?php echo $row['article_title']?></h3>
            <p><?php echo nl2br(substr($row['article_text'], 0, 420)); ?>...</p>
            <a href="#" class="btn btn-primary w-25 align-self-<?php echo $isLeftAligned ? 'end' : 'start'; ?>">En savoir plus</a>
        </div>
    </div>

    <?php if (!$isLeftAligned) { ?>
        <div class="col-lg-4">
            <div class="border">
                <img class='img-fluid h-100' src='uploads/articles/<?php echo $row['image_cover'] ?>' alt='Image article'/>
            </div>
        </div>
    <?php } ?>

</div>

<?php
// Alterne la valeur de $isLeftAligned
$isLeftAligned = !$isLeftAligned;
?>
