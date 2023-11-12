<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/functions/db.php";
require_once __DIR__ . "/classes/Article.php";

try {
    $pdo = getConnection();
} catch (PDOException $e) {
    Utils::redirect('index.php?error=');
    exit;
}

$typeResult = $pdo->query("SELECT * FROM type");
$types = $typeResult->fetchAll(PDO::FETCH_ASSOC);

$articlesPerPage = 8;

// Current page (1 if not in the URL)
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$filter = $_GET['filter'] ?? 'all';
$filterCondition = '';

if ($filter !== 'all') {
    $filterCondition = ' WHERE id_type = ' . $filter;
}

// Calculation of the offset for pagination
$offset = ($page - 1) * $articlesPerPage;

$sql = "SELECT article_id FROM article" . $filterCondition . " LIMIT " . $articlesPerPage . " OFFSET " . $offset;
$idStmt = $pdo->prepare($sql);
$idStmt->execute();
$articlesIds = $idStmt->fetchAll(PDO::FETCH_COLUMN);
$article = new Article();

// Total number of articles for pagination
$totalArticles = $pdo->query("SELECT COUNT(*) FROM article" . $filterCondition)->fetchColumn();

// Total number of pages
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
            <?php foreach ($articlesIds as $row) { ?>
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
