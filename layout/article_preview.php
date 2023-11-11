<div class="col-lg-6">
    <div class="border rounded my-2 bg-light">
        <div class="row">
            <div class="col-4 img-fluid">
                <img src="uploads/articles/<?php echo $row['image_cover'] ?>" alt="" class='h-100 img-fluid rounded-start'>
            </div>
            <div class="col-8 d-flex flex-column">
                <h2 class="fs-4"><?php echo $row['article_title'] ?></h2>
                <p><?php echo nl2br(substr($row['article_text'], 0, 120)); ?>...</p>
                <a href="article_display.php?id=<?php echo $row['article_id'] ?>" class="d-flex justify-content-end me-1 link-dark">Voir article</a>
            </div>
        </div>
    </div>
</div>