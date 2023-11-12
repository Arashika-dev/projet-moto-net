<div class="row p-2 my-5">
    <?php $article->getArticle($row);
        if ($isLeftAligned) { ?>
        <div class="col-lg-4">
            <div class="h-100">
                <img class='img-fluid h-100' src='uploads/articles/<?php echo $article->getImgCoverName() ?>' alt='Image article'/>
            </div>
        </div>
    <?php } ?>

    <div class="col-lg-8 d-flex align-items-center">
        <div class="d-flex flex-column justify-content-between">
            <h3 class="text-center"><?php echo $article->getTitle() ?></h3>
            <div class="text-center">
                <?php foreach($article->getTags() as $tag) { ?>
                    <span class="badge rounded-pill text-bg-warning"><?php echo $tag ?></span>
                <?php }?>
            </div>
            <p><?php echo nl2br(substr($article->getTextContent(), 0, 420)); ?>...</p>
            <a href="article_display.php?id=<?php echo $row ?>" class="btn btn-primary w-25 align-self-<?php echo $isLeftAligned ? 'end' : 'start'; ?>">En savoir plus</a>
        </div>
    </div>

    <?php if (!$isLeftAligned) { ?>
        <div class="col-lg-4">
            <div class="border">
                <img class='img-fluid h-100' src='uploads/articles/<?php echo $article->getImgCoverName() ?>' alt='Image article'/>
            </div>
        </div>
    <?php } ?>

</div>

<?php
// Alterne la valeur de $isLeftAligned
$isLeftAligned = !$isLeftAligned;
?>
