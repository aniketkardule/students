<html><head>
    <link rel="stylesheet" href="styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@300&amp;display=swap" rel="stylesheet">
  <style>
    .c{
      width:75%;
      margin:30px auto;
      position:relative;
      background-color:#f2f2f2;
    }
    .note{
      width:80%;
      background-color:#fff;
      margin:0 auto;
    }
    .box{
      padding:10px;
      border-radius:7px;
    }
    h3{
      width:80%;
      margin:0 auto;
    }
    .dashboard{
      position:absolute;
      top:20px;
      right:10%;
    }
    @media (max-width:600px){
      .c, .note, h3{
        width:auto;
      }
      .dashboard{
        right:40px;
      }
    }
  </style>
  
  </head>
  <body>
      <?php include "header.php";    ?>
    <div class="c box">
      <h3 class="box">Note by Developer</h3>
      <a class="dashboard" href="students.php">Go to Dashboard</a>
      <p class="note box">
        Welcome to student diary student management system, I'm Aniket Kardule and I have developed this app using technologies HTML/CSS, javascript, php, rest API. This app can perform CRUD operations on student information , where we can perform creating new student with a add student button given on dashboard on top right corner also we can filter students with their respective data by using their name, roll no or using filter dashboard given on right side of controls. When we click on search or find, webpage reloads and php performs fetching the api and displaying the result on screen also javascript helps to validate forms.
<br><br><br>
<strong>If you found webpage results empty then someone may have deleted all the records, please try adding sample students if you want to check how this app works, as this app is public so I can't put login system to this </strong><br><br><br>

<strong>Api is developed by me also using Node.js, mongoDb, express.js</strong>

And thanks for visiting my app

You can contact me on my <a href="mailto:karduleaniket99@gmail.com">mail</a>.
      
      </p>
    
    </div>
  <?php   echo phpinfo() ;    ?>

</body></html>
