<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/functions/db.php";

try {
    $pdo = getConnection();
} catch (PDOException $e) {
    Utils::redirect('index.php?error=');
    exit;
}

$typeResult = $pdo->query("SELECT * FROM type");
$types = $typeResult->fetchAll(PDO::FETCH_ASSOC);

$articlesPerPage = 8;

// Page actuelle (1 si pas dans l'URL)
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$filter = $_GET['filter'] ?? 'all';
$filterCondition = '';

if ($filter !== 'all') {
    $filterCondition = ' WHERE id_type = ' . $filter;
}

// Calcul du décalage pour la pagination
$offset = ($page - 1) * $articlesPerPage;

$sql = "SELECT * FROM article" . $filterCondition . " LIMIT :limit OFFSET :offset";
$articleStmt = $pdo->prepare($sql);
$articleStmt->bindValue('limit', $articlesPerPage);
$articleStmt->bindValue('offset', $offset);
$articleStmt->execute();
$articles = $articleStmt->fetchAll(PDO::FETCH_ASSOC);

// Nombre total d'articles pour la pagination
$totalArticles = $pdo->query("SELECT COUNT(*) FROM article" . $filterCondition)->fetchColumn();

// Nombre total de pages
$totalPages = ceil($totalArticles / $articlesPerPage);

?>

<main>
    <h1 class="text-center my-3">Nos articles</h1>
    <section class="container">
        <div class="col-3 offset-1">
            <form action="articles.php" method="get" id="filter-form">
                <select name="filter" id="filter" class="form-select w-50" aria-label="Tri Article" id="filter" onchange="triggerFilter()">
                    <option value="all" <?php if ($filter === 'all') { echo "selected"; } ?>>Tous</option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?php echo $type['type_id'] ?>" <?php if ((int)$filter === $type['type_id']) {
                            echo "selected";
                        } ?>><?php echo $type['type_name'] ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <div class="row mt-4">
            <?php foreach ($articles as $row) { ?>
                <?php require __DIR__ . '/layout/article_preview.php'; ?>
            <?php } ?>
        </div>
        
        <!-- Pagination -->
        <nav aria-label="Article navigation ">
            <ul class="pagination d-flex justify-content-center mt-2">
                <?php if ($page > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo($page - 1) . "&filter=" . $filter; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?php if ($i === $page) {echo 'active';} ?>">
                        <a class="page-link" href="?page=<?php echo $i . "&filter=" . $filter; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo ($page + 1) . "&filter=" . $filter; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </section>
</main>
<script type="text/javascript">
    const triggerFilter = () => document.getElementById('filter-form').submit();
</script>

<?php require_once __DIR__ . "/layout/footer.php"; ?>
