<!-- Add notice -->
<div class="modal fade" id="addnotice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h3 class="modal-title" id="myModalLabel">Create Complaint</h3>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addnotice.php" enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Title:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" required
                                        placeholder="Enter Title">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Notice:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="notice" class="form-control" required placeholder="Enter Notice..."></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Date:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="date" required  placeholder="Discount Offer (If Any)">
                                </div>
                            </div>
                        </div>
                        
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" name="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>
                    </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>