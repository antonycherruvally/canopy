<?php include 'header.php';
session_start();
if(empty($_SESSION['login_user']) || $_SESSION['login_user'] == ''){
    header("Location: index.php");
    
    
}
?>

<body class="animsition">
    <?php
    session_start()
    ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
    <?php 
        include 'sidebar.php';
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
             <?php 
        include 'search.php';
        ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                              <div class="table-responsive table--no-card m-b-40 tableresult"></div> 
                            
                            <div class="col-lg-6">
                                <div class="card formcard">
                                    <div class="card-header">
                                        <strong>Edit</strong> Employee Details
                                    </div>
                                     <?php
                                                    require('controler/dbconn.php');
                                                    $id = $_GET['id'];

                                                    $sql = "SELECT * FROM user where id = $id";
                                                    if($result = mysqli_query($connection, $sql)){
                                                    if(mysqli_num_rows($result) > 0){
                                                         while($row = mysqli_fetch_array($result)){ 
                                                        ?>
                                    <form action="controler/usercontroleredit.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <input type="hidden" name="idget" value="<?=$id;?>">
                                    <div class="card-body card-block">
                                        
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name-input" name="name-input" placeholder="<?=$row['name'];?>" class="form-control">
                                                    <small class="form-text text-muted">Name of the Employee</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email-input" name="email-input" placeholder="<?=$row['email'];?>" class="form-control">
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php if($row['gender'] == 1)
                                                    {
                                                        $gender = "male";
                                                    }
                                                    else{
                                                       $gender = "female"; 
                                                    }?>
                                                    <select name="select-gender" id="select" class="form-control">
                                                        <option value="<?=$row['gender'];?> "><?=$gender;?></option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Phone Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="Text" id="phone-input" name="phone-input" placeholder="<?=$row['phone'];?>" class="form-control">
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="passportno-input" class=" form-control-label">Passport No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="passportno-input" name="passportno-input" placeholder="<?=$row['passportno'];?>"  class="form-control">
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Profile image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="profile-input" name="profile-input" class="form-control-file">
                                                    <small class="help-block form-text"><?=$row['profile'];?></small>
                                                     <p class="pageerror"> <?php
                                                     if (isset($_SESSION['user_message1']))
                                                     {
                                                         echo $_SESSION['user_message1'];
                                                        session_destroy();
                                                    }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Visa copy</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="visa-input" name="visa-input" class="form-control-file">
                                                    <small class="help-block form-text"><?=$row['visa'];?></small>
                                                      <p class="pageerror"><?php
                                                     if (isset($_SESSION['user_message2']))
                                                     {
                                                         echo $_SESSION['user_message2'];
                                                        session_destroy();
                                                    }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Passport copy</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="passport-input" name="passport-input" class="form-control-file">
                                                    <small class="help-block form-text"><?=$row['passport'];?></small>
                                                      <p class="pageerror"> <?php
                                                     if (isset($_SESSION['user_message3']))
                                                     {
                                                         echo $_SESSION['user_message3'];
                                                        session_destroy();
                                                    }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Zira copy</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="zira-input" name="zira-input" class="form-control-file">
                                                    <small class="help-block form-text"><?=$row['zira'];?></small>
                                                     <p class="pageerror">  <?php
                                                     if (isset($_SESSION['user_message4']))
                                                     {
                                                         echo $_SESSION['user_message4'];
                                                        session_destroy();
                                                    }
                                                        ?></p>
                                                </div>
                                            </div>
                                         
                                      
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        <p class="pageerror">  <?php
                                                     if (isset($_SESSION['user_message']))
                                                     {
                                                         echo $_SESSION['user_message'];
                                                        session_destroy();
                                                    }
                                                        ?></p>
                                    </div>
                                      </form>
                                      <?php
                                  }
                              }
                          }?>
                                </div>
                                
                            </div>
                          
                            
                           
                           
                            
                           
                          
                           
                            
                           
                        </div>
                       <?php
                        include 'footer.php';
                        ?>