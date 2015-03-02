<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>favicon.ico">

    <title>#5yrCodeJam &#187; Celebrating 5 years of writing code</title>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <?php
    if(isset($date_picker)):
    ?>
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <?php endif; ?>
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">#5yrCodeJam</a> <span class="beta">beta</span>
        </div>
        <div class="navbar-collapse collapse">
          <?php
          function menu_is_active($menu,$active){
            if($active == $menu){
              return "active";
            }
          }

          ?>
          <ul class="nav navbar-nav">
            <li class="<?php echo menu_is_active("home",$active); ?>"><?php echo anchor("home","Home"); ?></li>
            <li class="<?php echo menu_is_active("about",$active); ?>"><?php echo anchor("home/about","About"); ?></li>
            <li class="<?php echo menu_is_active("challenge",$active); ?>"><?php echo anchor("jam/challenge","Challenge"); ?></li>
            <li><?php echo anchor("http://codejam.sci.website","Past Challenges",
                      "target='_blank'"); ?></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              $this->load->model("member_model");
              $member_count = $this->member_model->get_member_count();
            ?>
            <li class="stat"><?php echo anchor("#","<i class='fa fa-plug'></i> <strong>$member_count Code Ninjas</strong> are Plugged In");?></li>
            <li class="dropdown active-inverse">
            <?php if($this->session->userdata('is_logged_in')){ ?>
              <a href="#" class="dropdown-toggle white" data-toggle="dropdown"><i class="fa fa-arrow-circle-right"></i> 
                    <?php echo $this->session->userdata('first_name')." ".
                                $this->session->userdata('last_name');
                       ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- <li><a href="#"><i class='fa fa-gear'></i> Settings</a></li> -->
                        <li><?php echo anchor("home/user/logout","<i class='fa fa-sign-out'></i> Logout"); ?></li>
                    </ul>

            <?php } else{ ?>
              
              <?php echo anchor("home/user/login","<i class='fa fa-lock'></i> Login</span>","class='strong white'"); ?>
                <ul class="dropdown-menu" role="menu">
                </ul>
            <?php } ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <?php
    if(!isset($css_class)) $css_class="none";
    if(!isset($css_id)) $css_id = "none";
    ?>

    <div class="container content <?php echo $css_class; ?>" id="<?php echo $css_id; ?>">

      <!-- message area -->

      <?php
      $msg = $this->session->flashdata("msg");
      if($msg != ""){
        echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
      }
      ?>