 <?php
                                          include 'database/connection.php';

                                           $usersql="SELECT * FROM notice ORDER BY notice_id ASC";
                                           $usersqlq=mysqli_query($conn,$usersql);
                                           while($donatedata=mysqli_fetch_assoc($usersqlq)){
                                          

                                             echo ' <li><i class="ion-android-checkmark-circle"></i>'.$donatedata['notice_data'].'</li>
                                             
                                              ';
                                            }



                                             
                                          
                                           
                                           ?>