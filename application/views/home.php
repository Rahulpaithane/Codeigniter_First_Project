<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <title>Home Page</title>
    <style>
    body {
    background-color: #eee
    }

   
    </style>
  </head>
  <body>
      <div class="container mt-5 mb-5">
          <?php
          if($this->session->flashdata('message'))
          {
              echo '
              <div class="alert alert-success">
                  '.$this->session->flashdata("message").'
              </div>
              ';
          }
          ?>
          <h1 class="text-center">Welcome</h1><br>
          <div class="col text-center"> 
              <p>Profile Picture:-</p> 
          <img src="<?=  base_url('assets/profile_images/'.$userData['image'])?>" class="img-thumbnail" alt="profile picture" width="200px" height="200px">
         </div><br>
          <div class="col text-center"> 
            <a href="<?=base_url('home/logout/')?>" class="btn btn-danger text-center">Logout</a>
         </div>
         <br>

    <div class="row d-flex justify-content-center align-items-center table-responsive">
    <table class="table table-striped table-hover  table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $userData['name']?></td>
      <td><?= $userData['email']?></td>
      <td><?= $userData['phone']?></td>
    </tr>
   
    
  </tbody>
</table>
        </div>
    </div>
</div>


 
  </body>
</html>