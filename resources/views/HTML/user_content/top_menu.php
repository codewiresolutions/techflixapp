
<?php 

$path=$_SERVER['REQUEST_URI'];
$path=explode('/', $path);
$page=end($path)

?>

<header>
  <section class="header">
    <nav class="navbar navbar-expand-lg ">
      <div class="brand-logo">
        <a class="navbar-brand" href="#">logo</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
      <i class="fa-solid fa-bars"></i>
      </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" id="nav_topbar">
          <li class="nav-item <?php if($page=='index.php'){echo 'active';} ?> ">
            <a class="nav-link " href="index.php">Home </a>
          </li>
          <li class="nav-item <?php if($page=='buy_services.php'){echo 'active';} ?>" >
            <a class="nav-link" href="buy_services.php">buy services</a>
          </li>
          <li class="nav-item <?php if($page=='blogs.php'){echo 'active';} ?>">
            <a class="nav-link " href="blogs.php">blogs</a>
          </li>
          <li class="nav-item <?php if($page=='contact_us.php'){echo 'active';} ?>"">
            <a class="nav-link" href="contact_us.php">contact us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            others
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item  <?php if($page=='About_us.php'){echo 'active';} ?>" href="About_us.php">about us</a>
              <a class="dropdown-item <?php if($page=='Careers.php'){echo 'active';} ?>" href="Careers.php">careers</a>
              <a class="dropdown-item <?php if($page=='Portfolio.php'){echo 'active';} ?>" href="Portfolio.php">copmpany portfolio</a>
              <a class="dropdown-item <?php if($page=='Quiz_contest.php'){echo 'active';} ?>" href="Quiz_contest.php">mothly quiz contest</a>
              <a class="dropdown-item <?php if($page=='term_condition.php'){echo 'active';} ?>" href="#">terms and conditions</a>
            </div>
          </li>
          <li class="nav-item <?php if($page=='Dashbord.php'){echo 'active';} ?>">
            <a class="nav-link" href="Dashbord.php">login</a>
          </li>
          <li class="nav-item signup">
            <a class="nav-link" 
            type="button"
                class="btn btn-primary"
                data-toggle="modal" data-target="#signupmoadl">sign up</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
</header>