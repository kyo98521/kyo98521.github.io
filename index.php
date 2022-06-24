<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  // フォームの送信時にエラーをチェックする
  if ($post['name'] === '') {
      $error['name'] = 'blank';
  }
  if ($post['email'] === '') {
      $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = 'email';
    }
  if ($post['message'] === '') {
      $error['message'] = 'blank';
  }

  if (count($error) === 0) {
    // エラーがないので確認画面に移動
    $_SESSION['form'] = $post;
    header('Location: confirm.php');
    exit();
  }
  } else {
  if (isset($_SESSION['form'])) {
    $post = $_SESSION['form'];
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-217784166-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-217784166-1');
  </script>

<meta charset="UTF-8">
  <meta name="description" content="Kyoのポートフォリオサイトです。私がこれまでに手がけた制作物、身につけたスキルをまとめています。">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kyo’s Portfolio Website</title>
  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <a href="#">
      <img class="logo" src="images/logo.png" alt="ロゴ">
    </a>

    <div class="pc-menu">
      <nav>
        <ul class="main-nav">
          <li class="pcmenutoplist"><a href="#" id="pcmenutop">Top</a></li>
          <li class="pcmenuprofilelist"><a href="#profile" id="pcmenuprofile">Profile</a></li>
          <li class="pcmenuportfoliolist"><a href="#portfolio" id="pcmenuportfolio">Portfolio</a></li>
          <li class="pcmenuskilllist"><a href="#skill" id="pcmenuskill">Skill</a></li>
          <li class="pcmenucontactlist"><a href="#contact" id="pcmenucontact">Contact</a></li>
        </ul>
      </nav>
    </div>

    <div class="sp-menu">
       <span class="material-icons" id="open">menu</span>
      </div>
    
    <div class="overlay">
      <span class="material-icons" id="close">close</span>
      <nav>
        <ul>
          <li><a href="#" id="sptoplist">Top</a></li>
          <li><a href="#profile" id="spprofilelist">Profile</a></li>
          <li><a href="#portfolio" id="spportfoliolist">Portfolio</a></li>
          <li><a href="#skill" id="spskilllist">Skill</a></li>
          <li><a href="#contact" id="spcontactlist">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="top-wrapper animate">
      <div class="container">
        <div class="top-message">
          <h1>Kyo’s Portfolio Website</h1>
          <p>こちらは私Kyoのポートフォリオサイトです。<br>
             私の経歴やこれまでに手掛けた制作物、身につけたスキルをまとめています。<br>
             本サイトをご覧になることで少しでも私に興味を持っていただけましたら幸いです。<br>
             お問い合わせの際はContactよりお気軽にご連絡ください。
          </p>
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <h1 id="profile" class="item">Profile</h1>
        <div class="profile">
          <img src="images/profile.png" alt="プロフィール画像">
          <p>Kyoと申します。<br>
            大学を卒業後、約10年経理と財務の業務をしてきました。<br>
            最近プログラミングに興味を持ち、<br>
            現在独学で勉強を続けております。<br>
            <br>
            ・GitHub:<a href="https://github.com/kyo98521" target="_blank">https://github.com/kyo98521</a>
          </p>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <h1 id="portfolio" class="item">Portfolio</h1>
        <div class="portfolio">
          <p>制作物はまだありません。</p>
        </div>
      </div>
    </section>

    <section class="pc-skill">
      <div class="container">
        <h1 id="skill" class="item">Skill</h1>
          <div style="height:44vh; width:44vw" class="mychart">
            <canvas id="myChart1"></canvas>
            <canvas id="myChart2"></canvas>
          </div>
          <div class="skill">
            <h3>スキル基準</h3>
            <p>・0～20％：軽く使用したことがある</p>
            <p>・21～40％：Progate、ドットインストール、Udemy、書籍で基本的な知識を学んでいる</p>
            <p>・41～60％：学んだ基本的な知識を自身の制作物に活用しているが、スムーズに使用できるまでもう少し習熟が必要</p>
            <p>・61～80％：学んだ基本的な知識を自身の制作物に活用しつつ、スムーズに使用できている</p>
            <p>・81～100％：実務レベルで自由に駆使できる自信がある</p>
          </div>
      </div>
    </section>

    <section>
      <div class="container">
        <h1 id="contact" class="item">Contact</h1>
        <div class="contact">
          <p>もし本サイトや私について何かございましたら、以下フォームよりお気軽にご連絡ください。</p>
          <form action="" method="POST" novalidate>
            <label for="name"><span class="must">必須</span>お名前</label>
              <?php if ($error['name'] === 'blank'): ?>
                <p class="error-msg">※お名前をご記入下さい</p>
              <?php endif; ?>
            <input type="text" id="name" class="contact-text" value="<?php echo htmlspecialchars($post['name']); ?>" required>
            <label for="email"><span class="must">必須</span>メールアドレス</label>
              <?php if ($error['email'] === 'blank'): ?>
                <p class="error-msg">※メールアドレスをご記入下さい</p>
              <?php endif; ?>
              <?php if ($error['email'] === 'email'): ?>
                <p class="error-msg">※メールアドレスを正しくご記入下さい</p>
              <?php endif; ?>
            <input type="email" id="email" class="contact-email" value="<?php echo htmlspecialchars($post['email']); ?>" required>
            <label for="message"><span class="must">必須</span>メッセージ</label>
              <?php if ($error['message'] === 'blank'): ?>
                <p class="error-msg">※メッセージをご記入下さい</p>
              <?php endif; ?>
            <textarea id="message" required><?php echo htmlspecialchars($post['message']); ?></textarea>
            <input type="submit" class="button" value="送信">
          </form>
        </div>
      </div>
    </section>

    <div class="to-top"><a href="#">トップに戻る</a></div>
  </main>

  <footer>
    <small>&copy; 2021 Kyo</small>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script>
    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['HTML/CSS', 'JavaScript', 'PHP', 'Laravel'],
            datasets: [{
                label: 'Skill',
                data: [70, 50, 40, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            title: {
              display: true,
              text: '言語・フレームワーク',
            }
          },
            scales: {
                y: {
                    min: 0,
                    max: 100
                }
            }
        }
    });
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['MySQL', 'AWS', 'Docker', 'Linux', 'Git/Github'],
            datasets: [{
                label: 'Skill',
                data: [40, 40, 40, 40, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            title: {
              display: true,
              text: 'その他'
            }
          },
            scales: {
                y: {
                    min: 0,
                    max: 100
                }
            }
        }
    });
  </script>
  <script src="js/main.js"></script>
</body>
</html>
