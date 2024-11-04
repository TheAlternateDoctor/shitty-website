function fillPics() {
    //Results of like, a query or smth
    pics = [{
        "src":"gallery/diode/Headshots/Isaiah.png",
        "height":617,
        "width":753
    },{
        "src":"gallery/diode/Headshots/Kibynoa.png",
        "height":1555,
        "width":1900
    },{
        "src":"gallery/diode/Headshots/Me/FingerGuns.png",
        "height":1000,
        "width":1000
    },{
        "src":"gallery/diode/Headshots/Me/Simple.png",
        "height":1000,
        "width":1000
    },{
        "src":"gallery/diode/Headshots/Rustly.jpg",
        "height":1417,
        "width":1644
    },{
        "src":"gallery/diode/Misc/Me.png",
        "height":2000,
        "width":2000
    },{
        "src":"gallery/diode/Misc/Nick.png",
        "height":1440,
        "width":1080
    },{
        "src":"gallery/diode/Ref Sheet.png",
        "height":1600,
        "width":3000
    }]

    html = ""
    gallery = document.getElementById("gallery")
    totalHeight = window.innerHeight
    maxHeight = totalHeight * 0.15
    pics.forEach(pic => {
        width = pic.width * (maxHeight/pic.height)
        html += "<img src='" + pic.src + "' class='gallery-pic' height='"+maxHeight+"' width='"+width+"'/>"
    });

    gallery.innerHTML = html

}