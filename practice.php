  <?php include('server.php');

 if (isset($_GET['edit'])) {
    $id = $_GET[  'edit'];
    $edit_state = true;
    $rec = mysqli_query($db,"SELECT * FROM tb WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $name = $record['name'];
    $address = $record['address'];
    $id = $record['id'];

 }


?>
<!DOCTYPE html>
<html>
<head>
  <title>php</title>
  <link rel="stylesheet" href="p.css" type="text/css">
</head>
<body>
   <?php if(isset($_SESSION['msg'])): ?>
     <div class="msg">
       <?php
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        ?>
      </div>
    <?php endif ?>


  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th> Address</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row=mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $row['name']; ?> </td>
          <td><?php echo $row['address']; ?> </td>
          <td>
             <a href="practice.php?edit=<?php echo $row['id']; ?>">Edit</a>
          </td>
          <td>
            <a href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
         </td>
       </tr>

    <?php  } ?>

    </tbody>
      </table>
   <form method="post" action="">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
   <div class="input">
     <label>Name</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input">
      <label>Address</label>
       <input type="text" name="address" value="<?php echo $address; ?>">
     </div>
     <div class="input">
       <?php if ($edit_state == false): ?>
         <button type="submit" name="save" class="btn" >Save</button>
       <?php else: ?>
         <button type="submit" name="update" class="btn" >Update</button>
       <?php endif; ?>
       </div>
       <div>
          <button> <a href="logout.php?log=<?php echo $row['id']; ?>">Logout</a></button>
         </div>

   </form>
                                                                                                                                                                                                                                                   `
</html>
