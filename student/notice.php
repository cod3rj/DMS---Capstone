<?php include 'header.php'; ?>

<tr>
    <td>
        <div class="payBdy">

            <h2 style="text-align:center;margin-top:10px">Notice Board</h2>
            <table border="1" class="tblBody">
            <?php
            $sql="select * from notice order by notice_id desc";
            $query=$con->query($sql);
            if(mysqli_num_rows($query)==0){
                echo "<h3 style='text-align:center;color:red'>No data available</h3>";

            }
            else{?>

                <thead>
                    <th class="text-center" id="tableth">Notice No</th>
                    <th id="tableth">Notice Title</th> </th>
                    <th class="text-center" id="tableth">Date</th>
                </thead>

                <?php
                while($row=$query->fetch_array()){

                    $id = $row['notice_id'];
                    $title = $row['notice_title'];
                    $date = $row['date'];  
                    

            ?>

                <tbody>
                    <tr>
                    
                       <td id="tablethtr"> <?php echo $id; ?></td>
                        <td id="tablethtr"> <a href="full_notice.php?n_id=<?php echo $id; ?>"> <?php echo $title; ?> </a> </td>
                        <td id="tablethtr"><?php echo date('d-M-Y', strtotime($date)); ?></td>

                    </tr>
                </tbody>

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
    .paybdy {
        height: 900px;
    }
    .tblBody {
        margin: 20px;
        width:96%;
    }
    .tblBody a{
        text-decoration:none;
    }
    #tablethtr{
        padding: 10px;
        text-align:center;
        font-size:18px;
    }
    #tableth{
        background-color:#F5DEB3;
        padding: 10px;
        text-align:center;
        font-size:18px;
    }

</style>


</tbody>
</table>

</html>