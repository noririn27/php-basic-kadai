<?php
  session_start();

  $name = $_POST['employee_name'];
  $age = $_POST['employee_age'];
  $department = $_POST['department'];

  // バリデーション
  $errors = [];
  if (empty($name)) {
    $errors[] = '名前を入力してください。';
  }
  if (empty($age)) {
    $errors[] = '年齢を入力してください。';
  } elseif (!is_numeric($age)) {
    $errors[] = '年齢は数字で入力してください。';
  }

  if (empty($errors)) {
    $_SESSION['name'] = $name;

    setcookie('name', $name, time() + 3600);
    setcookie('age', $age, time() + 3600);
    /*
    上記により、
    $_COOKIE = [
      'name' => $name,
      'age' => $age,
    ];
    が生成される。
    */
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員情報入力フォーム</title>
</head>
<body>
  <h2>入力内容をご確認ください。</h2>
  <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>
  <table border="1">
    <tr>
      <th>項目</th>
      <th>入力内容</th>
    </tr>
    <tr>
      <td>社員名</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <td>年齢</td>
      <td><?php echo $age ?></td>
    </tr>
    <tr>
      <td>所属部署</td>
      <td><?php echo $department ?></td>
    </tr>
  </table>
  <p>
  <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
  <button id="cancel-btn" onclick="history.back();">キャンセル</button>
  </p>

  <?php
  if (!empty($errors)) {
    echo "<script>document.getElementById('confirm-btn').disabled='true';</script>";
  }

    foreach ($errors as $error) {
      echo "<font color='red'>{$error}</font><br>";
    }
  ?>
</body>
</html>