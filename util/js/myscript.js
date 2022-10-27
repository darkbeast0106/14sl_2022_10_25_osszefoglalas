async function pizza_feltetek_listazasa() {
    console.log("Elkezdődött");
    const data = await fetch("./api/pizza_feltet.php");
    const json = await data.json();
    let html = "";
    json.forEach(feltet => {
        html += `<li class="list-group-item">${feltet.nev}</li>`;
    });
    document.getElementById("pizza_feltetek").innerHTML = html;
}

async function pizza_feltet_felvetel() {
    const nev = document.getElementById('nev_input').value;
    const feltet = {
        nev: nev
    }
    const data = await fetch("./api/pizza_feltet.php", {
        method: "POST",
        headers: {
            'Content-Type' : "application/json"
        },
        body: JSON.stringify(feltet)
    });
    const json = await data.json();
    if (data.status !== 201) {
        alert(json.message);
    } else {
        pizza_feltetek_listazasa();
        document.getElementById('nev_input').value = "";
    }
}