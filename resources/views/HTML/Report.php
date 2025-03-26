<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Reports</title>
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
 



 <section class="reports_Section">

  <div class="container-fluid container_wrapper">
    <div class="text_main_pages">
      reports
    </div>
    <div class="row">
      <div class="w-100">
        <div class="table_section smal_device_margin_padding">
          <tr class="nav_table_row">
            <div class="to_nav_table">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">payemnt</a>
                  <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">order</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">tickets</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">profit</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">charges</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">quality</a>
                </div>
              </nav>
            </div>
            </tr>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
            <div class="table_reports">
               <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">january</th>
                        <th scope="col">february</th>
                        <th scope="col">march</th>
                        <th scope="col">april</th>
                        <th scope="col">may</th>
                        <th scope="col">june</th>
                        <th scope="col">july</th>
                        <th scope="col">august</th>
                        <th scope="col">september</th>
                        <th scope="col">november</th>
                        <th scope="col">december</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                       
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                        <td>1234</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <table class="table">
       
                  <tbody class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" >
                    <tr>
                      <th scope="col" class="main_heading_top">due date</th>
                      <th scope="col" class="main_heading_top">deliver date</th>
                      <th scope="col" class="main_heading_top">order id</th>
                      <th scope="col" class="main_heading_top">products</th>
                      <th scope="col" class="main_heading_top">order amount</th>
                    </tr>
                    <tr>
                      <th scope="row">10/26/2022</th>
                      <td>10/26/2022</td>
                      <td>25389</td>
                      <td class="width_mange_order">
                        <img
                          src="https://dummyimage.com/150x100/000/dcdce0&text=table_img"
                          alt=""
                          class="w-25"
                        />
                        Lorem ipsum dolor sit.
                      </td>
                      <td><span class="order_class">
                        $530
                      </span></td>
                      <td>
                        <button class="btn btn_reorder">re-order</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">10/26/2022</th>
                      <td>10/26/2022</td>
                      <td>25389</td>
                      <td class="width_mange_order">
                        <img
                        src="https://dummyimage.com/150x100/000/dcdce0&text=table_img"
                        alt=""
                        class="w-25"
                      />
                        Lorem ipsum dolor sit.
                      </td>
                      <td><span class="order_class">
                        $530
                      </span></td>
                      <td>
                        <button class="btn btn_reorder">re-order</button>
                      </td>
                    </tr>
      
                    <tr>
                      <th scope="row">10/26/2022</th>
                      <td>10/26/2022</td>
                      <td>25389</td>
                      <td class="width_mange_order">
                        <img
                          src="https://dummyimage.com/150x100/000/dcdce0&text=table_img"
                          alt=""
                          class="w-25"
                        />
                        Lorem ipsum dolor sit.
                      </td>
                      <td><span class="order_class">
                        $530
                      </span></td>
                      <td>
                        <button class="btn btn_reorder">re-order</button>
                      </td>
                    </tr>
      
                    <tr>
                      <th scope="row">10/26/2022</th>
                      <td>10/26/2022</td>
                      <td>25389</td>
                      <td class="width_mange_order">
                        <img
                          src="https://dummyimage.com/150x100/000/dcdce0&text=table_img"
                          alt=""
                          class="w-25"
                        />
                        Lorem ipsum dolor sit.
                      </td>
                      <td><span class="order_class">
                        $530
                      </span></td>
                      <td>
                        <button class="btn btn_reorder">re-order</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">10/26/2022</th>
                      <td>10/26/2022</td>
                      <td>25389</td>
                      <td class="width_mange_order">
                        <img
                          src="https://dummyimage.com/150x100/000/dcdce0&text=table_img"
                          alt=""
                          class="w-25"
                        />
                        Lorem ipsum dolor sit.
                      </td>
                      <td><span class="order_class">
                        $530
                      </span></td>
                      <td>
                        <button class="btn btn_reorder">re-order</button>
                      </td>
                    </tr>
                  </div>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"></div>
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
