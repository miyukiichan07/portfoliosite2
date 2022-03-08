<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");


$guest_name = $_POST['fullName'];
$guest_email = $_POST['email'];
$title = $_POST['title'];
$message = $_POST['message'];

$is_validated = true;
if(! filter_var( $guest_email, FILTER_VALIDATE_EMAIL)){
    //メールアドレスが不正
    $is_validated = false;
}

if( empty($title)|| empty($message)) {
    /// 件名または本文がない or null
    /// エラー処理
    $is_validated = false;
}
   
/// サイト管理者に問い合わせメール送信
$result = mb_send_mail( 
'nhs10174@gmail.com', $title, $message,
'From: '.mb_encode_mimeheader($guest_name).'<'.$guest_email.'>' 
);

?>

<?php if ( $is_validated && $result ): ?>
    <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <title>MIYUKI PORTFOLIO</title>
</head>
<body>
    <div id="cursor"></div>
    <div class="circlesWrapper">
        <div class="circle circleHorizontal circle1"></div>
        <div class="circle circleHorizontal circle2"></div>
        <div class="circle circleHorizontal circle3"></div>
        <div class="circle circleHorizontal circle4"></div>
        <div class="circle circleHorizontal circle5"></div>
        <div class="circle circleHorizontal circle6"></div>
        <div class="circle circleVertical circle7"></div>
        <div class="circle circleVertical circle8"></div>
        <div class="circle circleVertical circle9"></div>
        <div class="circle circleVertical circle10"></div>
        <div class="circle circleVertical circle11"></div>
        <div class="circle circleVertical circle12"></div>
    </div>
    <div class="wrapper">
        <header>
            <h1 class="title"><a href="index.html"><img src="/images/portfolio_logo.png" alt="" width="150px"></a></h1>
            <nav>
                <ul class="navigation">
                <li ><a class="navigation_btn" href="index.html#about">about</a></li>
                <li><a class="navigation_btn" href="index.html">works</a></li>
                <li><a class="navigation_btn" href="index.html#contact">contact</a> </li>
                </ul>
            </nav>
        </header>
    <main>
        <article class="description">
            <h1>confirm</h1>
            <p>問い合わせを受け付けました。</p>
            <?php else: ?>
            <p>内容に不備があります。もう一度お確かめください。</p>
            <a href="#" onclick="history.back();">送信フォームに戻る</a>
            <?php endif ?>
        </article>
    </main>
    </div>
    <script src="js/cursor.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


