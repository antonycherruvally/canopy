<?php include 'header.php';
session_start();
if(empty($_SESSION['login_user']) || $_SESSION['login_user'] == ''){
    header("Location: index.php");
    
}
?>
<style type="text/css">
    .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

<body class="animsition">
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
                      
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <?php
                                                    require('controler/dbconn.php');
                                                    if (isset($_GET['page']))
                                                     {
                                                        $pagecount = $_GET['page'] * 10 ;
                                                        
                                                     }
                                                     else{
                                                        $pagecount = 1 * 10;
                                                       
                                                     }
                                                     $page = $pagecount - 10;

                                                    $sql = "SELECT * FROM user order by id desc limit 10 OFFSET $page";
                                                    if($result = mysqli_query($connection, $sql)){
                                                    $rowcount=mysqli_num_rows($result);
                                                    if(mysqli_num_rows($result) > 0){
                                                        ?>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    sl.no
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Phone</th>
                                                <th>passport No</th>
                                                <th>gender</th>
                                                <th>profile</th>
                                                <th>passport</th>
                                                <th>visa</th>
                                                <th>sira</th>
                                                <th></th>
                                                <th>Download pdf</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $i=1;
                                            while($row = mysqli_fetch_array($result)){ 
                                                
                                               ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $i ;?></td>
                                                 <td><?php echo $row['name'] ;?></td>
                                                <td><?php echo $row['email'] ;?></td>
                                                 <td><?php echo $row['phone'] ;?></td>
                                                  <td><?php echo $row['passportno'] ;?></td>
                                                  <td><?php  if($row['gender'] ==1){
                                                        echo "Male";
                                                       }
                                                       else{
                                                           echo "female";
                                                           };?>
                                                               
                                                 </td>
                                                   <td id="profile-row"><img src="upload/Profile/<?php echo $row['profile'];?>" style="width: 90%">
                                                    <div class="button">
                                                        <a target="_blank" href="upload/Profile/<?php echo $row['profile'];?>" title="Download image" download><i class="fas fa-download"></i> 
                                                    </a>
                                                </div>
                                            </td>
                                                    <td id="profile-row"><i class="fas fa-file-pdf" style="font-size: 24px;"></i><br><?php echo $row['passport'];?>
                                                    <div class="button">
                                                        <a target="_blank" href="upload/Profile/<?php echo $row['passport'];?>" title="Download pdf" download><i class="fas fa-download"></i> 
                                                    </a>
                                                </div>
                                                </td>
                                                     <td id="profile-row"><i class="fas fa-file-pdf" style="font-size: 24px;"></i><br><?php echo $row['visa'];?>
                                                     <div class="button">
                                                        <a target="_blank" href="upload/Profile/<?php echo $row['visa'];?>" title="Download pdf" download><i class="fas fa-download"></i> 
                                                    </a>
                                                </div>

                                                 </td>
                                                      <td id="profile-row"><i class="fas fa-file-pdf" style="font-size: 24px;"></i><br><?php echo $row['zira'];?>
                                                  <div class="button">
                                                        <a target="_blank" href="upload/Profile/<?php echo $row['zira'];?>" title="Download pdf" download><i class="fas fa-download"></i> 
                                                    </a>
                                                </div>
                                            </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                       <!--  <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button> -->
                                                       
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location='formedit.php?id=<?php echo $row['id'];?>'" >
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                       <!--  <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button> -->
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="docpdf.php?id=<?php echo $row['id'];?>"> Make pdf</a>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                           <?php
                                           $i++;
                                       }
                                   
                                       ?>
                                        </tbody>
                                    </table>
                                    <?php 
                                }
                                else
                                {
                                    echo "no data";
                                }
                            }
                                ?>
                                            
                                        
                                </div>
                                <!-- END DATA TABLE -->
                                <div class="pagination">
                                                 <?php
                                                    require('controler/dbconn.php');
                                                   

                                                    $sql = "SELECT * FROM user";
                                                    if ($result=mysqli_query($connection,$sql)){
                                                        $rowcount=mysqli_num_rows($result);
                                                        
                                                    }
                                                    else
                                                    {
                                                        $rowcount = "1";
                                                    }
                                                    ?>
                                                    <a href="employee.php?page=1">&laquo;</a>
                                                    <?php
                                                    $rowno = ($rowcount / 10);
                                                    if(($rowcount % 10)== 0 )
                                                    {
                                                        $rowmod = 0;
                                                    }
                                                    else
                                                    {
                                                       $rowmod = 1; 
                                                    }
                                                    $total = $rowno + $rowmod;
                                                    for($i=1; $i<=$total;$i++){
                                                     ?>
                                                     <a href="employee.php?page=<?=$i;?>"><?php echo $i; ?></a>
                                                     <?php
                                                    }

                                                    ?>
                                                     <a href="employee.php?page=<?=$rowno;?>">&raquo;</a>
  
  
 
</div>
                            </div>
                        </div>
                        
                       <?php 
                       include 'footer.php';
                       ?>