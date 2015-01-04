<div class="tree well">
    <ul>
        <li>
            <span class="stream-list"><i class="icon-folder-open"></i> Streams</span> <a href=""></a>
            <div class="btn-stream-0"><button class="inline" href="#inline_content" class="btn-new-stream"><i class="icon-create"></i></button></div>
            <div style="display:none" class="tooltip-streams">
            <button  class="inline" href="#inline_content" id="btn-new-stream"> New Stream</button>
            <button class="inline" href="#inline_content-1" id="btn-about-stream"> About</button>
            <button id="btn-cloase-stream"> Close</button>
            </div>
            <ul class="streams">
            </ul>
        </li>
    </ul>
</div>
<div style='display:none'>
            <div id='inline_content' style='padding:10px; background:#fff;'>
            <label class="form-title">Add New Category</label>
			<div class="form-group has-success has-feedback">
                  <input type="text" class="form-control streamname" id="inputSuccess2" placeholder="Category's name">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div>
             	<select class="form-control select-form stream-group">
                </select> 
                <button type="button" class="btn btn-primary btn-block btn-save">Save</button>          
			</div>
            <div id='inline_content-2' style='padding:10px; background:#fff;'>
            <label class="form-title">Add New Brand</label>
			<div class="form-group has-success has-feedback">
                  <input type="text" class="form-control streamnamechild" id="inputSuccess2" placeholder="Brand's name">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div> 
                <button type="button" class="btn btn-primary btn-block btn-save-brand">Save</button>          
			</div>
             <div id='inline_content-3' style='padding:10px; background:#fff;'>
            <label class="form-title">Rename Brand</label>
			<div class="form-group has-success has-feedback">
                  <input type="text" class="form-control streamnamechildafter" id="inputSuccess2" placeholder="Brand's name">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div> 
                <button type="button" class="btn btn-primary btn-block btn-save-brand-after">Save</button>          
			</div>
            <div id='inline_content-5' style='padding:10px; background:#fff;'>
            <label class="form-title">Rename Product</label>
			<div class="form-group has-success has-feedback">
                  <input type="text" class="form-control productname" id="inputSuccess2" placeholder="Product's name">
                  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
             </div> 
                <button type="button" class="btn btn-primary btn-block btn-save-product">Save</button>          
			</div>
            <div id='inline_content-4' style='padding:10px; background:#fff;'>
            <label class="form-title brand-title"></label>
            <p>
            <button class="btn-icon btn-icon-create"><i class="icon-create"></i></button>
            <button class="btn-icon btn-icon-del"><i class="icon-del"></i></button>
            </p>     
			</div>
            <!-- -->
            <div id='inline_content-1' style='padding:10px; background:#fff;'>
            <div class="alert about-stream">         
            </div>   
			</div>
		</div>
