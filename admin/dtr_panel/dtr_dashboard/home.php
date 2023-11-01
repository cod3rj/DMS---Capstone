<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>  
 
    <!-- navigation bar -->    
<div class = "container">
    <div class = "navigation">
        <ul>
            <li>
                <a href = "#">
                    <span class="icon"><img src = "images/dormitory.png" width = "65px" height = "65px" style = "margin-top: 10px;"></span>
                    <span class = "title" style = "font-size: 30px; margin-top: 10px;">UPHSD-DMS</span>
                </a>
            </li>
            <li>
                <a href = "dashboard.php" target = main>
                    <span class = "icon"><ion-icon name = "home-outline"></ion-icon></span>
                    <span class = "title">Dashboard</span>
                </a>
            </li>
             <li>
                <a href = "student-list.php" target = main>
                    <span class = "icon"><ion-icon name = "id-card-outline"></ion-icon></span>
                    <span class = "title">Student List</span>
                </a>
            </li>
            <li>
                <a href = "student-account.php" target = main>
                    <span class = "icon"><ion-icon name = "id-card-outline"></ion-icon></span>
                    <span class = "title">Student Accounts</span>
                </a>
            </li>
            <li>
                <a href = "room-list.php" target="main">
                    <span class="icon"><ion-icon name="bookmarks-outline"></ion-icon></span>
                    <span class = "title">Room Management</span>
                </a>
            </li>
            <li>
                <a href = "manage_student.php" target = main>
                    <span class = "icon"><ion-icon name = "id-card-outline"></ion-icon></span>
                    <span class = "title">QR Generator</span>
                </a>
            </li>
            <li>
                <a href = "manage_report.php" target = main>
                    <span class = "icon"><ion-icon name = "school-outline"></ion-icon></span>
                    <span class = "title">Attendance Logs</span>
                </a>
            </li>
            <li>
                <a href = "admin-list.php" target = main>
                    <span class = "icon"><ion-icon name = "id-card-outline"></ion-icon></span>
                    <span class = "title">Admin</span>
                </a>
            </li>
            <li>
                <a href = "../../../student/admin/notice.php" target = main>
                    <span class = "icon"><ion-icon name = "book-outline"></ion-icon></ion-icon></span>
                    <span class = "title">Manage Notice</span>
                </a>
            </li>
            <li>
                <a href = "../../../student/admin/complaint.php" target = main>
                    <span class = "icon"><ion-icon name = "book-outline"></ion-icon></ion-icon></span>
                    <span class = "title">Student Complaints</span>
                </a>
            </li>
            <li>
                <a href = "logout.php">
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
    <!-- Monitor Attendance -->
        <a href="../../../admin/index.php" style = " display: flex; margin-right: 1310px;" class = "btn">Monitor Attendance</a>
    <!-- user img -->
            <div class = "user">
                <img src = "images/user.png">
            </div>
        </div>

<iframe style="border:none;" valign = top align = center src = "dashboard.php" name = main width = 100% height = 800></iframe>

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