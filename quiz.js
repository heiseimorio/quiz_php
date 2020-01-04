$(function () {
  'use strict';

  $('.answer').on('click', function () {
    var $selected = $(this);

    // 正解、不正解が表示された後に、他の選択肢がクリック出来ないように処理を中断させる
    if ($selected.hasClass('correct') || $selected.hasClass('wrong')) {
      return;
    }
    $selected.addClass('selected');
    var answer = $selected.text();

    // answer.phpにデータを渡す
    $.post('/_answer.php', {
      answer: answer,
      token: $('#token').val()
      // データを渡し終えた後の処理
    }).done(function (res) {
      $('.answer').each(function () {
        if ($(this).text() === res.correct_answer) {
          $(this).addClass('correct');
        } else {
          $(this).addClass('wrong');
        }
      });
      // alert(res.correct_answer);
      if (answer === res.correct_answer) {
        // 正解の処理
        $selected.text(answer + ' ... 正解です！');
      } else {
        // 不正解の処理
        $selected.text(answer + ' ... 不正解です');
      }

      // 答え合わせの後に次の問題へいくボタンを押せるようにする
      $('#btn').removeClass('disabled');
    });
  });

  // Next Questionを押すとページを再読み込みする
  $('#btn').on('click', function () {
    if (!$(this).hasClass('disabled')) {
      location.reload();
    }
  });
});