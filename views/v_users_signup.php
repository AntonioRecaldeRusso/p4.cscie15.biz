<h4>signup</h4>

        <link rel='stylesheet' href='popbox.css' type='text/css'>

        <div class='popbox'>
          <a class='open' href='#'>Click Here!</a>

          <div class='collapse'>
            <div class='box'>
              <div class='arrow'></div>
              <div class='arrow-border'></div>

              Content in PopBox goes here :)
              
								<div id="stylized" class="myform">
								
								<!-- whichever variable gets passed as TRUE into the template, enables the corresponding "if" condition to
								allow execution... thus, echoing error messages in accord to the situation. -->
					
									<form id="form" name="form" action='/users/p_signup' method="POST">
										<h1>Sign-up</h1>
										<p>Sign up to SpeedTypr Reverse! <a id="login_link" href="/users/login">Login</a></p>
								
										<label>Username
										<span class="small">Choose a username</span>
										</label>
										<input type="text" name="username" id="username" />
								
										<label>Password
										<span class="small">Min. size 6 chars</span>
										</label>
										<input type="password" name="password" id="password" />
								
										<label>Password
										<span class="small">Re-enter your password</span>
										</label>
										<input type="password" name="password2" id="password2" />
								
										<button type="submit">Sign-up</button>
										<div class="spacer"></div>
									</form>
								</div>
              
              
              <a href="#" class="close">close</a>
            </div>
          </div>
        </div>

        
        <script type='text/javascript'>
           $(document).ready(function(){
             $('.popbox').popbox();
           });
        </script>
        
        
		<script>
	/*		var options = {
					
					type: "POST",
					url: "/users/p",
					success: function(response) {
						$("#response").html(response);
						console.log(response);
					}
			}
		
			$("form").ajaxForm(options);     */
        </script>