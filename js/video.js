// Replace 'YOUR_API_KEY' with your actual YouTube Data API key
const API_KEY = 'AIzaSyCqlGvY0i3IN8KygHxt4j0JiwW_SJtP_wg';

// The YouTube playlist ID you want to fetch videos from
const PLAYLIST_ID = 'PLkgf3F2zyuJQqO3509YIxhF3xDeVbdkT5';

// The number of videos to display
const MAX_RESULTS = 5;

// Function to fetch and display YouTube videos from a playlist
function fetchYouTubeVideos() {
  gapi.client.init({
    'apiKey': API_KEY,
    'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
  }).then(function () {
    return gapi.client.youtube.playlistItems.list({
      part: 'snippet',
      playlistId: PLAYLIST_ID,
      maxResults: MAX_RESULTS,
    });
  }).then(function (response) {
    const videosContainer = document.getElementById('videos-container');
    videosContainer.innerHTML = ''; // Clear previous content

    const videos = response.result.items;
    videos.forEach(function (video) {
      const videoId = video.snippet.resourceId.videoId;
      const title = video.snippet.title;
      const thumbnailUrl = video.snippet.thumbnails.default.url;

      // Create video element
      const videoElement = document.createElement('div');
      videoElement.innerHTML = `
                <iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
                <h3>${title}</h3>
            `;

      // Append video element to the container
      videosContainer.appendChild(videoElement);
    });
  }, function (error) {
    console.error('Error loading YouTube API', error);
  });
}

// Load the YouTube API client library
gapi.load('client', fetchYouTubeVideos);
