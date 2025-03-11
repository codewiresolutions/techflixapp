<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Tip page</title>
    <meta property="og:title" content="New order" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.apanel.link/custom-data/fs2/fonts3.css"
    />
    <meta charset="utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta property="og:description" content="" />
    <link href="{{asset('assets/assets/v2.91/style.css')}}" rel="stylesheet" />
    <link
      href="https://cdn.apanel.link/main/fa5151/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="dns-prefetch" href="//cdn.apanel.link" />
    <link
      href="https://cdn.apanel.link/main/css/global.main.v22.17.04.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
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
               <ul class="navbar-nav ml-auto">
                 <li class="nav-item ">
                   <a class="nav-link" href="../withlogin/dashbord.html">Home </a>
                 </li>
                 <li class="nav-item ">
                  <a class="nav-link" href="../withlogin/buy-services.html">buy services</a>
                </li>
                 <li class="nav-item">
                   <a class="nav-link" href="../withlogin/blogs.html">blogs</a>
                 </li>
                 <li class="nav-item ">
                  <a class="nav-link" href="../withlogin/contactform.html">contact us</a>
                </li>
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     others
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="../withlogin/aboutus.html">about us</a>
                     <a class="dropdown-item" href="../withlogin/careers.html">careers</a>
                    
                     <a class="dropdown-item" href="#">copmpany portfolio</a>
                     <a class="dropdown-item" href="../withlogin/quitcontest.html">mothly quiz contest</a>
                     <a class="dropdown-item" href="#">terms and conditions</a>
                   </div>
                 </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#">login</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">sign up</a>
                </li>
               </ul>
               
             </div>
           </nav>
   </section>
    </header>
    <section class="section_tip_page">
      <div class="container">
        <div class="row">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{asset('assets/images/Tip-background-.svg')}}" class="d-block w-100" alt="...">
              </div>
            <div class="postioning_box_text">
              <div class="mobile_text_box">
                <div class="">
                   <div class="text_graph">
                     happy with services and like to give ant tips?
                   </div>
                <div class="box_btn_tip">
                     <div class="box_colr">
                       <button class=" btn text_box_btn">10$</button>
                     </div>
                     <div class="box_colr">
                         <button class=" btn text_box_btn">20$</button>
                       </div>
                       <div class="box_colr">
                         <button class=" btn text_box_btn">30$</button>
                       </div>
                       <div class="box_colr">
                         <button class=" btn text_box_btn">40$</button>
                       </div>
                       <div class="box_colr">
                         <button class=" btn text_box_btn font_size">custom amount</button>
                       </div>
                   </div>
                   {{-- <button class="btn btn-main btn_tip">confirm and pay</button> --}}
                   <a href="{{route('congratulation.page',encryptstring($subCategory->id))}}" class="btn btn-main">confirm and pay</a>

             </div>
      
             </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      </section>


    
    <section>
     <section class="footer">
       <footer>
           <div class="footer-logo">
                <figure>
                  <img src="{{asset('assets/images/5tqjd4j5ktzp5ajy.png')}}" alt=""  class="w-25"/>
                </figure>
              </div>
         <div class="container-fluid">
           <div class="row">
           
             <div class="col-sm-2">
             
               <nav class="footer-nav">
                <li class="nav-item">
                     <a href="#" class="nav-link footer-heading">
                          contact:
                     </a>
                   </li>
                 <li class="nav-item">
                   <a href="tel:0320-12345678" class="nav-link">0320-12345678</a>
                 </li>
               </nav>
              
               <nav class="footer-nav">
 
                <li class="nav-item">
                     <a href="#" class="nav-link footer-heading">
                          address:
                     </a>
                   </li>
                 <li class="nav-item">
                     
                   <a href="#" class="nav-link">Lorem ipsum dolor sit dollor.</a>
                 </li>
                 <li class="nav-item">
                   <a href="#" class="nav-link">Lorem ipsum dolor </a>
                 </li>
                 <li class="nav-item">
                   <a href="#" class="nav-link text-uppercase">ox4 56g.</a>
                 </li>
               </nav>
             </div>
             <div class="col-sm-2">
             
               <nav class="footer-nav">
 
                <li class="nav-item">
                     <a href="#" class="nav-link footer-heading">
                          services
                     </a>
                   </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">graphic designing</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">website designing</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">web development</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">web development</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">web development</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">web development</a>
                 </li>
               </nav>
             </div>
             <div class="col-sm-2">
             
               <nav class="footer-nav">
                <li class="nav-item">
                     <a href="#" class="nav-link footer-heading">
                          about us
                     </a>
                   </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">careers</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">terms &services</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">privacy policy</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">careers</a>
                 </li>
               </nav>
             </div>
             <div class="col-sm-2">
              
               <nav class="footer-nav">
                <li class="nav-item">
                     <a href="#" class="nav-link footer-heading">
                          support
                     </a>
                   </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">contact us</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">customer servises</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link text-uppercarse">faq</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">customer services</a>
                 </li>
                 <li class="nav-item">
                   <a href="" class="nav-link">contact us</a>
                 </li>
               </nav>
             </div>
 
             <div class="col-sm">
                <nav class="footer-nav">
                     <li class="nav-item">
                          <a href="#" class="nav-link footer-heading">
                               newsletter
                          </a>
                        </li>
 
                        <li class="nav-item">
                         <a href="" class="nav-link">
                          <div class="form-group">
                               <label for="">enter email</label>
                               <div class=""><input type="text" class="form-control"></div>
                          </div>
                          <button class="btn btn-main btn-footer" >submit</button>
                         </a>
                        </li>
                     
                    </nav>
               </div>
             </div>
           </div>
         </div>
       </footer>
     
     </section>


     <footer>
       <div class="footer-secondary">
            <div class="row">
                 <div class="col-sm-6">
                      <div class="footer-text">
                           all copy rights resived @lorem ipsum
                      </div>
                 </div>
  
                 <div class="col-sm-6">
                      <div class="social-icons">
                       <div class="icon">
                           <i class="fa-brands fa-facebook-f"></i>
                         
                       </div>
                       <div class="icon">
                           <i class="fa-brands fa-twitter"></i>
                       </div>
                       <div class="icon">
                           <i class="fa-brands fa-instagram"></i>
                       </div>
                      </div>
                 </div>
            </div>
       </div>
   </footer>
   </section>
  </body>
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
    crossorigin="anonymous"
  ></script>
</html>
