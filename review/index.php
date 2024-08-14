<?php
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<style>
        /* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    font-size: 26px;
    color: #2c3e50;
    margin-bottom: 25px;
    text-align: center;
}

/* Reviews Section */
#comments {
    width: 70%;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

#posts-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

#posts-list li {
    background-color: #f9f9f9;
    border: 2px solid #e1e8ed;
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#posts-list li:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.no-comments {
    text-align: center;
    color: #bdc3c7;
    font-style: italic;
    font-size: 18px;
}

.post-info {
    font-size: 14px;
    color: #95a5a6;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.post-info a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
}

.post-info a:hover {
    text-decoration: underline;
}

.entry-content {
    font-size: 16px;
    color: #2c3e50;
    line-height: 1.8;
    margin-top: 10px;
}

/* Review Form */
#respond {
    margin-top: 40px;
    padding: 20px;
    background-color: #fafafa;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
}

#respond h3 {
    font-size: 22px;
    color: #2c3e50;
    margin-bottom: 20px;
    text-align: center;
}

#respond label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #34495e;
}

#respond input[type="text"],
#respond input[type="email"],
#respond input[type="book"], /* Added this line for Book Title input */
#respond textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border 0.3s ease;
}

#respond input[type="text"]:focus,
#respond input[type="email"]:focus,
#respond input[type="book"]:focus, /* Added this line for Book Title input */
#respond textarea:focus {
    border-color: #3498db;
}

#respond input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    display: block;
    width: 100%;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

#respond input[type="submit"]:hover {
    background-color: #2980b9;
}

/* Responsive Design */
@media (max-width: 768px) {
    #comments {
        width: 90%;
        padding: 20px;
    }

    h2 {
        font-size: 24px;
    }

    .post-info {
        font-size: 13px;
    }

    .entry-content {
        font-size: 15px;
    }

    #respond h3 {
        font-size: 20px;
    }
}

.back-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #007bff; /* Blue background */
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

.back-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05);
}

@media (max-width: 600px) {
    .back-button {
        font-size: 14px;
        padding: 8px 16px;
    }
}


</style>

	
	
	
</head>

<body id="index" class="home">	
	<section id="comments" class="body">
	  
	  <header>
      <a href="/bookworm/review.php" class="back-button">BACK</a>
			<h2>Reviews</h2>
		</header>

    <ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
      <li class="no-comments"></li>
      <?php
        foreach ($comments as &$comment) {
          ?>
          <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">	
    				<footer class="post-info">
    					<abbr class="published" title="<?php echo($comment['date']); ?>">
    						<?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
    					</abbr>

    					<address class="vcard author">
    						By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
    					</address>

                        <div class="book-title">
      <strong>Book Title:</strong> <?php echo($comment['book']); ?>
    </div>
    				</footer>

    				<div class="entry-content">
    					<p><?php echo($comment['comment']); ?></p>
    				</div>
    			</article></li>
          <?php
        }
      ?>
		</ol>
		
		<div id="respond">

      <h3>Give a review</h3>

      <form action="post_comment.php" method="post" id="commentform">

        <label for="comment_author" class="required">Your name</label>
        <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
        
        <label for="email" class="required">Your email</label>
        <input type="email" name="email" id="email" value="" tabindex="2" required="required">

        <label for="email" class="required">Book Title</label>
        <input type="book" name="book" id="book" value="" tabindex="2" required="required">

        <label for="comment" class="required">Your Review</label>
        <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

        <input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
        <input name="submit" type="submit" value="Submit review" />
        
      </form>
      
    </div>
			
	</section>

</body>
</html>