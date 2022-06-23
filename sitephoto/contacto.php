<?php
require 'cabecalho.php';
?>
<div class="img">


  <div id="content">

    <div class="container mb-3">
      <form method="POST">
      <?php if (!empty($message)) : ?>
      <div class="alert alert-warning mx-auto" style="text-align: center;">
        <?= $message; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($message1)) : ?>
      <div class="alert alert-success" style="text-align: center;">
        <?= $message1; ?>
      </div>
    <?php endif; ?>
    <div class="form-row">
        <div class="container ">


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold" style="text-align: center;">Marcação </h3>
                </div>
                <div class="card-body">
                  <div class="form-row">
                  <input type="text" class="form-control" value="<?= $id[3]  ?>" name="id" hidden>
                    <!--	<div class="col-md-4 mb-3">
												<label for="validationServer02">Apelido</label>
												<input type="text" class="form-control " placeholder="Insira o Apelido:" name="apelido" required>
											</div>
											<div class="form-group col-md-4">
												<label for="inputEmail4">Email</label>
												<input type="email" class="form-control" placeholder="Insira o Email:" name="email" id="inputEmail4"
													required>
											</div>-->
                    <div class="col-md-4 mb-3">
                      <label for="validationServer04 ">Evento</label>
                      <select class="custom-select " id="validationServer04" name="evento" aria-describedby="validationServer04Feedback" required>
                        <option disabled selected value>Selecione o Evento</option>
                        <option value="Shoot">Shoot</option>
                        <option value="Casamento">Casamento</option>
                        <option value="Outros">Outros</option>
                      </select>

                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="validationServer04">Pacote</label>
                      <select class="custom-select " id="validationServer04" name="pacote" aria-describedby="validationServer04Feedback" required>
                        <option disabled selected value>Selecione o Pacote</option>
                        <option value="Basic">Basic</option>
                        <option value="Normal">Normal</option>
                        <option value="Plus">Plus</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="date">Data </label>
                      <input type="date" class="date form-control" placeholder="data" name="data" id="data" required>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="message" class="form-label">Discrição do Evento</label>
                      <textarea class="form-control" rows="3" cols="50" id="message" name="texto" placeholder="Dê a Discrição:" tabindex="4"></textarea>
                    </div>
                  </div>
                  <button class="btn btn-info" name="submeter" type="submit">Marcar</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
require 'footer.php';?>


  </body>

  </html>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 