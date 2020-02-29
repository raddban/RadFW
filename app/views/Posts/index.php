<div class="container">

    <?php if(!empty($post)) : ?>
        <!--     Zapihivajem razmetku bootstrap dlja primernovo oformlenija-->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $post['name']?></h5>
                <p class="card-text"><?= $post['descr']?></p>
            </div>
        </div>
    <?php endif; ?>
</div>




