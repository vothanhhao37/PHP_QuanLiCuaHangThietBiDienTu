<title>Xếp hạng bài hát</title>
<body>
    <style>
        *
        {
            border: none;
            margin: 0;
            box-sizing: border-box;
        }

        table
        {
            width: 600px;   
            background-color: #77d6a0;
            text-align: center;
            border-collapse: collapse;
        }

        thead
        {
            text-transform: uppercase;
            font-weight: 800;
            font-size: 20px;
            color: whitesmoke;
            background-color:#2a8652;
        }

        tr
        {
            height: 30px; 
        }

        td
        {
            background-color: #2a8652;
            color: whitesmoke;
            height: 40px;
        }

        input[type=text]
        {
            width: 90%;
            height: 100%;
            background-color: #77d6a0;
            border-radius: 5px;
        }

        tr:nth-child(3) td
        {
            padding: 20px;
        }

        input[type=submit]
        {
            padding: 10px;
            border-radius: 6px;
            margin-right: 20px;
            font-size: 18px;
            background-color: #63ffa7;
            color: #564182;  
        }

        textarea 
        {
            background-color: #77d6a0;
            color: red;
            width: 100%;
            text-align: center;
        }

        input[type=submit]:hover
        {
            background-color: #bbffbb;
            color: black;
            cursor: pointer;
        }
    </style>
    <?php
        $name = $place = "";
        $text = "";
        $LeaderBoard = [];
        $board = "";
        $display = "none";
        if (isset($_POST['name']))
        {
            $name = trim($_POST['name']);
        }

        if (isset($_POST['place']))
        {
            $place = trim($_POST['place']);
        }

        if (isset($_POST['add']) && $name != "" && $place != "")
        {
            if (filesize("MusicLeaderboard.txt") != 0)
            {
                $file = fopen("MusicLeaderboard.txt", "r");
                $str = (string)fgets($file);
                $str = rtrim($str,".");
                $temp_arr = explode(".", $str);
                foreach ($temp_arr as $index)
                {
                    $key_value = explode(",", $index);
                    $LeaderBoard[$key_value[0]] = $key_value[1];
                }
                fclose($file);
            }
            if (!in_array($name,$LeaderBoard))
            {
                if (!array_key_exists($place,$LeaderBoard))
                {
                    $file = fopen("MusicLeaderboard.txt", "a");
                    fwrite($file, "$place,$name.");
                    $text = "Đã xếp hạng thành công bài hát $name vào hạng $place.";
                    fclose($file);
                } else $text = "Thứ hạng bạn vừa nhập đã tồn tại.";
            } else $text = "Bài hát $name đã tồn tại trong bảng xếp hạng.";
        } else $text = "Không được để trống ô nào.";

        if (isset($_POST['show']))
        {
            if (filesize("MusicLeaderboard.txt") == 0)
            {
                $text = "Bảng xếp hạng bài hát đang trống.";
            }
            else 
            {
                $text = "";
                $display = "table";
                $file = fopen("MusicLeaderboard.txt", "r");
                $str = (string)fgets($file);
                $str = rtrim($str,".");
                $temp_arr = explode(".", $str);
                foreach ($temp_arr as $index)
                {
                    $key_value = explode(",", $index);
                    $LeaderBoard[$key_value[0]] = $key_value[1];
                }
    
                ksort($LeaderBoard);
                
                foreach ($LeaderBoard as $place => $name)
                {
                    $board .= "<tr> <td> $place </td> <td> $name </td> </tr>";
                }
                fclose($file);
                $name = $place = "";
            }
        } 
        if (isset($_POST['reset']))
        {
            file_put_contents("MusicLeaderboard.txt","");
            $text = "Đã làm mới bảng xếp hạng.";
        }
    ?>
    <form action="" method="post">
        <table>
        <thead>
            <tr>
                <td colspan="2" align="center">Bảng xếp hạng bài hát</td>
            </tr>
        </thead>
        <tr>
            <td>Tên bài hát: </td>
            <td><input type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
            <td >Thứ hạng: </td>
            <td><input type="text" name="place" value="<?php echo $place;?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Thêm" name="add">
                <input type="submit" value="Xem BXH" name="show">
                <input type="submit" value="Làm mới BXH" name="reset">
            </td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="text" id="" rows="2" disabled><?php echo $text?></textarea></td>
        </tr>
        </table>
        <table style="display: <?php echo $display ?>;">
            <tr><td>Xếp hạng</td><td>Tên bài hát</td></tr>
            <?php echo $board ?>
        </table>
    </form>
</body>