@extends('admin.layouts.master')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<link rel="stylesheet" href="{{asset('assets/css/chatbox.css')}}">
@push('title')
   Order Detail
@endpush

@section('content')



  <main >

<section class="container_wrapper">


<section class="checkout_section">
    <div class="">
    <div class="">
      <div class="row">
        <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
          <div class="box_coloring_bg_checkout">
            <div class="box_card_heading">
              <div class="text_child_head active">Order details</div>
            </div>
            <hr />
            <div class="box_card_heading">
              <div class="text_child_head active">Requirements Submitted</div>
            </div>
            <hr />
            <div class="box_card_heading">
              <div class="text_child_head active">Confirmed And Pay</div>
            </div>
            <hr />
          </div>
        </div>
        <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">
          <div class="cart_box_table">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="main_heading_top">Product</th>
                  <th scope="col" class="main_heading_top">Price</th>
                  <th scope="col" class="main_heading_top text-center">Qty</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="checckout_img_box_table">
                 {{ isset($order_deatil->name) ? $order_deatil->name : '' }}

                <button class="btn btn_detail_img_table py-0 my-0"  data-toggle="modal" data-target="#staticBackdrop">View Detail</button>
                      </span>
                    </div>
                  </td>
                  <td>

                  {{ isset($order_deatil->price) ? $order_deatil->price : '' }}

                  </td>
                  <td class="text-right">
                    <div class="quantity">
                        1
{{--                      <button class="btn minus-btn disabled" type="button" onclick="'javscript', document.getElementById('quantity').value--">-</button>--}}
{{--                      <input type="text" id="quantity" value="1">--}}
{{--                      <button class="btn plus-btn" type="button" onclick="'javscript', document.getElementById('quantity').value++">+</button>--}}
                  </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="another_table_txt_bottom pl-3">
            <div class="heading_parent">
              Description


            </div>
            <div class="text_child">
        <div class="wrap_padding">
     {{ isset($order_deatil->description) ? $order_deatil->description : '' }}

        </div>
            </div>
          </div>

            <div class="row">
                <div class="col-md-12">
                    <section class="section_time_line_secondary">
                        <section class="msger">
                            <header class="msger-header">
                                <div class="msger-header-title">
                                    <i class="fas fa-comment-alt"></i> chatbox
                                </div>
                                <div class="msger-header-options">
                                    <span><i class="fas fa-cog"></i></span>
                                </div>
                            </header>

                            <main class="msger-chat">
                                <!--<div class="msg left-msg">-->
                                <!--  <div-->
                                <!--   class="msg-img"-->
                                <!--   style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"-->
                                <!--  ></div>-->

                                <!--  <div class="msg-bubble">-->
                                <!--    <div class="msg-info">-->
                                <!--      <div class="msg-info-name"></div>-->
                                <!--      <div class="msg-info-time"></div>-->
                                <!--    </div>-->

                                <!--    <div class="msg-text">-->

                                <!--    </div>-->
                                <!--  </div>-->
                                <!--</div>-->

                                <form id="chat-form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="order_id" value="{{ isset($order_deatil->id) ? $order_deatil->id : '' }}" name="order_id">

                                    <!--<div class="msg right-msg">-->
                                    <!--    <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>-->
                                    <!--    <div class="msg-bubble">-->
                                    <!--        <div class="msg-info">-->
                                    <!--            <div class="msg-info-name"></div>-->
                                    <!--            <div class="msg-info-time"></div>-->
                                    <!--        </div>-->

                                    <!--        <div class="msg-text">-->

                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                            </main>

                            <form class="msger-inputarea">
                                <input type="text" id="message" class="msger-input" name="message" placeholder="Enter your message...">
                                <button type="submit" class="msger-send-btn px-0 mx-0 my-2">Send</button>
                            </form>

                        </section>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
          <div class="box_coloring_bg_checkout secondr_option_padding">
            <div class="text_align_card_main">Price Summary</div>
            <div class="box_parent_text">
              <div class="sub_div_text">Subtotal</div>
              <div class="prcie_child">${{ isset($order_deatil->price) ? $order_deatil->price : '' }}</div>
            </div>

            <div class="box_parent_text">
              <div class="sub_div_text">Service Fee</div>
              <div class="prcie_child">$0.00</div>
            </div>
            <div class="box_parent_text">
              <div class="sub_div_text">Total</div>
              <div class="prcie_child">${{ isset($order_deatil->price) ? $order_deatil->price : '' }}</div>
            </div>

            {{-- <div class="box_parent_text">
              <div class="sub_div_text">voucher code</div>
              <div class="prcie_child"></div>
            </div> --}}

            {{-- <div class="form_group_checkout row"> --}}
             {{-- <div class="col-sm-12 p-sm-0 flex-column justify-content-center">
             <input type="text" class="form_checkout form-control" />
              <button class="btn validate_btn">validate</button>
            </div> --}}
            {{-- <button class="btn btn-main btn_continue_chekout">
              continue
            </button>
             </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>






</section>
</section>






<div class="inner_modal view_order_details">
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Order Deatil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
         <div class="modal_upload_file">
          <div>
              <div class="row">
                  <div class="col-sm-12">
                     <div class="form_group_of_profile">
                        <label for="">  Name </label>
                        <div class="input">
                           <input type="text" class="control_field form-control" id="fv-name" name="name"
                                   value="{{ isset($order_deatil->name) ? $order_deatil->name : '' }}" readonly>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12">
                   <div class="form_group_of_profile">
                      <label for="">  Price </label>
                      <div class="input">
                         <input type="text" class="control_field form-control" id="fv-price" name="price"
                                 value="$ {{ isset($order_deatil->price) ? $order_deatil->price : '' }}" readonly>
                      </div>
                   </div>
                </div>


                <div class="col-sm-12">
                  <div class="form_group_of_profile">
                     <label for="">  Description </label>
                     <div class="input">
                        <input type="text" class="control_field form-control" id="fv-price" name="price"
                                value="{{ isset($order_deatil->price) ? $order_deatil->price : '' }}" readonly>
                     </div>
                  </div>
               </div>
{{--
                <div class="col-sm-12">
                  <div class="form_group_of_profile">
                     <label for="">  Image </label>
                     <div class="input">
                      <img src="{{asset($order_deatil->image)}}" class="w-100 img-fluid" alt="" srcset="">
                     </div>
                  </div>
               </div> --}}

               </div>
             </div>

             <button class="btn btn-main w-100 p-2 mt-3 mb-2" class="close" data-dismiss="modal">Close</button>
         </div>
          </div>

        </div>
      </div>
    </div>
</div>



</main>



@endsection

@push('js')

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables plugin -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


<script type="text/javascript">

  $(document).ready(function() {

    var order_id = $('#order_id').val(); // retrieve the order ID from an input field
    // Get the chat history and display it in the view
    $.get('/chat-history?order_id=' + order_id, function(data) {
        // Loop through the chat messages and append them to the view
        for (var i = 0; i < data.length; i++) {
            var chatMsg = data[i];
            var msgClass = (chatMsg.sender_type == 'user') ? 'right-msg' : 'left-msg';
            var msgImg = (chatMsg.sender_type == 'user') ? 'https://image.flaticon.com/icons/svg/145/145867.svg' : 'https://image.flaticon.com/icons/svg/327/327779.svg';

            // Create the HTML for the chat message
            var msgHTML = '<div class="msg ' + msgClass + '">' +
                '<div class="msg-img" style="background-image: url(' + msgImg + ')"></div>' +
                '<div class="msg-bubble">' +
                '<div class="msg-info">' +
                '<div class="msg-info-name">' + chatMsg.sender_type + '</div>' +
                '<div class="msg-info-time">' + chatMsg.created_at + '</div>' +
                '</div>' +
                '<div class="msg-text">' + chatMsg.message + '</div>' +
                '</div>' +
                '</div>';

            // Append the HTML to the chat container
            $('.msger-chat').append(msgHTML);
        }
    });

    // Send a message when the user submits the form
    $('#chat-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: '{{ route('sendMessage') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
      console.log(response);

                // Do something here if the request succeeds
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Do something here if the request fails
            },
            complete: function() {
            $submitButton.prop('disabled', false); // Re-enable the button after the request is complete
        }
        });

        // Clear the input field
        $('#message').val('');
    });

 // Keep track of the last message ID received
var lastMessageId = null;

// Poll the server for new chat messages every few seconds
function pollNewMessages() {
  // Include the last message ID in the GET request
  var url = '/new-messages';
  if (lastMessageId !== null) {
    url += '?last_message_id=' + lastMessageId;
  }

  $.get(url, function(data) {
    // Add the new messages to the chat history
    if (data.length > 0) {
      // Append each new message to the chat history
      data.forEach(function(message) {
        if (message.id !== lastMessageId) {
          var msgClass = message.sender_type === 'staff' ? 'left-msg' : 'right-msg';
          var msgImgUrl = message.sender_type === 'staff' ? 'https://image.flaticon.com/icons/svg/327/327779.svg' : 'https://image.flaticon.com/icons/svg/145/145867.svg';
          var msgInfoName = message.sender_type === 'staff' ? 'Staff' : 'You';

          var msgHtml = '<div class="msg ' + msgClass + '">' +
              '<div class="msg-img" style="background-image: url(' + msgImgUrl + ')"></div>' +
              '<div class="msg-bubble">' +
              '<div class="msg-info">' +
              '<div class="msg-info-name">' + msgInfoName + '</div>' +
              '<div class="msg-info-time">' + message.created_at + '</div>' +
              '</div>' +
              '<div class="msg-text">' + message.message + '</div>' +
              '</div>' +
              '</div>';

          $('.msger-chat').append(msgHtml);

          // Update the last message ID
          lastMessageId = message.id;
        }
      });
    }
  }).always(function() {
    // Poll again after a short delay
    setTimeout(pollNewMessages, 1000);
  });
}

// Start polling for new messages
pollNewMessages();

});

</script>


@endpush
