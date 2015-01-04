<a class="inline" href="#inline_content"><button class="btn-icon btn-icon-create"><i class="icon-create"></i></button></a>&nbsp;<a class="inline" href="#inline_content-1"><button class="btn-icon btn-icon-del"><i class="icon-del"></i></button></a>
<table id="example" class="display listusers" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><div class="checkbox">
                  <div class="icheckbox_flat" style="position: relative;"><input type="checkbox" id="flat-checkbox-2" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                  <label for="flat-checkbox-2" class="select-all">Select all</label>
                </div></th>
            <th>Username</th>
            <th>Group</th>
            <th>Active</th>
            <th>Datecreated</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Group</th>
            <th>Active</th>
            <th>Datecreated</th>
        </tr>
    </tfoot>
 
    <tbody>
    </tbody>
</table>
<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
            <label class="form-title">Add User</label>
			<div class="form-group has-success has-feedback">
                  <input type="text" class="form-control username" id="inputSuccess2" placeholder="Username">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
            <div class="form-group has-success has-feedback">
                  <input type="password" class="form-control password1" id="inputSuccess2" placeholder="Password">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
             <div class="form-group has-success has-feedback">
                  <input type="password" class="form-control password2" id="inputSuccess2" placeholder="Comfirm password">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
             <div class="form-group has-success has-feedback">
                  <input type="email" class="form-control email" id="inputSuccess2" placeholder="Email">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
             <div class="form-group has-success has-feedback">
                  <input type="text" class="form-control fullname" id="inputSuccess2" placeholder="Fullname">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
             <div class="checkbox">
                  <div class="icheckbox_flat" style="position: relative;"><input value="1" class="active-user" type="checkbox" id="flat-checkbox-1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                  <label for="flat-checkbox-1">Active</label>
                </div> 
                <select class="form-control select-form group">
                </select> 
                <button type="button" class="btn btn-primary btn-block btn-save">Save</button>          
			</div>
            <!-- -->
            <div id='inline_content-1' style='padding:10px; background:#fff;'>
            <div class="alert alert-warning alert-dismissable">
              
            </div>   
			</div>
		</div>
