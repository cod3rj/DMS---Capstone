
<div class="modal fade" id="edit-student">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i> Edit Student QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <div id="stud_edit"></div>
        <form method = "POST" autocomplete="off">
              <div class = "form-group">
                  <label>Student ID No.:</label>
                  <input type = "text"  id = "edit_studentidno" alt="student_idno"  class = "form-control" />
                </div>
<!--                   <div class = "form-group">
                  <label>Password:</label>
                  <input type = "password"  id = "password" alt="password"  maxlength="15" minlength="6" class = "form-control" placeholder="atleast 6 digit" />
                </div> -->
        </div>
      <div class="modal-footer justify-content-between">
        <input type="hidden" id="edit_studentid">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-student">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

      <script>
          document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#update-student');
              btn.addEventListener('click', () => {

                  const student_idno = document.querySelector('input[id=edit_studentidno]').value;
                  const student_id = document.querySelector('input[id=edit_studentid]').value;


                  var data = new FormData(this.form);

                  data.append('student_idno', student_idno);
                  data.append('student_id', student_id);

                       $.ajax({
                        url: '../../init/controllers/edit_student.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                        success: function(response) {
                          $("#stud_edit").html(response);
                           window.scrollTo(0, 0);
                          },
                          error: function(response) {
                            console.log("Failed");
                          }
                      });
                  // }

              });
          });
      </script>
