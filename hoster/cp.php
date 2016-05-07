<?php
require("templates/head.tmpl.php");
?>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">webParakeet</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="index.php?exit">
            Log off <?php echo $_SESSION["user"]; ?></a>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		
			<div class="row">
				<div class="col-md-2">
					
					
					<?php
					function foldersize($path) {
  $total_size = 0;
  $files = scandir($path);

  foreach($files as $t) {
    if (is_dir(rtrim($path, '/') . '/' . $t)) {
      if ($t<>"." && $t<>"..") {
          $size = foldersize(rtrim($path, '/') . '/' . $t);

          $total_size += $size;
      }
    } else {
      $size = filesize(rtrim($path, '/') . '/' . $t);
      $total_size += $size;
    }
  }
  return $total_size;
}

function format_size($size) {
  $mod = 1024;
  $units = explode(' ','B KB MB GB TB PB');
  for ($i = 0; $size > $mod; $i++) {
    $size /= $mod;
  }

  return round($size, 2) . ' ' . $units[$i];
}

$SIZE_LIMIT = file_get_contents(exec("bash scripts/home.sh " . $_SESSION["user"]) . "/limit"); // 5 GB


  $disk_used = foldersize(exec("bash scripts/home.sh " . $_SESSION["user"]));

  $disk_remaining = $SIZE_LIMIT - $disk_used;

$percent = $disk_used / $disk_remaining;
$percent = substr($percent, 0, 4);
?>
				Disk Space(<?php echo $percent; ?>%): <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percent; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent; ?>%">
    <span class="sr-only"><?php echo $percent; ?>% Complete</span>
  </div>
</div>
					<div class="progress progress-striped">
						<div class="progress-bar progress-success">
						</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-success">
						</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-success">
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">
								Plugins
							</h3>
						</div>
						<div class="panel-body">
						<?php 
						$allfolders = scandir("plugins/plugins");
						foreach ($allfolders as $plugin) {
						    if ($plugin == "." || $plugin == ".." ) {} else {
						        echo "<a type='button' href='cog.php?plugin=plugin/" . $plugin. "' class='btn btn-primary'>" . $plugin . "</a>";
						    }
						}
						?>
						</div>
					
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								My Account
							</h3>
						</div>
						<div class="panel-body">
								<?php 
						$allfolders = scandir("plugins/myaccount");
						foreach ($allfolders as $plugin) {
						    if ($plugin == "." || $plugin == ".." ) {} else {
						        echo "<a type='button' href='cog.php?plugin=myaccount/" . $plugin. "' class='btn btn-primary'>" . $plugin . "</a>";
						    }
						}
						?>
						</div>
					
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title">
								My Site
							</h3>
						</div>
						<div class="panel-body">
							<?php 
						$allfolders = scandir("plugins/my-site");
						foreach ($allfolders as $plugin) {
						    if ($plugin == "." || $plugin == ".." ) {} else {
						        echo "<a type='button' href='cog.php?plugin=my-site/" . $plugin. "' class='btn btn-primary'>" . $plugin . "</a>";
						    }
						}
						?>
						</div>
					
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">
								Database
							</h3>
						</div>
						<div class="panel-body">
								<?php 
						$allfolders = scandir("plugins/database");
						foreach ($allfolders as $plugin) {
						    if ($plugin == "." || $plugin == ".." ) {} else {
						        echo "<a type='button' href='cog.php?plugin=database/" . $plugin. "' class='btn btn-primary'>" . $plugin . "</a>";
						    }
						}
						?>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require("templates/footer.tmpl.php");
?>