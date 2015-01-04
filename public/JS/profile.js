$('.submit1').click(function () {
    var name = $('.name').val();
    var com = $('.com').val();
    var phone = $('.phone').val();
    var address = $('.address').val();
    if (name !== '')
    {
        $.ajax({
            url: baseUrl + 'backend/index/action?profile1',
            type: 'POST',
            data: {name: name, com: com, phone: phone, address: address},
            success: function (data)
            {
                $('.save-error').css({"display": "none"});
                $('.save-success').css({"display": "inline-block"});
                setTimeout("location.reload(true);", 2000);
            }
        });
    } else
    {
        $('.save-error').css({"display": "block"});
    }
});
$('.submit2').click(function () {
    var oldpass = $('.oldpass').val();
    var pass1 = $('.pass1').val();
    var pass2 = $('.pass2').val();
    if (oldpass != '' && pass1 != '' && pass2 != '' && pass1 === pass2)
    {
        $.ajax({
            url: baseUrl + 'backend/index/action?profile2',
            type: 'POST',
            data: {old: oldpass, pass: pass1},
            success: function (data)
            {
                if (data !== "false")
                {
                    $('.pass-error').css({"display": "none"});
                    $('.pass-success').css({"display": "inline-block"});
                    setTimeout("location.reload(true);", 2000);
                } else
                {
                    $('.pass-error').css({"display": "block"});
                }
            }
        });
    } else
    {
        $('.pass-error').css({"display": "block"});
    }
});