<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tenanttable-style.css">
    <link rel="stylesheet" href="../css/general-design-table.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
</head>

<body>
    <div class='tableWrapper'>
        <table class=styled-table  id="roomTable">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Name</th>
                    <th>Description</th>
                    <th>No. of Beds</th>
                    <th>Images</th>
                    <th>Rate Per Night</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Regular</td>
                    <td>With Tv and Aircon, Own Cr</td>
                    <td>2</td>
                    <td><button class="btn btn-view">View</button></td>
                    <td>PHP 50.00</td>
                    <td><button class="btn btn-warning">Edit</button></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Regular</td>
                    <td>With Tv and Aircon, Own Cr</td>
                    <td>1</td>
                    <td><button class="btn btn-view">View</button></td>
                    <td>PHP 25.00</td>
                    <td><button class="btn btn-warning">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script>
    $(document).ready(function() {
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
                    targets: [6]
                }
            ],
        });
    });
</script>

</html>