<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <title>Login</title>
    <style>
    body {
    background-color: #eee
    }

    .form-control {
        background-color: #212529;
        border: 1px solid #fff;
        caret-color: #fff;
        color: #fff;
        height: 45px;
        margin-top: 14px
    }

    .form-control:focus {
        background-color: #212529;
        box-shadow: none;
        border: 1px solid #76ECFF;
        color: #fff
    }

    .form-select {
        background-color: #212529;
        border: 1px solid #fff;
        color: #fff;
        font-size: 15px;
        height: 45px
    }

    .form-select:focus {
        box-shadow: none;
        border: 1px solid #fff
    }

    .signup-button {
        height: 48px
    }
    .text-danger{
        font-size: 13px;
    }
    </style>
  </head>
  <body>
      <div class="container mt-5 mb-5">
          <?php
          if($this->session->flashdata('message'))
          {
              echo '
              <div class="alert alert-danger">
                  '.$this->session->flashdata("message").'
              </div>
              ';
          }
          ?>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card bg-dark p-3 text-center text-white">
            <div><h4>CodeIgniter</h4></div>
                <h1>User Login</h1> <span>We always care about <br><i>user's privacy</i></span>
                <div class="p-2 px-5">
                <form action="<?= base_url('login/validation')?>" method="post">

                 <input class="form-control" placeholder="User Email" name="email" value="<?= set_value('email');?>">
                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                 <input class="form-control" placeholder="User Password" name="password" >
                 <span class="text-danger"><?php echo form_error('password'); ?></span>
                 <button class="btn btn-danger w-100 signup-button mt-2">Submit</button> 
                 <span class="text-success">Not Registered? <a href="../register/" class="text-warning text-center">Register</a></span>

                 </form>

             
                 </div>
            </div>
        </div>
    </div>
</div>


 
  </body>
</html>