<div class=llamar><div class=icono></div></div>
<!-- FIN Script numero -->
<link rel="stylesheet" href="<?php print base_path(); ?>sites/default/themes/deleitese/css/google-places.css">
<div id="establecimiento">
    <div id="slider1_container" style="position: relative; margin: 0 auto;top: 0px; left: 0px; width: 1400px; height: 500px; overflow: hidden;">
        <!-- Slides -->
        <div u="slides" class="slideImg"  style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1400px; height: 500px; overflow: hidden;">
        <?php 
        if (!empty($node->field_fachada)) {   
          $i=0;
          foreach($node->field_fachada['und'] as $imagen) {           
            $foto = substr($content['field_fachada'][$i]['#item']['uri'],8);
            print "<div>";
            print "
                <img u=image src='".base_path()."sites/default/files".$foto."' alt='".render($content['field_fachada'][$i]['#item']['alt'])."' width='100%; height='auto'/>
              </div>";
                $i++;
                }   
            }    
        ?> 
      </div>
      <span u="arrowleft" class="jssora21l"></span>
      <span u="arrowright" class="jssora21r"></span>
    </div>
    
    <div class="contenido">  
        <div class="izq">
          <h1 class="titulo"><?php print $title;?></h1>
          <?php
          if (!empty($content['field_especialidad'])){ 
            print "<div class=especialidad>".render($content['field_especialidad'])."</div>";
            }
          ?>
          <div class="texto"><?php print render($content['body']);?></div>   
        </div>
        <div class="der">
            <div class="up">
                <div class="logo"><?php print render($content['field_logo']);?></div>
                
                <div class="valoracion">
                  <div class="estrellas"></div>
                  <div class="fivestar-basic"><?php print render($content['field_valoracion']); ?></div>
                  <span>Calificación</span>
                </div>
                
            </div>
            <div class="down">
                <div class="direccion"><?php print render($content['field_direccion']);?></div>
                <div class="telefono"><?php print render($content['field_llamar']);?></div>
                <div class="horarios"><?php print render($content['field_horarios']);?></div>
                <div class="web">
                <?php
                    if (!empty($content['field_web'])){
                        print render($content['field_web']);
                    }
                ?>
                </div>
                <!--<div class="facebook"><?php // print render($content['field_facebook']);?></div>-->
                <div class="facebook"><?php print render($content['field_facebook_']);?></div>
                <div class="instagram"><?php print render($content['field_instagram']);?></div>
                <div class="pago"><span>Medios de pago:</span> <?php print render($content['field_medios_de_pago']);?></div>
            </div>
            <!--Mapa--><div class="mapa"><?php print render($content['field_mapa']);?></div><!--FIN Mapa-->
            <?php
            if (!empty($content['field_menu'])){ 
                print "<div class=menur><div class=titulo><div class=icon></div><div class=txt></div></div></div>";
                }
            ?>
            <div class="w3-content w3-display-container">
                <!-- <img class="mySlides" src="https://cdn.pixabay.com/photo/2017/08/31/11/55/wedding-2700495_960_720.jpg" style="width:100%"> -->
                <?php 
                    if (!empty($node->field_menu)) {   
                    $i=0;
                        foreach($node->field_menu['und'] as $imagen) {           
                            $item = substr($content['field_menu'][$i]['#item']['uri'],8);
                            print "
                            <img class=mySlides  style=width:100% src='".base_path()."sites/default/files".$item."' alt='".render($content['field_menu'][$i]['#item']['alt'])."'/>";
                            $i++;
                        }   
                    }    
                ?> 
                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;	</button>
            </div>
            <section class="reviews">
                <div id="place_id" style="display: none;"><?php print render($content['field_place_id']);?></div>
                <h3>Nuestros clientes opinan</h3>
                <div id="google-reviews"></div>
                <div class="create">
                    <a href="#" target="_blank">Deja tu opinión</a>
                    <span></span>
                </div>
            </section>
        </div>

        <script>
            window.onkeyup = function(event){
                // console.log(event.keyCode);
            // 	right keyCode  = 39
                if (event.keyCode == 39) {
                    plusDivs(1);
                } else {
                    plusDivs(-1);
                }
            }

            let slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {slideIndex = 1}    
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                x[slideIndex-1].style.display = "block";  
            }
        </script>
        <script src="<?php print base_path(); ?>sites/default/themes/deleitese/js/google-places.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyByEGHPaDWlgogaLXVOIFsBDpjZgZvhXe0&signed_in=true&libraries=places"></script>


        <script>
            jQuery(document).ready(function( $ ) {
                const place_id = $('.reviews #place_id .field-item').text();
                if (place_id != '') {
                    const createReview = `https://search.google.com/local/writereview?placeid=${place_id}`;
                    $("#google-reviews").googlePlaces({
                        placeId: place_id //Find placeID @: https://developers.google.com/places/place-id
                        , render: ['reviews']
                        , min_rating: 4
                        , max_rows:4
                    });
    
                    $('.reviews .create a').attr('href', createReview);
                } else {
                    $('.reviews').hide();
                }
            });
        </script>
    </div>  
</div>