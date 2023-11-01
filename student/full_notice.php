<?php include 'header.php'; ?>

<tr>
<script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <td>
        <div class="Bdy">

            <h2 style="text-align:center;margin-top:10px"> Full Notice </h2>
            <table border="1" class="tblBody">
                <?php
            if(isset($_GET['n_id'])){
                $nid = $_GET['n_id'];
            }
            $sql="select * from notice where notice_id = $nid";
            $query=$con->query($sql);
            if(mysqli_num_rows($query)==0){
                echo "<h3 style='text-align:center;color:red'>No data available</h3>";

            }
            else{
                while($row=$query->fetch_array()){

                    $title = $row['notice_title'];
                    $notice = $row['notice'];
                    $date = $row['date'];  
                    
            ?>

                <p> <i class="far fa-calendar-alt"></i> <b><?php echo date('d-M-Y', strtotime($date)); ?> </b>  </p>
                <h3> <?php echo $title; ?> </h3>
                <p> <?php echo $notice; ?> </p>


                <?php
                }
            }
        ?>
            </table>

        </div>
    </td>
</tr>


<!--footer-->
<?php include 'footer.php'; ?>
<style type="text/css" media="screen">
    .Bdy {
        padding: 30px;
        text-align: justify;
    }
</style>


</tbody>
</table>

</html>