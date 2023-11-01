<?php
define("ROOT", dirname(dirname(__FILE__, 2)));
require_once ROOT . '/admin/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/general-table-design.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script src="js/JsBarcode.all.min.js"></script>
</head>


<body>
    <div class='tableWrapper'>
        <table class=styled-table id="roomTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course Year & Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = $link;

                $sql = "SELECT * FROM student_accounts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $middleInitial = substr($row['middle_name'], 0, 1) . '.';
                        echo "<tr>";
                        echo "<td>{$row['id_number']}</td>";
                        echo "<td>{$row['first_name']}  {$middleInitial}  {$row['last_name']}</td>";
                        echo "<td>{$row['course']} {$row['section']}</td>";
                        echo "<td>";
                        echo "<a href ='add-student.php?id_number={$row['id_number']}' class ='btn btn-primary'>Edit </a>";
                        echo "<a href ='process/delete-student.php?id_number={$row['id_number']}' class ='btn btn-danger mx-2'>Delete</a>";
                        echo "<button class ='btn btn-info ' id = 'btnBarCode' row ='{$row['id_number']}'>Bar Code</button>";
                        echo "</td>";

                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="add-student.php" target="main" class="btn btn-success"> Add Student</a>
    </div>


    <div class="modal" tabindex="-1" id="barCodeModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Barcode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <svg id="barcode"></svg>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-close', function(){
            $('#barCodeModal').hide();
        });
        $(document).on('click', '#btnBarCode', function(e) {
            let rowId = $(this).attr('row')
            e.preventDefault();
            $('#barCodeModal').show()
            JsBarcode("#barcode", rowId);
        });

        $('#roomTable').DataTable({
            "searching": true,
            "bPaginate": true,
            "lengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true,
            lengthMenu: [5, 10, 25, 50, 100, 200],
            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },
                {
                    orderable: false,
                    targets: [3]
                }
            ],
        });
    });
</script>

</html>