<?php include 'index.php';


$artist_id = 1;

// Haetaan artistin nimi
$query = "SELECT Name FROM artists WHERE ArtistId = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$artist_id]);
$albums1 = $stmt->fetch(PDO::FETCH_ASSOC);

// Haetaan artistin albumit ja kappaleet
$query = "SELECT albums.Title AS album_title, tracks.Name AS track_name   
            FROM albums 
            JOIN tracks ON albums.AlbumId = tracks.AlbumId 
            WHERE albums.ArtistId = ?;
            ORDER BY albums.Title";

$stmt = $conn->prepare($query);
$stmt->execute([$artist_id]);
$albums2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = array(
    "artist" => $albums1,
    "albums" => array()
);

foreach ($album as $album) {
    if ($current_album != $album["album_title"]) {
        $result["albums"][$album["album_title"]] = array();
        $curret_album = $album["album_title"];
    }
    $result["albums"][$album["album_title"]][] = $album["track_name"];
}

$response = array(
    "artist_name" => $albums1,
    "albums" => $albums2
);

echo json_encode($response);
