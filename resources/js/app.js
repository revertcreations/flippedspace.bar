(function () {

    document.querySelectorAll(".card-status-bar.error")
        .forEach(function(el) {
            setTimeout(function(){
                console.log('Doing the things')
                el.style.backgroundColor = "rgb(191, 66, 66)";
                el.style.color = "#000000";
            },100)
        });

    document.querySelectorAll(".card-status-bar.success")
        .forEach(function(el) {
            setTimeout(function(){
                el.style.backgroundColor = "rgb(66, 191, 66)";
                el.style.color = "#000000";
            },100)
        });
})();

window.toggle_form_groups = function (el) {
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

window.previous_listing_img = function (el) {

    var listing_images = el.previousElementSibling.previousElementSibling.children;
    var listing_images_delete = el.previousElementSibling.previousElementSibling.previousElementSibling.children;

    var current_index = null
    var new_index = null

    for (var i = 0; i < listing_images.length; i++) {

        if(listing_images[i].classList.contains('current-img'))
            current_index = i

        if(current_index != null) {
            if(current_index <= (listing_images.length - 1)) {
                if(current_index == 0) {
                    new_index = listing_images.length - 1
                } else {
                    new_index = current_index - 1
                }
            } else {
                new_index = current_index - 1
            }
            break;
        }
    }

    console.log('current_index', current_index)
    console.log('new_index', new_index)

    listing_images_delete[current_index].classList.remove('current-img-delete')
    listing_images_delete[new_index].classList.add('current-img-delete')

    listing_images[current_index].classList.remove('current-img')
    listing_images[new_index].classList.add('current-img')

}

window.next_listing_img = function (el) {

    var listing_images = el.previousElementSibling.children;
    var listing_images_delete = el.previousElementSibling.previousElementSibling.children;
    var current_index = null
    var new_index = null

    for (var i = 0; i < listing_images.length; i++) {

        if(listing_images[i].classList.contains('current-img'))
            current_index = i

        if(current_index != null) {
            if(current_index <= (listing_images.length - 1)) {
                if(current_index == listing_images.length - 1) {
                    new_index = 0
                } else {
                    new_index = current_index + 1
                }
            } else {
                new_index = current_index + 1
            }
            break;
        }
    }

    listing_images_delete[current_index].classList.remove('current-img-delete')
    listing_images_delete[new_index].classList.add('current-img-delete')

    listing_images[current_index].classList.remove('current-img')
    listing_images[new_index].classList.add('current-img')

}

window.toggle_user_nav = function (el) {
    var user_nav = document.getElementById('user_nav')

    if (user_nav.classList.contains('opened'))
        user_nav.classList.remove('opened')
    else
        user_nav.classList.add('opened')
}

window.post = function(url){
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            credentials: "same-origin"
        })
        .then(response => response.json())
        .then((data) => {
            console.log(data)
            let card = document.getElementById('artisan_card_'+data.catalog_key)
            let card_status_bar = document.getElementById('artisan_card_status_bar_'+data.catalog_key)
            if(card_status_bar) {
                card_status_bar.childNodes[0].innerHTML = data.message
                card_status_bar.classList.remove('hidden')
            }

            if(data.type && data.type == 'destroy')
                card.parentNode.removeChild(card)
        })
        .catch(function(error) {
            console.log(error);
        });
 }
