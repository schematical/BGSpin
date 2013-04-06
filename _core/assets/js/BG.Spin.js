if(typeof BG == 'undefined'){
	window.BG = BG = {};
}
BG.Spin = {
	objSettings:{},
	Player:{
		Init:function(objSettings){
			
			 BG.Spin.objSettings = objSettings;
			 BG.Spin.ActiveRoll = this;
			  function lnkSpin_click(objEvent){
			  		MLC.Socket.Conn.emit(
						'bg-spin',
						"I am spinning!"
					);
			  }
			  $('#lnkSpin').click(lnkSpin_click);  
			 
			  function lnkJoin_click(objEvent){ 		  	  
			  	  BG.SetCookie('name', $('#txtName').val()); 
			  	  BG.Spin.Connect();
			  	  BG.Show('#divWaiting');
			  }
			  $('#lnkJoin').click(lnkJoin_click);
			 
			  
			  if(BG.GetCookie('name') != null){
			  	 BG.Spin.Connect();
			  	 BG.Show('#divWaiting');
			  }else{
				 $('#txtName').focus();
				 $('#txtName').val(BG.GetCookie('name'));
				 BG.Show('#divHello');
			 }
		},
		onUpdate:function(objData){
			BG.Show(BG.Spin.ModeEles[objData.mode]);
		}
	},
	Bartender:{
		Init:function(objSettings){
			 BG.Spin.objSettings = objSettings;
			 BG.Spin.ActiveRoll = this;
			  function lnkStart_click(objEvent){
			  		MLC.Socket.Conn.emit(
						'bg-start-game',
						"Game on!"
					);
			  }
			  $('#lnkStart').click(lnkStart_click);  
			 
			  function lnkJoin_click(objEvent){ 		  	  
			  	  BG.SetCookie('name', $('#txtName').val()); 
			  	  BG.Spin.Connect();
			  	  BG.Show('#divWaiting');
			  }
			  $('#lnkJoin').click(lnkJoin_click);
			 
			  
			  if(BG.GetCookie('name') != null){
			  	 BG.Spin.Connect();
			  	 BG.Show('#divWaiting');
			  }else{
				 $('#txtName').focus();
				 $('#txtName').val(BG.GetCookie('name'));
				 BG.Show('#divHello');
			 }
		},
		onUpdate:function(objData){
			BG.Show(BG.Spin.ModeEles[objData.mode]);
		}
	},
	Viewer:{
		Init:function(objSettings){
			 BG.Spin.objSettings = objSettings;
			 BG.Spin.ActiveRoll = this;
		  	 BG.Spin.Connect();
		  	 BG.Show('#divWaiting');
			 
		},
		onUpdate:function(objData){
			BG.Show('#divMain');
		}
	},
	onUpdate:function(objData){
		BG.Spin.RenderPlayers(objData);
		BG.Spin.RenderMessages(objData);
		BG.Spin.RenderOptions(objData);
		BG.Spin.ActiveRoll.onUpdate(objData);
		if(BG.Spin.strLastMode != objData.mode){
			BG.Spin.strLastMode = objData.mode;
			if(BG.Spin.strLastMode == 'playing'){
			 	BG.Spin.intAnimateSpeed = 50;
				
			}
		}else{
			BG.Spin.intAnimateSpeed = 2000;
		}
		BG.Spin.Animate();
		
		
		BG.Spin.intTimeLeft = objData.time_left;		
	},
	Animate:function(){
		if(BG.Spin.intAnimateSpeed < 1000){
			if($('.bg-curr-option-highlight').length != 0){
				var jNext = $('.bg-curr-option-highlight').removeClass('bg-curr-option-highlight').next()
				if(jNext.length == 0){
					var jColl = $('.bg-option-row > div');
					var jNext = $(jColl[0]);
				}
			}else{
				var jColl = $('.bg-option-row > div');
				var jNext = $(jColl[0]);
			}
			jNext.addClass('bg-curr-option-highlight');
			
			if(BG.Spin.intAnimateSpeed< 900){
				setTimeout(BG.Spin.Animate, BG.Spin.intAnimateSpeed);
				BG.Spin.intAnimateSpeed += 10;		
			}else{
				if(!$('.bg-curr-option').hasClass('bg-curr-option-highlight')){
					setTimeout(BG.Spin.Animate, BG.Spin.intAnimateSpeed);
				}
				
			}
		}else{
			$('.bg-curr-option').addClass('bg-curr-option-highlight')
		}
	},
	Connect:function(){
		 MLC.Socket.Init(
		 	BG.Spin.objSettings,
		 	this	
		 );
		 MLC.Socket.Conn.on('bg-game-update', BG.Spin.onUpdate);
	},
	Handshake:function(objMessage){
		var objData = {
			'venue':BG.Spin.objSettings.venue,
			'name':BG.GetCookie('name'),
			'roll':BG.Spin.objSettings.roll,
			'utma':BG.GetCookie('__utma')
		};
		return objData
	},
	ModeEles:{
		'pregame':'#divPregame',
		'waiting':'#divWaiting',
		'playing':'#divPlaying',
		//'spin-ready':'#divSpinReady',
		'your_turn': '#divYourTurn'
	},
	RenderMessages:function(objData){
		if(typeof objData.next != 'undefined'){			
			$('#divSpinReady_h1').text('Waiting for ' + objData.next.name + ' to spin');
			$('#divSpinReady_bartender_h1').text('Waiting for ' + objData.next.name + ' to spin');
		}
		if(typeof objData.curr_opt != 'undefined'){
			var jColl = $('.bg-curr-special');
			for(var i = 0; i < jColl.length; i++){
				$(jColl[i]).text(objData.curr_opt.shortDesc);
			}
		}
		if(typeof objData.venu != 'undefined'){
			$('#divHello_viewer_h1').text('Welcome to ' + objData.venu.shortDesc);
		}
	},
	Timer:function(){
		if(typeof BG.Spin.intTimeLeft != 'undefined'){
			BG.Spin.intTimeLeft -= 1;
			if(BG.Spin.intTimeLeft > 0){
				var intMinutes = Math.floor(BG.Spin.intTimeLeft/60);
				var strSeconds = new String(BG.Spin.intTimeLeft%60);
				if(strSeconds.length < 2){
					strSeconds = '0' + strSeconds;
				}
				var jColl = $('.bg-timer');
				for(var i = 0; i < jColl.length; i++){			
					$(jColl[i]).text(intMinutes + ':' + strSeconds);
				}
			}
		}
		setTimeout(BG.Spin.Timer, 1000);
	},
	RenderPlayers:function(objData){
		objPlayers = objData.players;
		var strHtml = '<ul>';
		for(var i in objPlayers){
			if(
				(typeof objData.next != 'undefined') &&
				(objPlayers[i].utma == objData.next.utma)
			){
				strHtml += '<li class="bg-next alert alert-success">';
			}else{
				strHtml += '<li class="alert alert-info">';
			}
			strHtml += objPlayers[i].name;
			strHtml += '</li>';				
		}
		strHtml += '</ul>';
		var jColl = $('.bg-players');
		for(var i = 0; i < jColl.length; i++){
			$(jColl[i]).html(strHtml);
		}
		if(typeof(objData.bartender) != 'undefined'){
			//Render Bartender
			$('.bg-bartender').text(objData.bartender.name);
		}
	},
	RenderOptions:function(objData){
		objOptions = objData.options;
		var strHtml = '<div class="bg-option-row row">';
		for(var i in objOptions){
			if(
				(typeof objData.curr_opt != 'undefined') &&
				(objOptions[i].idSpinOption == objData.curr_opt.idSpinOption)
			){
				strHtml += '<div class="span7 well bg-curr-option">';
			}else{
				strHtml += '<div class="span7 well">';
			}
			strHtml += objOptions[i].shortDesc;
			strHtml += '</div>';				
		}
		strHtml += '</div>';
		var jColl = $('.bg-options');
		for(var i = 0; i < jColl.length; i++){
			$(jColl[i]).html(strHtml);
		}
		
	}

};
BG.Spin.Timer();