<?php
// Pontos de surfe (nome, latitude, longitude, região, descrição)
$spots = [
    ["Sennen Cove",          50.0789, -5.6990, "Oeste", "Praia de ondas variadas, ideal para diferentes níveis de surfe."],
    ["Gwenver",              50.0870, -5.7010, "Oeste", "Praia mais isolada, com ondas fortes e mar aberto."],
    ["Porthmeor",            50.2145, -5.4850, "St Ives", "Praia famosa pelo surfe e pela vista de St Ives."],
    ["Carbis Bay",           50.2070, -5.4650, "St Ives", "Baía abrigada, com águas tranquilas em boas condições."],
    ["Hayle Rivermouth",     50.2010, -5.4270, "St Ives", "Encontro do rio Hayle com o mar, com ondas potentes."],
    ["Godrevy / Gwithian",   50.2350, -5.3980, "St Ives", "Extensa faixa de areia com vários pontos de surfe."],
    ["Portreath",            50.2610, -5.2900, "Norte", "Vila costeira conhecida por suas ondas rápidas."],
    ["Porthtowan",           50.2880, -5.2480, "Norte", "Praia popular entre os surfistas da região."],
    ["Chapel Porth",         50.3040, -5.2280, "Norte", "Praia cercada por falésias e paisagens naturais."],
    ["Droskyn / Main Beach", 50.3420, -5.1570, "Perranporth", "Praia extensa, com ondas e areia dourada."],
    ["Penhale",              50.3650, -5.1620, "Perranporth", "Trecho de praia cercado por dunas naturais."],
    ["Holywell Bay",         50.3930, -5.1520, "Newquay", "Praia ampla, com dunas e ondas consistentes."],
    ["Crantock",             50.4075, -5.1030, "Newquay", "Praia de areia próxima ao estuário do rio Gannel."],
    ["Fistral South",        50.4100, -5.0990, "Newquay", "Setor sul de Fistral, conhecido pelas ondas."],
    ["Fistral North",        50.4160, -5.1000, "Newquay", "Área famosa por receber competições de surfe."],
    ["Little Fistral",       50.4190, -5.0980, "Newquay", "Pequena praia rochosa próxima a Fistral."],
    ["The Cribber",          50.4150, -5.1260, "Newquay", "Pico de ondas grandes, indicado para experientes."],
    ["Towan",                50.4200, -5.0850, "Newquay", "Praia urbana próxima ao centro de Newquay."],
    ["Tolcarne",             50.4220, -5.0780, "Newquay", "Praia popular, cercada por falésias."],
    ["Porth Beach",          50.4240, -5.0610, "Newquay", "Praia ampla e familiar ao norte de Newquay."]
];

// Cidades de referência
$cities = [
    ["Newquay",   50.4130, -5.0760],
    ["St Ives",   50.2110, -5.4800],
    ["Penzance",  50.1180, -5.5370],
    ["Camborne",  50.2130, -5.2930],
    ["Truro",     50.2630, -5.0510],
    ["Falmouth",  50.1540, -5.0700],
    ["Perranporth", 50.3430, -5.1550],
];

