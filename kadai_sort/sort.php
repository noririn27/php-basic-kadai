<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <p>
    <?php
      $nums = [15, 4, 18, 23, 10];

      function sortup_nums($nums) {
        echo '昇り順にソートします。<br>';
        sort($nums);
        foreach($nums as $num) {
          echo $num . '<br>';
        }
      }

      function sortdown_nums($nums) {
        echo '降り順にソートします。<br>';
        rsort($nums);
        foreach($nums as $num) {
          echo $num . '<br>';
        }
      }

      sortup_nums($nums);
      sortdown_nums($nums);
    ?>
  </p>
  
</body>
</html>