<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Contact Us</title>
  <?php
require_once("user_content/header.php")
?>
  <?php
require_once("user_content/css.php")
?>
  </head>
  <body>


  </head>
  <body>

  <?php
require_once("user_content/top_menu.php")
?>


 
<main class="main_contact"> 
    
    <section class="conatct_us_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="conatct_img">
              <figure>
                <img src="https://dummyimage.com/500x500/000/fff&text=Contact+us" alt=""  class="img"/>
              </figure>
            </div>
          </div>

          <div class="col-md-6">
               <div class="top_text_frorm">
                  we are here to help you ! write your query below
               </div>
            <div class="conatct_form">
               <form action="
               ">
          <div class="form_group">
               <label for="">full name</label>
               <div class="">
                    <input type="text" required class="form-control form_adjust">
               </div>
          </div>
          <div class="form_group">
               <label for="">email</label>
               <div class="">
                    <input type="email" required class="form-control form_adjust">
               </div>
          </div>
          <div class="form_group">
               <label for="">contact number</label>
               <div class="">
                    <input type="number" required class="form-control form_adjust">
               </div>
          </div>

          <div class="form_group">
           <label for="">subject</label>
           <div class="">
              <textarea name="" id="" class="form-control textArea" style="max-height: 80px; height: 80px !important;"></textarea>
           </div>
      </div>
      <div class="form_group >
           <label for="">subject</label>
           <div class="">
              <textarea name="" id="" class="form-control textArea " style="max-height: 200px; height: 200px !important;" ></textarea>
              <div class="no_more_charct">
                no more character than 500
              </div>
           </div>
                  
<button class="btn contact_btn btn-main"> submit</button>
      </div>
        

          </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


     

  <?php
require_once("sign_up.php")
?>     
    
        <?php
require_once("user_content/footer.php")
?>
  </body>

<?php
require_once("user_content/js.php")
?>
</html>
