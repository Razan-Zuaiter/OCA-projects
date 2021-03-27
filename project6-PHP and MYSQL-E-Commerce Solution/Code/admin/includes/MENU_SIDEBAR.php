<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
    <a href="#">
      <img src="images/icon/logo-black.png" alt="Cool Admin" />
    </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">
        <li class="<?php if($page=='Manage Admin'){echo 'active';}else{echo'noactive';}?>"><a href="index.php"> <i class="fas fa-users"></i>Manage Users</a></li>
        <li class="<?php if($page=='Manage Category'){echo 'active';}else{echo'noactive';}?>"><a href="category.php"><i class="fas fa-list"></i>Manage Categories</a></li>
        <li class="<?php if($page=='Manage marketplacess'){echo 'active';}else{echo'noactive';}?>"><a
            href="marketplaces.php"> <i class="fas fa-chart-bar active"></i>Manage market Places</a></li>
        <li class="<?php if($page=='Manage products'){echo 'active';}else{echo'noactive';}?>"><a href="product.php"><i class="fab fa-product-hunt"></i>Manage Products</a></li>
      </ul>
    </nav>
  </div>
</aside>