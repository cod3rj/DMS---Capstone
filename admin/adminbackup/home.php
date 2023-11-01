<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
 
    <!-- navigation bar -->    
<div class = "container">
    <div class = "navigation">
        <ul>
            <li>
                <a href = "#">
                    <span class="icon"><img src = "../images/dormitory.png" width = "65px" height = "65px" style = "margin-top: 10px;"></span>
                    <span class = "title" style = "font-size: 30px; margin-top: 10px;">UPHSD-DMS</span>
                </a>
            </li>
            <li>
                <a href = "attendance\dtr_panel\dtr_dashboard\dashboard.php" target = main>
                    <span class = "icon"><ion-icon name = "home-outline"></ion-icon></span>
                    <span class = "title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href = "../admin/rooms-list.php" target = main>
                    <span class = "icon"><ion-icon name = "alert-circle-outline"></ion-icon></span>
                    <span class = "title">Rooms</span>
                </a>
            </li>
            <li>
                <a href = "../admin/room-type-list.php" target="main">
                    <span class="icon"><ion-icon name="bookmarks-outline"></ion-icon></span>
                    <span class = "title">Room Type</span>
                </a>
            </li>
            <li>
                <a href = "../attendance/dtr_panel/dtr_dashboard/manage_student.php" target = main>
                    <span class = "icon"><ion-icon name = "school-outline"></ion-icon></span>
                    <span class = "title">Student</span>
                </a>
            </li>
            <li>
                <a href = "../attendance/dtr_panel/dtr_dashboard/manage_attendance.php" target = main>
                    <span class = "icon"><ion-icon name = "school-outline"></ion-icon></span>
                    <span class = "title">Attendance</span>
                </a>
            </li>
            <li>
                <a href = "../attendance/dtr_panel/dtr_dashboard/manage_report.php" target = main>
                    <span class = "icon"><ion-icon name = "school-outline"></ion-icon></span>
                    <span class = "title">Attendance Logs</span>
                </a>
            </li>
            <li>
                <a href = "../admin/bookings-list.php" target = main>
                    <span class = "icon"><ion-icon name = "book-outline"></ion-icon></ion-icon></span>
                    <span class = "title">Bookings</span>
                </a>
            </li>
            <li>
                <a href = "../admin/payment-list.php" target = main>
                    <span class = "icon"><ion-icon name = "card-outline"></ion-icon></span>
                    <span class = "title">Payment</span>
                </a>
            </li>
            <li>
                <a href = "../admin/admin-list.php" target = main>
                    <span class = "icon"><ion-icon name = "id-card-outline"></ion-icon></span>
                    <span class = "title">Admin</span>
                </a>
            </li>
            <li>
                <a href = "../admin/income-report.php" target = main>
                    <span class = "icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                    <span class = "title">Income Report</span>
                </a>
            </li>
            <li>
                <a href = "../index.html">
                    <span class = "icon"><ion-icon name = "log-out-outline"></ion-icon></span>
                    <span class = "title">Logout</span>
                </a>
            </li>
        </ul>        
    </div>
    <!-- main -->
    <div class = "main">
        <div class = "topbar">
            <div class = "toggle">
            <ion-icon name="menu-outline"></ion-icon>
            </div>
    <!-- user img -->
            <div class = "user">
                <img src = "../images/user.png">
            </div>
        </div>

<iframe style="border:none;" valign = top align = center src = "../admin/dashboard.php" name = main width = 100% height = 800></iframe>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    //toggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');


    toggle.onclick = function(){
        navigation.classList.toggle('active')
        main.classList.toggle('active')
    }

    //hovered
    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
        list.forEach((Item) =>
        Item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));
</script>
    
</body>
</html>