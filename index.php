<?php
include "header.php";
try {
	include "connect_db.php";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$input_c = test_input($_POST["input_c"]);
	
	    $sql_execution = "SELECT c,e FROM ykeytable WHERE c = '$input_c'";
	    $stmt = $conn->prepare($sql_execution);
	    $stmt->execute();
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result_array = $stmt->fetchAll();

		//manage log
		if (count($result_array) > 0) {
			date_default_timezone_set("Asia/Taipei");
			$the_date = date("Y-m-d");
			$sql_log = "INSERT INTO logtable (c,date) VALUES ('$input_c','$the_date');";
	    	$conn->exec($sql_log);
		}
	}

	$sql_log = "SELECT date FROM logtable ORDER BY i ASC LIMIT 1;";
	$stmt = $conn->prepare($sql_log);
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$log_date = $stmt->fetchAll();

	$found_date = $log_date[0]["date"];

	$sql_log = "SELECT i , c FROM logtable ORDER BY i DESC LIMIT 10;";
	$stmt = $conn->prepare($sql_log);
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$log = $stmt->fetchAll();

	$log_count = $log[0]["i"];
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>雅虎奇摩倉頡編碼查詢數據庫</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<style>
			body * {
    			font-family:TW-Sung,TW-Sung-Ext-B,TW-Sung-Plus,HanaMinA,HanaMinB,HanaMinPlus,MingLiU,MingLiU-ExtB,Serif;
				line-height:1.5;
			}
			body {
				text-align:center;
			}
			form {
				margin-top:40px;
				padding:40px 40px;
				background-color:#eaf;
				display:inline-block;
			}
			#out {
				padding:40px 0px 20px 0px;
				width:100%;
				border-top:4px solid #375;
			}
			#form_title {
				font-size:40px;
				font-weight:bold;
				color:#137;
			}
			#input_span, #input_c {
				font-size:30px;
			}
			#input_c {
				width:180px;
			}
			#login_submit {
				font-size:26px;
				padding:0px;
			}
			#result_div {
				position:relative;
				padding:0px;
			}
			#result_c {
				position:relative;
				vertical-align:middle;
				font-size:120px;
    			font-family:TW-Kai,TW-Kai-Ext-B,TW-Kai-Plus,DFKai-SB,serif;
				border:2px solid purple;
				margin:0px 15px 0px 15px;
				padding:6px;
				background-color:#9de;
			}
			#result_e_out {
				position:relative;
				display:inline-block;
				vertical-align:middle;
			}
			.result_e {
				position:relative;
				display:inline-block;
				vertical-align:middle;
				margin:5px 15px 5px 15px;
				font-size:28px;
				color:#fba;
				background-color:#401;
				padding:4px;
			}
			#detail {
				display:inline-block;
				font-size:18px;
				text-align:left;
			}
			#detail_title {
				position:relative;
				display:inline-block;
				color:#ff5;
				background-color:#135;
				padding:4px;
			}
			#found_date {
				position:relative;
				color:#813;
			}
			#log_count {
				position:relative;
				color:#183;
				font-size:36px;
			}
			#ten_span {
				position:relative;
				color:#127;
			}
			#ten_c {
				border-bottom:1px solid #242;
			}
		</style>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<span id="form_title">雅虎奇摩倉頡編碼查詢數據庫</span>
			<div id="out">
				<span id="input_span">請輸入所查字符：</span>
				<input type="input" name="input_c" id="input_c" maxLength=5 autofocus>
				<input type="submit" id="login_submit" value="確定">
			</div>
			<div id="result_div">
<?php
//echo result
if (count($result_array) == 0) {
	if ("" != $input_c) {
		echo "<div class='result_e'>！此字符不在數據庫中</div>";
	}
} else {
	echo "<span id='result_c'>$input_c</span>";
	echo "<div id='result_e_out'>";
	for ($p = 0; $p < count($result_array); $p++) {
		$result_e = resulte_replace($result_array[$p]["e"]);
		echo "<div class='result_e'>$result_e</div>";
	}
	echo "</div><!-- id='result_e_out'-->";
}
?>
			</div>
		</form><br>
		<div id="detail">

<?php
//echo log
echo "<p>本網自<span id='found_date'>$found_date</span>起，累計已使用<span id='log_count'>$log_count</span>次。";
echo "<br>";
echo "<span id='ten_span'>最近查詢的十個字符</span>：<span id='ten_c'>";
for ($p = 0; $p < count($log); $p++) {
	echo $log[$p]["c"];
	if ($p < count($log) - 1) {
		echo "，";
	}
}
echo "</span>。</p>";
echo "<br>";
?>
			<p>本網頁程式和數據庫製作項目開源位址：<a href="https://github.com/ejsoonyang/yahookeykeysearch" target="__blank">github</a></p>
			<p><div id="detail_title">相關查詢網站</div><br>
				香港華通：<a href="http://input.foruto.com/cccls/cjzd.html" target="__blank">follow me倉頡字典</a><br>
				朱邦復工作室：<a href="http://www.hanculture.com/dic/index.php" target="__blank">漢文庫典</a><br>
				行政院國家發展委員會：<a href="http://www.cns11643.gov.tw/AIDB/" target="__blank">全字庫</a><br>
				香港中文大學人文電算研究中心：<a href="http://humanum.arts.cuhk.edu.hk/Lexis/lexi-mf/" target="__blank">漢語多功能字庫</a>
			</p>
		</div>
	</body>
</html>
<?php
function resulte_replace($str_object) {
	$str_object = str_replace("a", "日", $str_object);
	$str_object = str_replace("b", "月", $str_object);
	$str_object = str_replace("c", "金", $str_object);
	$str_object = str_replace("d", "木", $str_object);
	$str_object = str_replace("e", "水", $str_object);
	$str_object = str_replace("f", "火", $str_object);
	$str_object = str_replace("g", "土", $str_object);
	$str_object = str_replace("h", "竹", $str_object);
	$str_object = str_replace("i", "戈", $str_object);
	$str_object = str_replace("j", "十", $str_object);
	$str_object = str_replace("k", "大", $str_object);
	$str_object = str_replace("l", "中", $str_object);
	$str_object = str_replace("m", "一", $str_object);
	$str_object = str_replace("n", "弓", $str_object);
	$str_object = str_replace("o", "人", $str_object);
	$str_object = str_replace("p", "心", $str_object);
	$str_object = str_replace("q", "手", $str_object);
	$str_object = str_replace("r", "口", $str_object);
	$str_object = str_replace("s", "尸", $str_object);
	$str_object = str_replace("t", "廿", $str_object);
	$str_object = str_replace("u", "山", $str_object);
	$str_object = str_replace("v", "女", $str_object);
	$str_object = str_replace("w", "田", $str_object);
	$str_object = str_replace("x", "難", $str_object);
	$str_object = str_replace("y", "卜", $str_object);
	$str_object = str_replace("z", "重", $str_object);
	return $str_object;
}
?>
