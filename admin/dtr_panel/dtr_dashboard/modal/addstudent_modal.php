
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-user"></i> New Student QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <div id="stud"></div>
        <form method = "POST" autocomplete="off">
                <?php 
                  $digits = 6;
                ?>
            
              <div class = "form-group">
                  <label>Student ID No.:</label>
                  <input type = "text"  id = "student_idno" alt="student_idno" value=""  class = "form-control"/>
                </div>
        </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-student">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

      <script>
          document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#add-student');
              btn.addEventListener('click', () => {

                  const student_idno = document.querySelector('input[alt=student_idno]').value;


                  var data = new FormData(this.form);

                  data.append('student_idno', student_idno);


              if (student_idno === ''){
                      $('#stud').html('<div class="alert alert-danger"> Required All Fields!</div>');
                    }else{
                       $.ajax({
                        url: '../../init/controllers/add_student.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                        success: function(response) {
                          $("#stud").html(response);
                           window.scrollTo(0, 0);
                          },
                          error: function(response) {
                            console.log("Failed");
                          }
                      });
                   }

              });
          });
      </script>
