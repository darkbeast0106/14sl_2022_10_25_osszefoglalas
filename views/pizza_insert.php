<h1>Pizza felvétele</h1>
<form method="POST">
    <div class="mb-3">
        <label for="nev_input" class="form-label">Név</label>
        <input type="text" class="form-control" id="nev_input" name="nev">
    </div>

    <div class="mb-3">
        <label for="leiras_input" class="form-label">Leírás</label>
        <textarea class="form-control" id="leiras_input" rows="3" name="leiras"></textarea>
    </div>
    <div class="mb-3">
        <label class="form_label" for="alap_input">Alap</label>
        <select class="form-select" id="alap_input" name="alap_id">
            <option selected disabled>Pizza alap</option>
            <?php foreach ($pizza_alapok as $pizza_alap): ?>
                <option value="<?php echo $pizza_alap['id'] ?>"><?php echo $pizza_alap['nev'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Feltétek</label>
        <div class="container row">
            <?php foreach ($pizza_feltetek as $pizza_feltet): ?>
            <div class="form-check col-md-3 col-lg-2">
                <input type="checkbox" class="form-check-input" id="feltet_<?php echo $pizza_feltet['id'] ?>" name="feltet[]" value="<?php echo $pizza_feltet['id'] ?>">
                <label class="form-check-label" for="feltet_<?php echo $pizza_feltet['id'] ?>"><?php echo $pizza_feltet['nev'] ?></label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>