
<?php

$path = $_SERVER['REQUEST_URI'];
$path = explode('/', $path);
$page = end($path)

?>

<header>
    <section class="header">
        <nav class="navbar navbar-expand-lg ">
            <div class="brand-logo">
                <a class="navbar-brand" href="#">logo</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
      <i class="fa-solid fa-bars"></i>
      </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" id="nav_topbar">
                    <li class="nav-item <?php if($page=='index.php'){echo 'active';} ?> ">
                        <a class="nav-link " href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item <?php if($page=='buy_services.php'){echo 'active';} ?>">
                        <a class="nav-link" href="{{ route('buy.services') }}">buy services</a>
                    </li>
                    <li class="nav-item <?php if($page=='blogs.php'){echo 'active';} ?>">
                        <a class="nav-link " href="{{ route('blogs') }}">blogs</a>
                    </li>
                    @if (auth()->user())
                    <li class="nav-item <?php if($page=='blogs.php'){echo 'active';} ?>">
                        <a class="nav-link " href="{{ route('jobs') }}">Career</a>
                    </li>
                    @endif
                    @if (auth()->user())
                    <li class="nav-item <?php if($page=='blogs.php'){echo 'active';} ?>">
                        <a class="nav-link " href="{{ route('quiz') }}">Quiz</a>
                    </li>
                    @endif
                    <li class="nav-item
                     <?php if($page=='contact_us.php'){echo 'active';} ?>">
                        <a class="nav-link" href="{{ route('contact-us') }}">contact us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            others
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item  <?php if($page=='About_us.php'){echo 'active';} ?>"
                               href="{{ route('about-us') }}">about us</a>
                            <a class="dropdown-item <?php if($page=='Careers.php'){echo 'active';} ?>"
                               href="{{ route('careers') }}">careers</a>
                            <a class="dropdown-item <?php if($page=='Portfolio.php'){echo 'active';} ?>"
                               href="{{ route('portfolio') }}">copmpany portfolio</a>
                            <a class="dropdown-item <?php if($page=='Quiz_contest.php'){echo 'active';} ?>"
                               href="{{ route('quiz.contest') }}">mothly quiz contest</a>
                            <a class="dropdown-item <?php if($page=='term_condition.php'){echo 'active';} ?>"
                               href="{{ route('terms.and.conditions') }}">terms and conditions</a>
                        </div>
                    </li>

                    @if (!auth()->user())
                        <li class="nav-item <?php if($page=='Dashbord.php'){echo 'active';} ?>">
                            <a class="nav-link" href="{{ route('login') }}">login</a>
                        </li>
                        <li class="nav-item signup">
                            <a class="nav-link" href="{{ route('register') }}">sign up</a>
                    @else
                        <li class="nav-item signup">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                            @endif

                        </li>
                </ul>
            </div>
        </nav>
    </section>
</header>
