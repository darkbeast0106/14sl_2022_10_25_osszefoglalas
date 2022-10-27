<div class="row">
    <?php var_dump($pizzak); ?>
    <?php var_dump($_SESSION); ?>
    <?php foreach ($pizzak as $pizza) : ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><?php echo $pizza['nev'] ?></h2>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>