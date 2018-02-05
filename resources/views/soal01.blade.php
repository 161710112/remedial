<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Data Mahasiswa</title>
		<!-- CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<style type="text/css"> body { padding-top:50px; } </style>
	</head>
	
		<body class="container">
		<div class="col-sm-8 col-sm-offset-2">
		<center><h3><small>One to Many</small></h3></center>
			@foreach ($dosen as $temp)
				<h3> <small>Nama Dosen: {{$temp->nama}}</small><br>
					<li>Nama Mahasiswa : 
					@foreach($temp->mahasiswa as $ute) 
					{{$ute->nama}}
					@endforeach
					</li>
					
</h3>
				</h4>
				<hr/>
			@endforeach
		</div>

	</body>
</html>
