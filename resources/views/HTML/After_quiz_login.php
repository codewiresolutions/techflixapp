<!DOCTYPE html>
<html lang="en">
     <title>Quiz_Contest</title>
  <head>
  <?php
require_once("user_content/header.php")
?>
  <?php
require_once("user_content/css.php")
?>

<style>
     .quiz_contest_section .btn_share:hover{
  color:var(--blackcolor);
}
</style>

  </head>
  <body>
  <?php
		include("user_content/top_menu.php"); 
		?>
  <main>
  <section class="quiz_contest_section">
    <div class="container">
        <div class="text-capitalize mt-5 mb-5 font-weight-bold">
             others > monthly quiz contest
        </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
          <div class="card_quiz_contest">
            <div class="card_quiz">
              <img
                src="../images/quiz-game-sample.svg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                  Reiciendis fuga quod optio!
                  <button href="#" class="btn btn_share">
                    <div class="icon_quiz">
                       <i class="fa-solid fa-share-nodes"></i>
                    </div>
                    <div class="text_capitalize">share</div>
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <div class="row">
            <div class="col-sm-6">
              <div class="box_with_img_icons">
                <div class="icon_img">
                  <img src="../images/50-coins.svg" alt="" class="img-fluid" />
                </div>
                <div class="text_box_quiz_img">
                  pay and earn 50 points
                </div>
              </div>
            </div>
            <div class="col-sm-6">
             <div class="box_with_img_icons">
               <div class="icon_img">
                 <img src="../images/10-coins.svg" alt="" class="img-fluid" />
               </div>
               <div class="text_box_quiz_img">
          share and earn 50 points
               </div>
             </div>
           </div>
           <div class="col-sm-6">
             <div class="box_with_img_icons">
               <div class="icon_img">
                 <img src="../images/Gift.svg" alt="" class="img-fluid" />
               </div>
               <div class="text_box_quiz_img">
              earn unlimited points & win an amazing gift
               </div>
             </div>
           </div>
           <div class="col-sm-6">
             <div class="box_with_img_icons">
               <div class="icon_img">
                  <i class="fa-solid fa-share"></i>
               </div>
               <div class="text_box_quiz_img">
                 every share on social media count 10 points
               </div>
             </div>
           </div>
          </div>
        </div>

        <div class="col-sm-12 col-md col-lg-2 col-xl-2">
          <div class="box_confir_pay">
            <button class="btn btn-main pay_now_btn">pay now</button>
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
		require_once("user_content/footer.php");
		?>

  </body>

<?php
require_once("user_content/js.php")
?>
 

 
</html>
