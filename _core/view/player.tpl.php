<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>:5033/socket.io/socket.io.js"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/MLC.Socket.js', 'MLCSocket'); ?>"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/App.js'); ?>/BG/App.js"></script>
<script src="<?php echo MLCApplication::GetAssetUrl('/js/BG.Spin.js', 'BGSpin'); ?>"></script>
<script>
$(function(){
	BG.Spin.Player.Init(
		<?php echo json_encode($this->arrGameData); ?>
	);
});

</script>
<link rel='stylesheet' href='<?php echo __ASSETS_CSS__; ?>/BG.css' />
<div id='divHello' class='container-fluid'>
	<div class='row-fluid '>
		<div class='span12 well' style='text-align: center;'>
			<h1>Welcome</h1>
			<h3>What is your name?</h3>
			<input id='txtName' placeholder='Your Name' type='text' /><br/>
			<a id='lnkJoin' class='btn btn-large' href='#'>Join the Game</a>
			
		</div>
	</div>
</div>

<div id='divPregame' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90%'>
			<h1 id='hMainMessage'>Waiting...</h1>
			<h3 id='hSecondMessage'>Your bartender's name is</h3>
			<h4 class='bg-bartender'>...</h4>
			<h5>Players:</h5>
			<div class='bg-players'></div>
			<p>
				Waiting for the bartender to kick off the game
				
			</p>
			
			
			
		</div>
	</div>
</div>

<div id='divWaiting' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90% position:relative;'>
			<h1 id='divSpinReady_h1'>Waiting for another player to spin</h1>
				
			
			
		</div>
	</div>
</div>
<div id='divYourTurn' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90% position:relative;'>
			<h1 id='divSpinReady_h1'>Your turn</h1>
			<a id='lnkSpin' class='btn btn-large' >
				Spin the Wheel!
				
			</a>
		</div>
	</div>
</div>
<div id='divPlaying' class='container-fluid'>
	<div class='row-fluid'>
		<div class='span12 well' style='text-align: center; height:90% position:relative;'>
			<h1 class='bg-curr-special'>Current Special</h1>
			<h3 class='bg-timer'>Time</h3>
		</div>
	</div>
</div>
<?php require_once(__VIEW_ACTIVE_APP_DIR__ . '/www/_game_footer.tpl.php'); ?>