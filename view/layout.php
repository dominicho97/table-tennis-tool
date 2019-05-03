<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PING-PONG! - <?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <h6>Logo Placeholder</h6>
      <h6><?php echo $_SESSION['name']["userName"] ?></h6>
      <nav>
        <ul>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>
    </header>
    <?php echo $content;?>
  </body>
</html>
