
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oppi7 Konfigurator</title>

    <!-- Font Awesome -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap-CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Besondere Stile für diese Vorlage -->
    <link href="bootstrap/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">

    <link href="css/start.css" rel="stylesheet">
    <link href="configurator.css" rel="stylesheet">

 
  </head>

  <body>


    <!--Modal-->
              <!-- Großes Modal -->
              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="meinGroßesModalLabel">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="col-lg-12">
                        <h3>Size Guide</h3>
                      </div>
                      <div class="col-lg-12">
                        <strong>S = 16-17cm</strong> (für Frauen & Männer mit dünner Statur)
                        <br>
                        <strong>M = 17-18cm</strong> (für Männer mit durchschnittlicher Statur)
                        <br>
                        <strong>L = 18-19cm</strong> (für Männer mit kräftiger Statur)
                      </div>
                      <img src="img/size/whichsize1.png" width="100%"/>
                      <img src="img/size/whichsize2.png" width="100%"/>

                  </div>
                </div>
              </div>



              <!-- Kleines Modal -->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="meinKleinesModalLabel">
              <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="ballid" hidden="true"></div>
                <h3>Choose your balls:</h3>
                <div class="clearfix"></div>
                <div class="chooseBalls">
					<img class="chooseBall" src="img/grey.png" width="50px"/>
					<img class="chooseBall" src="img/lava.png" width="50px"/>
					<img class="chooseBall" src="img/tiger.png" width="50px"/>
					<img class="chooseBall" src="img/blue.png" width="50px"/>
					<img class="chooseBall" src="img/white.png" width="50px"/>
					<img class="chooseBall" src="img/turquoise.png" width="50px"/>
					<img class="chooseBall" src="img/moon.png" width="50px"/>
                </div>
              </div>
              </div>
            </div>



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
                          <img src="img/portfolio/basic.jpg" class="img-responsive" alt="">
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
                          <img src="img/portfolio/skull.jpg" class="img-responsive" alt="">
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
                          <img src="img/portfolio/lion.jpg" class="img-responsive" alt="">
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

       <!-- Portfolio Grid Section -->
      <section id="configurator" style="height: 1200px; width: 100%" class="bg-light-gray" hidden="true">
          
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">2. Konfiguration</h2>
					<h3 class="section-subheading text-muted">Lassen Sie Ihrer Kreativität freien Lauf.</h3>
				</div>
			</div>
            
			<div id="bracelet">
			</div>
			
      </section>


		<section id="test">
			<div id="editBracelet">
				<h3>Modell</h3>
				<form id="modelForm">
				  <div class="form-group">
					<label for="braceletModel">Modell</label>
					<input type="text" class="form-control" id="braceletModel" placeholder="Modell">
				  </div>
				  <div class="form-group">
					<label for="braceletSize">Größe</label>
					<input type="text" class="form-control" id="braceletSize" placeholder="Größe">
				  </div>
				</form>
				<h3>Kugeln</h3>
				<form id="orbsForm">
				  <div class="form-group" id="orbsAll">
					<input type="text" class="form-control" id="orbStyle" placeholder="Kugel">
				  </div>
				  <div class="form-group">
					<label for="orbSize">Größe</label>
					<input type="text" class="form-control" id="orbSize" placeholder="Kugelgröße">
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
			
			<button id="generate">Generieren</a>
		</section>
		<footer class="footer">
			<p>&copy; Oppi7 2016</p>
		</footer>
    </div> <!-- /container -->


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

	
    <script>
    $( document ).ready(function() {
		// Cache your elements:
		/*var $sizechoose = document.getElementsByClassName('size-choose');

		// You nice function:
		function myPopup() {
			console.log( this );
			if(this.getAttribute("data-size") == 'S'){
				console.log('huibuh');
			}
		}

		// Assign a click event handler to every element:
		for(var i=0; i<$sizechoose.length; i++) {
			$sizechoose[i].onclick = myPopup;
		}*/
		
        $('.size-choose').on('click', function(){		  
			var stadardKugel = 'img/grey.png';
			var kugelgroesse = '8mm';
			var kugelanzahl = 0;
			  
			if ($(this).hasClass("size-s")){
				$('#braceletSize').val('S');
				kugelanzahl = 22;
				//TODO größe anpassen
				//$('.ball').css('width', '8.5%');
			} else if ($(this).hasClass("size-m")){
				$('#braceletSize').val('M');
				var kugelanzahl = 24;
			} else{
				$('#braceletSize').val('L');
				var kugelanzahl = 26;
			}
			  
			if ($(this).hasClass("basic")){
				$('#braceletModel').val('Basic');
			} else if ($(this).hasClass("skull")){
				$('#braceletModel').val('Skull');
			} else{
				$('#braceletModel').val('Lion');
			}
			
			document.querySelector('#orbSize').value = kugelgroesse;
			  
					  
			  
			//Generate Platzhalter:var kugelanzahl = 24;
				
			var degree = 360/ kugelanzahl;
			var html = '';
			var degree_total = 0;
			
			for(var i=0; i < kugelanzahl; i++){
				html += "<div class='ball' id='ball"+i+"' data-ball-number='"+i+"' data-toggle='modal' data-target='.bs-example-modal-sm'>"+i+"<img src='"+stadardKugel+"' width='90%'/></div>";
			}
			
			const bracelet = document.querySelector('#bracelet');
			bracelet.innerHTML = html;
				
			//Generate Kugelformularfelder
			var htmlOrbsAll =''
			for(var i=0; i < kugelanzahl; i++){
				htmlOrbsAll += '<input type="text" class="form-control" id="orbStyle'+i+'" value="'+stadardKugel+'">';
			}
			
			const orbsAll = document.querySelector('#orbsAll');
			orbsAll.innerHTML = htmlOrbsAll;
				
				
				
			//---- Change Ball -----
			$('.ball').on('click', function(){
				var test = $(this);
				console.log(test.data("ball-number"));
				var id = $(this).attr('id');
				console.log(id);
				$('.ballid').html(id);
			});
			
			$('.chooseBall').on('click', function(){
				var id = $('.ballid').html();
				var choosenColor = $(this).attr('src');
				console.log(choosenColor);
				//orb felder füllen
				var numberPattern = /\d+/g;
				var pureid = id.match( numberPattern )
				$('#orbStyle'+pureid).val(choosenColor);
				
				$('#'+id).find('img').attr("src",choosenColor);
				
				//$('#'+id).css('background-image', 'url('+choosenColor+')');
				$('.bs-example-modal-sm').modal('toggle')
			});
			
			
			//---- rotate div boxes ----
			for(var i=0; i < kugelanzahl; i++){
				degree_total = degree_total + degree;
				$('#ball'+i).css({ 'transform': 'rotate(' + degree_total + 'deg)'});
			}
		  
		  
			$('#portfolio').hide();
			$('#configurator').fadeIn(2000);
        });   
    });
    </script>

  </body>
</html>
