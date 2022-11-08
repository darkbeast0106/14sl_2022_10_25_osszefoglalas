<h1>Pizza alapok</h1>
<form method="POST" id="pizza_alap_urlap">
    <h2>Pizza alap felvétele</h2>
    <div class="mb-3">
        <label class="form-label" for="nev_input">Név</label>
        <input class="form-control" type="text" id="nev_input" name="nev">
    </div>
    <button class="btn btn-primary" type="submit">Felvétel</button>
</form>
<section class="mt-5" id="pizza_feltet_lista">
    <h2>Pizza alapok</h2>
    <ul class="list-group list-group-flush" id="pizza_alapok">
        <?php foreach ($pizza_alapok as $pizza_alap): ?>
            <li class="list-group-item"><?php echo $pizza_alap['nev'] ?></li>
        <?php endforeach; ?>
    </ul>
</section>