// JavaScript Document
var baseUrl = "http://localhost/ci/";
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validateUsername(user)
{
	if(user.length <= 6)
	{
		return false;
	}else
	{
		var c = false;
		for(var i =0; i<user.length ; i++)
		{
			if(user[i] == " ")
			{
				c = false;
				break;
			}else
			{
				c = true;
				continue;
			}
		}
		return c;
	}
}
function validateString(string)
{
    if(string.length == 0)
    {
        return false;
    }else
    {
        c = 0;
        for(i = 0; i < string.length ; i++)
        {
            if( string[i] != ' ')
            {
                c++;
            }
        }
        if(c != 0)
        {
            return true;
        }else
        {
            return false;
        }
    }
}
function validateStreamname(name)
{
	if(name.length <= 1)
	{
		return false;
	}else
	{
		var c = false;
		for(var i =0; i<name.length ; i++)
		{
			if(name[0] == " ")
			{
				c = false;
				break;
			}else
			{
				c = true;
				continue;
			}
		}
		return c;
	}
}
function validatePass(pass)
{
	if(pass.length <= 6)
	{
		return false;
	}else
	{
		return true;
	}
}
function validateFullname(fullname)
{
	if(fullname.length <= 10)
	{
		return false;
	}else
	{
		return true;
	}
}
function loadSuccess(s)
{
		s.parent().removeClass('has-error');
		s.parent().find('span').removeClass('glyphicon-remove');
		s.parent().addClass('has-success');
		s.parent().find('span').addClass('glyphicon-ok').css({"display":"block"});
}
function loadError(s)
{
		s.parent().addClass('has-error');
		s.parent().removeClass('has-success');
		s.parent().find('span').removeClass('glyphicon-ok');
		s.parent().find('span').addClass('glyphicon-remove').css({"display":"block"});
}
function resetAlert(s)
{
		s.parent().find(':input').val('');
		s.parent().removeClass('has-error');
		s.parent().find('span').removeClass('glyphicon-remove');
		s.parent().removeClass('has-success');
		s.parent().find('span').removeClass('glyphicon-ok');
}
function loadingImage(s)
{
	var img = '<div class="loading"><img src="'+baseUrl+'/public/Images/Preloader_3.gif" /></div>';
	$(img).insertBefore(s);
	s.css({"display":"none"});
	setInterval(function(){
	$('.loading').fadeOut();	
	s.fadeIn();
	},1000);
}