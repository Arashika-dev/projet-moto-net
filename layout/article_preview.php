<?php $article->getArticle($row); ?>
<div class="col-lg-6 my-2">
    <div class="border rounded bg-light h-100">
        <div class="row h-100">
            <div class="col-4">
                <img src="uploads/articles/<?php echo $article->getImgCoverName() ?>" alt="" class='h-100 img-fluid rounded-start m-auto'>
            </div>
            <div class="col-8 d-flex flex-column justify-content-between h-100">
                <h2 class="fs-4"><?php echo $article->getTitle() ?></h2>
                <p><?php echo nl2br(substr($article->getTextContent(), 0, 120)); ?>...</p>
                <div class="d-flex flex-row justify-content-between mb-1">
                    <div>
                        <?php foreach($article->getTags() as $tag) { ?>
                            <span class="badge rounded-pill text-bg-warning"><?php echo $tag ?></span>
                        <?php }?>
                    </div>
                    <div class="">
                        <a href="article_display.php?id=<?php echo $row?>" class=" me-1 link-dark">Voir article</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>