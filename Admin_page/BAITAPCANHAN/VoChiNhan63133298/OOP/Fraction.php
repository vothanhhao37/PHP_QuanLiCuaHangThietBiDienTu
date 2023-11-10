<?php

class Fraction
{
    private $numerator;
    private $denominator;

    public function __construct($numerator = 0, $denominator = 1)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    public function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function simplify() : Fraction
    {
        $gcd = $this->gcd($this->numerator, $this->denominator);
        return new Fraction($this->numerator/$gcd, $this->denominator/$gcd);
    }

    public function add($f) : Fraction
    {
        $res = new Fraction($this->numerator * $f->denominator + $f->numerator * $this->denominator, $this->denominator*$f->denominator);
        return $res->simplify();
    }

    public function sub($f) : Fraction
    {
        $res = new Fraction($this->numerator * $f->denominator - $f->numerator * $this->denominator, $this->denominator*$f->denominator);
        return $res->simplify();
    }

    public function mul($f) : Fraction
    {
        $res = new Fraction($this->numerator * $f->numerator, $this->denominator * $f->denominator);
        return $res->simplify();
    }

    public function div($f) : Fraction
    {
        $res = new Fraction($this->numerator * $f->denominator, $this->denominator * $f->numerator);
        return $res->simplify();
    }

    public function toString() : string
    {
        return "{$this->numerator} / {$this->denominator}";
    }
}

    $output = "";
    if (isset($_POST["num1"]))
    {
        $num1 = $_POST["num1"];
    } else $num1 = "";

    if (isset($_POST["num2"]))
    {
        $num2 = $_POST["num2"];
    } else $num2 = "";

    if (isset($_POST["den1"]))
    {
        $den1 = $_POST["den1"];
    } else $den1 = "";

    if (isset($_POST["den2"]))
    {
        $den2 = $_POST["den2"];
    } else $den2 = "";

    if (isset($_POST["submit"]))
    {
        $f1 = new Fraction($num1,$den1);
        $f2 = new Fraction($num2,$den2);
        $op = $_POST["op"];
        switch($op)
        {
            case "add":
                $res = $f1->add($f2);
                $op = "+";
                break;
            case "sub":
                $res = $f1->sub($f2);
                $op = "-";
                break;
            case "mul":
                $res = $f1->mul($f2);
                $op = "*";
                break;
            case "div":
                $res = $f1->div($f2);
                $op = "/";
                break;
        }
        $output = $f1->toString() . " $op " . $f2->toString() . " = " . $res->toString();
    }
?>

<body>
    <style>
        table
        {
            border: 1px solid black;
        }
    </style>
    <form action="" method="post">
        <table>
            <tr>
                    <th>Fraction 1</th>
                <th></th>
                <th>Fraction 2</th>
            </tr>
            <tr>
                <td><input type="text" name="num1" value="<?php echo $num1?>"></td>
                <td>
                    <input type="radio" name="op" value="add" checked> Add
                    <input type="radio" name="op" value="sub" <?php if (isset($_POST["op"]) && $_POST["op"] == "sub") echo "checked"; ?>>Subtract
                    <input type="radio" name="op" value="mul" <?php if (isset($_POST["op"]) && $_POST["op"] == "mul") echo "checked"; ?>>Multiply
                    <input type="radio" name="op" value="div" <?php if (isset($_POST["op"]) && $_POST["op"] == "div") echo "checked"; ?>>Divide
                </td>
                <td><input type="text" name="num2" value="<?php echo $num2?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="den1" value="<?php echo $den1 ?>"></td>
                <td align="center"><input type="submit" value="Calculate" name="submit"></td>
                <td><input type="text" name="den2" value="<?php echo $den2 ?>"></td>
            </tr>
            <tr><td colspan="3" align="center"><?php echo $output ?></td></tr>
        </table>
    </form>
</body>