<div class="container">

    <?php if(!empty($posts)) : ?>
    <?php foreach ($posts as $post) :?>
<!--     Zapihivajem razmetku bootstrap dlja primernovo oformlenija-->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['name']?></h5>
                    <p class="card-text"><?= $post['descr']?></p>
                </div>
            </div>
    <?php endforeach;?>
        <?php endif; ?>
    </div>




