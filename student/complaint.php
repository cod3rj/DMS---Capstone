<?php include 'header.php'; ?>

<tr>
    <td>
        <div class="payBdy">

            <h2 style="text-align:center;margin-top:10px">Student Comlaint Board</h2>
            <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Complaint 
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <p><b>Complaint Type : </b>
                            <select name="n_type" id="inputBOX">
                                <option value="">Select Complaint Type</option>
                                <option value="Faucet"> Faucet </option>
                                <option value="TV"> T.V </option>
                                <option value="Aircon"> Aircon </option>
                                <option value="Room"> Room </option>
                                <option value="Kitchen"> Kitchen </option>
                                <option value="Others">Others</option>
                            </select>
                            </p>
                            <center>
                            <div class="col-md-9">
                                <label>Building & Room # :</label>
                                <input type="text" name="room_building" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label>Complaint:</label>
                                <input type="text" name="notice" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Date:</label>
                                <input type="date" name="date" class="form-control">
                            </center>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="addcomplaint" class="btn btn-primary">Submit Complaint</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
           

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