<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<hr>
<hr>
    <!-- cards -->
    <div class = "cardBox">
        <div class = "card">
            <div>
                <div class = "numbers">10</div>
                <div class = "cardName">Number of Room</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="bed-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers">5</div>
                <div class = "cardName">Number of Room Type</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="key-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers">7</div>
                <div class = "cardName">Registered Students</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="body-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers">4</div>
                <div class = "cardName">Number of Active Accounts</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="bulb-outline"></ion-icon>
            </div>
        </div>
    </div>

    <div class = "details">
    <!--recent bookings-->
        <div class = "recentBookings">
            <div class = "cardHeader">
                <h2>Recent Bookings</h2>
                <a href="#" class = "btn">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Contact No.</td>
                        <td>Address</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>Price</td>
                        <td>Payment</td>
                        <td>Room Rates</td>
                        <td>Room Type</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>John Doe</td>
                    <td>09123456789</td>
                    <td>#123 Grove St.</td>
                    <td>21</td>
                    <td>Male</td>
                    <td>johndoe@gmail.com</td>
                    <td>johndoe</td>
                    <td>3,000</td>
                    <td>Paid</td>
                    <td>Php 5,000 </td>
                    <td>Econo</td>
                    <td><span class = "status active">Active</span></td>
                    </tr>
                    <tr>
                    <td>Jane Doe</td>
                    <td>09987654321</td>
                    <td>#123 Grove St.</td>
                    <td>22</td>
                    <td>Female</td>
                    <td>janedoe@gmail.com</td>
                    <td>janedoe</td>
                    <td>3,000</td>
                    <td>Paid</td>
                    <td>Php 6,000 </td>
                    <td>Deluxe</td>
                    <td><span class = "status active">Active</span></td>
                    </tr>
                    <tr>
                    <td>John Roe</td>
                    <td>091290347856</td>
                    <td>#456 Jump St.</td>
                    <td>20</td>
                    <td>Male</td>
                    <td>johnroe@gmail.com</td>
                    <td>johnroe</td>
                    <td>3,500</td>
                    <td>Closed</td>
                    <td>Php 7,000 </td>
                    <td>Premium</td>
                    <td><span class = "status inactive">Inactive</span></td>
                    </tr>
                    <tr>
                    <td>Richard Roe</td>
                    <td>09123456660</td>
                    <td>#123 Jump St.</td>
                    <td>21</td>
                    <td>Male</td>
                    <td>richardroe@gmail.com</td>
                    <td>richardroe</td>
                    <td>3,500</td>
                    <td>Closed</td>
                    <td>Php 8,000 </td>
                    <td>Suite</td>
                    <td><span class = "status inactive">Inactive</span></td>
                    </tr>
                    <tr>
                    <td>Michael Jordan</td>
                    <td>09222341567</td>
                    <td>#23 Bulls St.</td>
                    <td>23</td>
                    <td>Male</td>
                    <td>michaeljordan@gmail.com</td>
                    <td>michaeljordan</td>
                    <td>5,000</td>
                    <td>Paid</td>
                    <td>Php 5,000 </td>
                    <td>Econo</td>
                    <td><span class = "status active">Active</span></td>
                    </tr>
                    <tr>
                    <td>Bonnie Parker</td>
                    <td>091234455890</td>
                    <td>#321 Sesame St.</td>
                    <td>21</td>
                    <td>Female</td>
                    <td>bonnieparker@gmail.com</td>
                    <td>bonnieparker</td>
                    <td>2,500</td>
                    <td>Pending</td>
                    <td>Php 5,000 </td>
                    <td>Econo</td>
                    <td><span class = "status pending">Pending</span></td>
                    </tr>
                    <tr>
                    <td>Clyde Barrow</td>
                    <td>090987123456</td>
                    <td>#321 Sesame St.</td>
                    <td>22</td>
                    <td>Male</td>
                    <td>clydebarrow@gmail.com</td>
                    <td>clydebarrow</td>
                    <td>2,500</td>
                    <td>Paid</td>
                    <td>Php 6,000 </td>
                    <td>Delux</td>
                    <td><span class = "status active">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- recent tenant -->
        <div class = "recentTenant">
            <div class = "cardHeader">
                <h2>Recent Tenant</h2>
            </div>
            <table>
                <tr>
                    <td width = "60px"><div class = "imgBx"><img src = "../images/tenant.png"></div></td>
                    <td><h4>John<br><span>Cavite</span></h4></td>
                </tr>
                <tr>
                    <td width = "60px"><div class = "imgBx"><img src = "../images/tenant2.png" ></div></td>
                    <td><h4>Clyde<br><span>Quezon</span></h4></td>
                </tr>
                <tr>
                    <td width = "60px"><div class = "imgBx"><img src = "../images/tenant3.png" ></div></td>
                    <td><h4>Jane<br><span>Cavite</span></h4></td>
                </tr>
                <tr>
                    <td width = "60px"><div class = "imgBx"><img src = "../images/tenant4.png" ></div></td>
                    <td><h4>Michael<br><span>Manila</span></h4></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>    

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>