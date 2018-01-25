<div style="margin:auto; padding:50px 0 30px; text-align:center">
	<!-- <h2 style="color:26a69a">Sistem Penjadwalan Unikama</h2> -->
</div>

<div style="margin:auto">
	<form method="post" style="width:400px; margin:auto;">
		<fieldset>
			<legend>Login Admin</legend>
			<div class="input-field col s6">
                <i class="mdi mdi-account-circle prefix"></i>
                <input id="username" type="text" class="validate" name="username" required>
                <label for="username">Username</label>
            </div>

			<div class="input-field col s6">
                <i class="mdi mdi-lock-outline prefix"></i>
                <input id="password" type="password" class="validate" name="password" required>
                <label for="password">Password</label>
            </div>

    		<div class="row center">
                <a href="<?php $baseUrl;?>admin.php?page=home&action=index" class="btn waves-effect waves-light"  name="submit">Masuk<i class="mdi mdi-send right"></i></a> 
                <button class="btn waves-effect red waves-light" type="button" Value="Login Page" Onclick="window.location.href='index.php'">Cancel<i class="mdi mdi-exit-to-app right"></i></button>
            </div>
		</fieldset>
	</form>
</div>