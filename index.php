<?php

require_once(__DIR__ . '/config.php');

// 問題をセット
$quizSet = [];
$quizSet[] = [
  'q' => 'What is A?',
  'a' => ['A0', 'A1', 'A2', 'A3']
];
$quizSet[] = [
  'q' => 'What is B?',
  'a' => ['B0', 'B1', 'B2', 'B3']
];
$quizSet[] = [
  'q' => 'What is C?',
  'a' => ['C0', 'C1', 'C2', 'C3']
];

// 今が何問目か
$current_num = 0;

// 問題を$dataに代入し、答えの選択表示をシャッフル
$data = $quizSet[$current_num];
shuffle($data['a']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>クイズ</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="container">
    <h1>Q. <?php echo h($data['q']); ?></h1>
    <ul>
      <?php foreach ($data['a'] as $a) : ?>
        <li class="answer"><?php echo h($a); ?></li>
      <?php endforeach; ?>
    </ul>
    <div id="btn" class="disabled">Next Question</div>
  </div>
</body>
</html>