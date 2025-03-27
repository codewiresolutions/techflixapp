<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Setting</title>
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
       <section class="section_setting">
      <div class="">
        <div class="container-fluid container_wrapper">
          <div class="row">
            <div class="setting_box">
              <div class="">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">account</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">password</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">notification</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">security and privacy</a>
                  </li>
                </ul>
                <div class="row form_spacing_setting">
                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">first name</label>
                        <br />
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">last name</label>
                        <br />
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">email</label>
                        <br />
                        <input
                          type="email"
                          class="form-control"
                          placeholder="xyz@design.com"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">conatct number</label>
                        <br />
                        <input
                          type="number"
                          class="form-control"
                          placeholder="123456789"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-8">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">bio</label>
                        <br />
                        <textarea
                          name=""
                          id=""
                          cols="30"
                          rows="10"
                          class="textArea_setting form-control"
                        ></textarea>
                      </div>
                    </div>
                    <div class="setting_frm_btn">
                      <button class="btn btn-main btn_setting">update</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
