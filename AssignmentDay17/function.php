<?php
$hostname='localhost';
$username= 'root';
$password = '';
$database = 'product-shop';
$connection = new mysqli($hostname,$username,$password,$database);
 function insertProduct(){
   global $connection;
   if(isset($_POST['btn-save'])){
      $pro_name = $_POST['pro_name'];
       $pro_type = $_POST['pro_type'];
       $pro_qty = $_POST['pro_qty'];
       $pro_price = $_POST['pro_price'];
      $sql = "INSERT INTO `tbl-product`( `name`, `type`, `qty`, `price`) VALUES ('$pro_name','$pro_type','$pro_qty','$pro_price')";
      $rs=$connection->query($sql);
      if($rs){
        echo ' <script>
         $(document).ready(function() {
            Swal.fire({
            title: "Success",
            text: "Product Insert successfully",
            icon: "success"
         });
      })
      </script>';
      }
   }
 }
 insertProduct();

 function getProduct(){
   global $connection;
   $sql = "SELECT * FROM `tbl-product`";
   $rs = $connection->query($sql); 
   if($rs){
      while($row = mysqli_fetch_assoc($rs)){
         echo '
            <tr>
               <td>'.$row['code'].'</td>
                <td>'.$row['name'].'</td>
                 <td>'.$row['type'].'</td>
                  <td>'.$row['qty'].'</td>
                   <td>'.$row['price'].'</td>
                    <td  class="d-flex ">
                     <button type="submit" class="btn btn-warning me-2" id="btn-open-update" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Update
                      </button>
                     <form method="POST">
                        <input  name="removeCode" value="'.$row['code'].'" type="hidden">
                        <button class=" btn btn-outline-danger" name="btn-delete" ><i class="bi bi-trash"></i>Delete</button>
                     </form>
                     
                    </td>
            </tr>
         ';
      }
      
   }
 }
function deleteProduct(){
   global $connection;
   if(isset($_POST['btn-delete'])){
      $removeCode = $_POST['removeCode'];
      $sql = "DELETE FROM `tbl-product` WHERE code=$removeCode";
      $connection->query($sql);
      if($sql){
        echo ' <script>
         $(document).ready(function() {
            Swal.fire({
            title: "Delete Success",
            text: "Product Deleted",
            icon: "success"
         });
      })
      </script>';
      }
   }
}
deleteProduct();

function updateProduct(){
   global $connection;
   if(isset($_POST['btn-update'])){
      $pro_name = $_POST['pro_name'];
      $pro_type = $_POST['pro_type'];
      $pro_qty = $_POST['pro_qty'];
      $pro_price = $_POST['pro_price'];
      $code = $_POST['updateCode'];

      $sql = "UPDATE `tbl-product` SET `name`='$pro_name',`type`='$pro_type',`qty`='$pro_qty',`price`='$pro_price' WHERE code=$code ";
      $rs= $connection->query($sql);
      if($rs){
         echo ' <script>
          $(document).ready(function() {
             Swal.fire({
             title: "Success",
             text: "Product Update successfully",
             icon: "success"
          });
       })
       </script>';
       }
   }
}
updateProduct();