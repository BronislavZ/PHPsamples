<?php
require "/includes/config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Category</title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>
  <div id="wrapper">

       <?php include"/includes/header.php";?>

            <div id="content">
              <div class="container">
                <div class="row">
                  



                  <?php
                  $categorie_page = mysqli_query($connection, "SELECT * FROM `articles_categorie` WHERE `id` = " . (int) $_GET['id'] );
                  $cat_page = mysqli_fetch_assoc($categorie_page);
                  if( mysqli_num_rows($categorie_page) <= 0)
                    {
                    ?>
                       <section class="content__left col-md-8">
                          <div class="block">
                            <h3>Category not found</h3>
                            <div class="block__content">
                              <div class="full-text">
                                <p>The category you requested does not exist or has been deleted.</p>
                              </div>
                            </div>
                          </div> 
                        </section>
                    <?php
                    }
                  else
                    {
                    ?>
                       <section class="content__left col-md-8">
                          <div class="block">
                            
                        <div class="full-text"><h3><?php echo $cat_page['title']; ?></h3></div>
                         <div class="full-text"><p><?php  echo $cat_page['description']; ?></p></div>
                                           
                            <h3>All articles in category <?php echo $cat_page['title']; ?>:</h3>
                            <div class="block__content">
                              <div class="articles articles__horizontal">

                    <?php
                           $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id`=" . $cat_page['id'] );
                  if( mysqli_num_rows($articles) <= 0)
                    {
                    ?>
                      
                              <div class="full-text">
                                <p>    There is currently no articles in this category</p>
                              </div>
                        
                    <?php
                    }
             while ( $art = mysqli_fetch_assoc($articles)) {
              ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
                    <div class="article__info">
                      <a href="/article.php?id= <?php echo $art['id']; ?>"><?php echo $art['title'] ?></a>
                      <div class="article__info__meta">
                                <?php
                                  $art_cat = false;
                                  foreach ($categories as $cat )
                                  {
                                        if ($cat['id'] == $art['categorie_id'])
                                        {
                                          $art_cat = $cat;
                                          break;
                                        }
                                  }
                                ?>
                        <small>Category: <a href="/categorie.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'] ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 80,'utf8'). '...'; ?></div>
                    </div>
                  </article>
              <?php 
             }
             ?>

                </div>
              </div>
                            <div class="block__content">
                              <div class="full-text">
                               
                                <article class="article">
                                </article>
                              </div>
                            </div>
                          </div> 
                        </section>
                    <?php
                    }
                    ?>







                  <?php  include"/includes/sidebar.php";?> 

                </div>
              </div>
            </div>
    <?php  include"/includes/footer.php";?>
  </div>
</body>
</html>