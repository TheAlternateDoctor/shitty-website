selectedTags = []

function fillPics() {
    //Results of like, a query or smth
    uri = "gallery.php"
    if(selectedTags.length > 0){
        tagList = ""
        selectedTags.forEach(element => {
            tagList=element+","
        });
        tagList.substring(0, tagList.length-1)
        uri+="?tags="+tagList
    }

    fetch(uri)
    .then(response => response.text())
    .then(data => {
        pics = JSON.parse(data)
        html = ""
        gallery = document.getElementById("gallery")
        totalHeight = window.innerHeight
        totalWidth = window.innerWidth
        if(totalHeight<totalWidth){
            maxHeight = totalHeight * 0.15
        } else {
            maxHeight = totalWidth * 0.15
        }
        pics.forEach(pic => {
            width = pic.width * (maxHeight/pic.height)
            html += "<a href='image.php?id=" + pic.id + "'><img src='" + pic.src + "' class='gallery-pic' height='"+maxHeight+"' width='"+width+"'/></a>"
        });
    
        gallery.innerHTML = html
    });
}

function addTag(tag){
    selectedTags.push(tag)
    document.getElementById(tag).setAttribute("onclick", "removeTag('"+tag+"')")
    fillPics();
}

function removeTag(tag){
    index = selectedTags.indexOf(tag);
    selectedTags.splice(index, 1);
    document.getElementById(tag).setAttribute("onclick", "addTag('"+tag+"')")
    fillPics();
}