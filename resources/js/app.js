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
    var form_card = el.parentElement.parentElement
    console.log('clicking it, yo', form_card)
    // console.log(el)
    if(form_card.classList.contains('collapsed')) {
        form_card.classList.remove('collapsed')
        el.innerHTML = '&#8722'
    } else {
        form_card.classList.add('collapsed')
        el.innerHTML = '&#x270E;'
    }
}