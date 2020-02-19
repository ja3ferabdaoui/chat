<?php
    require_once (VIEWS .'/includes/header.php');
?>

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<p><?php echo $currentUser['user_name'] ?></p>
			</div>
		</div>
		
		<div id="contacts">
			<ul  style="list-style: none;">
			 
			</ul>
		</div>
		<div id="bottom-bar">
			<a href="logout" class="fa fa-sign-out" role="button"  ><span>Log Out</span></a>
		</div>
		
	</div>
	<div class="content">
	
		<iframe id="chat" src="/chat/id/5" style="width: 100%; margin: auto; height: 100%"></iframe>
	
	</div>
</div> 

<script >

$(document).ready(function(){
  
	$(document).on('click','li', function(event){
		event.stopPropagation();
		event.preventDefault();
		$(this).addClass('active').siblings().removeClass('active')
		$('#chat').attr('src','chat/id/'+$(this).data('user_id'));
	})

	function getUsers(){
		$.ajax({
			url: 'users',
			success : function(data){
				var ul = $('#contacts ul');
				ul.html('');
			
				if(!data) return;
				$.each(JSON.parse(data), function(index, item) {
					ul.append('<li class="contact" data-user_id="'+ item.id +'"> \
						<div class="wrap">\
							<span class="contact-status '+ ( item.status == 1 ? 'online':'' ) +' mt-1"  alt=""></span>\
							<div class="meta d-inline pl-3">\
								'+ item.user_name +' \
							</div>\
						</div>\
					</li>')
				});
			}
		})
		setTimeout(function() {
			getUsers();
		}, 1000);
	}
	getUsers();
});

</script>

<?php
   require_once (VIEWS .'/includes/footer.php');
?>