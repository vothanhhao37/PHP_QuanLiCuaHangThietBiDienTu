<?php

    require("connect.php");

    $sql = "SELECT user_name, password FROM user";

    $result = mysqli_query($conn,$sql);

    if (isset($_POST["userName"]))
    {
        $userName = trim($_POST["userName"]);
    } else $userName = "";

    if (isset($_POST["password"]))
    {
        $pass = $_POST["password"];
    } else $pass = "";

    $alert = "";    

    if (isset($_POST["login"]))
    {
        if (empty($pass) || empty($userName))
        {
            $alert = "Username and password cannot be blank.";
        }
        else {
            while($row = mysqli_fetch_row($result))
            {
                if ($userName == $row[0] && $pass == $row[1])
                {
                    header("Location: thongtinsanpham2.php");
                }
                else 
                {
                    $alert = "Username or password is invalid";
                }
            }
        }
    }

?>
<body>
    <style>
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table
        {
            width: 300px;
            border: 1px solid darkgrey;
            border-radius: 5px;
            padding: 20px;
        }

        span
        {
            color: red;
        }

        input
        {
            background-color: greenyellow;
            width: 100%;
            padding: 10px 0px;
        }
    </style>
    <form action="" method="post">
        <table>
            <tr><td>User Name:</td></tr>
            <tr>
                <td><input type="text" name="userName" value="<?php echo $userName ?>"></td>
            </tr>
            <tr><td>Password:</td></tr>
            <tr>
                <td><input type="password" name="password"></td>
            </tr>
            <tr><td colspan="2" align="right"><input type="submit" value="Login" name="login"></td></tr>
            <tr><td colspan="2" align="center"><span><?php echo $alert; ?></span></td></tr>
        </table>
    </form>
</body>