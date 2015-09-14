function viewSolarSystem(){
				$('div[name="center"]').html('');
                $.ajax({
                        type: "POST",
                        url: "http://onetask.konotop.org/ajax.base.php",
                        data: { action: 'viewSolarSystem' },
                        cache: false,
                        success: function(responce){ $('div[name="center"]').html(responce); }
                });
};

function viewPerson(){
				$('div[name="center"]').html('');
                $.ajax({
                        type: "POST",
                        url: "http://onetask.konotop.org/ajax.base.php",
                        data: { action: 'viewPerson' },
                        cache: false,
                        success: function(responce){ $('div[name="center"]').html(responce); }
                });
};

function viewPlanet(){
				$('div[name="center"]').html('');
                $.ajax({
                        type: "POST",
                        url: "http://onetask.konotop.org/ajax.base.php",
                        data: { action: 'viewPlanet' },
                        cache: false,
                        success: function(responce){ $('div[name="center"]').html(responce); }
                });
};

function viewScreen(){
	var val_check = $('select[name="element"]').val();
	$('div[name="center"]').html('');
    $.ajax({
        type: "POST",
        url: "http://onetask.konotop.org/ajax.base.php",
        data: { action: 'viewScreen' , val_check: val_check},
        cache: false,
        success: function(responce){ $('div[name="center"]').html(responce); }
    });
};