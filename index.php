<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>komentar Ajax</title>
	<script src="jquery-3.2.1.min.js"></script>

	<style media="screen">
		*{
			font-family: 15px; font-family: sans-serif;
		}
		body{
			width: 80%; margin: 10% auto;
		}
	</style>
</head>
<body>
	<h1>Artikel Bukakelas.id</h1>
	<p> Ini isi artikelnya</p>

	<textarea name="textarea_komentar" id="textarea_komen" cols="40" rows="8"></textarea>
	<input type="submit" name="subit_komen" id="subit_komen" value="submit">

	<div id="komentar_wrapper">
		<?php 

			include_once 'database.php';
			$query = "SELECT * FROM komentar";
			$comments = mysqli_query($link, $query);

			foreach ($comments as $coment) {?> 
				
			<p><?=$coment['isi_komentar'];  ?></p>

			<?php } ?>
		 
	</div>

	<script type="text/javascript">
		
		$('#subit_komen').on('click',function() {
			var isi = $('#textarea_komen').val();
			$.ajax({
			  method: "POST",
			  url: "komentar_ajax.php",
			  data: { isi_komentar: isi },
			  success : function(data){
			  	if(data== '0'){
			  		alert("anda harus login!")
			  	}else{
			  		$('#komentar_wrapper').prepend(data);
			  	}
			  }
			});
		});
	</script>
</body>
</html>