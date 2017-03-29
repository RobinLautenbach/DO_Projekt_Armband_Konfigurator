<html>
<head>
    <link href="style.css" rel="stylesheet">

    <!-- Bootstrap-CSS -->
    <link href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Jumbotron -->
    <link href="../../Assets/bootstrap/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="../../Assets/css/agency.min.css" rel="stylesheet">
    <link href="../../Assets/css/start.css" rel="stylesheet">

    <!-- Javascript -->
    <script src="../../Assets/js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="generateBracelet.js"></script>
    <script language="javascript" type="text/javascript" src="dragndrop.js"></script>
    <script language="javascript" type="text/javascript" src="generateXML.js"></script>
    <script language="javascript" type="text/javascript" src="calcPrice.js"></script>

</head>

<body>

<div class="container">



    <div class="jumbotron">
        <h1>OPPISE7EN KONFIGURATOR</h1>
        <p class="lead">Erstellen Sie ihr individuelles, handgefertigtes <br>Damen- und Herren Bracelet in der <br>bewährten OPPISE7EN Qualität.</p>
    </div>



    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">1. Auswahl</h2>
                    <h3 class="section-subheading text-muted">Wählen Sie ihre Grundkonfiguration.</h3>
                </div>
            </div>
            <div class="bracelets">
                <div class="portfolio-item" id="Basic">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <h4>choose a size</h4><br>
                                <div class="sizes">
                                    <div class="size-choose size-s basic"></div>
                                    <div class="size-choose size-m basic"></div>
                                    <div class="size-choose size-l basic"></div>
                                </div>
                            </div>
                        </div>
                        <img src="../../Assets/img/portfolio/basic.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Basic</h4>
                        <p class="text-muted">Einfach elegant.</p>
                    </div>
                </div>
                <div class="portfolio-item" id="Skull">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <h4>choose a size</h4><br>
                                <div class="sizes">
                                    <div class="size-choose size-s skull"></div>
                                    <div class="size-choose size-m skull"></div>
                                    <div class="size-choose size-l skull"></div>
                                </div>
                            </div>
                        </div>
                        <img src="../../Assets/img/portfolio/skull.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Skull</h4>
                        <p class="text-muted">Motivation.</p>
                    </div>
                </div>
                <div class="portfolio-item" id="Lion">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <h4>choose a size</h4><br>
                                <div class="sizes">
                                    <div class="size-choose size-s lion" data-size="S"></div>
                                    <div class="size-choose size-m lion" braceletSize="M"></div>
                                    <div class="size-choose size-l lion" braceletSize="L"></div>
                                </div>
                            </div>
                        </div>
                        <img src="../../Assets/img/portfolio/lion.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Lion</h4>
                        <p class="text-muted">Löwenstark.</p>
                    </div>
                </div>
            </div>
            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" style="color:black; text-align: center; position: relative; width: 100% !important; margin-left: 20px">Welche Größe passt mir?</a>
        </div>
    </section>






    <section class="m-configurator__builder bg-light-gray col-md-12">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">2. Konfiguration</h2>
                <h3 class="section-subheading text-muted">Lassen Sie Ihrer Kreativität freien Lauf.</h3>
            </div>
        </div>





        <div id="palette" class="col-md-2" >
            <h3>Palette</h3>
            <div class='ball_container palette_ball' id='ball_grey'  >
                <h4>Grey</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/grey.png' width='40px' data-model='grey' data-price='0'/>
                </div>
            </div>
            <div class='ball_container palette_ball' id='ball_lava'  >
                <h4>Lava</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/lava.png' width='40px' data-model='lava' data-price='0'/>
                </div>
            </div>
            <div class='ball_container palette_ball' id='ball_turquoise'  >
                <h4>Turquoise</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/turquoise.png' width='40px' data-model='turquoise' data-price='0'/>
                </div>
            </div>
            <div class='ball_container palette_ball' id='ball_tiger'>
                <h4>Tiger (+ 0,5€)</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/tiger.png' width='40px' data-model='tiger' data-price='0.5' />
                </div>
            </div>
            <div class='ball_container palette_ball' id='ball_blue'>
                <h4>Blue (+ 0,5€)</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/blue.png' width='40px' data-model='blue' data-price='0.5' />
                </div>
            </div>
            <div class='ball_container palette_ball' id='ball_moon'>
                <h4>Moon (+ 1€)</h4>
                <div class="ball" draggable='true'>
                    <img src='../../Assets/img/moon.png' width='40px' data-model='moon' data-price='1'/>
                </div>
            </div>


            <div class="palette__change" draggable="true">
                <h5>Alle ändern</h5>
            </div>
        </div>

        <div id="bracelet_container" class="col-md-6" data-price="35" data-priceTotal="35">

            <div id="bracelet" data-price="35" data-priceTotal="35">

            </div>

            <div class="pendant" data-price="5">
                <input class="pendant__trigger" type="radio" id="pendant-lion-black" name="pendant__radio" />
                <div class="pendant__content">
                    <img src="../../Assets/img/pendant-lion-black.png" alt="" class="pendant__content__image" data-price="5" data-model="lion" data-color="black">
                </div>

                <input class="pendant__trigger" type="radio" id="pendant-lion-gold" name="pendant__radio"/>
                <div class="pendant__content">
                    <img src="../../Assets/img/pendant-lion-gold.png" alt="" class="pendant__content__image" data-price="5" data-model="lion" data-color="gold">
                </div>

                <input class="pendant__trigger" type="radio" id="pendant-lion-rose" name="pendant__radio" />
                <div class="pendant__content">
                    <img src="../../Assets/img/pendant-lion-rose.png" alt="" class="pendant__content__image" data-price="5" data-model="lion" data-color="rose">
                </div>
            </div>

        </div>



        <div id="pendant_select" class="col-md-4" >
            <h4>Anhänger (+ 5€)</h4>
            <!-- TODO iterate through existing XML elements -->
            <label class="pendant__label" for="pendant-lion-black">
                <h4 class=pendant__label__headline" hidden="true"></h4>
                <img src="../../Assets/img/pendant-lion-black.png" alt="" class="pendant__label__image">
            </label>
            <label class="pendant__label" for="pendant-lion-gold">
                <h4 class=pendant__label__headline" hidden="true"></h4>
                <img src="../../Assets/img/pendant-lion-gold.png" alt="" class="pendant__label__image">
            </label>
            <label class="pendant__label" for="pendant-lion-rose">
                <h4 class=pendant__label__headline" hidden="true"></h4>
                <img src="../../Assets/img/pendant-lion-rose.png" alt="" class="pendant__label__image">
            </label>
            <!-- TODO first radio checked -->

        </div>

        <div id="size_select" class="col-md-4">
            <h4>Wähle die Größe</h4><br>

            <input class="size__trigger size-s" type="radio" id="size-s-trigger" name="size__radio"  />
            <label class="size__label" for="size-s-trigger">
                <div class="size-choose size-s"></div>
            </label>

            <input class="size__trigger size-m" type="radio" id="size-m-trigger" name="size__radio" checked="checked"/>
            <label class="size__label" for="size-m-trigger">
                <div class="size-choose size-m"></div>
            </label>

            <input class="size__trigger size-l" type="radio" id="size-l-trigger" name="size__radio" />
            <label class="size__label" for="size-l-trigger">
                <div class="size-choose size-l"></div>
            </label>


        </div>

        <div id="braceletprice" class="col-md-2" >
            <div id="price-info">
                <h4>Basispreis:</h4>
                <p><span class="counter">35</span> Euro</p>
            </div>

            <div id="price_pendant">
                <h4>+ Anhänger:</h4>
                <p><span class="counter">0</span> Euro</p>
            </div>
            <div id="price_balls">
                <h4>+ Spezialkugeln:</h4>
                <p><span class="counter">0</span> Euro</p>
            </div>
            <div id="price_total">
                <h4>Gesamtpreis: </h4>
                <p><span class="counter">35</span> Euro</p>
            </div>
        </div>
    </section>




    <section id="test" class="col-md-12" >
        <div id="editBracelet">
            <h3>Modell</h3>
            <form id="modelForm">
                <div class="form-group">
                    <label for="braceletModel">Modell</label>
                    <input type="text" class="form-control" id="braceletModel" placeholder="Modell" value="Basic">
                </div>
                <div class="form-group">
                    <label for="braceletSize">Größe</label>
                    <input type="text" class="form-control" id="braceletSize" placeholder="Größe" value="M">
                </div>
            </form>
            <h3>Kugeln</h3>
            <form id="orbsForm">
                <div class="form-group" id="orbsAll">
                    <input type="text" class="form-control" id="orbStyle" placeholder="Kugel">
                </div>
                <div class="form-group">
                    <label for="orbSize">Größe</label>
                    <input type="text" class="form-control" id="orbSize" placeholder="Kugelgröße" value="8mm">
                </div>
            </form>
            <h3>Pendant</h3>
            <form id="pendantForm">
                <div class="form-group">
                    <label for="pendantModel">Anhängermodell</label>
                    <input type="text" class="form-control" id="pendantModel" placeholder="Wunschanhänger">
                </div>
                <div class="form-group">
                    <label for="pendantColor">Farbe</label>
                    <input type="text" class="form-control" id="pendantColor" placeholder="Anhängerfarbe">
                </div>
            </form>
        </div>

        <button id="generate">Generieren</button>
    </section>




    <footer class="footer">
        <p>&copy; Oppi7 2016</p>
    </footer>


