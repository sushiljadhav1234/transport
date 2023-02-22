<!-- Container fluid start -->
				<div class="container-fluid">
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-12">
							<!-- Footer start -->
							<div class="footer">
								Copyright © 2020-<?php echo date('Y'); ?> TRANSPORT MANAGMENT SYSTEM All Rights Reserved  
							</div>
							<!-- Footer end -->
						</div>
					</div>
					<!-- Row end -->
				</div>
				<!-- Container fluid end -->

				<!-- Chat start 
				<div id="chat-box">
					<div id="chat-circle" class="btn btn-raised">
						<img src="img/chat.svg" alt="Chat" />
					</div>
					<div class="chat-box">
						<div class="chat-box-header">
							Chat
							<span class="chat-box-toggle"><i class="icon-close"></i></span>
						</div>
						<div class="chat-box-body">
							<div class="chat-logs">
								<div class="chat-msg self">
									<img src="img/user2.png" class="user" alt="">
									<div class="chat-msg-text">Hello</div>
								</div>
								<div class="chat-msg user">
									<img src="img/user15.png" class="user" alt="">
									<div class="chat-msg-text">Are we meeting today?</div>
								</div>
								<div class="chat-msg self">
									<img src="img/user2.png" class="user" alt="">
									<div class="chat-msg-text">Yes, what time suits you?</div>
								</div>
								<div class="chat-msg user">
									<img src="img/user15.png" class="user" alt="">
									<div class="chat-msg-text">Can we connect at 3pm?</div>
								</div>
								<div class="chat-msg self">
									<img src="img/user2.png" class="user" alt="">
									<div class="chat-msg-text">Sure, Thanks. I will send you some important files.</div>
								</div>
								<div class="chat-msg user">
									<img src="img/user15.png" class="user" alt="">
									<div class="chat-msg-text">Great. Thanks!</div>
								</div>
							</div>
						</div>
						<div class="chat-input">
							<form>
								<input type="text" id="chat-input" placeholder="Send a message..."/>
							<button type="submit" class="chat-submit" id="chat-submit"><i class="icon-send"></i></button>
							</form>
						</div>
					</div>
				</div>
				 Chat end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->
	<script>
$(".kalamenu").click(function(){
	localStorage['mainpagename'] = '';
	 localStorage['pagename'] = $(this).find("a").attr("value");
});
$(".mainkalamenu").click(function(){
	
		$('#mainmenu'+localStorage['mainpagename']).removeClass( "active" );
	if(localStorage['mainpagename'] == $(this).find("a").attr("value"))
	{
		localStorage['mainpagename'] = '';
	}
	else
	{
		 localStorage['mainpagename'] = $(this).find("a").attr("value");
	}
	
});

</script>
<script>
$('#menu'+localStorage['pagename']).addClass( "current-page" );
$('#mainmenu'+localStorage['mainpagename']).addClass( "active" );
</script>
	</body>
</html>
