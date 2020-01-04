<?php

// エラー表示の設定
ini_set('display_errors', 1);

// sessionを使う
session_start();

// エスケープのための関数を定義しているファイルを読み込み
require_once(__DIR__ . '/functions.php');

// クラス名を呼んでくれる処理が書かれているファイルを読み込み
require_once(__DIR__ . '/autoload.php');
?>