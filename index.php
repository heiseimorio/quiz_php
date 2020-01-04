<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

// Quizクラスからインスタンスを生成
$quiz = new MyApp\Quiz();

if (!$quiz->isFinished()) {
  $data = $quiz->getCurrentQuiz();
  shuffle($data['a']);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>クイズ</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php if ($quiz->isFinished()) : ?>
    <div id="container">
      <div id="result">
        Your Score ...
        <div><?php echo h($quiz->getScore()); ?> %</div>
      </div>
      <a href=""><div id="btn">Replay?</div></a>
    </div>
    <?php $quiz->reset(); ?>
  <?php else : ?>
    <div id="container">
      <h1>Q. <?php echo h($data['q']); ?></h1>
      <ul>
        <?php foreach ($data['a'] as $a) : ?>
          <li class="answer"><?php echo h($a); ?></li>
        <?php endforeach; ?>
      </ul>
      <div id="btn" class="disabled"><?php echo $quiz->isLast() ? 'Show Result' : 'Next Question' ?></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="quiz.js"></script>
  <?php endif ?>
</body>
</html>