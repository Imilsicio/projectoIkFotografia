<?php 


require 'crud.php'
 ?>

  <?php require 'header.php' ?>
 <div class="container  col-md-8">
  <div class="card mt-5">
    <div class="card-header ">
      <h2>Clientes</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
           
            <th class="col-md-10">Cliente</th>
            <th>Data</th>

            
          </tr>
      	<?php foreach ($clientes as $person ): ?>
      		<tr>
      		<td><a href="cliente.php?id=<?= $person->idcliente ?>"><?= $person->nome ?></a></td>
            

      			<td><?= $person->data; ?></td>

            <?php endforeach; ?>
            
     
      		</tr>


      		


      </table>
      <table>
  
        
      
        
      </table>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
