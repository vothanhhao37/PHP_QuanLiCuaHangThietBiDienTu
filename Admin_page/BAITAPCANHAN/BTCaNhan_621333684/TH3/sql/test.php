<div class="box_search">
    <form action="" method="get">
        <label>Tìm kiếm : </label>
        <input type="text" name="q" placeholder="Tìm kiếm!"
            value="<?php echo (isset($_GET["q"]) && $_GET["q"] != "" ? $_GET["q"] : "") ?>" />
        <input type="submit" name="submit" value="Tìm kiếm" />
    </form>
</div>
<a href="?page=add" class="add">Add Post</a>
<table>
    <thead>
        <tr>
            <th>Tên sữa</th>
            <th>Mã sữa</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        /* SQL SELECT POSTS */
        $sql = "SELECT * FROM `sua`";
        /* CONFIG SET SEARCH */
        $q = (isset($_GET["q"]) && $_GET["q"] != "" ? $_GET["q"] : "null");
        $key_search = "";
        if ($q != "null") {
            $sql .= " WHERE `Ten_sua` LIKE '%$q%'";
            $key_search = "&q=" . $q;
        }
        /* PAGINATION */
        $pageNumber = 1;
        if (!empty($_GET['pageNumber'])) {
            $pageNumber = filter_input(INPUT_GET, 'pageNumber', FILTER_VALIDATE_INT);
            if (false === $page) {
                $pageNumber = 1;
            }
        }
        $limit = 3; //set show 3 record
        $offset = ($pageNumber - 1) * $limit;
        $result_total = mysqli_query($conn, $sql);
        $pageNumberTotal = mysqli_num_rows($result_total);
        $pageCount = (int) ceil($pageNumberTotal / $limit);

        /* SHOW POSTS */
        $sql .= " ORDER BY `Ten_sua` DESC limit $offset,$limit";
        $result = mysqli_query($conn, $sql);
        $str = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $str .= "<tr>";
            $str .= "<td>" . $row['Ten_sua'] . "</td>";

            $str .= "<td><a href='?page=edit&id=" . $row['Ma_sua'] . "'><span class='edit'>Edit</span></a></td>";
            $str .= "<td><a href='?page=delete&id=" . $row['Ma_sua'] . "'><span class='delete'>Delete</span></a></td>";
            $str .= "</tr>";
        }
        echo $str;

        ?>
    </tbody>
</table>
<div class="pagination">
    <ul>
        <?php

        if ($pageNumber > 1) {
            $pagePrev = (int) $pageNumber - 1;
            $pageNumber = $pageNumber . $key_search; // page + key search
            echo "<li><a href='?page=home&pageNumber=$pagePrev'>Pre</a></li>";
        }

        for ($i = 1; $i <= $pageCount; $i++) {
            $pageShow = $i . $key_search; // page + key search
            if ($i == $pageNumber) {
                echo "<li class='active'><span>" . $i . "</span></li>";
            } else {
                echo "<li><a href='?page=home&pageNumber=$pageShow'>" . $i . "</a></li>";
            }
        }

        if ($pageNumber > 0 && $pageNumber < $pageCount) {
            $pageNext = (int) $pageNumber + 1;
            $pageNext = $pageNext . $key_search; // page + key search
            echo "<li><a href='?page=home&pageNumber=$pageNext'>Next</a></li>";
        }
        ?>
    </ul>
</div>