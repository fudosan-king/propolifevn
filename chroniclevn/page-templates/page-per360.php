<?php
/*Template Name: 360 Panorama - Page Template*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>360 VR Demo</title>

  <link rel="stylesheet" href="<?php echo TEMPLATE_DIR; ?>/my360/dist/photo-sphere-viewer.min.css">

  <style>
    html, body {
      width: 100%;
      height: 100%;
      overflow: hidden;
      margin: 0;
      padding: 0;
    }

    #photosphere {
      width: 100%;
      height: 100%;
    }

    .psv-button.custom-button {
      font-size: 22px;
      line-height: 20px;
    }
  </style>
</head>
<body>

<div id="photosphere"></div>

<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/three.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/CanvasRenderer.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/Projector.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/DeviceOrientationControls.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/three.js/StereoEffect.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/D.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/uevent.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/doT.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/js/NoSleep.min.js"></script>
<script src="<?php echo TEMPLATE_DIR; ?>/my360/dist/photo-sphere-viewer.min.js"></script>

<script>
  var PSV = new PhotoSphereViewer({
        panorama: 'https://chronicle.propolifevietnam.com/wp-content/uploads/2018/10/sample-pers360-copy.png',
        container: 'photosphere',
        loading_img: 'https://chronicle.propolifevietnam.com/wp-content/uploads/2018/06/cropped-android-chrome-256x256.png',
        // time_anim: false,
        navbar: [
          'autorotate', 
          'zoom', 
          // 'download', 
          // 'markers',
          'caption', 
          'gyroscope', 
          'stereo', 
          'fullscreen'
        ],
        default_fov: 75,
        caption: 'Estate 360 Demo &copy; Propolife Vietnam',
      });
</script>

<script>
  // document.write('<script src="//' + location.host.split(':')[0] + ':35729/livereload.js" async defer><' + '/script>');
</script>
</body>
</html>

