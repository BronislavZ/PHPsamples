<?php
require "/includes/config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Article</title>

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
                  $article_page = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id'] );
                  if( mysqli_num_rows($article_page) <= 0)
                    {
                    ?>
                       <section class="content__left col-md-8">
                          <div class="block">
                            <h3>Article not found</h3>
                            <div class="block__content">
                              <div class="full-text">
                                <p>The article you requested does not exist or has been deleted.</p>
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
                            <?php 
                            $art_page = mysqli_fetch_assoc($article_page);
                            mysqli_query($connection, "UPDATE `articles` SET `vievs` = `vievs` + 1 WHERE `articles`.`id` =" . (int) $art_page ['id']);
                            ?>
                            <a><?php echo $art_page['vievs'] . ' Views'; ?></a>
                            <h3><?php echo $art_page['title']; ?></h3>
                            <div class="block__content">
                              <img src="/static/images/<?php echo $art_page['image']; ?>" style="width: 100%">
                              <div class="full-text"><?php echo $art_page['text']; ?></div>
                            </div>
                          </div> 

                          <div class="block">
                            <a href="#comment-add-form">Add comment</a>
                            <h3>Comments</h3>
                            <div class="block__content">
                              <div class="articles articles__vertical">

                                    <?php
                                     $comments = mysqli_query($connection, "SELECT * FROM `coments` WHERE `articles_id` = " . (int) $art_page ['id'] );
                                     if(mysqli_num_rows($comments) <= 0)
                                      {echo "Comments to article not found"; }
                                     while ( $comm = mysqli_fetch_assoc($comments)) 
                                     {
                                    ?>
                                          <article class="article">
                                            <div class="article__image" style="background-image: url(/static/images/faces/<?php echo $comm['avatar']; ?>);"></div>
                                            <div class="article__info">
                                              <a href="#"><?php echo $comm['author']; ?></a>
                                              <div class="article__info__meta">
                                                        
                                                <small><a href="/article.php?id=<?php echo $name_article['id']; ?>"><?php echo $name_article['title'] ?></a></small>
                                              </div>
                                              <div class="article__info__preview"><?php echo $comm['text']  ?></div>
                                            </div>
                                          </article>
                                    <?php 
                                     }
                                    ?>

                              </div>
                            </div>
                          </div>

                          <div class="block" id="comment-add-form">
                            <h3>Add comment</h3>
                            <div class="block__content">
                              <form class="form" method="POST" action="article.php?id=<?php echo $art_page['id']?>">
                                <?php          
                                $num_art = $art_page['id'] ;   
                                 if(isset($_POST['do_post']))
                                {
                                  $errors =  array();
                                  if($_POST['name']=='')
                                    $errors[] = 'Enter your name!';
                                  if($_POST['email']=='')
                                    $errors[] = 'Enter your emeil!';
                                  if($_POST['text']=='')
                                    $errors[] = 'Enter text of comment!';
                                  if(empty($errors))
                                  {
                                    mysqli_query($connection, "INSERT INTO `coments` (`author`,`email`,`articles_id`,`text`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$num_art."','".$_POST['text']."')");

                                    echo '<span style="color: green; font-weight:bolt;">Comment successfully added!</span><hr>';
                                    unset($_POST['name']);
                                    unset($_POST['email']);
                                    unset($_POST['text']);
                                  }
                                  else
                                  {
                                    echo '<span style="color: red; font-weight:bolt;">'.$errors['0'].'</span><hr>';
                                  }
                                }
                                ?>
                                <div class="form__group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <input type="text" class="form__control" required="" value="<?php echo $_POST['name'];?>" name="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                      <input type="text" class="form__control" required="" value="<?php echo $_POST['email'];?>" name="email"   placeholder="email (will not show on site)">
                                    </div>
                                  </div>
                                </div>
                                <div class="form__group">
                                  <textarea name="text" required="" class="form__control"  placeholder="Your comment ..."><?php echo $_POST['text'];?></textarea>
                                </div>
                                <div class="form__group">
                                  <input type="submit" class="form__control" name="do_post" value="Add comment">
                                </div>
                              </form>
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