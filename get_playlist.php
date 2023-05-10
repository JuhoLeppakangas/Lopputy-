<?php
include 'index.php';

$playlist_id = 1;
$sql = "SELECT tracks.Name, tracks.Composer FROM tracks 
        INNER JOIN playlist_track ON tracks.TrackId = playlist_track.TrackId 
        WHERE playlist_track.PlaylistId = :playlist_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':playlist_id', $playlist_id);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['Composer'] . " - " . $row['Name'] . "<br>";
}