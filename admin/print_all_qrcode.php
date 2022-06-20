<?php
include '../conn.php';
	               $query1="SELECT * FROM  inventaris";
                    $tampil=mysql_query($query1) or die(mysql_error());
					$noUrut = 1;
                        ?>
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
						<img src='qrcode/<?php echo $data['id_alat']; ?>.png' width='55px'><figcaption><?php echo $data['kd_alat']; ?></figcaption>
                      </tr>
                  </thead>
				  
                 <?php   
              } 
              ?>
                  
                   </table>