</div>

</body>

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->
<script src="../../Assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script>
    $( document ).ready(function() {
        var stadardkugel = '../../Assets/img/grey.png';
        var kugelgroesse = '8mm';
        var kugelanzahl = 24;

        const bracelet = document.querySelector('#bracelet');

        //Function for generating bracelet
        generateBracelet(bracelet, kugelanzahl, stadardkugel, kugelgroesse);
        dragNDrop();
    });
</script>

<script>
    $('.size__trigger').change(function(){

        // Vars
        var stadardkugel = '../../Assets/img/grey.png';
        var kugelgroesse = '8mm';
        var kugelanzahl = 24;

        if ($(this).hasClass("size-s")) {
            $('#braceletSize').val('S');
            kugelanzahl = 22;
            //TODO größe anpassen
            //$('.ball').css('width', '8.5%');
        } else if ($(this).hasClass("size-m")) {
            $('#braceletSize').val('M');
            var kugelanzahl = 24;
        } else {
            $('#braceletSize').val('L');
            var kugelanzahl = 26;
        }

        if ($(this).hasClass("basic")) {
            $('#braceletModel').val('Basic');
        } else if ($(this).hasClass("skull")) {
            $('#braceletModel').val('Skull');
        } else {
            $('#braceletModel').val('Lion');
        }

        document.querySelector('#orbSize').value = kugelgroesse;

        const bracelet = document.querySelector('#bracelet');


        //Function for generating bracelet
        generateBracelet(bracelet, kugelanzahl, stadardkugel, kugelgroesse);

        dragNDrop();

    });



    $(".pendant__label").on("click", function()
    {
        $(".pendant__label").removeClass("active");
        $(this).addClass("active")

        const bracelet = $('#bracelet');
        const braceletprice = $('#braceletprice');
        calcPrice(bracelet, braceletprice);
    });

    $(".pendant__label").on("mouseup", function()
    {
        const bracelet = $('#bracelet');
        const braceletprice = $('#braceletprice');
        calcPrice(bracelet, braceletprice);
    });





    $("#generate").on("click", function(){
        generateXML();
    });


</script>

</html>