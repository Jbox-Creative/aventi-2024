/* eslint-disable */
export default (callback) => {
  if (typeof google === 'undefined') {
    console.log('Google Undefined! Time to load...');
    var script = document.createElement('script');
    script.onload = callback;
    script.src = googURL;
    document.head.appendChild(script);
  } else {
    console.log('Google already loaded!');
    callback();
  }
}
