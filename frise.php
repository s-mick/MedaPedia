<html>
<head>
<title>Frise chronologique</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- Custom style properties overriding default CSS -->
<style>
    /* Taller time axis for better readability */
    .tl-timeaxis-background{height:64px !important;}
    .tl-timeaxis{height:64px !important;}
    .tl-timeera{height:65px !important;}
    
    /* Bigger era labels and headline dates */
    .tl-timeera-text h2.tl-headline{line-height: 15px !important; font-size: 12px !important;}
    h3.tl-headline-date{font-size: 20px !important;}
    
    
    /* Custom color codes for eras */
    .tl-timeera-background{background-color:#6f90b6 !important;}.tl-timeera.tl-timeera-color0 /* Maaduga > Bleu */
    .tl-timeera-background{background-color:#999999 !important;}.tl-timeera.tl-timeera-color1 /* ?? */
    .tl-timeera-background{background-color:#bab887 !important;}.tl-timeera.tl-timeera-color2 /* Nomades > Beige */
    .tl-timeera-background{background-color:#539843 !important;}.tl-timeera.tl-timeera-color3 /* Tribus > Vert */
    .tl-timeera-background{background-color:#c66f55 !important;}.tl-timeera.tl-timeera-color4 /* Royaumes > Rouge */
    .tl-timeera-background{background-color:#b6ad55 !important;}.tl-timeera.tl-timeera-color4 /* Razhiga > Or */
</style>
</head>
<body>
<!-- 1 -->
<link title="timeline-styles" rel="stylesheet" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">

<!-- 2 -->
<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
<div id='timeline-embed' style="width: 100%; height: 100%"></div>

<!-- 3 -->
<?php
$valid_ids = array('main', '1gs');
if (isset($_GET['id']) && in_array($_GET['id'], $valid_ids) )
    $id = $_GET['id'];
else
    $id = 'main';
?>
<script type="text/javascript">
    function loadJSON(callback, src) {
        var xhr = new XMLHttpRequest();
        xhr.overrideMimeType("application/json");
        xhr.open('GET', src, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == "200") {
              callback(xhr.responseText);
            }
        };
        xhr.send(null);
    }
    
    function setTimeline(data) {
        var timeline_json = JSON.parse(data);
        window.timeline = new TL.Timeline('timeline-embed', timeline_json, options);
    }
    
    var srcpath = 'https://raw.githubusercontent.com/s-mick/MedaPedia/master/<?php echo $id; ?>.json';
    var options = {
        scale_factor: 1,
        slide_padding_lr: 50,
        timenav_height_percentage: 40,
        marker_height_min: 60,
        optimal_tick_width: 150,
        language: "fr",
        script_path: "https://raw.githubusercontent.com/s-mick/MedaPedia/master"
    }
    
    loadJSON(setTimeline, srcpath);
</script>
</body>