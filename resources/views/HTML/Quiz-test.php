<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Quiz Test</title>
  <?php
require_once("user_content/header.php")
?>
  <?php
require_once("user_content/css.php")
?>

<style>

</style>
  </head>
  <body>

  <main>


  <section class="quiz_screen_section">
     <div class="container">
          <div class="box_quiz_test">
               <div class="content">
                    <div class="container-fluid">
                         
                         <div class="row">
                              <div class="col-sm-12">
                                   <div class="text_lenght">
                                        1/10
                                   </div>
                                 <div id="result" class="quiz-body">
                                <form name="quizForm" onSubmit="">
                             <div class="heading_of_question">
                              <span>1</span>     :
                          how many weeks are in month ?
                             </div>
                             <div class="option_qst">
                              <div class="chech_box">
                                   <input type="radio">
                                   <label for="">one</label>
                                  </div>
                                  <div class="chech_box">
                                   <input type="radio">
                                   <label for="">two</label>
                                  </div>
                                  <div class="chech_box">
                                   <input type="radio">
                                   <label for="">three</label>
                                  </div>
                                  <div class="chech_box">
                                   <input type="radio">
                                   <label for="">four</label>
                                  </div>
                             </div>
                                    
                                     <a  href="cong-quiz.php" id="next" class="btn btn-success" >Next</a>
                               </form>
                               </div>
                            </div> <!-- End of col-sm-12 -->
                            
                        </div> <!-- End of row -->
                    </div> <!-- ENd of container fluid -->
                    </div> <!-- End of content -->
          </div>
     </div>
  </section>


    
</main>


  </body>

<?php
require_once("user_content/js.php")
?>
 

 
</html>
