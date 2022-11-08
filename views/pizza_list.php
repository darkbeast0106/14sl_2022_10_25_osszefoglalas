<div class="row">
    <?php foreach ($pizzak as $pizza) : ?>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header">
                    <h2 class="card-title"><?php echo $pizza['nev'] ?></h2>
                </div>
                <div class="card-body">
                    <?php echo $pizza['leiras'] ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Pizza alap:</strong> <?php echo $pizza['alap'] ?></li>
                    <li class="list-group-item"><strong>Feltétek: </strong>
                        <?php foreach ($pizza['feltetek'] as $feltet): ?>
                            <?php echo $feltet ?>
                        <?php endforeach; ?>
                    </li>
                </ul>
                <div class="card-footer">

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>