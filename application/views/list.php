<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application- View user</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
       <div class="container" style="padding-top:10px;">
       <div class="row">
        <div class="col-md-8">
            <?php 
            $success =$this->session->userdata('success');
            if($success != ""){
                ?>
                <div class=" alert alert-success"><?php echo $success;?></div>
                <?php
            }
            ?>
            <?php
            $failuer =$this->session->userdata('failure');
            if($failuer != ""){
                ?>
                <div class="alert alert-success"><?php echo $failuer;?></div>
                <?php
            }
            ?>
            
        </div>
       </div>
           <div class="row">
             <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6"><h3>view user</h3></div>
                    
                <div class="col-6 text-right">
                     <a href="<?php echo base_url(). 'index.php/user/create/';?>" class=" btn btn-primary">Create </a>
             </div>
              <hr>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col-md-8">
                <table class=" table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="70">Edit</th>
                        <th width="100">Delete</th>
                    </tr>
                        <?php if(!empty($crud1)) { foreach($crud1 as $crud) {?>
                    <tr>
                        <td><?php echo $crud['user_id'] ?></td>
                        <td><?php echo $crud['name'] ?></td>
                        <td><?php echo $crud['email'] ?></td>
                        <td>
                        <a href=" <?php echo base_url().'index.php/user/edit/'.$crud['user_id'] ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                        <a href=" <?php echo base_url().'index.php/user/delete/'.$crud['user_id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                        <?php } } else { ?>
                        <tr>
                            <td colspan="5">Record Not Found</td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
     </div>
 </body>
</html>