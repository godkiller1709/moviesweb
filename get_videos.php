<?php

// Specify the path to the folder containing the videos
$videoFolder = 'videos/';

// Get all files in the video folder
$videoFiles = scandir($videoFolder);

// Filter out non-video files (you may want to adjust this based on your video file extensions)
$videoFiles = array_filter($videoFiles, function ($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'mp4'; // Change 'mp4' to the desired video file extension
});

// Convert the file names to the complete path
$videoFiles = array_map(function ($file) use ($videoFolder) {
    return $videoFolder . $file;
}, $videoFiles);

// Send the list of video files as a JSON response
header('Content-Type: application/json');
echo json_encode($videoFiles);

?>
