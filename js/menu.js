function mpHover(action, point) {
    if(action) {
        document.getElementById(point).style.color = "#aaa";
    } else {
        document.getElementById(point).style.color = "#000";
    }
}