function imageEmptyCheck() {
    var file = document.getElementById("myfile").files.length;
    if(file != 0) {
        var button = document.getElementById("submit");
        button.disabled = false;
        button.style.background='#4CAF50';
    }else {
        var button = document.getElementById("submit")
        button.disabled = true;
        button.style.background='#555555';
    }
}