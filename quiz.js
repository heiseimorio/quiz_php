$(function () {
  'use strict';

  $('.answer').on('click', function () {
    var $selected = $(this);
    $selected.addClass('selected');
    var answer = $selected.text();

    // answer.phpにデータを渡す
    $.post('/_answer.php', {

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
    });
  });
});