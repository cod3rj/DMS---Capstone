
<!-- Edit notice -->
<div class="modal fade" id="editnotice<?php echo $row['notice_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Complaint</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="edit_notice.php?notice=<?php echo $row['notice_id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                <label class="control-label">Title:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['n_type']; ?>" name="title">
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                <label class="control-label">Building & Room:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="notice"> <?php echo $row['room_building']; ?> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                <label class="control-label">Notice:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="notice"> <?php echo $row['notice']; ?> </textarea>
                            </div>
                        </div>
                    </div>
					 <div class="form-group">
                        <div class="row">
						
                            <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                <label class="control-label"> Date:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" value="<?php echo $row['date']; ?>" name="date">
                            </div>
                        </div>
                    </div>
					
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete notice -->
<div class="modal fade" id="deletenotice<?php echo $row['notice_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Complaint</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['n_type']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="delete_complaint.php?notice=<?php echo $row['notice_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
               
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>