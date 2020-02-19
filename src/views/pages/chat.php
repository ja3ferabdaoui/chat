	

	<div class="contact-profile">
			
		<p>Harvey Specter</p>
		
        </div>
		<div class="messages">
			<ul>
				<li class="sent">
					<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
				</li>
				<li class="replies">
					<p>When you're backed against the wall, break the god damn thing down.</p>
				</li>
			 
		</div>
			<div class="message-input">
		<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
		</div>	
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript">
			

$(document).ready(function(){
  

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");

};
  function getMessages(){

    $.ajax({
      url: 'messages',
      type: 'post',
      success : function(data){
        var ul = $('#messages ul');
        ul.html('');
      
        if(!data) return;
        $.each(JSON.parse(data), function(index, item) {
          ul.append(
          '<li class="sent" >\
              <p >\
                '+ item.text +' \
              </p>\
          </li>')
        });
      }
    })
    setTimeout(function() {
      getUsers();
    }, 1000);
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
  float: left;
}

.messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
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
 .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
 .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
 .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
.messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
 .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
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