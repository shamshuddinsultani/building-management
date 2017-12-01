<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php include 'header.php'; ?>
<?php $sql="SELECT * FROM members as t";
     $result=mysqli_query($conn,$sql);
     $rowcount=mysqli_num_rows($result);
     if($rowcount >0 ) {
       $fn = "csv_".uniqid().".csv";
       $file = fopen("csvfiles/" .$fn,"w");
       ?>
<table class="table table-bordered">
    <tbody>
        <?php
               while($row=mysqli_fetch_assoc($result)){
                 // print "<pre>";
                 // print_r($row);
                 // print "</pre>";
              if(fputcsv($file,$row)){?>

            <tr>
                <td>
                    <?php echo $row['blockname']; ?>
                </td>
                <td>
                    <?php echo $row['unitno']; ?>
                </td>
                <td>
                    <?php echo $row['memname']; ?>
                </td>
                <td>
                    <?php echo $row['mememail']; ?>
                </td>
                <td>
                    <?php echo $row['memphone']; ?>
                </td>
                <td>
                    <?php echo $row['relation']; ?>
                </td>
                <td>
                    <?php echo $row['residing']; ?>
                </td>
                <td>
                    <?php echo $row['emergeno']; ?>
                </td>
                <td>
                    <?php echo $row['alterno1']; ?>
                </td>
                <td>
                    <?php echo $row['alterno2']; ?>
                </td>
                <td>
                    <?php echo $row['mailadd']; ?>
                </td>
                <td>
                    <?php echo $row['permaadd']; ?>
                </td>
                <td>
                    <?php echo $row['addinfo']; ?>
                </td>
            </tr>

            <?php
                                     }
            }?>
    </tbody>
</table>
<?php }
else{?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@TwBootstrap</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>
<?php  } ?>
