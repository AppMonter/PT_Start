var count = 0;

document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0){
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://www.cybermagonline.com/upload/1634294533-platin-bili-im-g-rsel-2.jpg";
        document.getElementById("demo").appendChild(img);
    }
}