<header id="header">
  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1><?php  echo $config['title'] ; ?></h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="/">Main</a></li>
          <li><a href="/pages/about_me.php">About me</a></li>
          <li><a href=  "<?php  echo $config['vk_url'] ; ?>" >My vkontakte</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="header__bottom">
    <div class="container">
      <nav>
        <ul>
          <?php
             $categories = mysqli_query($connection, "SELECT * FROM `articles_categorie`");
            while(  ($cat = mysqli_fetch_assoc($categories))   )
            {
              ?>
              <li><a href="/categorie.php?id= <?php echo $cat['id']; ?>"> <?php echo $cat['title'] ?></a></li>
              <?php
            }  
          ?>
        </ul>
      </nav>
    </div>
  </div>
</header>




