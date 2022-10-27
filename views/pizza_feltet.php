<h1>Pizza feltétek</h1>
<section id="pizza_feltet_urlap">
    <h2>Feltét felvétele</h2>
    <div class="mb-3">
        <label class="form-label" for="nev_input">Név</label>
        <input class="form-control" type="text" id="nev_input">
    </div>
    <button class="btn btn-primary" onclick="pizza_feltet_felvetel();">Felvétel</button>
</section>
<section class="mt-5" id="pizza_feltet_lista">
    <h2>Feltétek</h2>
    <ul class="list-group list-group-flush" id="pizza_feltetek">
    </ul>
    <script>pizza_feltetek_listazasa();</script>
</section>