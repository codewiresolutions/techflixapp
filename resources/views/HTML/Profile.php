<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Profile</title>
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
  <?php
require_once("user_content/Auth_header.php")
?>
  <main>
  <section class="login_page">
  <?php
require_once("user_content/sidebar.php")
?>
        <section class="dashbord_profile">
     <div class="">
      <div class="box_with_overlay">
       <div class="parent_childs">
        <div class="text_overlay">
          hello sleha !
          
        </div>
        <div class="child_text">
          this is your profile page . you can see your
          <br>
          details here!
        </div>
       </div>
      </div>
     </div>
      <div class="container-fluid  container_wrapper">
      
        <div class="row">
          <div class="col-sm-8">
            <div class="for_prifile_section">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> first name </label>
                    <div class="input">
                      <input type="text" class="form-control control_field" />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> last name </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> email </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> username </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box_stephen_joe">
              <div class="img_position">
                <img
                  src="https://dummyimage.com/100x100/000/fff&text=profile_stephen_doe"
                  alt=""
                  class="img rounded-circle"
                />
                <div class="text_img">stephen doe</div>
              </div>
              <div class="text_align_center">stephen doe</div>
              <div class="email_div">
                email
                <div class="name-email">stephendoe@xyz.com</div>
              </div>

              <div class="email_div">
                member since
                <div class="name-email">january 26 2021</div>
              </div>

              <div class="box_alix_left">
                <div class="heading">total order</div>
                <div class="text_align_left">
                  <div class="img_center">
                    <img src="../images/order.svg" class="img" alt="" />
                  </div>
                  <div class="text_price">15</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>


<?php
require_once("user_content/Auth_footer.php")
?>
  </body>

<?php
require_once("user_content/js.php")
?>
 

 
</html>
