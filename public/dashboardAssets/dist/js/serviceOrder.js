$(document).ready(function () {

    //add product btn
    $('.add-service-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        $(this).addClass('disabled');

        var html =
            `<tr>
                <td class="text-center">${name}</td>
                <td class="text-center" ><input type="number" name="services[${id}][price]" class="form-control input-sm service-price"></td>
                <td class="text-center s-price"></td>
                <td class="text-center"><button class="btn btn-danger btn-sm remove-service-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.service-order-list').append(html);

        //to calculate total price
        calculateFinalPrice();
    });

    //disabled btn
    $('body').on('click', '.disabled', function (e) {

        e.preventDefault();

    }); //end of disabled

    //remove product btn
    $('body').on('click', '.remove-service-btn', function (e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#maintenance_service-' + id).removeClass('disabled').addClass('btn-success');

        //to calculate total price
        calculateFinalPrice();

    }); //end of remove product btn

    //change product quantity
    $('body').on('keyup change', '.service-price', function () {

        var price = parseFloat($(this).val()); //2
        //console.log(price);
        $(this).closest('tr').find('.s-price').html($.number(price, 2));
        //$(this).html($.number(price));
        calculateFinalPrice();

    }); //end of product quantity change

    //list all order products
    $('.order-services').on('click', function (e) {

        e.preventDefault();

        $('#loading').css('display', 'flex');

        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function (data) {

                $('#loading').css('display', 'none');
                $('#order-service-list').empty();
                $('#order-service-list').append(data);

            }
        })

    }); //end of order products click


}); //end of document ready

//calculate the total
function calculateFinalPrice() {

    var price = 0;

    $('.service-order-list .s-price').each(function (index) {

        price += parseFloat($(this).html().replace(/,/g, ''));

    }); //end of product price

    $('.total-price').html(price);

    //check if price > 0
    if (price > 0) {

        $('#add-service-order-form-btn').removeClass('disabled')

    } else {

        $('#add-service-order-form-btn').addClass('disabled')

    } //end of else

} //end of calculate total