<script>
$(document).ready(function() {
	var totalStream = 0;
	var streams = "";
	var stremid = 0;
	var streamname ="";
	var name = "";
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
	$('body').attr('oncontextmenu', 'return false;');
	var list = "";
	var insert = {};
			insert.type ="liststream";
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						if(r != null)
						{
							totalStream = r.length;
							streams = r;
							for(var key in r)
							{
								if(r[key]['parent'] == 0)
								{
									list +='<li>\
										<span class="stream-child"><i class="icon-minus-sign"></i> '+r[key]['name']+'</span> <a href="#"></a>\
										<div class="btn-stream"><button id="'+r[key]['streamid']+'" class="inline btn-newchild" href="#inline_content-2" class="btn-new-stream-child"><i class="icon-create"></i></button><button class="inline btn-rename-stream-child" href="#inline_content-3" id="'+r[key]['streamid']+'"><i class="icon-rename"></i></button><button class="inline" href="#inline_content-4" class="btn-del-stream-child"><i class="icon-del"></i></button></div>\
										<ul class="stream'+r[key]['streamid']+'">\
										</ul>\
										</li>';
								}
							}
							$('.streams').html(list);
							$('.btn-newchild').click(function(){
								stremid = $(this).attr('id');
							});
							$('.btn-rename-stream-child').click(function(){
								stremid = $(this).attr('id');
							});
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
							var aboutStreamText = '<label>About Stream</label>\
												  <br /><i>your\'s products</i>\
												  <p>Total stream : '+totalStream+'</p>\
												  ';
							$('.about-stream').html(aboutStreamText);
							var streamHTML = "";
							streamHTML += '<option value="0">No parent</option>';
							for(s in streams)
							{
								if(streams[s]['parent'] == 0){
								streamHTML += '<option value="'+streams[s]['streamid']+'">'+streams[s]['name']+'</option>';
								}
							}
							$('.stream-group').html(streamHTML);
							for(var k in r)
							{
								if(r[k]['parent'] != 0)
								{
									$('.stream'+r[k]['parent']).append(' <li><span id="'+r[k]['streamid']+'"><i class="icon-leaf"></i> '+r[k]['name']+'</span><div class="btn-stream-2"><button id="'+r[k]['streamid']+'" class="inline btn-new-brand" href="#inline_content-4" data-name="'+r[k]['name']+'"><i class="icon-view"></i></button><button class="inline btn-rename-stream-brand" href="#inline_content-5" id="'+r[k]['streamid']+'"><i class="icon-rename"></i></button><button class="inline" href="#inline_content-6" class="btn-del-stream-child"><i class="icon-del"></i></button></div>\<a href=""></a><ul></ul></li>');
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
								}
							}
							$('.btn-new-brand').click(function(){
										stremid = $(this).attr('id');
										stremname = $(this).attr('data-name');
										$('.brand-title').html('Products of '+stremname);	
									});
							$('.btn-rename-stream-brand').click(function(){
										stremid = $(this).attr('id');
							});
							$('.tree li.parent_li').find(' > ul > li').hide("fast");
							$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
							$('.tree li.parent_li > span').on('click', function (e) {
								var children = $(this).parent('li.parent_li').find(' > ul > li');
								if (children.is(":visible")) {
									children.hide('fast');
									$(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
								} else {
									children.show('fast');
									$(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
								}
								e.stopPropagation();
							});
						}
					}
	});
$('.stream-list').mousedown(function(e){ 
    if( e.button == 2 ) { 
	  var offset  = $('.stream-list').offset();
	   $('.tooltip-streams').css({"display":"inline","position":"absolute","top":offset.top-200,"left":offset.left-300,"z-index":"1000"});
      return false; 
    } 
    return true; 
  });  
$('#btn-cloase-stream').click(function(){
	$('.tooltip-streams').hide();
});
var check = 0;
resetAlert($('.streamname'));
$('.streamname').keyup(function(){
	name = $('.streamname').val();
	if(validateStreamname(name) == false)
	{
		loadError($('.streamname'));
	}else
	{
		//loadSuccess($('.streamname'));
			var insert = {};
			insert.type ="issetstream";
			insert.name = name;
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						if(r == 1)
						{
							loadError($('.streamname'));
						}else
						{
							loadSuccess($('.streamname'));
							check = 1;
						}
					}
				});
		
	}
});
resetAlert($('.streamnamechild'));
$('.streamnamechild').keyup(function(){
	name = $('.streamnamechild').val();
	if(validateStreamname(name) == false)
	{
		loadError($('.streamnamechild'));
	}else
	{
		//loadSuccess($('.streamname'));
			var insert = {};
			insert.type ="issetstream";
			insert.name = name;
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						if(r == 1)
						{
							loadError($('.streamnamechild'));
							check = 0;
						}else
						{
							loadSuccess($('.streamnamechild'));
							check = 1;
						}
					}
				});
		
	}
});
resetAlert($('.streamnamechildafter'));
$('.streamnamechildafter').keyup(function(){
	name = $('.streamnamechildafter').val();
	if(validateStreamname(name) == false)
	{
		loadError($('.streamnamechildafter'));
	}else
	{
		//loadSuccess($('.streamname'));
			var insert = {};
			insert.type ="issetstream";
			insert.name = name;
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						if(r == 1)
						{
							loadError($('.streamnamechildafter'));
							check = 0;
						}else
						{
							loadSuccess($('.streamnamechildafter'));
							check = 1;
							console.log(check);
						}
					}
				});
		
	}
});
resetAlert($('.productname'));
$('.productname').keyup(function(){
	name = $('.productname').val();
	if(validateStreamname(name) == false)
	{
		loadError($('.productname'));
	}else
	{
		//loadSuccess($('.streamname'));
			var insert = {};
			insert.type ="issetstream";
			insert.name = name;
			$.ajax({
				url : baseUrl+"/ws/index",
				type: "POST",
				data : {data : insert},
				success: function(r)
					{
						if(r == 1)
						{
							loadError($('.productname'));
							check = 0;
						}else
						{
							loadSuccess($('.productname'));
							check = 1;
							console.log(check);
						}
					}
				});
		
	}
});
$('.btn-save').click(function(){
	if(check == 1){						
							var insert1 = {};
							insert1.type ="addstream";
							insert1.name = name;
							insert1.parent = $('.stream-group').val();
							$.ajax({
								url : baseUrl+"/ws/index",
								type: "POST",
								data : {data : insert1},
								success: function(r)
									{
										check  = 0;
									}
								});
	}
 });
 $('.btn-save-brand').click(function(){
	if(check == 1){						
							var insert1 = {};
							insert1.type ="addstream";
							insert1.name = name;
							insert1.parent = stremid;
							$.ajax({
								url : baseUrl+"/ws/index",
								type: "POST",
								data : {data : insert1},
								success: function(r)
									{
										check = 0;
									}
								});
	}
 });
 $('.btn-save-brand-after').click(function(){
	if(check == 1){						
							var insert1 = {};
							insert1.type ="updatestream";
							insert1.name = name;
							insert1.id = stremid;
							$.ajax({
								url : baseUrl+"/ws/index",
								type: "POST",
								data : {data : insert1},
								success: function(r)
									{
										check = 0;
									}
								});
	}
 });
 $('.btn-save-product').click(function(){
	if(check == 1){						
							var insert1 = {};
							insert1.type ="updatestream";
							insert1.name = name;
							insert1.id = stremid;
							$.ajax({
								url : baseUrl+"/ws/index",
								type: "POST",
								data : {data : insert1},
								success: function(r)
									{
										check = 0;
									}
								});
	}
 });
});
</script>
<style type="text/css">
.btn-stream, .btn-stream-2, .btn-stream-0
{
	display:inline;
	visibility:hidden;
}
.tree ul li:hover .btn-stream-0
{
	visibility:visible;
}
.tree ul li ul li:hover .btn-stream
{
	visibility:visible;
}
.tree ul li ul li ul li:hover .btn-stream-2
{
	visibility:visible;
}
.btn-stream button, .btn-stream-2 button, .btn-stream-0 button
{
	border:none;
	background-color:transparent;
	height:25px;
	width:25px;
}
.btn-save, .btn-save-brand, .btn-save-brand-after, .btn-save-product
{
	width:20%;
	margin-top:40px;
	margin-bottom:20px;
}
.tooltip-streams
{
	width:150px;
	height:92px;
	border:1px solid #D2D7D3;
	background:#FFF;
}
.tooltip-streams button
{
	width:148px;
	border:none;
	text-align:left;
	height:30px;
	background:#fff;
}
.tooltip-streams button:hover
{
	background:#81BEF7;
	border:1px solid #2E9AFE;
}
.tree {
    min-height:20px;
    padding:19px;
    background-color:#fbfbfb;
    border:1px solid #D2D7D3;
	border-radius:0;
    -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
}
.tree li {
    list-style-type:none;
    margin:0;
    padding:10px 5px 0 5px;
    position:relative
}
.tree li::before, .tree li::after {
    content:'';
    left:-20px;
    position:absolute;
    right:auto
}
.tree li::before {
    border-left:1px solid #999;
    bottom:50px;
    height:100%;
    top:0;
    width:1px
}
.tree li::after {
    border-top:1px solid #999;
    height:20px;
    top:25px;
    width:25px
}
.tree li span {
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    display:inline-block;
    padding:3px 8px;
    text-decoration:none
}
.tree li.parent_li>span {
    cursor:pointer
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0
}
.tree li:last-child::before {
    height:30px
}
.tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
	background-color:#6BB9F0;
	border-radius:0;
    border:1px solid #3498DB;
    color:#fff;
}
</style>