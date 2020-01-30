


                                                         <div class="table-responsive table--no-card m-b-40 tableresult">
                                    <?php
                                                    require('dbconn.php');
                                                   if (isset($_POST['search'])) {

                                                   $searchquery = $_POST['search'];
                                                     //echo $searchquery;
                                                     $sql = "SELECT * FROM user WHERE name LIKE '$searchquery%' ";
                                                     //echo $sql;
                                                    if($result = mysqli_query($connection, $sql)){
                                                    	//print_r($result);
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
                        }
                            
                                ?>
                                </div>