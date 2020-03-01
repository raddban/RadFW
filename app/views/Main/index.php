<div class="container">
    <button class="btn btn-default" id="send">Button</button>
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

<script src="/js/test.js"></script>

<script>
    $(function(){
        $('#send').click(function () {
            $.ajax({
                url: '/public/page/about',
                type: 'post',
                data: {'id': 2},
                success: function (res) {
                    console.log(res)
                },
                error: function () {
                    // alert('Error')
                }
            })
        })
    })

</script>




