<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="<?= $meta['description']?>">
    <meta name="keywords" content="<?= $meta['keywords']?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/firstFrameworkPHP/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/firstFrameworkPHP/css/main.css">
    <title><?= $meta['title']?></title>
</head>
<body>

<div class="container">
    <?php if (!empty($menu)) :?>
    <nav class="nav">
        <?php foreach ($menu as $m) : ?>
            <a href="category/<?= $m['id']?>"><?= $m['title']?></a>
        <?php endforeach;?>
    </nav>
    <?php endif;?>
<h1>Default</h1>

<?= $content; ?>

<?//= debug(\vendor\core\Db::$countSql)?>
<?//= debug(\vendor\core\Db::$queries)?>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/firstFrameworkPHP/bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>