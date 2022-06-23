<?php 

 
require 'conexao.php';
require 'header.php';
$id =$_GET['id'];
$sql = 'SELECT *FROM cliente WHERE idcliente =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$clientes =$statement->fetchAll(PDO::FETCH_OBJ);


 

 




 ?>

 <div class="container  col-md-10">
  <div class="card mt-5">
    <div class="card-header ">
      <h2>Clientes</h2>
    </div>
    <div class="card-body">
        <?php if (!empty($message)): ?>
            <div class="alert alert-success">
                <?=$message;?>
            </div>
        <?php endif; ?>
            
        <table style="text-align: center;" class="table table-hover ">
      <tr>
           
          
           <th>Evento</th>
           <th>pacote</th>
           <th>Data</th>
            
           <th>texto</th>
           <th>Estado</th>


       
         </tr>
         <?php foreach ($clientes as $person ): ?>
        

        
        
            <tr>
            
            <td><?= $person->evento;?></td>
            <td><?= $person->pacote;?></td>
            <td><?= $person->data;?></td>
            
            <td><?= $person->texto; ?></td>
            <td><?= $person->status; ?></td>
           
            
            </tr>
            
            

            <?php endforeach; ?>
            


      </table>

      <td>
        
      
     
    </td>
      <table>
  
      
      
        
      </table>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
