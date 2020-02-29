<div class="container">
    <?php if (!empty($posts)) : ?>
    <?php foreach ($posts as $post) :?>
    <div class="card">
        <div class="card-body">
            <div class="card-title"><?= $post['name']?></div>
            <div class="card-text"><?= $post['descr']?></div>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
</div>