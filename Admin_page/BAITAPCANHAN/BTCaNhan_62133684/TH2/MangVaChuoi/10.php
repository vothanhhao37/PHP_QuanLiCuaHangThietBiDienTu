
<!DOCTYPE html>
<html>
<head>
    <title>Xếp hạng bài hát</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<?php
        session_start();

        // Kiểm tra nút Thêm bài hát được nhấn
        if (isset($_POST['add_song'])) {
            if(!(empty($_POST['song_name']) || (empty($_POST['ranking']))))
            {
                $song_name = $_POST['song_name'];
                $ranking = $_POST['ranking'];
    
                // Kiểm tra nếu danh sách bài hát chưa tồn tại, tạo mới
                if (!isset($_SESSION['song_list'])) {
                    $_SESSION['song_list'] = array();
                }
    
                // Thêm bài hát vào danh sách
                $_SESSION['song_list'][] = array('song_name' => $song_name, 'ranking' => $ranking);
    
                echo 'Bài hát đã được thêm vào danh sách.';
            }
          
        }

        // Kiểm tra nút Hiển thị bảng xếp hạng được nhấn
        if (isset($_POST['display_ranking'])) {
            // Kiểm tra nếu danh sách bài hát tồn tại
            if (isset($_SESSION['song_list'])) {
                // Sắp xếp danh sách bài hát theo thứ hạng
                $song_list = $_SESSION['song_list'];
                usort($song_list, function($a, $b) {
                    return intval($a['ranking']) - intval($b['ranking']);
                });

                // Hiển thị bảng xếp hạng
                echo '<table>';
                echo '<tr><th>Tên bài hát</th><th>Thứ hạng</th></tr>';
                foreach ($song_list as $song) {
                    echo '<tr><td>'.$song['song_name'].'</td><td>'.$song['ranking'].'</td></tr>';
                }
                echo '</table>';
            } else {
                echo 'Danh sách bài hát trống.';
            }
        }
        ?>
<body>
    <div class="container">
        <h2>Xếp hạng bài hát</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Tên bài hát</td>
                    <td> <input type="text" name="song_name" placeholder="Tên bài hát" ></td>
                </tr>
                <tr>
                    <td>Thứ hạng bài hát</td>
                    <td> <input type="text" name="ranking" placeholder="Thứ hạng" ></td>
                </tr>
                <tr>
                    <td colspan="2">  <input type="submit" name="add_song" value="Thêm bài hát">
            <input type="submit" name="display_ranking" value="Hiển thị bảng xếp hạng"></td>    
                </tr>

             
            </table>
           

          
        </form>

       
    </div>
</body>
</html>
