<?php

if (!isset($_GET['id_number'])) {
    $firstName = '';
    $middleName = '';
    $lastName = '';
    $department = '';
    $course = '';
    $year = '';
    $section = '';
    $mobileNumber = '';
} else {
    define("ROOT", dirname(dirname(__FILE__, 2)));
    require_once ROOT . '/admin/connect.php';
    $conn = $link;

    $sql = "SELECT * FROM student_accounts WHERE id_number = '{$_GET['id_number']}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $firstName = $row['first_name'];
            $middleName = $row['middle_name'];
            $lastName = $row['last_name'];
            $department = $row['department'];
            $course = $row['course'];
            $year = $row['year'];
            $section = $row['section'];
            $mobileNumber = $row['mobile_number'];
            $idNumber = $row['id_number'];
        }
    } else {
        $firstName = '';
        $middleName = '';
        $lastName = '';
        $department = '';
        $course = '';
        $year = '';
        $section = '';
        $mobileNumber = '';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="text-center mb-5 ">
            <h2 class="display-2">Student Form</h2>
        </div>


        <form id="createStudentForm">
            <?php if (isset($_GET['id_number'])) : ?>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="idNumber" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="idNumber" value="<?= $idNumber ?>" readonly>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" value="<?= $firstName ?>" placeholder="Enter First Name">
                </div>
                <div class="col-md-4">
                    <label for="middleName" class="form-label">Middle name</label>
                    <input type="text" class="form-control" id="middleName" value="<?= $middleName ?>" placeholder="Enter Middle Name">
                </div>
                <div class="col-md-4">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" value="<?= $lastName ?>" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select" aria-label="Department Select" id="department">
                        <option <?= $department == "" ? "selected" : '' ?>>--Select Department--</option>
                        <option value="Architecture" <?= $department == "Architecture" ? "selected" : '' ?>>Architecture</option>
                        <option value="Arts & Sciences" <?= $department == "Arts & Sciences" ? "selected" : '' ?>>Arts & Sciences</option>
                        <option value="Aviation" <?= $department == "Aviation" ? "selected" : '' ?>>Aviation</option>
                        <option value="Business" <?= $department == "Business" ? "selected" : '' ?>>Business</option>
                        <option value="Criminilogy" <?= $department == "Criminilogy" ? "selected" : '' ?>>Criminilogy</option>
                        <option value="Engineering" <?= $department == "Engineering" ? "selected" : '' ?>>Engineering</option>
                        <option value="Expanded Tertiary Education" <?= $department == "Expanded Tertiary Education" ? "selected" : '' ?>>Expanded Tertiary Education</option>
                        <option value="Information Technology Education" <?= $department == "Information Technology Education" ? "selected" : '' ?>>Information Technology Education</option>
                        <option value="International Tourism and Hospitality Management" <?= $department == "International Tourism and Hospitality Management" ? "selected" : '' ?>>International Tourism and Hospitality Management</option>
                        <option value="Maritime Education" <?= $department == "Maritime Education" ? "selected" : '' ?>>Maritime Education</option>
                        <option value="Medical and Allied Health" <?= $department == "Medical and Allied Health" ? "selected" : '' ?>>Medical and Allied Health</option>
                        <option value="Teacher Education" <?= $department == "Teacher Education" ? "selected" : '' ?>>Teacher Education</option>
                        <option value="Technical Vocational Programs" <?= $department == "Technical Vocational Programs" ? "selected" : '' ?>>Technical Vocational Programs</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" placeholder="Enter Course" value="<?= $course ?>">
                </div>
                <div class="col-md-3">
                    <label for="year" class="form-label">Year</label>
                    <select class="form-select" aria-label="Year Select" id="year">
                        <option <?= $year == "" ? "selected" : '' ?>>--Select Year--</option>
                        <option value="First Year" <?= $year == "First Year" ? "selected" : '' ?>>First Year</option>
                        <option value="Second Year" <?= $year == "Second Year" ? "selected" : '' ?>>Second Year</option>
                        <option value="Third Year" <?= $year == "Third Year" ? "selected" : '' ?>>Third Year</option>
                        <option value="Fourth Year" <?= $year == "Fourth Year" ? "selected" : '' ?>>Fourth Year</option>
                        <option value="Fifth Year" <?= $year == "Fifth Year" ? "selected" : '' ?>>Fifth Year</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="section" class="form-label">Section</label>
                    <input type="text" class="form-control" id="section" value="<?= $section ?>" placeholder="Enter Section">
                </div>
                <div class="col-md-3">
                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+63</span>
                        <input type="text" class="form-control" id="mobileNumber" value="<?= $mobileNumber ?>" placeholder="Enter Mobile Number" aria-label="mobileNumber" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="text-center my-5">
                <?php if (!isset($_GET['id_number'])) : ?>
                    <button class="btn btn-success" id="submit"> Submit</button>
                <?php else : ?>
                    <button class="btn btn-info" id="update"> Update</button>
                <?php endif; ?>
                <a href="student-list.php" class="btn btn-danger" id="btnCancel" target="main"> Cancel</a>
            </div>
        </form>
        
    </div>


</body>


<script>
    $(document).ready(function() {

        $(document).on('click', '#submit', async function(e) {
            e.preventDefault()

            let datastring = {
                firstName: $('#firstName').val().trim(),
                middleName: $('#middleName').val().trim(),
                lastName: $('#lastName').val().trim(),
                department: $('#department').val(),
                course: $('#course').val().trim(),
                year: $('#year').val(),
                section: $('#section').val().trim(),
                mobileNumber: $('#mobileNumber').val().trim()
            };
            if ($(".is-invalid")[0]) {
                alert('Fixed the errors');
            } else {
                try {
                    const res = await fetch('process/add-single-student.process.php', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(datastring)

                    });

                    const result = await res.json();

                    if (result.ok) {
                        alert('Adding Student Information Success!')
                        $('select').val('');
                        $('input').val('');
                        $('select').removeClass('is-valid').removeClass('is-invalid')
                        $('input').removeClass('is-valid').removeClass('is-invalid')
                        $('#btnCancel').html('Go Back');
                        $('#btnCancel').removeClass('btn-danger').addClass('btn-dark');
                    } else {
                        alert('Failed to Create New Student')
                    }

                } catch (error) {
                    console.log(error);
                }
            }

        });
        $(document).on('click', '#update', async function(e) {
            e.preventDefault()

            let datastring = {
                firstName: $('#firstName').val().trim(),
                middleName: $('#middleName').val().trim(),
                lastName: $('#lastName').val().trim(),
                department: $('#department').val(),
                course: $('#course').val().trim(),
                year: $('#year').val(),
                section: $('#section').val().trim(),
                mobileNumber: $('#mobileNumber').val().trim(),
                idNumber: $('#idNumber').val()
            };
            if ($(".is-invalid")[0]) {
                alert('Fixed the errors');
            } else {
                try {
                    const res = await fetch('process/update-single-student.process.php', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(datastring)

                    });

                    const result = await res.json();

                    if (result.ok) {
                        alert('Updating Student Information Success!')
                        window.location.href = "student-list.php";
                    } else {
                        alert('Failed to Create New Student')
                    }

                } catch (error) {
                    console.log(error);
                }
            }

        });

        $(document).on('change', 'input', function() {
            if (!$(this).val().trim() || $(this).val().trim() == "") {
                $(this).removeClass('is-valid').addClass('is-invalid')
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid')
            }
        });
        $(document).on('change', 'select', function() {
            if (!$(this).val().trim() || $(this).val().trim() == "") {
                $(this).removeClass('is-valid').addClass('is-invalid')
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid')
            }
        });
    });
</script>

</html>