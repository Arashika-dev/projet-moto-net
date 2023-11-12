<div class="col-lg-6 my-2">
    <div class="border rounded bg-light h-100">
        <div class="row h-100">
            <div class="col-4">
                <img src="uploads/articles/<?php echo $row['image_cover'] ?>" alt="" class='h-100 img-fluid rounded-start m-auto'>
            </div>
            <div class="col-8 d-flex flex-column justify-content-between h-100">
                <h2 class="fs-4"><?php echo $row['article_title'] ?></h2>
                <p><?php echo nl2br(substr($row['article_text'], 0, 120)); ?>...</p>
                <a href="article_display.php?id=<?php echo $row['article_id'] ?>" class="d-flex justify-content-end me-1 link-dark">Voir article</a>
            </div>
        </div>
    </div>
</div>