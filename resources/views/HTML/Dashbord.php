<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Dashbord</title>
  <?php
require_once("user_content/header.php")
?>
  <?php
require_once("user_content/css.php")
?>

<style>
.login_dashbor .text-heading {
  padding: 40px 10px;
  text-transform: capitalize;
  font-weight: 500;
}
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
        <section class="login_dashbor" style="margin-bottom: 100px">
      <div class="container-fluid container_wrapper">
        <div class="text-heading">latest orders</div>
        <div class="row">
          <div class="col-lg-7 table_rad">
            <div class="table_section">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="main_heading_top">date</th>
                    <th scope="col" class="main_heading_top">id</th>
                    <th scope="col" class="main_heading_top">order</th>
                    <th scope="col" class="main_heading_top">status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button class="btn btn_table">completed</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button
                        class="btn btn_table"
                        style="background-color: #e51918"
                      >
                        completed
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button
                        class="btn btn_table"
                        style="background-color: #ffc876"
                      >
                        completed
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button
                        class="btn btn_table"
                        style="background-color: #ffc876"
                      >
                        completed
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button class="btn btn_table">completed</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10/26/2022</th>
                    <td>25389</td>
                    <td>
                      <img
                        src="https://dummyimage.com/200x150/000/fff&text=table_dashbord_img"
                        alt=""
                        class="w-25"
                      />
                      Lorem ipsum dolor sit.
                    </td>
                    <td>
                      <button class="btn btn_table">completed</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="box_girl_avtar">
              <div class="box_img_postion">
                <img
                  src="https://dummyimage.com/100x100/000/dcdce0&text=stephen_doe"
                  alt="Avatar"
                  class="avatar"
                />
                <div class="text_heading_img">stephen doe</div>
              </div>
              <div class="box_with_detail">
                <div class="design_color">
                  <div class="heading_that_design">wallet ballence</div>
                  <div class="box_design">
                    <div class="icon_div">
                      <i class="fa-regular fa-dollar-sign"></i>
                    </div>
                    <div class="price_div">980</div>
                  </div>
                </div>
                <div class="design_color_sec">
                  <div class="heading_that_design">
                    <i class="fa-solid fa-cart-shopping"></i>
                    total order
                  </div>
                  <div class="box_design">
                    <div class="icon_div">
                      <i class="fa-regular fa-dollar-sign"></i>
                    </div>
                    <div class="price_div">980</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- this is container padding -->
        <div class="high_charts_set">
          <div class="text_highcharts">order statics</div>
          <div class="row">
            <div class="col-sm-7">
              <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description"></p>
              </figure>
            </div>
            <div class="col-sm-5">
              <div class="box_orders">
                <div class="text_order">pending orders</div>
                <div class="circle_order">
                  <div class="icon_width">25%</div>
                </div>
              </div>

              <div
                class="box_orders"
                style="background-color: #377dff; color: #fff !important"
              >
                <div class="text_order">completed orders</div>
                <div class="circle_order">
                  <div class="icon_widthsec">25%</div>
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
