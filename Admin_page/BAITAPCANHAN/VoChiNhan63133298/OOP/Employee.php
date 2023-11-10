<?php

abstract class Employee
{
    protected $name;
    protected $gender;
    protected $firstDay;
    protected $coefficient;
    protected $childs;
    protected $bDay;
    const BASIC_SALARY = 1500000;

    abstract protected function salary();
    abstract protected function allowance();
    public function bonus()
    {
        $dateTime = DateTime::createFromFormat('d/m/Y', $this->firstDay);
        $workYear = date("Y") - $dateTime->format('Y');
        return $workYear * 1000000;
    }
}

class OfficeWorker extends Employee
{
    protected $dayOff;
    const DAYOFF_LIMIT = 3;
    const FINE_UNIT = 100000;

    public function salary()
    {
        return parent::BASIC_SALARY * $this->coefficient - $this->fine();
    }

    public function fine()
    {
        if ($this->dayOff > self::DAYOFF_LIMIT)
            return $this->dayOff * self::FINE_UNIT;
        else
            return 0;
    }

    public function allowance()
    {
        if ($this->gender == "female")
            return 200000 * $this->childs * 1.5;
        return 200000 * $this->childs;
    }

    public function __construct($name = "", $bDay = "", $gender = "male", $firstDay = "", $coefficient = "", $childs = "", $dayOff = 0)
    {
        $this->bDay = $bDay;
        $this->name = $name;
        $this->gender = $gender;
        $this->firstDay = $firstDay;
        $this->coefficient = $coefficient;
        $this->childs = $childs;
        $this->dayOff = $dayOff;
    }

}

class ProductionWorker extends Employee
{
    protected $productCount;
    const PRODUCT_LIMIT = 100;
    const PRODUCT_UNIT = 100000;

    public function bonus()
    {
        if ($this->productCount > self::PRODUCT_LIMIT)
            return ($this->productCount - self::PRODUCT_LIMIT) * self::PRODUCT_UNIT * 0.03;
        return 0;
    }

    public function allowance()
    {
        return $this->childs * 120000;
    }

    public function salary()
    {
        return ($this->productCount * self::PRODUCT_UNIT) + $this->bonus();
    }

    public function __construct($name = "", $bDay = "", $gender = "male", $firstDay = "", $coefficient = "", $childs = "", $productionCount = 0)
    {
        $this->bDay = $bDay;
        $this->name = $name;
        $this->gender = $gender;
        $this->firstDay = $firstDay;
        $this->coefficient = $coefficient;
        $this->childs = $childs;
        $this->productCount = $productionCount;
    }
}
    $alert = "";
    $allowance = $salary = $bonus = $fine = $total = 0;
    if (isset($_POST["name"]))
    {
        $name = $_POST["name"];
    } else $name = "";

    if (isset($_POST["childs"]))
    {
        $childs = $_POST["childs"];
    } else $childs = "";

    if (isset($_POST["bDay"]))
    {
        $bDay = $_POST["bDay"];
    } else $bDay = "";

    if (isset($_POST["startDay"]))
    {
        $startDay = $_POST["startDay"];
    } else $startDay = "";

    if (isset($_POST["dayoff"]))
    {
        $dayoff = $_POST["dayoff"];
    } else $dayoff = "";

    if (isset($_POST["coefficient"]))
    {
        $coef = $_POST["coefficient"];
    } else $coef = "";

    if (isset($_POST["productCount"]))
    {
        $productCount = $_POST["productCount"];
    } else $productCount = "";

    $office = array($name, $childs, $bDay, $startDay, $dayoff, $coef);
    $production = array($name, $childs, $bDay, $startDay, $coef, $productCount);

    if (isset($_POST["submit"]))
    {
        if ($_POST["gender"] == "male")
        {
            $gender = "Nam";
        } else 
        {
            $gender = "Nữ";
        }
        if ($_POST["empType"] == "office")
        {
            $filtered = array_filter($office,function (string $str) {return strlen($str) == 0;});
            if (empty($filtered))
            {
                $emp = new OfficeWorker($name,$bDay,$gender,$startDay,$coef,$childs,$dayoff);
                $salary = $emp->salary();
                $bonus = $emp->bonus();
                $fine = $emp->fine();
                $allowance = $emp->allowance();
                $total = $salary + $bonus + $allowance - $fine;
            }
            else $alert = "Không được bỏ trống các trường liên quan đến nhân viên văn phòng!";
        }
        else 
        {
            $filtered = array_filter($production, function (string $str) {return strlen($str) == 0;});
            if (empty($filtered))
            {
                $emp = new ProductionWorker($name,$bDay,$gender,$startDay,$coef,$childs,$productCount);
                $salary = $emp->salary();
                $bonus = $emp->bonus();
                $allowance = $emp->allowance();
                $total =  $salary + $allowance;
            }
            else $alert = "Không được bỏ trống các trường liên quan đến nhân viên sản xuất!";
        }
    }

?>
<body>
    <style>
        table {
            width: 1000px;
        }
        td
        {
            background-color:bisque;
        }
    </style>
    <form action="" method="post">
        <table>
            <tr><td colspan="4" align="center"><h2>Quản lý nhân viên</h2></td></tr>
            <tr>
                <td>Họ và tên: </td>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                <td>Số con: </td>
                <td><input type="text" name="childs" value="<?php echo $childs ?>"></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="text" name="bDay" value="<?php echo $bDay ?>"></td>
                <td>Ngày vào làm: </td>
                <td><input type="text" name="startDay" value="<?php echo $startDay ?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male")
                        echo "checked" ?> checked>Nam
                        <input type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female")
                        echo "checked" ?>>Nữ
                    </td>
                    <td>Hệ số lương: </td>
                    <td><input type="text" name="coefficient" value="<?php echo $coef ?>"></td>
            </tr>
            <tr>
                <td>Loại nhân viên: </td>
                <td>
                    <input type="radio" name="empType" value="office" <?php if (isset($_POST["empType"]) && $_POST["empType"] == "office")
                    echo "checked" ?> checked> Văn phòng</td>
                <td colspan="2">
                    <input type="radio" name="empType" value="production" <?php if (isset($_POST["empType"]) && $_POST["empType"] == "production")
                    echo "checked" ?>> Sản xuất
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Số ngày vắng:<input type="text" name="dayoff" value="<?php echo $dayoff ?>"></td>
                <td>Số sản phẩm: </td>
                <td><input type="text" name="productCount" value="<?php echo $productCount ?>"></td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" value="Tính lương" name="submit"></td>
            </tr>
            <tr>
                <td>Tiền lương: </td>
                <td><input type="text" name="salary" value="<?php echo $salary ?>"></td>
                <td>Trợ cấp: </td>
                <td><input type="text" name="allowance" value="<?php echo $allowance ?>"></td>
            </tr>
            <tr>
                <td>Tiền thưởng: </td>
                <td><input type="text" name="bonus" value="<?php echo $bonus ?>"></td>
                <td>Tiền phạt: </td>
                <td><input type="text" name="fine" value="<?php echo $fine ?>"></td>
            </tr>
            <tr>
                <td align="center" colspan="4">Thực lĩnh: <input type="text" value="<?php echo $total; ?>"></td>
            </tr>
            <tr><td colspan="4" align="center"><?php echo $alert; ?></td></tr>
        </table>
    </form>
</body>
