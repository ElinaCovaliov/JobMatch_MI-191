var ImageUpload = function () {

    var initImageUpload = function () {
      
 $('#elfinder').elfinder({
					url : '/file_manager/php/connector.minimal.php',  // connector URL (REQUIRED)
					// , lang: 'ru'                    // language (OPTIONAL)
					getFileCallback : function(file) {
                    console.log(file);
                   var url_image=file.url;
                   url_image = url_image.replace("php/../", "");
                    $('#sortable').html('<div class="col-md-3 col-sm-4 mix" id="sort"><span><div class="mix-inner"  ><img class="img-responsive" src="'+url_image+'"  alt=""><input type="hidden"  style="width: 25;"/></div></span></div>');
                  $('#image_url').val(url_image);  
                    }
				});
    }

 //////   


    return {

        //main function to initiate the module
        init: function () {
            initImageUpload();
                 
        }

    };

}();


var ImageMultipleUplaod = function () {

function initImageMultipleUplaod(url_function,url_retun,get_url) {
      
 $('#elfinder').elfinder({
					url : '/file_manager/php/connector.minimal.php',  // connector URL (REQUIRED)
					// , lang: 'ru'                    // language (OPTIONAL)
					getFileCallback : function(file) {
                    console.log(file);
                   var url_image=file.url;
                   url_image = url_image.replace("php/../", "");
                    $('#sortable').append('<div class="col-md-3 col-sm-4 mix" id="sort"><span><div class="mix-inner"  ><img class="img-responsive" src="'+url_image+'"  alt=""><input type="hidden" class="sort_order"  style="width: 25;"/><div class="mix-details"><a style="cursor:pointer;" class="mix-link"><i class="fa fa-times"></i></a></div></div></span></div>');
      
SortProduct.init();   
initImageDelete();   
                 

                 
                    }
				});
				




 $("#ajax_add_piese").submit(function(e)
{ 
debugger

e.preventDefault();
var postData = $(this).serializeArray();
var image_list=[];
var image_url='';
var sort_order='';

$(".col-md-3.col-sm-4.mix").each(function() {
image_url=$(this).find('img').attr("src");
sort_order=$(this).find('input').val();
image_list.push({image_url : image_url,sort_order : sort_order});
});

	$.ajax(
	{
		url: url_function,
		type: "POST",
		dataType: 'html',
		data : {postData : postData,image_list : image_list ,get_url : get_url},
		success:function(respond) 
		{
			//alert(respond);
        location.href=url_retun;
		},
		error: function() 
		{
		alert('Error insert');
		}
	});

});
///



//////				
    }

 //////   
 var initImageDelete = function () {
$(".mix-link").click(function(){ 
$(this).parents()[3].remove();
});
    }


    return {

        //main function to initiate the module
        init: function (url_function,url_retun,get_url) {
            initImageMultipleUplaod(url_function,url_retun,get_url);
            initImageDelete();
                 
        }

    };

}();


