<?php
if (Auth::check() && Auth::user()->user_type == "superadmin") {
    // Admin Dashboard Notifications
    $new_messages = \App\Models\Chat::where('sender_type', 'user')
        ->latest('id')
        ->get()->take(5)->toArray();
} else {
    $new_messages = \App\Models\Chat::where('sender_id', 1)->where('receiver_id', \Illuminate\Support\Facades\Auth::user()->id)->orderBy('id', 'DESC')->get()->take(5)->toArray();

}
?>

<header class="auth">
  <nav class="navbar navbar-expand-lg navbar-fixed ">
    <div class="brand-logo">
      <a class="navbar-brand" href="#">logo</a>
 </div>
 <div class="icon_sidebar" onclick="sidebarToggle()">
          <i class="fa-solid fa-bars"></i>
        </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <i class="fa fa-bars"></i>
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">


        <li class="nav-item d_flex_headr">
         <a class="nav-link" href="#">
          <div class="wallet_box_header" id="notify">
            <div class="img">
                <i class="fa fa-bell" aria-hidden="true">
                    @if ($notifications)
                        <span class="badge_bell" id="notifications-count">{{ count($notifications) }}</span>
                    @else
                        <span class="badge_bell" id="notifications-count">0</span>
                    @endif
                </i>
            </div>
            <div class="menus notify" id="notifications-container">
                <ul>
                    @if ($notifications)
                    @foreach ($notifications as $notification)
                            <li data-id="{{ $notification['id'] }}">
                              <a href="#">
                              New  {{ $notification['type'] }}
                              </a>
                            </li>
                        @endforeach
                    @else
                        <li>No notifications</li>
                    @endif
                </ul>
            </div>
        </div>
         </a>
       </li>

       <li class="nav-item d_flex_headr">
         <a class="nav-link" href="#">
           <div class="wallet_box_header" id="mail">
                <div class="img">
                 <i class="fa fa-envelope" aria-hidden="true"></i>
                 @if ($new_messages)
                 <span class="badge_bell" id="message-count">{{ count($new_messages) }}</span>
             @else
                 <span class="badge_bell" id="message-count">0</span>
             @endif
                </div>

                <div class="menus  mail">
                  <ul>
                    @if ($new_messages)
                    @foreach ($new_messages as $new_message)

                            <li>

                                <a href="#">
                                    {{$new_message['message']}}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li>No Message</li>
                    @endif

                  </ul>

                  {{-- <div class="read_allnotify">
                   <a href="#">read all</a>
                    </div> --}}
                 </div>
           </div>
         </a>
       </li>

       <li class="nav-item d_flex_headr">

         <div class="wallet_box_header">
          <div class="">
            <button class="btn  dropdown_toggle" type="button" id="dropdown_toggle">
              <div class="img">
                <img src="https://dummyimage.com/50x50/000/fff" alt="" class="rounded-circle">
           </div>
            </button>
            <div class="dropdown_menu_setting ">
              <ul class="menu">
                <li>
                  <a class="dropdown-item" href="{{ route('admin.settings.index') }}">settings</a>

                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('profile.index') }}">profile</a>

                </li>
                  <li>

                      <a class="dropdown-item"  href="{{ route('logout') }}" class="menu_item">
                          Logout
                      </a>

                  </li>


              </ul>
            </div>
          </div>

         </div>

       </li>
      </ul>

    </div>
  </nav>
</header>


@push('js')

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables plugin -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


<script type="text/javascript">

  $(document).ready(function() {


   // attach the click event listener to the notifications container
   $('#notifications-container').on('click', 'li[data-id]', function(event) {
    // prevent the default link behavior
    event.preventDefault();
    // get the ID of the clicked notification
    var id = $(this).attr('data-id');
    console.log(id);

    // send an AJAX request to update the status of the notification to read=1
    $.ajax({
    url: 'update-notification-status',
    type: 'POST', // set the method to POST
    data: {id: id},
    success: function(data) {
      $(event.target).closest('li').remove();
    },
    error: function() {
        alert("Error updating notification status");
    }
});
  });



    setInterval(function() {
      $.ajax({
    type: 'GET',
    url: '/notifications',
    success: function (response) {
        // Update the notifications count and list
        $('#notifications-count').text(response.count);
        $('#notifications-list').empty();
        $.each(response.list, function (i, notification) {
            $('#notifications-list').append(
                '<li><a href="#">' + notification.type + '</a></li>'
            );
        });
    },
    error: function (response) {
        console.log(response);
    }
});
    }, 60000);







});





</script>


@endpush
