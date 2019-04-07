<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="fa-5.5.0/all.min.css">s
	<title></title>
	<style>
		body{
			background-color: black;
		}
		
		table{
			 padding:2px;
			 color: white;
			 border-collapse: collapse;



		}
		td{
			width: 30%;
			border-bottom: 1px solid grey;
		}
		.grey{
			color:grey;

		}
		.bottom{
			padding-bottom: 50px;
		}
		

	</style>
</head>
<body>
     <?php 
     $playlist = [
			25 => ['title' => 'No Fun', 'artist' => 'The Stooges', 'album' => 'The Stooges', 'date' => '2016-10-24', 'duration' => '5:16'],
			87 => ['title' => 'Hush', 'artist' => 'Deep Purple', 'album' => 'Shades of Deep Purple', 'date' => '2016-10-24', 'duration' => '5:27'],
			1524 => ['title' => 'Welcome To The Jungle', 'artist' => 'Guns N\' Roses', 'album' => 'Appetite For Destruction', 'date' => '2016-10-26', 'duration' => '4:34'],
			40 => ['title' => 'Paranoid', 'artist' => 'Black Sabbath', 'album' => 'Paranoid', 'date' => '2016-11-02', 'duration' => '2:47'],
			15 => ['title' => 'Holiday In Cambodia', 'artist' => 'Dead Kennedys', 'album' => 'Give Me Convenience Or Give Me Death', 'date' => '2016-11-03', 'duration' => '3:45'],
			821 => ['title' => 'I Fought The Law', 'artist' => 'The Clash', 'album' => 'Hits Back', 'date' => '2016-11-03', 'duration' => '2:43']
];
    echo "<table>"; 
    echo "<tr class='grey'>";  
    echo "<td class'bottom'>".("TITLE")."</td>";
    echo "<td class'bottom'>".("ARTIST")."</td>";
    echo "<td class'bottom'>".("ALBUM")."</td>";
    echo "<td><i class='fas fa-calendar-alt'></i></td>";
    echo "<td><i class='far fa-clock'></i></td>";
    echo "</tr>";  

  
   
   foreach ($playlist as $playlists) {
   	

   	 echo "<tr>";

		
     
			echo "<td>".$playlists["title"]."</td>";
			echo "<td>".$playlists["artist"]."</td>";
			echo "<td>".$playlists["album"]."</td>";
			echo "<td>".$playlists["date"]."</td>";
			echo "<td>".$playlists["duration"]."</td>";
			
			


	echo"<tr>";

		}
		
  echo "</table>";
	 ?>

</body>
</html>