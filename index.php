<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/ghm2efo.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./src/output.css" rel="stylesheet">
    <title>EnglandExperience</title>
</head>

<body class="bg-black">
    <header>
        <nav class="px-4 lg:px-6 py-2.5">
            <div class="fixed right-10 flex flex-wrap justify-end items-center w-full max-w-screen-xl z-10">
                <div class="flex items-center lg:order-2">
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="./index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                        </li>
                        <li>
                            <a href="./surfe.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Surfe</a>
                        </li>
                        <li>
                            <a href="./capsulaTempo.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Capsula do Tempo</a>
                        </li>
                        <li>
                            <a href="./identidadeVisual.php" class="block py-2 pr-4 pl-3 text-dark border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-black lg:dark:hover:text-black dark:hover:bg-gray-700 dark:hover:text-black lg:dark:hover:bg-transparent dark:border-gray-700">Identidade Visual</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
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
                <p class="font-impact text-white text-left text-7xl sm:text-8xl md:text-[8rem] p-4 md:p-10 mt-10 md:mt-20 md:ml-10 mb-10 cursor-pointer">
                    <span class="bg-gradient-to-r from-rose-600 to-rose-600 bg-no-repeat bg-[length:0%_100%] transition-[background-size] duration-700 hover:bg-[length:100%_100%]">
                        Sobre
                    </span>
                </p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-8">
                    <div class="group relative overflow-hidden">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115" src="./assets/img/surfeCard.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl group-hover:text-rose-600"> Surfe </p>
                    </div>
                    <div class="group relative overflow-hidden">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115" src="./assets/img/bigBang.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl group-hover:text-rose-600"> Cápsula do Tempo </p>
                    </div>
                    <div class="group relative overflow-hidden">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115" src="./assets/img/futebol2.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
                        </div>
                        <p class="absolute bottom-0 left-0 p-4 md:p-6 font-impact text-white text-3xl md:text-6xl group-hover:text-rose-600"> Identidade Visual </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="bg-orange-50 p-10">
                <p class="font-impact text-slate-800 text-left text-7xl sm:text-8xl md:text-[8rem] p-4 md:p-10 mt-10 md:mt-20 md:ml-10 mb-10 cursor-pointer">
                    <span class="bg-gradient-to-r from-rose-600 to-rose-600 bg-no-repeat bg-[length:0%_100%] transition-[background-size] duration-700 hover:bg-[length:100%_100%]">
                        Cultura Inglesa
                    </span>
                </p>
                <div class="relative grid grid-cols-2 gap-4 md:grid-cols-6 md:gap-8
            before:fixed before:inset-0 before:z-10 before:bg-black/70
            before:opacity-0 before:pointer-events-none
            before:transition-opacity before:duration-500
            has-[.gallery-item:hover]:before:opacity-100">

                    <div class="gallery-item relative overflow-hidden col-span-2 md:col-span-4 aspect-[3/2] hover:z-20">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115"
                            src="./assets/img/horizontalImage.png" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>

                    <div class="gallery-item relative overflow-hidden col-span-2 md:col-span-2 aspect-[3/2] md:aspect-auto hover:z-20">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115"
                            src="./assets/img/verticalImage.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>

                    <div class="gallery-item relative overflow-hidden col-span-1 md:col-span-2 aspect-[3/2] hover:z-20">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115"
                            src="./assets/img/horizontalImage2.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>

                    <div class="gallery-item relative overflow-hidden col-span-1 md:col-span-2 aspect-[3/2] hover:z-20">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115"
                            src="./assets/img/horizontalImage3.jpg" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    </div>

                    <div class="gallery-item relative overflow-hidden col-span-2 md:col-span-2 aspect-[3/2] hover:z-20">
                        <img class="w-full h-full object-cover transition duration-500 hover:scale-115"
                            src="./assets/img/horizontalImage4.jpg" alt="">
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