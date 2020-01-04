<?php

namespace MyApp;

class Quiz {
  private $_quizSet = [];
  
  public function __construct() {
    $this->_setup();
    Token::create();

    if (!isset($_SESSION['current_num'])) {
      $this->_initSession();
    }
  }

  private function _initSession() {
    $_SESSION['current_num'] = 0;
    $_SESSION['correct_count'] = 0;
  }

  public function checkAnswer() {
    Token::validate('token');
    $correctAnswer = $this->_quizSet[$_SESSION['current_num']]['a'][0];
    if (!isset($_POST['answer'])) {
      throw new \Exception('answer not set!');
    }
    if ($correctAnswer === $_POST['answer']) {
      $_SESSION['correct_count']++;
    }
    $_SESSION['current_num']++;
    return $correctAnswer;
  }

  public function isFinished() {
    return count($this->_quizSet) === $_SESSION['current_num'];
  }

  public function getScore() {
    return round($_SESSION['correct_count'] / count($this->_quizSet) * 100);
  }

  public function isLast() {
    return count($this->_quizSet) === $_SESSION['current_num'] + 1;
  }

  public function reset() {
    $this->_initSession();
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['current_num']];
  }

  private function _setup() {
    // 問題をセット
    $this->_quizSet[] = [
      'q' => 'りんごは何色?',
      'a' => ['赤', '緑', '茶', '黒']
    ];
    $this->_quizSet[] = [
      'q' => 'バナナは何色?',
      'a' => ['黄', '赤', '青', 'ピンク']
    ];
    $this->_quizSet[] = [
      'q' => 'ぶどうは何色?',
      'a' => ['紫', '黒', '赤', 'ピンク']
    ];
  }
}

?>