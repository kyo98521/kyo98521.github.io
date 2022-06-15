<?php
  session_start();

  // 入力画面からのアクセスでなければ、戻す
  if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
    } else {
      $post = $_SESSION['form'];
    }

  // メールを送信する
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //mb_language('Japanese');
  //mb_internal_encoding('UTF-8');

  $to = '';
  $subject = 'お問い合わせが届きました';
  $body = <<<EOT
  名前: {$post['name']}
  メールアドレス： {$post['email']}
  内容：
  {$post['message']}
  EOT;
  $from = $post['email'];
  mail('', 'お問い合わせが届きました【kyo-portfolio.com】', $body);

  // セッションを消してお礼画面へ
  unset($_SESSION['form']);
  header('Location: thanks.html');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact確認画面</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <form action="" method="POST">
      <p class="confirm-msg">以下の内容で送信してもよろしいですか？
      </p>
      <div class="confirm-group">
        <label class="confirm-item" for="inputName">【お名前】</label>
        <p><?php echo htmlspecialchars($post['name']); ?>
        </p>
      </div>
      <div class="confirm-group">
        <label class="confirm-item" for="inputName">【お名前】</label>
        <p><?php echo htmlspecialchars($post['name']); ?>
        </p>
      </div>
      <div class="confirm-group">
      <label class="confirm-item" for="inputEmail">【メールアドレス】</label>
      <p><?php echo htmlspecialchars($post['email']); ?>
      </p>
      </div>
      <div class="confirm-group">
        <label class="confirm-item" for="inputContent">【メッセージ】</label>
        <p><?php echo nl2br(htmlspecialchars($post['message'])); ?>
        </p>
      </div>
      <div class="confirm-button">
        <a href="index.php"><button class="confirm-button-back" type="button">戻る</button></a>
        <button class="confirm-button-submit" type="submit">送信</button>
      </div>
    </form>
  </div>
</body>
</html>