<?php require_once(__VIEW_ACTIVE_APP_DIR__ . '/www/_header.tpl.php'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>:5033/socket.io/socket.io.js"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/MLC.Socket.js', 'MLCSocket'); ?>"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/App.js'); ?>"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/BG.Spin.js', 'BGSpin'); ?>"></script>
<script>
$(function(){
	BG.Spin.Bartender.Init(
		<?php echo json_encode($this->arrGameData); ?>
	);
});

</script>
<link rel='stylesheet' href='<?php echo __ASSETS_CSS__; ?>/BG.css' />

<div id='divHello' class='container-fluid'>
	<div class='row-fluid '>
		<div class='span12 well' style='text-align: center;'>
			<h1>Welcome Bartender</h1>
			<h3>What is your name?</h3>
			<input id='txtName' placeholder='Your Name' type='text' /><br/>
			<a id='lnkJoin' class='btn btn-large' href='#'>Start the Game</a>
			
		</div>
	</div>
</div>

<div id='divPregame' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90%'>
			<h1 id='hMainMessage'>Ready when you are!</h1>
			<h3 id='hSecondMessage'>Thanks for using bargamify.com</h3>
			<h4 class='bg-bartender'>...</h4>
			<h5>Players:</h5>
			<div class='bg-players'></div>
			<a id='lnkStart' href='#' class='btn btn-large'>
				Start the Game
			</a>
			
		</div>
	</div>
</div>
<div id='divWaiting' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90% position:relative;'>
			<h1 id='divSpinReady_bartender_h1'>Waiting for a player to spin</h1>
			<a id='lnkSkip' href='#' class='btn btn-large'>
				Skip to next Spin
			</a>	
			
			
		</div>
	</div>
</div>
<div id='divPlaying' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90% position:relative;'>
			<h1 class='bg-curr-special'>Current Special</h1>
			<h3 class='bg-time'>Time</h3>
			
			
		</div>
	</div>
</div>
<?php require_once(__VIEW_ACTIVE_APP_DIR__ . '/www/_game_footer.tpl.php'); ?>
<?php require_once(__VIEW_ACTIVE_APP_DIR__ . '/www/_footer.tpl.php'); ?>