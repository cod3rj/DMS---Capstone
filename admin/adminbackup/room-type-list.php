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
        <table class=styled-table id="roomTypeTable">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Single</td>
                    <td><button class="btn btn-warning">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#roomTypeTable').DataTable({
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
                    targets: [1]
                }
            ],
        });
    });
</script>

</html>