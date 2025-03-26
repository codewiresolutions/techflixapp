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
  <section class="quit_contest">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="box_quiz_img">
              <img src="../images/quiz-contest-tab.svg" alt="" class="img" />
            </div>
          </div>
          <div class="col-md-6">
              
            <div class="box_form_quiz">
               <div class="text-center headin_text">
                    monthly quiz contest
               </div>
              <form action="">
               <div class="form_group">
                    <label for="">full name</label>
                    <div class="">
                         <input type="text" class="form-control input_quiz">
                    </div>
               </div>
               <div class="form_group">
                    <label for="">email</label>
                    <div class="">
                         <input type="email" class="form-control input_quiz" placeholder="xyz@design.com">
                    </div>
               </div>
               <div class="form_group">
                    <label for="">password</label>
                    <div class="">
                         <input type="password" class="form-control input_quiz" placeholder="*********">
                    </div>
               </div>
               <a class="btn btn-main btn_quiz" href="Quiz-test.php">register</a>
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
		require_once("user_content/footer.php");
		?>

  </body>

<?php
require_once("user_content/js.php")
?>
 

 
</html>
