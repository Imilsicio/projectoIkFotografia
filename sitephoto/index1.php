<?php 
require 'cabecalho.php';
?> 





  <div class="container" id="nav-container"></div>
  <!-- carousel slide -->
  <div id="Slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#Slider" data-slide-to="0" class="active"></li>
      <li data-target="#Slider" data-slide-to="1"></li>
      <li data-target="#Slider" data-slide-to="2"></li>
    </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/slider/edit/_MG_1597.JPG" class="d-block w-100" alt="">
          
          <!-- tirar classe d-none -->

          <div class="carousel-caption d-md-block" >

            <a href="servicos.php" class="main-btn " style="background-color: rgb(19, 143, 137) ;">Ver Servicos</a>
          </div>
        </div>
        <div class="carousel-item ">
          <img src="img/slider/IMG_9290.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-md-block">
         
            <a href="contacto.php" class="main-btn" style="background-color: rgb(19, 143, 137) ;">Entre em contato</a>
          </div>
        </div>
    <div class="carousel-item">
      <img src="img/slider/IMG_4645.JPG" class="d-block w-100" alt="">
      <div class="carousel-caption d-md-block">
     
        <a href="Galeria.php" class="main-btn" style="background-color: rgb(19, 143, 137) ;">Galeria</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#Slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#Slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <div class="col-12">
    <h1 class="main-title ">PACOTES</h1>
  </div>
  <main class="cards">
    <section class="card mini">
      <h2 class="titlocard font-weight-bold">MINI</h2>
      <span>Casamento</span>
      <p>Fotografia</p>
      <p>Sem drone</p>
      <p>Slide Show</p>
      <p>Flash personalizado ou CD</p>
      <a href="servicos.php" class="btn-mini">Ver Mais</a>
    </section>
    <section class="card standard">
      <h2 class="titlocard font-weight-bold">STANDARD</h2>
      <span>Casamento ✓</span>
      <p>Fotografia</p>
      <p>Video Resumo</p>
      <p>Pre-wedding</p>
      <p>Drone</p>
      <p>Album medio</p>
      <p>Slide Show</p>
      <p>Flash personalizado ou CD</p>
      <a href="servicos.php" class="btn-normal">Ver Mais</a>
    </section>
    <section class="card premium">
      <h2 class="titlocard font-weight-bold">PREMIUM</h2>
      <span>Casamento ✓</span>
      <p>Fotografia</p>
      <p>Video Resumo</p>
      <p>Pre-wedding</p>
      <p>Drone</p>
      <p>Album Grande A4</p>
      <p>Slide Show</p>
      <p>Flash personalizado ou CD</p>
      <a href="servicos.php" class="btn-plus">Ver Mais</a>
  </main>
  <hr>
  <input type="radio" name="Photos" id="check1" checked>
  <input type="radio" name="Photos" id="check2">
  <input type="radio" name="Photos" id="check3">
  <input type="radio" name="Photos" id="check4">
  <div class="container-p">
    <h1>ESPOSICAO</h1>
    <div class="top-content">
      <!--<h3 class="gal">Photo Gallery</h3>-->
      <label class="esposicao" for="check2">Photos de Casamento</label>
      <label class="esposicao" for="check3">Photos Studio</label>
      <label class="esposicao" for="check4">Photos Shoots</label>
      <label class="esposicao" for="check1">All Photos</label>
    </div>
    <div class="photo-gallery">
      <div class="pic Shoots">
        <img src="img/Shoots/IMG_0704-Editar.jpg">
      </div>
      <div class="pic Casamento">
        <img src="img/casamento/IMG_4775.jpg">
      </div>
      <div class="pic child">
        <img src="img/img3.jpg">
      </div>
      <div class="pic Shoots">
        <img src="img/Shoots/IMG_0716-Editar.jpg">
      </div>
      <div class="pic Casamento">
        <img src="img/casamento/IMG_9535.jpg">
      </div>
      <div class="pic child">
        <img src="img/estudio/IMG_7101-Edit.JPG">
      </div>
      <div class="pic Shoots">
        <img src="img/Shoots/IMG_0719-Editar.jpg">
      </div>
      <div class="pic Casamento">
        <img src="img/casamento/IMG_9377.jpg">
      </div>
      <div class="pic child">
        <img src="img/estudio/IMG_7153-Edit.JPG">
      </div>
      <div class="pic Shoots">
        <img src="img/Shoots/IMG_0748-Editar.jpg">
      </div>
      <div class="pic Casamento">
        <img src="img/casamento/IMG_9546.jpg">
      </div>
      <div class="pic Casamento">
        <img src="img/casamento/IMG_4803.jpg">
      </div>
    </div>
  </div>
  </div>
  <hr>



  <!-- Scripts do projeto -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <?php
  require'footer.php'; ?>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>