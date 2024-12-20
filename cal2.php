<?php
$cookie_name1 = "num";
$cookie_name2 = "op";

$num = "";

if (isset($_POST['num'])) {
  if ($_POST['num'] === 'c') {
    $num = "";
    setcookie($cookie_name1, "", time() - 3600, "/");
    setcookie($cookie_name2, "", time() - 3600, "/");
  } else {
    $num = $_POST['input'] . $_POST['num'];
  }
}

if (isset($_POST['op'])) {
  setcookie($cookie_name1, $_POST['input'], time() + (86400 * 30), "/");
  setcookie($cookie_name2, $_POST['op'], time() + (86400 * 30), "/");
  $num = "";
}

if (isset($_POST['equal']) && isset($_COOKIE['num']) && isset($_COOKIE['op'])) {
  $num = $_POST['input'];
  switch ($_COOKIE['op']) {
    case "+":
      $result = $_COOKIE['num'] + $num;
      break;
    case "-":
      $result = $_COOKIE['num'] - $num;
      break;
    case "*":
      $result = $_COOKIE['num'] * $num;
      break;
    case "/":
      if ($num == 0) {
        $result = "Error: Division by zero";
      } else {
        $result = $_COOKIE['num'] / $num;
      }
      break;
  }
  $num = $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculator</title>
  <link rel="stylesheet" href="./cal.css" type="text/css" />
</head>

<body>
  <div class="calc">
    <form action="" method="post">
      <br />

      <input type="text" class="maininput" name="input" value="<?php echo isset($num) ? $num : '0'; ?>">
      <br /><br />
      <input type="submit" class="numbtn" name="num" value="7" />
      <input type="submit" class="numbtn" name="num" value="8" />
      <input type="submit" class="numbtn" name="num" value="9" />
      <input type="submit" class="calbtn" name="op" value="+" />
      <br /> <br>
      <input type="submit" class="numbtn" name="num" value="4" />
      <input type="submit" class="numbtn" name="num" value="5" />
      <input type="submit" class="numbtn" name="num" value="6" />
      <input type="submit" class="calbtn" name="op" value="-" /> <br /> <br>
      <input type="submit" class="numbtn" name="num" value="1" />
      <input type="submit" class="numbtn" name="num" value="2" />
      <input type="submit" class="numbtn" name="num" value="3" />
      <input type="submit" class="calbtn" name="op" value="*" /> <br /> <br>
      <input type="submit" class="c" name="num" value="c" />
      <input type="submit" class="numbtn" name="num" value="0" />
      <input type="submit" class="equal" name="equal" value="=" />
      <input type="submit" class="calbtn" name="op" value="/" />
    </form>
  </div>
</body>

</html>