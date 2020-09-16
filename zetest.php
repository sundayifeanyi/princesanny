<?php include_once "./includes/zetestdb.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>testfile.com</title>
</head>
<body>
    <div class="row">
    
    <div class="col-md-6">
    <table class="table table-bordered table-hover">
        <div id="bulkoptionContainer" class="col-xs-4">
            <select name="bulkOption" id="bulkOption"  class="form-control">
                <option value="">Select option</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
                <option value="Clone">Clone</option>
            </select>
        </div>
        <div class="col-xs-4">
        <input type="submit" class="btn btn-success" name="submit" value="Apply">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
        </div>
                                  <thead>
                                      <tr>
                                         <th><input id="selectAll" type="checkbox"></th>
                                          <th>ID</th>
                                          <th>fname</th>
                                          <th>lname</th>
                                          <th>age</th>
                                          <th>city</th>
                                          <th>email</th>
                                          <th>phone</th>
                                      </tr>
                                  </thead>
                                  <tbody>
        
                                  <?php
                                $query = "SELECT * FROM customers ORDER BY id DESC";
                                $select_posts = mysqli_query($db,$query);
                               while($row = mysqli_fetch_assoc($select_posts)){
                                $id = $row['ID'];
                                $fname = $row['FIRST_NAME'];
                                $lname = $row['LAST_NAME'];
                                $age = $row['AGE'];
                                $city = $row['CITY'];
                                $email = $row['EMAIL'];
                                $phone = $row['PHONE'];
                               
                                echo "<tr>";
                                echo "<td><input class='checkboxes' name='checkBoxArray[]' type='checkbox' value='{$id}'> </td>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$fname}</td>";
                                echo "<td>{$lname}</td>";
                                echo "<td>{$age}</td>";
                                echo "<td>{$city}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$phone}</td>";
                               
                                echo "</tr>";
                            }
                                ?>
                                  </tbody>
                              </table>
                              <br>
                              <p>
                        <table class="table table-bordered table-hover">
                              <thead>
                                      <tr>
                                         <th><input id="selectAll" type="checkbox"></th>
                                          <th>ID</th>
                                          <th>name</th>
                                          <th>cust_id</th>
                                          <th>amount</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
        
                                  <?php
                                $query = "SELECT * FROM orders ORDER BY id DESC";
                                $select_order = mysqli_query($db,$query);
                               while($row = mysqli_fetch_assoc($select_order)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $customer_id = $row['customer_id'];
                                $amount = $row['amount'];
                                
                               
                                echo "<tr>";
                                echo "<td><input class='checkboxes' name='checkBoxArray[]' type='checkbox' value='{$id}'> </td>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$name}</td>";
                                echo "<td>{$customer_id}</td>";
                                echo "<td>{$amount}</td>";
                               
                               
                                echo "</tr>";
                            }
                                ?>
                                  </tbody>
                              </table>
                              </p>
                              </div>
                              <!-- practice table joining and unjoining -->
                              <div class="col-md-6">
                              <table class="table table-bordered table-hover">
                              <thead>
                                      <tr>
                                         
                                          <th>ID</th>
                                          <th>name</th>
                                          <th>cust_id</th>
                                          <th>amount</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
        
                                  <?php
                                $joinquery = "SELECT customers.ID,customers.FIRST_NAME,orders.name,
                                            orders.amount FROM customers, orders WHERE 
                                            customers.ID = orders.customer_id
                                            ORDER BY customers.ID";
                                $join_select_order = mysqli_query($db,$joinquery);
                               while($row = mysqli_fetch_assoc($join_select_order)){
                                $Cid = $row['ID'];
                                $Cname = $row['FIRST_NAME'];
                                $Oname = $row['name'];
                                $Oamount = $row['amount'];
                                
                               
                                echo "<tr>";
                                echo "<td>{$Cid}</td>";
                                echo "<td>{$Cname}</td>";
                                echo "<td>{$Oname}</td>";
                                echo "<td>{$Oamount}</td>";
                               
                               
                                echo "</tr>";
                            }
                                ?>
                                  </tbody>
                              </table>

                              </div>
    </div>
</body>
</html>

