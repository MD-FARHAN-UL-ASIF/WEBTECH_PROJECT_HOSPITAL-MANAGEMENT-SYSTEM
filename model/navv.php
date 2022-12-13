<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.scrollmenu {
  background-color: #0D1559;
  overflow-x: hidden;
  white-space: nowrap;
  width:100%;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
  letter-spacing: 5px;
}

</style>
</head>
<body>

<div class="scrollmenu">
  <nav style="display:flex;
    justify-content:space-between;align-items:center;">
  <a href="../view/dashboard.php">Dashboard</a>
  <a href="../view/viewProfile.php">Profile</a>
  <a href="../view/changePassword.php">Change Password</a>
  <a href="../view/appoint-table.php">Appoint Management</a>
  <a href="../view/cabin-table.php">Cabin Allotment</a>
  <a href="../view/blood-table.php">Blood Bank</a>
  <a href="../view/medicine-table.php">Medicine Data</a>  

                <a style="text-decoration:none;color:black;" href="../control/logOut.php">
                    <button style="color:#2C3539;padding:0px;padding:0px;border: none;border-radius: 30px;">
                        Log Out
                    </button>
                </a>
            

  </nav>
</div>
</body>
</html>
