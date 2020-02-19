
<div class="messages">
  <ul class="ml-0 pl-0">
  </ul>
</div>
<div class="message-input">
  <div class="wrap">
    <input type="text" placeholder="Write your message..." />
    <button class="submit"><i class="fa fa-send" aria-hidden="true"></i></button>
  </div>
</div>	



<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script type="text/javascript">
			
      

$(document).ready(function(){
  

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}

  $.ajax({
      url: '/new',
      type:'post',
      data : { toId : <?php echo $id; ?>, text : message },
      success : function(data){
        if(!data) return;
        $('.messages ul').html('')
        $.each(JSON.parse(data), function(index, item) { 
          $('<li class="'+ ( item.from_id == <?php echo $_SESSION['user_id']; ?> ? 'replie':'sent' ) +' " ><p>'+ item.text +'</p></li>').appendTo($('.messages ul'));
        });
      }
   })
	$('<li class="replie"><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$(".messages").animate({ scrollTop: $(".messages ul").prop('scrollHeight') }, 250);

};
 
 
  function getMessages(){
    $.ajax({
      url: '/messages/toId/' + <?php echo $id; ?> ,
      success : function(data){
        if(!data) return;
        $('.messages ul').html('')
        $.each(JSON.parse(data), function(index, item) { 
         
          $('<li class="'+ ( item.from_id == <?php echo $_SESSION['user_id']; ?> ? 'replie':'sent' ) +' " ><p>'+ item.text +'</p></li>').appendTo($('.messages ul'));
        });
        $(".messages").animate({ scrollTop: $(".messages").prop('scrollHeight') }, "fast");
      }
    })

    setTimeout(function() {
  
      getMessages();
    }, 3000);


  };
  getMessages();
$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
});

</script>


<style type="text/css">
.contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
  position: fixed;
  top: 0;
}

.contact-profile p {
  
}

.messages {
  height: auto;
  min-height: calc(100% - 80px);
  max-height: calc(100% - 80px);
  overflow-y: scroll;
  overflow-x: hidden;
  margin-top:60px;
  margin-bottom:60px;
}
@media screen and (max-width: 735px) {
 .messages {
    max-height: calc(100% - 105px);
  }
}
.messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
.messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
 .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
 .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
 .messages ul li.replie p {  
  background: #435f7a;
  color: #f5f5f5;
}

.messages ul li.sent p {
  background: #f5f5f5;
  float: right;
}

 .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
 .messages ul li p {
    max-width: 300px;
  }
}

 .message-input {
  position: fixed;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
.message-input .wrap {
  position: relative;
}
 .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
 .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
.message-input .wrap input:focus {
  outline: none;
}
 .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
 .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
 .message-input .wrap .attachment:hover {
  opacity: 1;
}
.message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
.message-input .wrap button {
    padding: 16px 0;
  }
}
 .message-input .wrap button:hover {
  background: #435f7a;
}
 .message-input .wrap button:focus {
  outline: none;
}
.message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
 .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
 .message-input .wrap .attachment:hover {
  opacity: 1;
}

</style>