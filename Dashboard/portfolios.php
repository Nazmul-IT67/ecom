<?php
  require_once'../db.php';
  $select="SELECT * FROM portfolio";
  $portfolio=mysqli_query($db, $select);
  include'include/header.php';
?>
<div class="br-mainpanel">
  <div class="pd-30">
    <h6 class="tx-gray-800 mg-b-5">
      <a class="tx-white" href="dashboard.php">Dashboard /</a>
      <a class="tx-white" href="#">Portfolios</a>
    </h6>
  </div>

  <div class="br-pagebody mg-t-5 pd-x-30">
    <div class="col-12 m-auto">
      <div class="card mt-sm-3">     
        <table class="table table-bordered mt-30 text-center">
          <div class="text-center bg-dark">
            <h2>Our Portfolios</h2>
          </div>         
            <a class="text-right" href="add-portfolio.php"><i class="fa fa-plus"></i>Add</a>          
          <thead class="thead-light">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Titlt</th>
              <th class="text-center">Image</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody class="tx-white">
            <?php
              foreach ($portfolio as $key => $value) {
                ?>
              <tr>
                <td class="bg-dark"><?php echo ++$key?></td>
                <td class="bg-dark"><?php echo $value['title'];?></td>
                <!-- <td class="bg-dark"><?php echo $value['summery'];?></td> -->
                <td class="bg-dark">
                  <img width="50" src="../assets/portfolio/image/<?php echo $value['image'];?>">
                </td>
                <!-- <td class="bg-dark"><?php echo $value['status'];?></td> -->
                <td class="bg-dark"><?php
                      if ($value['status']==1) {
                        ?>
                        <a href="#?status_id=<?php echo $value['id']?>" class="btn btn-secondary">Active</a>
                        <?php
                      }else{
                        ?>
                        <a href="#?status_id=<?php echo $value['id']?>" class="btn btn-danger">Deactive</a>
                        <?php
                      }
                    ?>  
                </td>
              </tr>
              <?php
              }
            ?>          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include'include/footer.php'?>