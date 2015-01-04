var imageData = [];
var uploadHTML = '<form class="form-upload" role="form" action="#" method="post" enctype="multipart/form-data" onsubmit="return doUpload();">'+
                    '<div class="form-group">'+
                    '<label for="myfile">Tải ảnh lên</label>'+
                    '<input type="file" class="form-control" name="myfile" id="myfile" multiple>'+
                    '</div>'+    
                    '<input type="submit" class="btn btn-default" value="Tải lên" />'+
                    '<input type="button" class="btn btn-default" value="Huỷ" onclick="cancleUpload();"/>'+
                    '</form>'+
                    '<hr>'+
                    '<div id="progress-group"></div>';
$('.add-product').click(function(){
    imageData = [];
    $('.form-upload').remove();
    $('.upload').append(uploadHTML);
});
//Upload Image

var http_arr = new Array();
 
function doUpload() {
    document.getElementById('progress-group').innerHTML = ''; //Reset lại Progress-group
    var files = document.getElementById('myfile').files; 
    for (i=0;i<files.length;i++) {
        uploadFile(files[i], i);
    }
    return false;
}
function uploadFile(file, index) {
    var http = new XMLHttpRequest();
    http_arr.push(http);
    /** Khởi tạo vùng tiến trình **/
    //Div.Progress-group
    var ProgressGroup = document.getElementById('progress-group');
    //Div.Progress
    var Progress = document.createElement('div');
    Progress.className = 'progress';
    //Div.Progress-bar
    var ProgressBar = document.createElement('div');
    ProgressBar.className = 'progress-bar';
    //Div.Progress-text
    var ProgressText = document.createElement('div');
    ProgressText.className = 'progress-text';   
    //Thêm Div.Progress-bar và Div.Progress-text vào Div.Progress
    Progress.appendChild(ProgressBar);
    Progress.appendChild(ProgressText);
    //Thêm Div.Progress và Div.Progress-bar vào Div.Progress-group  
    ProgressGroup.appendChild(Progress);
 
 
    //Biến hỗ trợ tính toán tốc độ
    var oldLoaded = 0;
    var oldTime = 0;
    //Sự kiện bắt tiến trình
    http.upload.addEventListener('progress', function(event) {  
        if (oldTime == 0) { //Set thời gian trước đó nếu như bằng không.
            oldTime = event.timeStamp;
        }   
        //Khởi tạo các biến cần thiết
        var fileName = file.name; //Tên file
        var fileLoaded = event.loaded; //Đã load được bao nhiêu
        var fileTotal = event.total; //Tổng cộng dung lượng cần load
        var fileProgress = parseInt((fileLoaded/fileTotal)*100) || 0; //Tiến trình xử lý
        var speed = speedRate(oldTime, event.timeStamp, oldLoaded, event.loaded);
        //Sử dụng biến
        ProgressBar.innerHTML = fileName + ' đang được tải lên...';
        ProgressBar.style.width = fileProgress + '%';
        ProgressText.innerHTML = fileProgress + '% Tốc độ tải lên: '+speed+'KB/s';
        //Chờ dữ liệu trả về
        if (fileProgress == 100) {
            //ProgressBar.style.background = 'url("images/progressbar.gif")';
        }
        oldTime = event.timeStamp; //Set thời gian sau khi thực hiện xử lý
        oldLoaded = event.loaded; //Set dữ liệu đã nhận được
    }, false);
     
 
    //Bắt đầu Upload
    var data = new FormData();
    data.append('filename', file.name);
    data.append('myfile', file);
    http.open('POST', baseUrl+'backend/index/action?image', true);
    http.send(data);
 
 
    //Nhận dữ liệu trả về
    http.onreadystatechange = function(event) {
        //Kiểm tra điều kiện
        if (http.readyState == 4 && http.status == 200) {
            ProgressBar.style.background = ''; //Bỏ hình ảnh xử lý
            try { //Bẫy lỗi JSON
                var server = JSON.parse(http.responseText);
                if (server.status) {
                    ProgressBar.className += ' progress-bar-success'; //Thêm class Success
                    ProgressBar.innerHTML = server.message; //Thông báo 
                    imageData.push(server.name);           
                } else {
                    ProgressBar.className += ' progress-bar-danger'; //Thêm class Danger
                    ProgressBar.innerHTML = server.message; //Thông báo
                }
            } catch (e) {
                ProgressBar.className += ' progress-bar-danger'; //Thêm class Danger
                ProgressBar.innerHTML = 'Có lỗi xảy ra'; //Thông báo
            }
        }
        http.removeEventListener('progress'); //Bỏ bắt sự kiện
    }
}
function cancleUpload() {
    for (i=0;i<http_arr.length;i++) {
        http_arr[i].removeEventListener('progress');
        http_arr[i].abort();
    }
    var ProgressBar = document.getElementsByClassName('progress-bar');
    for (i=0;i<ProgressBar.length;i++) {
        ProgressBar[i].className = 'progress progress-bar progress-bar-danger';
    }   
}
 
 
function speedRate(oldTime, newTime, oldLoaded, newLoaded) {
        var timeProcess = newTime - oldTime; //Độ trễ giữa 2 lần gọi sự kiện
        if (timeProcess != 0) {
            var currentLoadedPerMilisecond = (newLoaded - oldLoaded)/timeProcess; // Số byte chuyển được 1 Mili giây
            return parseInt((currentLoadedPerMilisecond * 1000)/1024); //Trả về giá trị tốc độ KB/s
        } else {
            return parseInt(newLoaded/1024); //Trả về giá trị tốc độ KB/s
        }
}
//
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
//Datatables
$('#example').dataTable();
});
$('.btn-save').click(function(){
  var name = $('.name').val();
  var info = $('.info').val();
  var price = $('.price').val();
  var type = $('.type').val();
  var category = $('.category').val();
  var company = $('.company').val();
  var quantily = $('.quantily').val();
  if(name !== null && info !== '' && price !== '' && type !== '' && category !== '' && imageData !== null && quantily !='')
  {
      $.ajax({
            url: baseUrl+'backend/index/action?product',
            type: 'POST',
            data: {data : JSON.stringify(imageData), name : name, info : info, price : price, type : type, category : category, com : company, quan : quantily},
            success: function(data)
            {
              $('.add-error').css({"display":"none"});
              $('.save-success').css({"display":"inline-block"});
              setTimeout("location.reload(true);",2000);
            }
      });
  }else{
    $('.add-error').css({"display":"inline-block"});
  }
});
//
var pid = null;
$('.hover-active ').css({"display":"none"});
$(".hover").hover(function(){  
    pid = parseInt($(this).attr('id'));
    $('.hover-active ').css({"display":"inline-block", "top":$('#'+pid).position().top+35});
});
$('.hover-active').mouseout(function(){
    $('.hover-active ').css({"display":"none"});
});
$('.edit').click(function(){
    imageData = [];
    $('.form-upload').remove();
    $('.upload-edit').append(uploadHTML);
    $.ajax({
        url : baseUrl + 'backend/index/action?editproduct',
        type : 'POST',
        data : {id : pid},
        success: function(data)
        {
            console.log(data.productimages);
            $('.img-upload').html('');
            var upload = jQuery.parseJSON(data.productimages);
            var ui = 0;
            var imgHTML = '<p>Ảnh đã tải lên </p>';
            while(upload[ui] != undefined)
            {
                console.log(upload[ui]);
                imgHTML += "<img width='285' height='150' class='img' src='"+baseUrl+"upload/"+upload[ui]+"' >";
                ui++;
            }
            $('.img-upload').html(imgHTML);
            $('.edit-name').val(data.productname);
            $('.edit-info').val(data.productinfo);
            $('.edit-price').val(data.productprice);
            $('.edit-quantily').val(data.productquantity);
            $('.edit-company > option').each(function(){
                if(this.value === data.company)
                {
                    $(this).prop("selected", "selected");
                }
            });
            $('.edit-type > option').each(function(){
                if(this.value === data.producttype)
                {
                    $(this).prop("selected", "selected");
                }
            });
            $('.edit-category > option').each(function(){
                if(this.value === data.productcategory)
                {
                    $(this).prop("selected", "selected");
                }
            });
        }
    });
});
$('.btn-save-edit').click(function(){
  var name = $('.edit-name').val();
  var info = $('.edit-info').val();
  var price = $('.edit-price').val();
  var type = $('.edit-type').val();
  var category = $('.edit-category').val();
  var company = $('.edit-company').val();
  var quantily = $('.edit-quantily').val();
  if(name !== '' || info !== '' || price !== '' || type !== '' || category !== '' || quantily !=='')
  {
      $.ajax({
            url: baseUrl+'backend/index/action?updateproduct',
            type: 'POST',
            data: {data : JSON.stringify(imageData), name : name, info : info, price : price, type : type, category : category, com : company, quan : quantily, id : pid},
            success: function(data)
            {
              $('.save-success').css({"display":"inline-block"});
              setTimeout("location.reload(true);",2000);
            }
      });
  }
});
function deleteRecord()
{
    if (confirm("Bạn có chắc chắn muốn xoá không ?") == true) {
        $.ajax({
        url : baseUrl + 'backend/index/action?eleteproduct',
        type : 'POST',
        data : {id : pid},
        success: function(data)
           {
               location.reload();
           } 
        });

    } else {

    }
}