$jsonFlags = JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surf na Cornualha</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <style>
        /* Só o que o Tailwind não cobre: marcadores do Leaflet */
        .surf-marker {
            width: 18px; height: 18px;
            background: #e11d48;
            border: 3px solid #fff;
            border-radius: 9999px;
            box-shadow: 0 2px 8px rgba(0,0,0,.4);
            transition: transform .15s;
        }
        .surf-marker.active { transform: scale(1.5); background: #0f766e; }
        .city-label {
            background: transparent; border: 0; box-shadow: none;
            font-weight: 700; font-size: 12px; color: #1f2937;
            text-shadow: 0 0 3px #fff, 0 0 3px #fff;
        }
        .leaflet-popup-content-wrapper { border-radius: 12px; }
    </style>
</head>

<body class="bg-[url('./assets/img/olhaOnda.gif')] bg-cover bg-center bg-no-repeat bg-fixed min-h-screen text-slate-800 font-sans">

    
<section class="max-w-6xl mx-auto px-4 py-10">


    <header class="mb-6">
        <span class="text-xs tracking-[.3em] uppercase text-blue-200">Explore a costa</span>
        <h1 class="text-3xl md:text-4xl font-bold text-sky-800 mt-2">Surfe na Cornualha</h1>
        <p class="text-sky-200 mt-2">
            Clique nos pontos do mapa ou na lista para ver informações de cada praia.
        </p>
    </header>

    <div class="grid lg:grid-cols-[1fr_300px] gap-4">

        <!-- Mapa -->
        <div id="surf-map"
             class="w-full h-[450px] md:h-[620px] rounded-2xl border border-slate-200 shadow-sm z-0"></div>

        <!-- Lista lateral -->
        <aside class="bg-white rounded-2xl border border-slate-200 shadow-sm flex flex-col max-h-[620px]">
            <div class="p-3 border-b border-slate-100">
                <input id="search" type="search" placeholder="Buscar praia..."
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <ul id="spot-list" class="overflow-y-auto divide-y divide-slate-100"></ul>
        </aside>
    </div>

    <footer class="flex flex-wrap justify-between gap-2 mt-4 text-xs text-slate-400">
        <span><span class="inline-block w-2 h-2 rounded-full bg-rose-600 mr-1"></span>Pontos de surfe (<?= count($spots) ?>)</span>
        <span>Coordenadas aproximadas · Mapa © OpenStreetMap</span>
    </footer>
</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const spots  = <?= json_encode($spots,  $jsonFlags) ?>;
    const cities = <?= json_encode($cities, $jsonFlags) ?>;

    const map = L.map('surf-map', { scrollWheelZoom: false }).setView([50.30, -5.25], 9);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 18
    }).addTo(map);

    // Zoom com scroll só depois de clicar no mapa (evita travar a rolagem da página)
    map.on('click', () => map.scrollWheelZoom.enable());
    map.on('mouseout', () => map.scrollWheelZoom.disable());

    // Cidades
    cities.forEach(c => {
        L.marker([c[1], c[2]], {
            interactive: false,
            icon: L.divIcon({ className: 'city-label', html: c[0], iconSize: [80, 16], iconAnchor: [-6, 8] })
        }).addTo(map);
    });

    // Marcadores de surfe
    const icon = () => L.divIcon({
        className: '',
        html: '<div class="surf-marker"></div>',
        iconSize: [18, 18], iconAnchor: [9, 9]
    });

    const esc = s => String(s).replace(/[&<>"']/g, ch => (
        { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[ch]
    ));

    const markers = [];
    const list = document.getElementById('spot-list');

    spots.forEach((s, i) => {
        const [name, lat, lng, region, desc] = s;

        const m = L.marker([lat, lng], { icon: icon() }).addTo(map);
        m.bindTooltip(name, { direction: 'top', offset: [0, -8] });
        m.bindPopup(`
            <div class="min-w-[180px]">
                <span class="text-[10px] uppercase tracking-widest text-teal-600">${esc(region)}</span>
                <h3 class="text-base font-bold text-teal-950 mb-1">${esc(name)}</h3>
                <p class="text-sm text-slate-600 leading-snug">${esc(desc)}</p>
                <a class="inline-block mt-2 text-xs font-semibold text-rose-600 hover:underline"
                   target="_blank" rel="noopener"
                   href="https://www.google.com/maps/search/?api=1&query=${lat},${lng}">Abrir no Google Maps →</a>
            </div>
        `);
        m.on('click', () => setActive(i, false));
        markers.push(m);

        const li = document.createElement('li');
        li.innerHTML = `
            <button type="button" data-i="${i}"
                class="w-full text-left px-4 py-3 hover:bg-teal-50 transition">
                <span class="block text-sm font-semibold text-slate-800">${esc(name)}</span>
                <span class="block text-xs text-slate-400">${esc(region)}</span>
            </button>`;
        li.dataset.name = name.toLowerCase();
        li.querySelector('button').addEventListener('click', () => setActive(i, true));
        list.appendChild(li);
    });

    let current = null;
    function setActive(i, fly) {
        if (current !== null) markers[current].getElement()?.firstChild.classList.remove('active');
        current = i;
        markers[i].getElement()?.firstChild.classList.add('active');
        if (fly) {
            map.flyTo(markers[i].getLatLng(), 13, { duration: .8 });
            markers[i].openPopup();
        }
        document.querySelectorAll('#spot-list button').forEach(b =>
            b.classList.toggle('bg-teal-50', Number(b.dataset.i) === i));
    }

    // Busca
    document.getElementById('search').addEventListener('input', e => {
        const q = e.target.value.trim().toLowerCase();
        list.querySelectorAll('li').forEach(li => {
            li.classList.toggle('hidden', q && !li.dataset.name.includes(q));
        });
    });

    // Ajusta o zoom para mostrar todos os pontos
    map.fitBounds(L.latLngBounds(spots.map(s => [s[1], s[2]])).pad(0.1));
</script>

</body>
</html>