(function () {

    document.querySelectorAll(".card-status-bar.error")
        .forEach(function(el){
            setTimeout(function(){
                console.log('Doing the things')
                el.style.backgroundColor = "rgb(191, 66, 66)";
                el.style.color = "#000000";
            },100)
        });

    document.querySelectorAll(".card-status-bar.success")
        .forEach(function(el){
            setTimeout(function(){
                el.style.backgroundColor = "rgb(66, 191, 66)";
                el.style.color = "#000000";
            },100)
        });
})();

window.toggle_form_groups = function (el){
    console.log(el)
    if(el.classList.contains('collapsed')) {
        el.classList.remove('collapsed')
        el.querySelectorAll('.click')[0].innerHTML = '&#8722;'
    } else {
        el.classList.add('collapsed')
        el.querySelectorAll('.click')[0].innerHTML = '&#43;';
        console.log(el.querySelectorAll('.click'))
    }
}