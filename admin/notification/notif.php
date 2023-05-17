<head>      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<style>
            
.notification-toggle {
  display: inline-block;
  position: relative;
  margin-left: auto;
}

.notification-toggle .dropdown-toggle {
  padding: 10px;
  cursor: pointer;
}

.notification-toggle .dropdown-toggle:hover {
  background-color: #eee;
}

.notification-toggle .dropdown-toggle .count {
  position: absolute;
  top: -10px;
  right: -10px;
  min-width: 20px;
  height: 20px;
  padding: 3px 6px;
  font-size: 12px;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  background-color: #f00;
  border-radius: 10px;
}

.notification-toggle .dropdown-menu {
  position: absolute;
  right: 0;
  top: 100%;
  z-index: 1000;
  display: none;
  min-width: 460px;
  padding: 10px;
  margin: 0;
  font-size: 14px;
  line-height: 1.4;
  color: #333;
  text-align: left;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 6px 12px rgba(0,0,0,0.175);
  max-height: 200px; /* Set max height of the dropdown menu */
  overflow-y: auto; /* Add a vertical scrollbar when needed */
}

.notification-toggle .dropdown-menu li {
  padding: 5px 10px;
}

.notification-toggle .dropdown-menu li:hover {
  background-color: #f5f5f5;
  cursor: pointer;
}
</style>      

<script>
$(document).ready(function() {
  var dropdownMenu = $('.notification-toggle .dropdown-menu');
  var dropdownToggle = $('.notification-toggle .dropdown-toggle');

  dropdownToggle.find('.count').text('');

  dropdownToggle.on('click', function() {
    dropdownMenu.toggle();
    $('.count').html('');
    load_unseen_notification('yes');
  });

  $(document).on('click', function(e) {
    if (!dropdownToggle.is(e.target) && dropdownToggle.has(e.target).length === 0 &&
        !dropdownMenu.is(e.target) && dropdownMenu.has(e.target).length === 0) {
      dropdownMenu.hide();
    }
  });
  
  function load_unseen_notification(view = '') {
    $.ajax({
      url:"../admin/notification/fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data) {
        $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0) {
          $('.count').html(data.unseen_notification);
        }
      }
    });
  }

  load_unseen_notification();

  $(document).on('click', '.dropdown-toggle', function(){
    $('.count').html('');
    load_unseen_notification('yes');
  });

  setInterval(function(){ 
    load_unseen_notification(); 
  }, 5000);
});
</script>