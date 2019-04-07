<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:700" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
  <!-- Header Menu-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background:linear-gradient(rgba(79, 172, 254, 0.8) 0%, rgba(0, 242, 254, 0.8) 100%)">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home</a>
	  <a class="nav-item nav-link" href="/url-shortner/history.php">History</a>
    </div>
  </div>
</nav>
  <!--Header Menu-->
    <div class="s012">
      <form id="url_shortner_form">
        <fieldset>
          <legend>URL Shortner</legend>
        </fieldset>
        <div class="inner-form">
          
          <div class="main-form" id="main-form">
            <div class="row">
              <div class="input-wrap" style="width: 100%;">
                
                <div class="input-field">
                  <input type="text" class="long_url" name="long_url" placeholder="Put Long URL" />
                </div>
              </div>
            </div>
            <div class="row last">
              <button class="btn-search shorten_url" type="button">Shorten the URL</button>
            </div>
			<div class="row" id="short_url_container" style="display:none">
              <div class="input-wrap" style="height: 90px;">
               <div class="input-field">
                  <label style="width: 70%;">Short URL</label>
                  <input type="text" class="short_url" readonly style="width: 70%;float: left;">
				  <a href="#" onclick="myFunction()" class="btn-search copy_btn" style="padding: 13px;text-decoration: none;float: right;">Copy text</a>
                </div>
              </div>
            </div>
			
          </div>
        </div>
      </form>
    </div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(".shorten_url").click(function(e){
		e.preventDefault();
		var url = $('.long_url').val();
		$.ajax({
			url: "shortning_process.php",
			data: {url: url},
			type: 'post',
			dataType: 'json',
			success: function(data){
				console.log(data);
				$("#short_url_container").css('display','block');
				$(".short_url").val('');
				$(".short_url").val(data.short_url);
			}
		});
	});
	
	function myFunction() {
	 /* Get the text field */
	  var copyText = $('.short_url');

	  /* Select the text field */
	  copyText.select();

	  /* Copy the text inside the text field */
	  document.execCommand("copy");
	  $('.copy_btn').text("Copied!")
	}

	</script>
  </body>
</html>
