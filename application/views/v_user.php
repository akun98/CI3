<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter</h1>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Jenis Kelamin</th>
			<th>No Hp</th>
			<th>Alamat</th>
		</tr>
		<?php foreach($biodata as $u){ ?>
		<tr>
			<td><?php echo $u->id_bio ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->nim ?></td>
			<td><?php echo $u->jk ?></td>
			<td><?php echo $u->no_hp ?></td>
			<td><?php echo $u->alamat ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>