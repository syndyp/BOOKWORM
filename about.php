<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>.heading{
   min-height: 30vh;
   display: flex;
   flex-flow: column;
   align-items: center;
   justify-content: center;
   gap:1rem;
   background-image: url('images/home-bg1.jpg');
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center;
   text-align: center;
}</style>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3 style="color:purple">about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/one.png" alt="Description of the image" width="auto" height="390">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Bookworm is a platform that offers honest reviews, comprehensive information, seamless purchasing, a user-friendly experience, and a vibrant community of book lovers. It provides honest insights, detailed summaries, author backgrounds, and a user-friendly interface. Bookworm's platform allows users to share their thoughts, discuss favorite reads, and connect with others who share their passion for literature.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/client1.png" alt="">
         <p>I stumbled upon Bookworm while looking for my next read, and I’ve been hooked ever since! The reviews are detailed and honest, and the buying process is so smooth. Highly recommend!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Shreeya Maskey</h3>
      </div>

      <div class="box">
         <img src="images/client2.jpg" alt="">
         <p>Bookworm is a gem for book lovers. The reviews are thoughtful, and the site’s layout makes browsing enjoyable. I’ve discovered so many amazing books here.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Aayush Khadka</h3>
      </div>

      <div class="box">
         <img src="images/client3.png" alt="">
         <p>Every time I need a new book, I head to Bookworm. The site is user-friendly, and the reviews are reliable. I appreciate how easy it is to find exactly what I’m looking for.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Dhiraj Shahi</h3>
      </div>

      <div class="box">
         <img src="images/client4.jpg" alt="">
         <p>बुकवर्म पुस्तक प्रेमीहरूको लागि एक अनुपम रत्न हो। यहाँका समीक्षाहरू गहिरो सोचविचारबाट भरिपूर्ण छन्, र साइटको आकर्षक लेआउटले ब्राउजिङलाई अत्यन्त रमाइलो बनाउँछ। मैले यहाँ अद्भुत पुस्तकहरू पत्ता लगाएको छु।</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rajesh Hamal</h3>
      </div>

      <div class="box">
         <img src="images/client5.jpg" alt="">
         <p>A great website for any reader. The reviews are detailed, and the buying process is seamless.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Khushi Tamang</h3>
      </div>

      <div class="box">
         <img src="images/client6.jpg" alt="">
         <p>Bookworm has changed the way I discover books. It's easy to use, and the reviews are always helpful.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Monika Adhikari</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/au.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Laxmi Prasad Devkota</h3>
      </div>

      <div class="box">
         <img src="images/au1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Rajesh Hamal</h3>
      </div>

      <div class="box">
         <img src="images/au2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Biraj Bhatta</h3>
      </div>

      <div class="box">
         <img src="images/au3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>JK Rowling</h3>
      </div>

      <div class="box">
         <img src="images/au4.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Sarah RDJ</h3>
      </div>

      <div class="box">
         <img src="images/au5.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Nikhil Upreti</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>