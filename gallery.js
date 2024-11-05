function fillPics() {
    //Results of like, a query or smth
    fetch("gallery.php")
    .then(response => response.text())
    .then(data => {
        pics = JSON.parse(data)
        html = ""
        gallery = document.getElementById("gallery")
        totalHeight = window.innerHeight
        maxHeight = totalHeight * 0.15
        pics.forEach(pic => {
            width = pic.width * (maxHeight/pic.height)
            html += "<img src='" + pic.src + "' class='gallery-pic' height='"+maxHeight+"' width='"+width+"'/>"
        });
    
        gallery.innerHTML = html
    });

}