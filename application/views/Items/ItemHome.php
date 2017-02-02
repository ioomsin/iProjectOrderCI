
    <div class="container">

      <div class="row">
		<table class="table table-striped">
          <thead>
          	<tr>
                <th>#</th>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
		  	$i=0;
			//print_r($results);
			foreach ( $rs as $row )
			{
				$i++;
		  ?>
          	<tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row["ItemCode"];?></td>
                <td><?php echo $row["ItemName"];?></td>
                <td>
                	<a href="#">
                    	<i class="glyphicon glyphicon-pencil"></i>
                    </a>
                </td>
            </tr>
          <?php
			}
		  ?>
          </tbody>
        </table>
      </div>

    </div><!-- /.container -->
