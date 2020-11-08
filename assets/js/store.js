if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }


}


function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    let button = event.target
    let shopItem = button.parentElement
    let title = shopItem.getElementsByClassName('product-info')[0].innerText
    let price = shopItem.getElementsByClassName('product-price')[0].innerText
    addItemToCart(title, price)
    updateCartTotal()
}

function addItemToCart(title, price) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText === title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
        //cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}

function updateCartTotal() {
    let cartItemContainer = document.getElementsByClassName('cart-items')[0];
    let cartRows = cartItemContainer.getElementsByClassName('cart-row');
    let total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        //var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        //var quantity = quantityElement.value;
        total = total + price;
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total;
}

function validate() {
    let name = document.getElementById("name").value;
    let subject = document.getElementById("subject").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;
    let error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    let text;
    if (name.length < 2) {
        text = "Please Enter valid Name";
        error_message.innerHTML = text;
        return false;
    }
    if (subject.length < 3) {
        text = "Please Enter Correct Subject";
        error_message.innerHTML = text;
        return false;
    }
    if (isNaN(phone) || phone.length != 10) {
        text = "Please Enter valid Phone Number";
        error_message.innerHTML = text;
        return false;
    }
    if (email.indexOf("@") == -1 || email.length < 6) {
        text = "Please Enter valid Email";
        error_message.innerHTML = text;
        return false;
    }
    if (message.length <= 20) {
        text = "Please Enter More Than 20 Characters";
        error_message.innerHTML = text;
        return false;
    }
    alert("Message Submitted Successfully!");
    return true;
}

function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
            case "add":
                queryString = 'action=' + action + '&code=' + product_code +
                    '&quantity=' + $("#qty_" + product_code).val();
                break;
            case "remove":
                queryString = 'action=' + action + '&code=' + product_code;
                break;
            case "empty":
                queryString = 'action=' + action;
                break;
        }
    }
    jQuery.ajax({
        url: "ajax-action.php",
        data: queryString,
        type: "POST",
        success: function(data) {
            $("#cart-item").html(data);
            if (action == "add") {
                $("#add_" + product_code + " img").attr("src",
                    "images/icon-check.png");
                $("#add_" + product_code).attr("onclick", "");
            }
        },
        error: function() {}
    });
}

$(document).ready(function() {
    $(document).on('keyup', '#list_search', function() {
        var value = $(this).val();
        $.getJSON('ajax_search_list.php?q=' + value, function(data) {
            var availableTags = data;
            $("#list_search").autocomplete({
                source: availableTags,
                select: function(event, ui) {
                    $(event.target).val(ui.item.value);
                    $('#search_form').submit();
                    return false;
                },
            });
        });
    });
});
$(document).ready(function() {
    $("").click(function() {
        location.reload(true);
    });
});

$(document).ready(function() {
    $('#submit').click(function() {
        var image_name = $('#image').val();
        if (image_name == '') {
            alert("Please Select Image");
            return false;
        } else {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert('Invalid Image File');
                $('#image').val('');
                return false;
            }
        }
    });
});

$('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})