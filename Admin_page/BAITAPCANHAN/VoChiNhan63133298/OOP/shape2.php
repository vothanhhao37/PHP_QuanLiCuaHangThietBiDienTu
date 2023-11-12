<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tinh chu vi va dien tich</title>

<style>

fieldset {

  background-color: #eeeeee;

}



legend {

  background-color: gray;

  color: white;

  padding: 5px 10px;

}



input {

  margin: 5px;

}

</style>

</head>

<body>

<?php 

abstract class Hinh{

	protected $ten, $dodai;

	public function setTen($ten){

		$this->ten=$ten;

	}

	public function getTen(){

		return $this->ten;

	}

	public function setDodai($doDai){

		$this->dodai=$doDai;

	}

	public function getDodai(){

		return $this->dodai;

	}

	abstract public function tinh_CV();

	abstract public function tinh_DT();

}

class HinhTron extends Hinh{

	const PI=3.14;

	function tinh_CV(){

		return round($this->dodai*2*self::PI,2);

	}

	function tinh_DT(){

		return round(pow($this->dodai,2)*self::PI,2);

	}

}

class HinhVuong extends Hinh{

	public function tinh_CV(){

		return round($this->dodai*4,2);

	}

	public function tinh_DT(){
		return round(pow($this->dodai,2),2);
	}

}

class TamGiacDeu extends Hinh{

    public function tinh_CV()
    {
        return round($this->dodai*3,2);
    }

    public function tinh_DT()
    {
        return round((sqrt(3) / 4) * pow($this->dodai, 2),2);
    }
}

class TamGiacThuong extends Hinh
{
    public $dodai2;
    public $dodai3;
    public function tinh_CV()
    {
        $this->dodai2 = $this->dodai * 2;
        $this->dodai3 = $this->dodai * 1.5;
        return round($this->dodai + $this->dodai2 + $this->dodai3,2);
    }

    public function tinh_DT()
    {
        $this->dodai2 = $this->dodai * 2;
        $this->dodai3 = $this->dodai * 1.5;
        $s = ($this->dodai + $this->dodai2 + $this->dodai3) / 2;
        return round(sqrt($s * ($s - $this->dodai) * ($s - $this->dodai2) * ($s - $this->dodai3)),2);
    }
}

class ChuNhat extends Hinh
{
    public $dodai2;

    public function tinh_CV()
    {
        $this->dodai2 = $this->dodai * 2;
        return round(($this->dodai + $this->dodai2) * 2,2);
    }

    public function tinh_DT()
    {
        $this->dodai2 = $this->dodai * 2;
        return round($this->dodai * $this->dodai2,2);
    }
}

$str=NULL;

if(isset($_POST['tinh'])){

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){

		$hv=new HinhVuong();

		$hv->setTen($_POST['ten']);

		$hv->setDodai($_POST['dodai']);

		$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".

		 		"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();

	}

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){

		$ht=new HinhTron();

		$ht->setTen($_POST['ten']);

		$ht->setDodai($_POST['dodai']);

		$str= "Diện tích của hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".

				"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();

	}

    if(isset($_POST['hinh']) && ($_POST['hinh'])=="cn"){

		$cn=new ChuNhat();

		$cn->setTen($_POST['ten']);

		$cn->setDodai($_POST['dodai']);
        $dodai2 = $cn->getDodai() * 2;
		$str= "Diện tích của hình chữ nhật ".$cn->getTen()." với độ dài 2 cạnh {$cn->getDodai()} và $dodai2  là : ".$cn->tinh_DT()." \n".

				"Chu vi của Hình chữ nhật ".$cn->getTen()." là : ".$cn->tinh_CV();

	}

    if(isset($_POST['hinh']) && ($_POST['hinh'])=="tgt"){

		$tg=new TamGiacThuong();

		$tg->setTen($_POST['ten']);

		$tg->setDodai($_POST['dodai']);

        $dodai2 = $tg->getDodai() * 2;
        $dodai3 = $tg->getDodai() * 1.5;
		$str= "Diện tích của tam giác thường ".$tg->getTen()." cạnh {$tg->getDodai()}, $dodai2 , $dodai3 là : ".$tg->tinh_DT()." \n".

				"Chu vi tam giác thường ".$tg->getTen()." cạnh {$tg->getDodai()}, $dodai2 , $dodai3 là : ".$tg->tinh_CV();

	}

    if(isset($_POST['hinh']) && ($_POST['hinh'])=="tgd"){

		$tg=new TamGiacThuong();

		$tg->setTen($_POST['ten']);

		$tg->setDodai($_POST['dodai']);

		$str= "Diện tích của tam giác đều ".$tg->getTen()." cạnh {$tg->getDodai()} là : ".$tg->tinh_DT()." \n".

				"Chu vi tam giác thường ".$tg->getTen()." cạnh {$tg->getDodai()} là : ".$tg->tinh_CV();
	}   
}
?>

<form action="" method="post">

<fieldset>

	<legend>Tính chu vi và diện tích các hình học đơn giản</legend>

	<table border='0'>

		<tr><td>Chọn hình</td><td>
        <input type="radio" name="hinh" value="hv" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked="checked"'?>/>Hình vuông
        <input type="radio" name="hinh" value="cn" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="cn") echo 'checked="checked"'?>/>Hình chữ nhật
        <input type="radio" name="hinh" value="tgt" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tgt") echo 'checked="checked"'?>/>Hình tam giac thường
        <input type="radio" name="hinh" value="tgd" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tgd") echo 'checked="checked"'?>/>Hình tam giác đều

								
        <input type="radio" name="hinh" value="ht"<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked="checked"'?>/>Hình tròn</td></tr>

		<tr><td>Nhập tên:</td><td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td></tr>

		<tr><td>Nhập độ dài:</td><td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td></tr>

		<tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>

		<tr><td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td></tr>

	</table>

</fieldset>

</form>



</body>

</html>