<script>
$(document).ready(function() {
loadingImage($('.content'));
var group = {};
group.type ="group";
$.ajax({
		url : baseUrl+"/ws/index",
		type: "POST",
		data : {data : group},
		success: function(r)
		{
			var groupHTML = '<option class="selecter-item" value="1">Select group</option>';
			for(key in r)
			{
				groupHTML += '<option class="selecter-item" value="'+r[key]['id']+'">'+r[key]['name']+'</option>';
			}
			$('.group').html(groupHTML);
		}
});
var list = {};
list.type="listuser";
$.ajax({
		url : baseUrl+"/ws/index",
		type: "POST",
		data : {data : list},
		success: function(r)
		{
			var tableHTML = '';
			for(key in r)
			{
				if(r[key]['active'] == 0)
				{
					active = '<span class="label label-danger">Off</span>';
				}else
				{
					active = '<span class="label label-info">On</span>';
				}
				tableHTML +='<tr>'
							+'<td><input value="'+r[key]['id']+'" type="checkbox" class="item-checkbox" ></td><td>'+r[key]['username']+'</td><td>'+r[key]['name']+'</td>'
							+'<td>'+active+'</td><td>'+r[key]['datecreated']+'</td>'
							+'</tr>';
			}
			$('.listusers').find('tbody').html(tableHTML);
			$('#example tfoot th').each( function () {
				var title = $('#example thead th').eq( $(this).index() ).text();
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
				} );
			 
				// DataTable
				var table = $('#example').DataTable();
			 
				// Apply the filter
				table.columns().eq( 0 ).each( function ( colIdx ) {
					$( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
						table
							.column( colIdx )
							.search( this.value )
							.draw();
					} );
			} );
		}
});
    
} );
//colorbox
$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
//Form setting
var check = false;
$('.form-group').removeClass('has-success');
$('.form-group').find('.glyphicon').hide();
$('.email').keyup(function(even){
	var m = validateEmail($(this).val());
	if(m === false)
	{
		loadError($(this));
	}else
	{
		$(this).parent().removeClass('has-error');
		$(this).parent().removeClass('has-success');
		$(this).parent().find('span').removeClass('glyphicon-remove');
		$(this).parent().find('span').removeClass('glyphicon-ok');
		var filter = {};
		filter.type = "issetemail";
		filter.email = $(this).val();
		$.ajax({
		url : baseUrl+"/ws/index",
		type: "POST",
		data : {data : filter},
		success: function(r)
		{

			if(r == 0)
			{
				$('.email').parent().addClass('has-success');
				$('.email').parent().find('span').addClass('glyphicon-ok').css({"display":"block"});
				check = true;
			}else
			{
				$('.email').parent().addClass('has-error');
				$('.email').parent().find('span').addClass('glyphicon-remove').css({"display":"block"});
			}
		}
	  });
	}
});
$('.username').keyup(function(even){
	var m = validateUsername($(this).val());
	if(m === false)
	{
		loadError($(this));
	}else
	{		
		$(this).parent().removeClass('has-error');
		$(this).parent().removeClass('has-success');
		$(this).parent().find('span').removeClass('glyphicon-remove');
		$(this).parent().find('span').removeClass('glyphicon-ok');
		var filter = {};
		filter.type = "issetusername";
		filter.user = $(this).val();
		$.ajax({
		url : baseUrl+"/ws/index",
		type: "POST",
		data : {data : filter},
		success: function(r)
		{

			if(r == 0)
			{
				$('.username').parent().addClass('has-success');
				$('.username').parent().find('span').addClass('glyphicon-ok').css({"display":"block"});
				check = true;
			}else
			{
				$('.username').parent().addClass('has-error');
				$('.username').parent().find('span').addClass('glyphicon-remove').css({"display":"block"});
			}
		}
	  });
	}
});
$('.password1').keyup(function(even){
	var m = validatePass($(this).val());
	if(m === false)
	{
		loadError($(this));
	}else
	{		
		loadSuccess($(this));
		check = true;
	}
});
$('.password2').keyup(function(even){
	if($(this).val() !== $('.password1').val())
	{
		loadError($(this));
	}else
	{		
		loadSuccess($(this));
		check = true;
	}
});	
$('.fullname').keyup(function(even){
	var m = validateFullname($(this).val());
	if(m === false)
	{
		loadError($(this));
	}else
	{		
		loadSuccess($(this));
		check = true;
	}
});							
$('.btn-save').click(function(){
	if(check  == true)
	{
		var username = $('.username').val();
		var password = $('.password1').val();
		var email = $('.email').val();
		var fullname = $('.fullname').val();
		var active = $('.active-user').is(':checked');
		var group = $('.group').val();
		var insert = {};
		insert.type="adduser";
		insert.username = username;
		insert.password = password;
		insert.email = email;
		insert.fullname = fullname;
		insert.active = active;
		insert.group = group;
		$.ajax({
		url : baseUrl+"/ws/index",
		type: "POST",
		data : {data : insert},
		success: function(r)
			{
				if(r == "true")
				{
					resetAlert($('.username'));
					resetAlert($('.password1'));
					resetAlert($('.password2'));
					resetAlert($('.email'));
					resetAlert($('.fullname'));
					$('.checkbox').find('.icheckbox_flat').removeClass('checked');
					$('.group').find('option').removeAttr('selected');
					var list = {};
					list.type="listuser";
					$.ajax({
							url : baseUrl+"/ws/index",
							type: "POST",
							data : {data : list},
							success: function(r)
							{
								var tableHTML = '';
								for(key in r)
								{
									if(r[key]['active'] == 0)
									{
										active = '<span class="label label-danger">Off</span>';
									}else
									{
										active = '<span class="label label-info">On</span>';
									}
									tableHTML +='<tr>'
												+'<td><input value="'+r[key]['id']+'" type="checkbox" class="item-checkbox" ></td><td>'+r[key]['username']+'</td><td>'+r[key]['name']+'</td>'
												+'<td>'+active+'</td><td>'+r[key]['datecreated']+'</td>'
												+'</tr>';
								}
								$('.listusers').find('tbody').html(tableHTML);
								$('#example tfoot th').each( function () {
									var title = $('#example thead th').eq( $(this).index() ).text();
									$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
									} );
								 
									// DataTable
									var table = $('#example').DataTable();
								 
									// Apply the filter
									table.columns().eq( 0 ).each( function ( colIdx ) {
										$( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
											table
												.column( colIdx )
												.search( this.value )
												.draw();
										} );
								} );
							}
					});
									}
			}
		});
	}
});
var cout = 1;
$('.btn-icon-del').click(function(){
	var itemVal = '';
	for(var i = 0; i< $('.item-checkbox').length; i++)
	{		
		if($($('.item-checkbox')[i]).is(':checked') == true)
		{
			itemVal += $($('.item-checkbox')[i]).val()+',';
		}
	}
	if(itemVal != '')
	{
		$('.alert-warning').html('<h4>Warning!</h4>\
              <p>Delete selected record(s)?</p>\
              <p><a class="btn btn-warning btn-delete-select">Take this action</a></p>');
		$('.btn-delete-cancel').click(function(){
		});
		$('.btn-delete-select').click(function(){
			var insert = {};
			insert.type ="hiddenuser";
			insert.id = itemVal;
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						
					}
			});
		});		  
	}else
	{
		$('.alert-warning').html('<h4>Warning!</h4>\
								<p>Please, select row</p>\
								');
	}
});
$('.select-all').click(function(){
	cout++;
	if(cout%2==0)
	{
		$('.item-checkbox').prop("checked", true);
	}else
	{
		$('.item-checkbox').prop("checked", false);
	}
});
</script>
<style type="text/css">
#example
{
	font-size:13px;
	font-family:Arial, Helvetica, sans-serif;
	border:1px solid #d9d9d9;
}
.dataTables_paginate
{
	background:#fff;
	border:1px solid #d9d9d9;
}
#example thead>tr>th{
	background-color:#307ecc;
	border:none;
	height:40px;
	line-height:40px;
	color:#fff;
}
.btn-save
{
	width:20%;
	margin-top:40px;
	margin-bottom:20px;
}
</style>
