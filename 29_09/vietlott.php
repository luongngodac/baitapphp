<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<?php
  // random kết quả xổ số
  $result = randomXoso();

  // sắp xếp tăng dần kết quả xổ số
  sort($result);

  // random số đặt biệt
  $special = -1;
  while($special === -1 && !checkExists($result, $special)) {
    $special = rand(0, 55);
  }

  // random vé số của bạn
  $me = randomXoso();

  // sắp xếp tăng dần vé số của bạn
  sort($me);

  // hiển thị kết quả xổ số
  echo "<h1>Kết quả xổ số ngày là: <span style='color: blue'>". date("d/m/Y") . "</span><br><span style='color: red'>" . display($result) . " | " . str_pad((string)$special, 2, "0", STR_PAD_LEFT) . "</span></h1>";

  // hiển thị vé số của bạn
  echo "<h1>Vé số của bạn là: ". "<br><span style='color: green'>" . display($me) . "</span></h1>";


  // biến đếm số số trùng
  $res = 0;
  // số còn lại cuối cùng
  $rest = -1;

  // đếm số trùng
  foreach($result as $i => $v) {
    if ($v === $me[$i]) {
      $res++;
    } else {
      // gán số khác
      $rest = $me[$i];
    }
  }

  // check trúng giải
  switch($res) {
    case 6: echo "<h2>Bạn đã trúng giải Jackpot</h2>"; break;
    case 5: 
      // kiểm tra trúng giải jackpot 2
      if ($rest === $special) {
        echo "<h2>Bạn đã trúng giải Jackpot 2</h2>";
      } else {
        echo "<h2>Bạn đã trúng giải nhất</h2>"; break;
      }
      break;
    case 4: echo "<h2>Bạn đã trúng giải nhì</h2>"; break;
    case 3: echo "<h2>Bạn đã trúng ba</h2>"; break;
    default: echo "<h2>Chúc bạn may mắn lần sau</h2>";
  }

  


  // random 6 số không trùng nhau
  function randomXoso() {
    $arr = [];
    for ($i = 0; $i < 6; $i++) {
      $r = -1;
      while($r === -1 && !checkExists($arr, $r)) {
        $r = rand(0, 55);
        array_push($arr, $r);
      }
    }
    return $arr;
  }

  // kiểm tra số đã tồn tại trong 1 mảng
  function checkExists($arr, $num) {
    foreach($arr as $it) {
      if ($it === $num) {
        return true;
      }
    }
    return false;
  }

  // hiển thị mảng số có 2 chữ số
  function display($arr) {
    $a = array_map(function($item) {
      return str_pad((string)$item, 2, "0", STR_PAD_LEFT);
    }, $arr);
    return join(" - ", $a);
  }
?>