<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog utazóknak</title>
    <link rel="icon" type="image/x-icon" href="img/blog.jpg">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div id="wrap">
            <img id="header" src="img/fejlec.jpg" alt="A kép nem jeleníthető meg">
            <div id="mainTitle">
                <h1>Blog utazóknak</h1>
            </div>
        </div>
    </header>



    <div class="picFrame">
        <div class="texts">Szeretsz utazni?</div>
        <img src="img/egy.jpeg" alt="Első kép">
        <img src="img/ketto.jpg" alt="Második kép">
        <img src="img/harom.jpg" alt="Harmadik kép">
    </div>


    <div id="text2">Gyere és oszd meg velünk a kalandjaidat és fedezzük fel a világot együtt!</div>


    
    <div class="container">
        <div class="picFrame">
            <div class="texts">Meséld el te is!</div>
            <form id="postForm">
                <input type="text" id="username" placeholder="Felhasználónév" maxlength="30" required>
                <input type="text" id="title" placeholder="Bejegyzés cím" maxlength="200" required><br><br>
                <textarea id="content" placeholder="Bejegyzés tartalma" required></textarea>
                <button type="submit">Bejegyzés küldése</button>
            </form>
        </div>
        <div id="post">Bejegyzések</div>
        <div id="posts"></div>
    </div>
    


    <script src="app.js"></script>
</body>
</html>