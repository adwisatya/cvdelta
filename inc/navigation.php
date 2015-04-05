    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<table style="color:white">
					<tr>
						<td valign="middle">
							<img src="img/header-footer/idec.png" width="75px" height="50px">
						</td>
					</tr>
				</table>            
			</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>

                    <li>
						<?php 
							if($_SESSION['username'] != ""){
								echo '<a href="bin/logout.php">Login/Register</a>';
							}else{
								echo '<a href="login.php">Login/Register</a>';
							}
						?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
