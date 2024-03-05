<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pelicanos voley club</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="shortcut icon" href="img/pel_logo.png">
    <link rel="stylesheet" href="styles/output.css">
</head>

<body class="bg-cl3">
    <header>
        <nav class=" bg-cl1 w-full flex-col flex lg:flex-row">
            <div class=" flex  justify-between">
                <div class="w-60 lg:flex-shrink-0 py-2 flex justify-center items-center  ">
                    <img src="img/pel_logo.png" alt="" class="h-11 w-auto mr-4">
                    <div class="text-center  mb-0">
                        <h1 class="mb-0 leading-none">PELICANOS</h1>
                        <span class="text-white text-lg font-bold tracking-wide leading-none whitespace-nowrap">
                            VOLEY CLUB
                        </span>
                    </div>
                </div>
                <div class="flex lg:hidden  items-center mr-3">
                    <button id='boton'
                        class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-cl1 hover:bg-white">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
            </div>


            <div id="menu" class="w-full items-center hidden flex-col lg:flex lg:flex-row  ">
                <a href="#nosotros" class="w-full h-full">
                    <div
                        class="cursor-pointer w-full justify-center py-2 hover:bg-white text-center leading-snug text-white h-full  flex  items-center px-3 hover:text-cl1">

                        SOBRE NOSOTROS


                    </div>
                </a>

                <a href="#grandprix" class="w-full h-full">
                    <div
                        class="cursor-pointer w-full justify-center py-2 text-center hover:bg-white leading-snug text-white h-full  flex  items-center px-3 hover:text-cl1">
                        GRAND PRIX
                    </div>
                </a>
                <a href="#circuito_manizalita" class="w-full h-full">
                    <div
                        class="cursor-pointer w-full justify-center py-2 hover:bg-white text-center leading-snug text-white h-full  flex  items-center px-3 hover:text-cl1">

                        CIRCUITO MANIZALITA


                    </div>
                </a>
                <a href="#aprende" class="w-full h-full">
                    <div
                        class="cursor-pointer w-full justify-center  hover:bg-white text-white h-full  flex flex-wrap   items-center px-3 hover:text-cl1 py-2 mr-3">
                        APRENDE
                        <span class="whitespace-nowrap ml-1">
                            VOLEY PLAYA
                        </span>
                    </div>
                </a>
                <a href="#contacto" class="w-full h-full">
                    <div
                        class="cursor-pointer w-full justify-center py-2 hover:bg-white text-white h-full  flex  items-center px-3 hover:text-cl1">
                        CONTACTANOS
                    </div>
                </a>

            </div>

        </nav>



    </header>

    <main>
        <div class="lg:h-[450px] md:h-96 h-64  flex flex-col-reverse w-full  bg-cover"
            style="background-image: url('img/DSC_9852s.jpg');">

            <div class="h-16 bg-gradient-to-t from-cl3"></div>
        </div>

        <div class="lg:px-[15vh] px-6 md:px-16">

            <div class=" pt-24 ">
                <div id="nosotros" class="flex items-center  mb-14">
                    <div class="border-2 h-1 border-black w-full"></div>
                    <h1 class="text-black mx-8 text-center md:whitespace-nowrap"> SOBRE NOSOTROS</h1>
                    <div class="border-2 h-1 border-black w-full"></div>
                </div>
                <div class=" lg:flex-row flex flex-col items-center">
                    <p class="text-center">

                        Somos Pelicanos Voley Club, un Club de voleibol, ubicado en el Bosque popular el Prado de
                        Manizales; pionero en el voley playa ¨beach volleyball¨, un deporte de precisión, explosividad,
                        técnica, fuerza y velocidad, es todo un espectáculo en la arena. Somos profesionales en eventos,
                        torneos, la enseñanza, formación y metodología del voleibol de playa, con más de 7 años de
                        experiencia, pioneros en la región cafetera desde 2016. Una ventaja del entrenamiento descalzo
                        en la arena, es que se requiere de más esfuerzo, que en una superficie plana, mejorando la
                        condición física y mental, así generando progresos en menor tiempo. Juega voley playa, Anímate!
                        aprende con Pelicanos Voley Club.

                    </p>
                    <img src="img/team2.jpeg" alt="" class=" lg:w-2/5 mb-5 lg:mb-0  mt-5 md:mx-10">


                </div>




                <div
                    class="mt-6   py border-t-2 border-b-2 border-black py-2 lg:mt-16 flex items-center  justify-around  ">

                    <a href="https://wa.me/3113057249" target="_blank"
                        class="flex items-center cursor-pointer opacity-80 hover:opacity-100 btnins shrink-0 ">
                        <img src="img/logo blanco y negro pelicanos (1).png" class="h-20 opacity-100 im1"
                            alt="">
                        <img src="img/pelcol.png" class="h-20  hidden im2" alt="">
                        <div class="text-center hidden  mb-0 lg:block">
                            <h1 class="mb-0 leading-none text-black ">PELICANOS</h1>
                            <span class="text-lg font-bold tracking-wide leading-none whitespace-nowrap">
                                VOLEY CLUB
                            </span>
                        </div>
                        <img src="img/flechjas.png" alt="" class="h-16 ml-5 hidden md:block">
                        <img src="img/flechjas.png" alt="" class="h-16 hidden md:block">
                    </a>


                    <div class=" flex items-center py-2 shrink">
                        <a href="https://wa.me/3113057249" target="_blank"
                            class=" px-3 py-2 leading-none  rounded-lg white hover:opacity-90 border-2 border-cl1 btnins hover:border-transparent text-white bg-cl1 flex items-center text-center shrink">
                            Pide tu primer clase ¡Gratis!

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-whatsapp ml-2" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>

                        </a>

                    </div>

                    <a href="https://wa.me/3113057249" target="_blank"
                        class="flex flex-row-reverse btnins cursor-pointer shrink-0  items-center opacity-80 hover:opacity-100">
                        <img src="img/logo blanco y negro pelicanos (1).png" class="h-20 opacity-100  im1"
                            alt="">
                        <img src="img/pelcol.png" class="h-20 opacity-100  im2 hidden" alt="">
                        <div class="text-center  mb-0 hidden lg:block">
                            <h1 class="mb-0 leading-none text-black ">PELICANOS</h1>
                            <span class="text-lg font-bold tracking-wide leading-none whitespace-nowrap">
                                VOLEY CLUB
                            </span>
                        </div>
                        <img src="img/flechjas.png" alt="" class="h-16 mr-5 rotate-180 hidden md:block">
                        <img src="img/flechjas.png" alt="" class="h-16 rotate-180 hidden md:block">
                    </a>
                </div>



            </div>


            <div class="py-24">
                <div id="aprende" class="flex items-center mb-14">
                    <div class="border-2 h-1 border-black w-full"></div>
                    <h1 class="text-black mx-8 text-center md:whitespace-nowrap"> APRENDE VOLEY PLAYA</h1>
                    <div class="border-2 h-1 border-black w-full"></div>
                </div>
                <div class="lg:flex lg:flex-row flex-col items-center ">
                    <img src="img/aprendevoley.jpeg" alt="" class="lg:w-1/2 lg:mb-0 mt-5 md:mx-10">
                    <div class="flex flex-col items-center h-full mt-8 justify-between">
                        <p class="text-center">
                            ¿Quieres conocer el mundo del vóley playa? En Manizales, tenemos el mejor lugar para
                            aprender
                            sobre este apasionante deporte. Desarrolla tus capacidades físicas, de trabajo en equipo y
                            habilidades individuales, entre otras. Mejora tu técnica, tu salto vertical, tu fuerza,
                            velocidad, resistencia y toma rápida de decisiones. Aspectos que solo se pueden
                            desarrollar en
                            la arena, y el Club Pelícanos somos los más capacitados para brindarte esta experiencia.
                        </p>
                        <a href="https://wa.me/3113057249"
                            class="flex items-center mt-7 text-3xl  hover:opacity-100 opacity-80"> Pide tu primer clase
                            ¡Gratis!
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-whatsapp ml-4 text-green-800 font-bold"
                                viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                        </a>

                        <a href="https://wa.me/3113057249" target="_blank"
                            class=" px-3 py-2 leading-none mt-4 rounded-lg white hover:opacity-90 border-2 border-cl1 btnins hover:border-transparent text-white bg-cl1 flex items-center text-center shrink">
                            Click aqui
                            <img src="img/bb.png" alt="" class="h-5 ml-2 im1">
                            <img src="img/color.png" alt="" class="h-5 w-5 ml-2 im2 hidden rotate-45">
                        </a>
                    </div>

                </div>
            </div>

            <div class="py-24">
                <div id="circuito_manizalita" class="flex items-center mb-14">
                    <div class="border-2 h-1 border-black w-full"></div>
                    <h1 class="text-black mx-8 text-center md:whitespace-nowrap"> CIRCUITO MANIZALITA VOLEY PLAYA</h1>
                    <div class="border-2 h-1 border-black w-full"></div>
                </div>
                <div class="lg:flex lg:flex-row flex-col items-center ">
                    <img src="img/Imagen de WhatsApp 2024-03-01 a las 19.23.37_5a9e166b.jpg" alt=""
                        class="lg:w-1/2 lg:mb-0 mt-5 md:mx-10">
                    <div class="flex flex-col items-center h-full mt-8 justify-between">
                        <p class="text-center">
                            ¡Prepárate para vivir la emoción del voleibol de playa en el Circuito Cafetero Abierto! Sé
                            parte de este evento único que celebra la pasión por el deporte y la belleza natural de
                            Manizales. ¡Te esperamos con los brazos abiertos para un día inolvidable!
                        </p>

                        <a href="https://drive.google.com/drive/folders/1motuDhW3uLBemeRdyxkp78V8Brz9oCYK?usp=sharing"
                            target="_blank"
                            class=" px-3 py-2 leading-none mt-4 rounded-lg white hover:opacity-90 border-2 border-cl1 btnins hover:border-transparent text-white bg-cl1 flex items-center text-center shrink">
                            Momentos
                            <img src="img/bb.png" alt="" class="h-5 ml-2 im1">
                            <img src="img/color.png" alt="" class="h-5 w-5 ml-2 im2 hidden rotate-45">
                        </a>
                    </div>

                </div>
            </div>




            <div class=" py-8 ">
                <div id="grandprix" class="flex items-center  mb-14">
                    <div class="border-2 h-1 border-black w-full"></div>
                    <h1 class="text-black mx-8 text-center md:whitespace-nowrap"> GRAND PRIX</h1>
                    <div class="border-2 h-1 border-black w-full"></div>
                </div>
                <div class=" lg:flex-row flex flex-col items-center">
                    <p class="text-center" style="display: flex; flex-direction:column;">
                        Circuito cafetero de voley playa realizado en el Bosque Popular el Prado de Manizales, un torneo
                        para todos, sin restricciones y consta de 2 categorías principales Amateur( Grand Prix cafetero)
                        y Abierto (Grand Prix de la Montaña).
                        Grand Prix es un espacio para todos los amantes del deporte y jugadores de elite del voleibol de
                        playa,
                        donde las montañas y el ambiente playero se mezclan con la música y las altas exigencias de este
                        Magnifico deporte.



                        <a href="{{ route('login') }}" target="_blank"
                            class=" inline-block px-3 py-2 leading-none mt-4 rounded-lg white hover:opacity-90 border-2 border-cl1 btnins hover:border-transparent text-white bg-cl1 flex items-center text-center"
                            style="width: 200px; align-self:center"> Ingresa o registrate
                            <img src="img/bb.png" alt="" class="h-5 ml-2 im1">
                            <img src="img/color.png" alt="" class="h-5 w-5 ml-2 im2 hidden rotate-45">
                        </a>
                    </p>

                    <img src="img/Elementos Grand Prix-01.png" alt=""
                        class=" lg:w-1/3 mb-5 lg:mb-0  mt-5 md:mx-10">


                </div>


                <div
                    class="mt-6   py border-t-2 border-b-2 border-black py-2 lg:mt-16 flex items-center justify-around  ">


                    <a href="http://pelicanosvoleibol.blogspot.com" target="_blank"
                        class="flex items-center cursor-pointer opacity-80 hover:opacity-100 btnins ">
                        <img src="img/logo blanco y negro pelicanos (1).png" class="h-20 opacity-100 im1"
                            alt="">
                        <img src="img/pelcol.png" class="h-20  hidden im2" alt="">
                        <div class="text-center hidden  mb-0 lg:block">
                            <h1 class="mb-0 leading-none text-black ">PELICANOS</h1>
                            <span class="text-lg font-bold tracking-wide leading-none whitespace-nowrap">
                                VOLEY CLUB
                            </span>
                        </div>
                        <img src="img/flechjas.png" alt="" class="h-16 ml-5 hidden md:block">
                        <img src="img/flechjas.png" alt="" class="h-16 hidden md:block">
                    </a>


                    <div class=" flex items-center py-2 ">
                        <a href="http://pelicanosvoleibol.blogspot.com" target="_blank"
                            class=" px-3 py-2 leading-none  rounded-lg  whitespace-nowrap hover:opacity-90 border-2 border-cl1 btnins hover:border-transparent text-white bg-cl1 flex place-items-stretch">
                            Más información
                            <img src="img/bb.png" alt="" class="h-5 ml-2 im1">
                            <img src="img/color.png" alt="" class="h-5 w-5 ml-2 im2 hidden rotate-45">
                        </a>

                    </div>

                    <a href="http://pelicanosvoleibol.blogspot.com" target="_blank"
                        class="flex flex-row-reverse btnins cursor-pointer  items-center opacity-80 hover:opacity-100">
                        <img src="img/logo blanco y negro pelicanos (1).png" class="h-20 opacity-100 im1"
                            alt="">
                        <img src="img/pelcol.png" class="h-20 opacity-100  im2 hidden" alt="">
                        <div class="text-center  mb-0 hidden lg:block">
                            <h1 class="mb-0 leading-none text-black ">PELICANOS</h1>
                            <span class="text-lg font-bold tracking-wide leading-none whitespace-nowrap">
                                VOLEY CLUB
                            </span>
                        </div>
                        <img src="img/flechjas.png" alt="" class="h-16 mr-5 rotate-180 hidden md:block">
                        <img src="img/flechjas.png" alt="" class="h-16 rotate-180 hidden md:block">
                    </a>
                </div>



            </div>

            <div class="py-24">
                <div id="contacto" class="flex items-center mb-14">
                    <div class="border-2 h-1 border-black w-full"></div>
                    <h1 class="text-black mx-8 text-center md:whitespace-nowrap">CONTACTANOS</h1>
                    <div class="border-2 h-1 border-black w-full"></div>
                </div>
                <div class="lg:flex lg:flex-row flex-col items-center h-full justify-around">
                    <div class="flex flex-col items-center h-full mt-8 justify-between ">
                        <a href="https://www.facebook.com/Pelicanosvoleyclub" target="_blank"
                            class="px-4 hover:opacity-100 text-blue-700  opacity-80 flex items-center mb-4">
                            <!-- SVG Facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-facebook mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            Pelicanos Voley Club
                        </a>
                        <a href="https://www.instagram.com/pelicanosvoleyclub/" target="_blank"
                            class="px-4 hover:opacity-100 opacity-80 flex items-center mb-4">
                            <!-- SVG Instagram -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-instagram mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                            @pelicanosvoleyclub
                        </a>

                        <a href="https://www.youtube.com/@pelicanosvoleyclub6360" target="_blank"
                            class="px-4 hover:opacity-100 opacity-80 text-red-700 flex items-center mb-4">
                            <!-- SVG Youtube -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-youtube mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.122C.002 7.343.01 6.6.064 5.78l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                            Pelicanos Voley Club
                        </a>

                        <a href="https://wa.me/3113057249" target="_blank"
                            class="px-4 hover:opacity-100 opacity-80 text-green-700 flex items-center mb-4">
                            <!-- SVG Whatsapp -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-whatsapp mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            3113057249
                        </a>
                        <a href="http://pelicanosvoleibol.blogspot.com" target="_blank"
                            class="px-4 hover:opacity-100 opacity-80 flex items-center mb-4">
                            <!-- SVG BlogSpot -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                fill="currentColor" class="bi bi-blogspot mr-3" viewBox="0 0 448 512">
                                <path
                                    d="M162.4 196c4.8-4.9 6.2-5.1 36.4-5.1 27.2 0 28.1.1 32.1 2.1 5.8 2.9 8.3 7 8.3 13.6 0 5.9-2.4 10-7.6 13.4-2.8 1.8-4.5 1.9-31.1 2.1-16.4.1-29.5-.2-31.5-.8-10.3-2.9-14.1-17.7-6.6-25.3zm61.4 94.5c-53.9 0-55.8.2-60.2 4.1-3.5 3.1-5.7 9.4-5.1 13.9.7 4.7 4.8 10.1 9.2 12 2.2 1 14.1 1.7 56.3 1.2l47.9-.6 9.2-1.5c9-5.1 10.5-17.4 3.1-24.4-5.3-4.7-5-4.7-60.4-4.7zm223.4 130.1c-3.5 28.4-23 50.4-51.1 57.5-7.2 1.8-9.7 1.9-172.9 1.8-157.8 0-165.9-.1-172-1.8-8.4-2.2-15.6-5.5-22.3-10-5.6-3.8-13.9-11.8-17-16.4-3.8-5.6-8.2-15.3-10-22C.1 423 0 420.3 0 256.3 0 93.2 0 89.7 1.8 82.6 8.1 57.9 27.7 39 53 33.4c7.3-1.6 332.1-1.9 340-.3 21.2 4.3 37.9 17.1 47.6 36.4 7.7 15.3 7-1.5 7.3 180.6.2 115.8 0 164.5-.7 170.5zm-85.4-185.2c-1.1-5-4.2-9.6-7.7-11.5-1.1-.6-8-1.3-15.5-1.7-12.4-.6-13.8-.8-17.8-3.1-6.2-3.6-7.9-7.6-8-18.3 0-20.4-8.5-39.4-25.3-56.5-12-12.2-25.3-20.5-40.6-25.1-3.6-1.1-11.8-1.5-39.2-1.8-42.9-.5-52.5.4-67.1 6.2-27 10.7-46.3 33.4-53.4 62.4-1.3 5.4-1.6 14.2-1.9 64.3-.4 62.8 0 72.1 4 84.5 9.7 30.7 37.1 53.4 64.6 58.4 9.2 1.7 122.2 2.1 133.7.5 20.1-2.7 35.9-10.8 50.7-25.9 10.7-10.9 17.4-22.8 21.8-38.5 3.2-10.9 2.9-88.4 1.7-93.9z" />
                            </svg>
                            Club Pelicanos
                        </a>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63590.54575077858!2d-75.52368240512085!3d5.037222613777449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4765358e0b6ebd%3A0x38496231bc30cafc!2sClub%20de%20Voleibol%20Pelicanos%20Beach!5e0!3m2!1ses-419!2sco!4v1691625329551!5m2!1ses-419!2sco"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>




    </main>

    <footer class="w-full  bg-cl1 pb-7">

        <div class="h-24 bg-gradient-to-b from-cl3"> </div>
        <div class="lg:px-[15vh] px-6 md:px-16 py-8">
            <div
                class="md:py-12 py-8 border-b border-t border-white md:flex-row items-center flex flex-col md:justify-around  text-white xl:px-64  my-10 border-opacity-40 justify-between">
                <a href="#nosotros"
                    class="text-sm hover:opacity-100 opacity-80 hover:underline underline-offset-8 mb-3 ">Sobre
                    Nosotros</a>
                <a href="#aprende"
                    class="text-sm hover:opacity-100 opacity-70  hover:underline underline-offset-8 mb-3 ">Aprende
                    Voley</a>
                <a href="#grandprix"
                    class="text-sm hover:opacity-100 opacity-70  hover:underline underline-offset-8 mb-3 ">Grand
                    Prix</a>

                <a href="#contacto"
                    class="text-sm hover:opacity-100 opacity-70  hover:underline underline-offset-8  mb-3 ">Contactanos</a>

            </div>
            <div class="w-full h-full items-center justify-around ">



                <a href="" class="flex    items-center opacity-80 hover:opacity-100 cursor-pointer">
                    <img src="img/pelcol.png" class="h-20 opacity-100 mr-3" alt="">
                    <div class="text-center  mb-0 ">
                        <h1 class="mb-0 leading-none  text-xl">PELICANOS</h1>
                        <span class=" font-bold tracking-wide text-white text-xl leading-none whitespace-nowrap">
                            VOLEY CLUB
                        </span>
                    </div>
                </a>
                <div id="" class="flex flex-col items-center">
                    <h2 class="text-lg mb-5 ">Siguenos en nuestras redes</h2>
                    <div class="lg:flex  h-auto items-center">
                        <a href="https://www.facebook.com/Pelicanosvoleyclub" target="_blank"
                            class="px-4 hover:opacity-100 text-white opacity-50 flex items-center mb-4">
                            <!-- SVG Facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-facebook mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            Pelicanos Voley Club
                        </a>
                        <a href="https://www.instagram.com/pelicanosvoleyclub/" target="_blank"
                            class="px-4 hover:opacity-100 opacity-50 text-white flex items-center mb-4">
                            <!-- SVG Instagram -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-instagram mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                            @pelicanosvoleyclub
                        </a>

                        <a href="https://www.youtube.com/@pelicanosvoleyclub6360" target="_blank"
                            class="px-4 hover:opacity-100 opacity-50 text-white flex items-center mb-4">
                            <!-- SVG Youtube -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-youtube mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.122C.002 7.343.01 6.6.064 5.78l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                            Pelicanos Voley Club
                        </a>

                        <a href="https://wa.me/3113057249" target="_blank"
                            class="px-4 hover:opacity-100 opacity-50 text-white flex items-center mb-4">
                            <!-- SVG Whatsapp -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-whatsapp mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            3113057249
                        </a>
                        <a href="http://pelicanosvoleibol.blogspot.com" target="_blank"
                            class="px-4 hover:opacity-100 opacity-50 text-white flex items-center mb-4">
                            <!-- SVG BlogSpot -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-blogspot mr-3" viewBox="0 0 448 512">
                                <path
                                    d="M162.4 196c4.8-4.9 6.2-5.1 36.4-5.1 27.2 0 28.1.1 32.1 2.1 5.8 2.9 8.3 7 8.3 13.6 0 5.9-2.4 10-7.6 13.4-2.8 1.8-4.5 1.9-31.1 2.1-16.4.1-29.5-.2-31.5-.8-10.3-2.9-14.1-17.7-6.6-25.3zm61.4 94.5c-53.9 0-55.8.2-60.2 4.1-3.5 3.1-5.7 9.4-5.1 13.9.7 4.7 4.8 10.1 9.2 12 2.2 1 14.1 1.7 56.3 1.2l47.9-.6 9.2-1.5c9-5.1 10.5-17.4 3.1-24.4-5.3-4.7-5-4.7-60.4-4.7zm223.4 130.1c-3.5 28.4-23 50.4-51.1 57.5-7.2 1.8-9.7 1.9-172.9 1.8-157.8 0-165.9-.1-172-1.8-8.4-2.2-15.6-5.5-22.3-10-5.6-3.8-13.9-11.8-17-16.4-3.8-5.6-8.2-15.3-10-22C.1 423 0 420.3 0 256.3 0 93.2 0 89.7 1.8 82.6 8.1 57.9 27.7 39 53 33.4c7.3-1.6 332.1-1.9 340-.3 21.2 4.3 37.9 17.1 47.6 36.4 7.7 15.3 7-1.5 7.3 180.6.2 115.8 0 164.5-.7 170.5zm-85.4-185.2c-1.1-5-4.2-9.6-7.7-11.5-1.1-.6-8-1.3-15.5-1.7-12.4-.6-13.8-.8-17.8-3.1-6.2-3.6-7.9-7.6-8-18.3 0-20.4-8.5-39.4-25.3-56.5-12-12.2-25.3-20.5-40.6-25.1-3.6-1.1-11.8-1.5-39.2-1.8-42.9-.5-52.5.4-67.1 6.2-27 10.7-46.3 33.4-53.4 62.4-1.3 5.4-1.6 14.2-1.9 64.3-.4 62.8 0 72.1 4 84.5 9.7 30.7 37.1 53.4 64.6 58.4 9.2 1.7 122.2 2.1 133.7.5 20.1-2.7 35.9-10.8 50.7-25.9 10.7-10.9 17.4-22.8 21.8-38.5 3.2-10.9 2.9-88.4 1.7-93.9z" />
                            </svg>
                            Club Pelicanos
                        </a>

                    </div>
                    <h2 class="text-lg mb-5 mt-8">Produly and powered by <a
                            href="https://kumandaystudios.netlify.app">Kumanday Studios</a></h2>
                </div>


            </div>
        </div>

    </footer>
</body>

</html>
