<?php

class Human
{
    protected $name;
    protected $gender;
    protected $addr;
}

class Student extends Human
{
    protected $major;
    protected $class;

    public function bonus()
    {
        if ($this->major == "CNTT")
            return 1;
        else if ($this->major == "KT")
            return 1.5;
        else
            return 0;
    }

    public function __construct($name = "", $gender = "", $addr = "", $class = "", $major = "")
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->addr = $addr;
        $this->class = $class;
        $this->major = $major;
    }
}

class Lecturer extends Human
{
    protected $degree;
    const BASIC_SALARY = 1500000;

    public function salary()
    {
        if ($this->degree == "bachelor")
            return self::BASIC_SALARY * 2.34;
        else if ($this->degree == "master")
            return self::BASIC_SALARY * 3.67;
        else
            return self::BASIC_SALARY * 5.66;
    }

    public function __construct($name = "", $gender = "", $addr = "", $degree = "")
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->addr = $addr;
        $this->degree = $degree;
    }
}

$output = "";
$selectedOption = "";
$display = $displayMajor = $displayDegree = "none";

if (isset($_POST["gender"]) && $_POST["gender"] == "male") {
    $gender = "Nam";
} else
    $gender = "";

if (isset($_POST["gender"]) && $_POST["gender"] == "female") {
    $gender = "Nữ";
} else
    $gender = "";

if (isset($_POST["name"])) {
    $name = $_POST["name"];
} else
    $name = "";

if (isset($_POST["addr"])) {
    $addr = $_POST["addr"];
} else
    $addr = "";


if (isset($_POST["major"])) {
    $major = $_POST["major"];
} else
    $major = "";

if (isset($_POST["degree"])) {
    $degree = $_POST["degree"];
} else
    $degree = "";

if (isset($_POST["next"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selectedOption = $_POST["choice"];

        if ($selectedOption === "student") {
            $display = $displayMajor = "table-row";

        } elseif ($selectedOption === "lecturer") {
            $display = $displayDegree = "table-row";
        }
    }
}

if (isset($_POST["submit"])) {

    if ($_POST["choice"] == "student") {
        $student = new Student($name, $gender, $addr, "Lớp 1", $major);
        $output = "Thông tin sinh viên vừa nhập: \n";
        $output .= "Tên: $name Giới tính:  $gender Địa chỉ  $addr Lớp 1 Chuyên ngành: $major\n";
        $output .= "Điểm thưởng: {$student->bonus()}";
    } else {
        $lecturer = new Lecturer($name, $gender, $addr, $degree);
        $output = "Thông tin giảng viên vừa nhập: \n";
        $output .= "Tên: $name  Giới tính:  $gender  Địa chỉ: $addr Bằng: $degree\n";
        $output .= "Lương: {$lecturer->salary()}";
    }
}

?>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2" align="center">Nhập thông tin</td>
            </tr>
            <tr>
                <td>Họ tên</td>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="addr" value="<?php echo $addr ?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male")
                        echo "checked" ?>> Nam
                        <input type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female")
                        echo "checked" ?>> Nữ
                    </td>
                </tr>
                <tr>
                    <td>Sinh viên hay giảng viên</td>
                    <td>
                        <input type="radio" name="choice" value="student" <?php if (isset($_POST["choice"]) && $_POST["choice"] == "student")
                        echo "checked" ?>> Sinh viên
                        <input type="radio" name="choice" value="lecturer" <?php if (isset($_POST["choice"]) && $_POST["choice"] == "lecturer")
                        echo "checked" ?>> Giảng viên
                    </td>
                    <td><input type="submit" value="Tiếp tục" name="next"></td>
                </tr>
                <tr style="display: <?php echo $displayMajor ?>;">
                <td>Ngành học: </td>
                <td>
                    <input type="radio" name="major" value="CNTT" <?php if (isset($_POST["major"]) && $_POST["major"] == "CNTT")
                        echo "checked" ?>> CNTT
                        <input type="radio" name="major" value="KT" <?php if (isset($_POST["major"]) && $_POST["major"] == "KT")
                        echo "checked" ?>> Kinh tế
                        <input type="radio" name="major" value="other" <?php if (isset($_POST["major"]) && $_POST["major"] == "other")
                        echo "checked" ?>> Khác
                    </td>
                </tr>
                <tr style="display: <?php echo $displayDegree ?>;">
                <td>Trình độ: </td>
                <td>
                    <input type="radio" name="degree" value="bachelor" <?php if (isset($_POST["degree"]) && $_POST["degree"] == "bachelor")
                        echo "checked" ?>> Cử nhân
                        <input type="radio" name="degree" value="master" <?php if (isset($_POST["degree"]) && $_POST["degree"] == "master")
                        echo "checked" ?>> Thạc sĩ
                        <input type="radio" name="degree" value="doctor" <?php if (isset($_POST["degree"]) && $_POST["degree"] == "doctor")
                        echo "checked" ?>> Tiến sĩ
                    </td>
                </tr>
                <tr style="display: <?php echo $display ?>;">
                <td colspan="2" align="center"> <input type="submit" name="submit" value="Thực hiện"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><textarea name="" id="" cols="30"
                        rows="10"><?php echo $output ?></textarea></td>
            </tr>
        </table>
    </form>
</body>