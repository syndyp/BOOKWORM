<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

if (isset($_POST['submit_review'])) {

    $book_name = $_POST['book_name'];
    $review_text = mysqli_real_escape_string($conn, $_POST['review']);
    $rating = intval($_POST['rating']); // Ensure rating is an integer

    // Fetch book ID based on book name
    $book_result = mysqli_query($conn, "SELECT id FROM products WHERE name = '$book_name'") or die('query failed');
    $book = mysqli_fetch_assoc($book_result);
    $book_id = $book['id'];

    // Insert the review into the database
    mysqli_query($conn, "INSERT INTO reviews (user_id, book_id, review_text, rating) VALUES ('$user_id', '$book_id', '$review_text', '$rating')") or die('query failed');
    $review_message[] = 'Review submitted successfully!';
}

// Fetch books from the database
$select_products = mysqli_query($conn, "SELECT * FROM products LIMIT 6") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Additional CSS for review UI -->
    <style>
      /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}

/* Header and Footer */
header, footer {
    background-color: #fff;
    padding: 20px;
    border-bottom: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Main Container */
.products {
    padding: 20px;
}

.title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 20px;
    color: #222;
    font-weight: 700;
}

/* Product Box Container */
.box-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Product Box */
.product-box {
    border: 1px solid #ddd;
    border-radius: 12px;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    width: 300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.product-box:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.product-box img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.product-box .name {
    font-size: 1.8rem;
    font-weight: 600;
    color: #333;
    margin: 15px 10px;
    text-align: center;
}

.product-box .price {
    font-size: 1.4rem;
    color: #555;
    text-align: center;
    margin-bottom: 15px;
}

.product-box .qty {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    margin: 10px auto;
    box-sizing: border-box;
}

.product-box .btn {
    display: block;
    padding: 12px;
    background-color: #ff9900;
    color: #fff;
    border: none;
    border-radius: 6px;
    text-align: center;
    font-size: 1.1rem;
    cursor: pointer;
    text-decoration: none;
    margin: 15px auto;
    transition: background-color 0.3s ease;
}

.product-box .btn:hover {
    background-color: #cc7a00;
}

/* Review Form Styles */
.review-form {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.review-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    margin-bottom: 15px;
    box-sizing: border-box;
}

.review-form .rating {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.review-form .rating label {
    margin-right: 10px;
    font-weight: 700;
    font-size: 1.1rem;
    color: #333;
}

.review-form .stars {
    display: flex;
}

.review-form .stars i {
    color: #ff9900;
    font-size: 24px;
    cursor: pointer;
    margin-right: 5px;
    transition: color 0.3s ease;
}

.review-form .stars i.inactive {
    color: #ddd;
}

.review-form .stars input[type="radio"] {
    display: none;
}

.review-form .stars label {
    cursor: pointer;
}

.review-form .btn {
    display: block;
    padding: 12px;
    background-color: #ff9900;
    color: #fff;
    border: none;
    border-radius: 6px;
    text-align: center;
    font-size: 1.1rem;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

.review-form .btn:hover {
    background-color: #cc7a00;
}



    

    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="main-container">
    <section class="products">
        <h1 class="title">Books Available</h1>
        <div class="box-container">
            <?php  
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="product-box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                <a href="/bookworm/review/index.php?book_name=<?php echo urlencode($fetch_products['name']); ?>" class="btn">Review</a>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
        </div>
    </section>
</form>
</div>
</section>

</div>
<?php include 'footer.php'; ?>
<!-- Custom JS file link -->
<script src="js/script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const starElements = document.querySelectorAll('.review-form .stars i');
    const ratingInput = document.querySelector('input[name="rating"]');

    starElements.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            highlightStars(index + 1);
        });

        star.addEventListener('mouseout', () => {
            highlightStars(parseInt(ratingInput.value) || 0);
        });

        star.addEventListener('click', () => {
            ratingInput.value = index + 1;
        });
    });

    function highlightStars(count) {
        starElements.forEach((star, index) => {
            if (index < count) {
                star.classList.add('active');
                star.classList.remove('inactive');
            } else {
                star.classList.add('inactive');
                star.classList.remove('active');
            }
        });
    }
});
</script>
</body>
</html> 