<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/ghm2efo.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./src/output.css" rel="stylesheet">
</head>

<body class="bg-black">
    <main>
        <div class="fixed inset-x-0 top-0 h-[55svh] md:inset-0 md:h-auto -z-10">
            <img src="./assets/img/englandImage.png"
                class="w-full h-full object-cover object-[35%_center] md:object-center" alt="">
        </div>

        <div class="relative min-h-[55svh] md:min-h-[100svh] overflow-hidden">
            <h1 class="font-impact text-white text-left leading-[0.9] md:leading-none
                        text-[min(22vw,10rem)] md:text-[min(14vw,10rem)]
                        p-4 md:p-10 mt-8 md:mt-20 md:ml-10">
                Ingla<span class="block md:inline">terra</span>
            </h1>

            <svg id="onda-svg" class="absolute bottom-0 left-0 block w-full pointer-events-none" viewBox="0 0 1200 200"
                aria-hidden="true">
                <defs>
                    <path id="onda" />
                </defs>
                <text id="txt" font-size="48" font-weight="700" fill="white">
                    <textPath id="tp" href="#onda"></textPath>
                </text>
            </svg>
        </div>

        <section>
            <div class="bg-black p-10">
                <p
                    class="font-impact text-white text-left text-7xl sm:text-8xl md:text-[8rem] p-4 md:p-10 mt-10 md:mt-20 md:ml-10 mb-10">
                    Sobre
                </p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-8">
                    <div class="relative overflow-hidden">
                        <img class="w-full h-full object-cover" src="./assets/img/surfeCard.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl">Surfe
                        </p>
                    </div>

                    <div class="relative overflow-hidden">
                        <img class="w-full h-full object-cover" src="./assets/img/bigBang.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl">
                            Cápsula do Tempo</p>
                    </div>

                    <div class="relative overflow-hidden">
                        <img class="w-full h-full object-cover" src="./assets/img/futebol2.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl">
                            Identidade Visual</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="bg-orange-50 p-10">
                <p
                    class="font-impact text-slate-800 text-left text-7xl sm:text-8xl md:text-[8rem] p-4 md:p-10 mt-10 md:mt-20 md:ml-10 mb-10">
                    Cultura Inglesa
                </p>

                <div class="grid grid-cols-2 gap-4 md:grid-cols-6 md:gap-8">
                    <div class="relative overflow-hidden col-span-2 md:col-span-4 aspect-[3/2]">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="./assets/img/horizontalImage.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>
                    <div class="relative overflow-hidden col-span-2 md:col-span-2 aspect-[3/2] md:aspect-auto">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="./assets/img/verticalImage.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>
                    <div class="relative overflow-hidden col-span-1 md:col-span-2 aspect-[3/2]">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="./assets/img/galeria3.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>
                    <div class="relative overflow-hidden col-span-1 md:col-span-2 aspect-[3/2]">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="./assets/img/galeria4.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>
                    <div class="relative overflow-hidden col-span-2 md:col-span-2 aspect-[3/2]">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="./assets/img/galeria5.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <script>
        const frase = "Mais que um país. Uma experiência inteira. Onde se encontra a cultura.";
        const separador = "\u00A0\u00A0\u00A0•\u00A0\u00A0\u00A0";
        const velocidade = 90;

        const svg = document.getElementById("onda-svg");
        const caminho = document.getElementById("onda");
        const texto = document.getElementById("txt");
        const tp = document.getElementById("tp");

        let raf = null;
        let ultimaLargura = 0;

        function iniciar() {
            cancelAnimationFrame(raf);

            const w = svg.clientWidth;
            ultimaLargura = w;
            const s = Math.min(1, Math.max(0.55, w / 1200));
            const H = 200 * s;

            svg.setAttribute("viewBox", `0 0 ${w} ${H}`);
            svg.style.height = H + "px";
            texto.setAttribute("font-size", 48 * s);

            const c = H / 2;
            const a = 60 * s;
            const passo = 300 * s;
            let d = `M0,${c} C${passo / 3},${c - a} ${(2 * passo) / 3},${c + a} ${passo},${c}`;
            for (let k = 2; k <= 80; k++) {
                d += ` S${passo * k - passo / 3},${k % 2 === 0 ? c - a : c + a} ${passo * k},${c}`;
            }
            caminho.setAttribute("d", d);

            const unidade = frase + separador;
            tp.textContent = unidade;
            const largura = texto.getComputedTextLength();

            const vezes = Math.ceil(w / largura) + 2;
            tp.textContent = unidade.repeat(vezes);

            const vel = velocidade * s;
            let inicio = null;

            function quadro(t) {
                if (inicio === null) inicio = t;
                const deslocamento = -(((t - inicio) / 1000) * vel) % largura;
                tp.setAttribute("startOffset", deslocamento);
                raf = requestAnimationFrame(quadro);
            }
            raf = requestAnimationFrame(quadro);
        }

        let timer;
        window.addEventListener("resize", () => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                if (svg.clientWidth !== ultimaLargura) iniciar();
            }, 150);
        });

        document.fonts.ready.then(iniciar);
    </script>
</body>

</html>