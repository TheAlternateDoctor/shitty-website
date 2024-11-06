<?php
    $id = $_GET["id"];
    include_once("db.php");
    $image = $mysqli->query("SELECT * FROM img WHERE id=" . $id)->fetch_row();
    $tagsUnordered = $mysqli->query("SELECT tags.name FROM img_tag_link INNER JOIN tags ON tags.id = img_tag_link.tag_id WHERE img_tag_link.img_id = " . $id)->fetch_all();
    $tags = array();
    foreach ($tagsUnordered as $tag) {
        array_push($tags, $tag[0]);
    }
?>

<HTML>

<head>
    <title>Doc's website</title>
    <link href="style.css" rel="stylesheet">
    <script>
        fetch("includes/sidebar.html")
            .then(response => response.text())
            .then(data => {
                document.getElementById("sidebar").innerHTML = data;
            });

        fetch("includes/top.html")
            .then(response => response.text())
            .then(data => {
                document.getElementById("top").innerHTML = data;
            });

        fetch("includes/footer.html")
            .then(response => response.text())
            .then(data => {
                document.getElementById("footer").innerHTML = data;
            });
    </script>
</head>

<body onload="loadImg()">
    <div class="top" id="top"></div>
    <table class="table">
        <td class="sidebar">
            <div id="sidebar"></div>
        </td>
        <td class="main gallery">
            <table class="gallery">
                <td class="gallery-center">
                    <div id="img-full" class="center-text"></div>
                </td>
                <td class="gallery-tags center-text">
                    <div class="tags-gallery">
                        <h2>TAGS</h2>
                        <p>Drawn by: <?php echo $image[4]?></p>
                            
                        <p>Type: 
                        <?php 
                            if(in_array("sketch", $tags)){
                                echo "Sketch";
                            } else if(in_array("unshaded", $tags)){
                                echo "Simple";
                            } else {
                                echo "Full";
                            }
                        ?></p>
                        <?php
                            $ocs = array(
                                "camp",
                                "cathode",
                                "diode",
                                "matt",
                                "thierry",
                            );
                            $imageOcs = array_intersect($ocs, $tags);
                            if($imageOcs){
                                $lineName = "OC".(count($imageOcs)>1?"s":"");
                                echo "<p>$lineName: ";
                                $lineOc = "";
                                foreach ($imageOcs as $ocName) {
                                    $lineOc .= ucfirst($ocName).", ";
                                }
                                echo substr($lineOc, 0, -2);
                                
                            }
                        ?>
                    </div>
                </td>
            </table>
        </td>
        <div class="sticky-socials footer" id="footer"></div>
    </table>

    <?php
        echo "<input type=hidden value='$image[1]' id='img-src'></input>";
        echo "<input type=hidden value='$image[2]' id='img-width'></input>";
        echo "<input type=hidden value='$image[3]' id='img-height'></input>";
    ?>

    <script>
        function loadImg() {
            imageSource = document.getElementById("img-src").value;
            imageWidth = document.getElementById("img-width").value;
            imageHeight = document.getElementById("img-height").value; totalHeight = window.innerHeight
            totalWidth = window.innerWidth
            if (totalHeight < totalWidth) {
                maxHeight = totalHeight * 0.50
            } else {
                maxHeight = totalWidth * 0.50
            }
            width = imageWidth * (maxHeight / imageHeight)
            // document.getElementById("img-full").innerHTML  += "<img src='" + imageSource + "' class='gallery-pic' height='"+maxHeight+"' width='"+width+"'/>"
            document.getElementById("img-full").innerHTML += "<img src='" + imageSource + "' class='gallery-pic gallery-pic-solo' />"
        }
    </script>

</body>

</HTML>