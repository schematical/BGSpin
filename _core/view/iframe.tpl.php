<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>:5033/socket.io/socket.io.js"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/MLC.Socket.js', 'MLCSocket'); ?>"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/App.js'); ?>/BG/App.js"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/BG.Spin.js', 'BGSpin'); ?>"></script>
<script>
$(function(){
	BG.Spin.Viewer.Init(
		<?php echo json_encode($this->arrGameData); ?>
	);
});

</script>
<link rel='stylesheet' href='<?php echo __ASSETS_CSS__; ?>/BG.css' />
<div id='divMain' class='container-fluid'>
	<div class='row'>
		<div class='span4'>
			<h1 id='divHello_viewer_h1'>Welcome to </h1>
			<h4 class='bg-bartender'>...</h4>
			<h5>Players:</h5>
			<div class='bg-players'></div>
			
		</div>
		<div class='span7'>	
			<h1>Specials</h1>			
			<div class='bg-options'></div>
		</div>
	</div>
</div>
<div id='divWaiting' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90%;'>
			<h1>Loading...</h1>
			
			
		</div>
	</div>
</div>
<div id='divPlaying' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90%;'>
			<h1 id='bg-curr-special'>Current Special</h1>
			<h3 class='bg-timer'>Time</h3>

		</div>
	</div>
</div>
<?php require_once(__VIEW_ACTIVE_APP_DIR__ . '/www/_game_footer.tpl.php'); ?>