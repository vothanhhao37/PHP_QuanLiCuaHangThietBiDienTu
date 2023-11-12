<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
	class Nguoi
	{
		protected $hoTen, $diaChi, $gioitinh;


		public function getHoTen()
		{
			return $this->hoTen;
		}


		public function setHoTen($hoTen): self
		{
			$this->hoTen = $hoTen;
			return $this;
		}


		public function getDiaChi()
		{
			return $this->diaChi;
		}


		public function setDiaChi($diaChi): self
		{
			$this->diaChi = $diaChi;
			return $this;
		}


		public function getGioitinh()
		{
			return $this->gioitinh;
		}


		public function setGioitinh($gioitinh): self
		{
			$this->gioitinh = $gioitinh;
			return $this;
		}
	}
	class SinhVien extends Nguoi
	{
		protected $LopHoc, $NganhHoc;
		public function getLopHoc()
		{
			return $this->LopHoc;
		}

		public function setLopHoc($LopHoc): self
		{
			$this->LopHoc = $LopHoc;
			return $this;
		}

		public function getNganhHoc()
		{
			return $this->NganhHoc;
		}

		public function setNganhHoc($NganhHoc): self
		{
			$this->NganhHoc = $NganhHoc;
			return $this;
		}
		public function tinhDiemThuong()
		{
			if ($this->NganhHoc == "CNTT") {
				return 1;
			} else if ($this->NganhHoc == "KT") {
				return 1.5;
			} else
				return 0;
		}
	}

	class GiangVien extends Nguoi
	{
		const LUONG_CO_BAN = 1500000;
		protected $trinhDo;

		public function getTrinhDo()
		{
			return $this->trinhDo;
		}

		public function setTrinhDo($trinhDo): self
		{
			$this->trinhDo = $trinhDo;
			return $this;
		}

		public function tinhLuong()
		{
			if ($this->trinhDo == "CN")
				return self::LUONG_CO_BAN * 2.34;
			if ($this->trinhDo == "ThS")
				return self::LUONG_CO_BAN * 3.67;
			if ($this->trinhDo == "TS")
				return self::LUONG_CO_BAN * 5.66;
		}
	}

	// Xử Lí ô input
// Xử lí ô nhập họ tên
	if (isset($_POST['hoTenGV']) && isset($_POST['hoTenSV']) && isset($_POST['diachiGV']) && isset($_POST['diachiSV']) && isset($_POST['lopHoc']) && isset($_POST['kq'])) {
		$hoTenGV = $_POST['hoTenGV'];
		$hoTenSV = $_POST['hoTenSV'];
		$dcGV = $_POST['diachiGV'];
		$dcSV = $_POST['diachiSV'];
		$lopHoc = $_POST['lopHoc'];
		$kq = $_POST['kq'];
	} else {
		$hoTenGV = "";
		$hoTenSV = "";
		$dcGV = "";
		$dcSV = "";
		$lopHoc = "";
		$kq = "";
	}

	?>

	<form action="" method="post">

		<fieldset>

			<legend>Quản lí Sinh Viên và Giảng Viên</legend>

			<table border='0'>

				<td>Họ tên GV: </td>
				<td><input type="text" name="hoTenGV" value="<?php echo $hoTenGV; ?>"></td>
				<td>Họ tên SV: </td>
				<td><input type="text" name="hoTenSV" value="<?php echo $hoTenSV; ?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td><input type="text" name="diachiGV" value="<?php echo $dcGV; ?>"></td>
					<td>Địa chỉ</td>
					<td><input type="text" name="diachiSV" value="<?php echo $dcSV ?>"></td>
				</tr>
				<tr>
					<!-- GIANG VIEN -->
					<td>Giới Tính</td>
					<td>
						<input type="radio" name="gtGV" value="NamGV" <?php if (isset($_POST['gtGV']) && ($_POST['gtGV']) == "NamGV")
							echo 'checked="checked"' ?> />Nam
						</td>
						<td><input type="radio" name="gtGV" value="NuGV" <?php if (isset($_POST['gtGV']) && ($_POST['gtGV']) == "NuGV")
							echo 'checked="checked"' ?> />Nữ</td>

						<!-- SINH VIEN -->
						<td>Giới Tính</td>
						<td><input type="radio" name="gtSV" value="" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "")
							echo 'checked="checked"' ?> />Nam</td>
						<td><input type="radio" name="gtSV" value="" <?php if (isset($_POST['gt']) && ($_POST['gt']) == "")
							echo 'checked="checked"' ?> />Nữ</td>
					</tr>
					<!-- Trình độ giảng viên -->
					<tr>
						<td>Trình độ</td>
						<td><select id="trinhDo" name="trinhDo" required>
								<option value="CN">Cử Nhân</option>
								<option value="ThS">Thạc Sĩ</option>
								<option value="TS">Tiến Sĩ</option>
							</select><br><br></td>
						<!-- Ngành Học SInh Viên -->
						<td>Ngành Học</td>
						<td><select id="NganhHoc" name="NganhHoc" required>
								<option value="CNTT">Công nghệ thông tin </option>
								<option value="KT">Kinh Tế </option>
								<option value="khac">Khác </option>
							</select><br><br></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Lớp Học</td>
						<td><input type="text" name="lopHoc" value="<?php echo $lopHoc; ?>"></td>
				</tr>

				<tr>
					<td>Kết Quả</td>
					<td><textarea name="kq" id="kq" cols="40" rows="10"><?php echo $kq; ?></textarea></td>
				</tr>

			</table>

		</fieldset>

	</form>

</body>

</html>