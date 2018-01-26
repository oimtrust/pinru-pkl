<div style="margin:auto; padding:50px 0 30px; text-align:center"></div>
<div style="margin:auto; padding:50px 0 30px; text-align:center"></div>

<div style="margin:auto">
	<form method="post" style="width:400px; margin:auto;">
        <div class="row">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        ?>
                        <div class="row alert_box">
                            <div class="col s12">
                                <div class="card red darken-2">
                                    <div class="row">
                                        <div class="col s9">
                                            <div class="card-content white-text">
                                                <?php echo $error; ?>
                                            </div>
                                        </div>
                                        <div class="col s3 white-text">
                                            <i class="mdi mdi-close close right alert_close" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
		<fieldset>
			<legend>Login Admin</legend>
			<div class="input-field col s6">
                <i class="mdi mdi-account-circle prefix"></i>
                <input id="username" type="text" class="validate" name="username" autofocus>
                <label for="username">Username</label>
            </div>

			<div class="input-field col s6">
                <i class="mdi mdi-lock-outline prefix"></i>
                <input id="password" type="password" class="validate" name="password" >
                <label for="password">Password</label>
            </div>

    		<div class="row center">
                <button class="btn waves-effect waves-light" type="submit" name="btn_login">Masuk<i class="mdi mdi-send right"></i></button> 
                <button class="btn waves-effect red waves-light" type="button" Value="Login Page" Onclick="window.location.href='index.php'">Cancel<i class="mdi mdi-exit-to-app right"></i></button>
            </div>
		</fieldset>
	</form>
</div>

<script type="text/javascript">
    $('.alert_close').click(function(){
        $( ".alert_box" ).fadeOut( "slow", function() {
        });
    });
</script>