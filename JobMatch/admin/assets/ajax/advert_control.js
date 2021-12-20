var form = new FormData();
var filesArr=[];
var nr_image=0 //from update =$('.thumbParent.mix').length


var Image_upload = function () {

    var initImage_upload = function () {
var count=$('.thumbParent.mix').length;

$("#file").change(function( e ) {
	
    e.stopPropagation();
    e.preventDefault();  
	var files = e.target.files;
    var len = files.length;
	var nr_photo_upload=len;
    var array_file=files;


//filesArr[0] = ({filesArr[0],sort_order : 0});
 if(($('.thumbParent.mix').length+len)<=100)
 {
//filesArr= Array.prototype.slice.call(files);


for (var j=0; j<len; j++) { 
Array.prototype.push.call(filesArr,files[j]);
}
    for (var i=0; i<len; i++) { 
	  
	    var f = files[i];
        var file = f; 
        
        
        var reader = new FileReader(files[i]);

        reader.onload = function (e) {        	
        var image_code=e.target.result
        
        count++;
        $('.listss').append('<div class="thumbParent col-md-3 col-sm-4 mix" id="sort"><span id="imagine_uploadd" style=" position: relative; display: block;"> <div class="" style=" height: 150px;    width: 100%;    display: block;    vertical-align: middle;    overflow: hidden;    background-position: 50% 50%;    background-size: cover;    -moz-background-size: cover;    -webkit-background-size: cover;	background-image:url('+image_code+')"></div><span style="cursor:pointer;color:red; position: absolute;    z-index: 999;    background-color: red;    top: 0;    padding: 0 6px 2px 5px;    cursor: pointer;    color: #fff;    font-weight: 700;" class="remove_thumb remo_imm" id="'+nr_image+'">x</span><input type="hidden" name="'+count+'" id="hiden_input'+count+'" value="'+nr_image+'"></span></div>');
        nr_image++;
        Sort_Image.init();
          
        }
        reader.readAsDataURL(files[i]);
////  

} 
}
else
{
alert('Prea multe imagini');
}

//////////////////////////////////
			
            
           
////		
    $(document).on('click', '.remove_thumb.remo_imm', function() {
    	var test=0;
       $(this).parents('.thumbParent').remove();
       delete filesArr[$(this).attr('id')];    
       Sort_Image.init();
    });

});
    }

    return {

        //main function to initiate the module
        init: function () {
            initImage_upload();
                 
        }

    };

}();



///function remove image upload
function rem_upload_image(id) {
  
	$.ajax({
    url: 'http://apartera.md/admin/delete_image_ajax',
    type: 'POST',
    //dataType: 'json',
    cache: false,
    data: { id: id},

success : function(respond) 
      {
$('#'+id).parents('.thumbParent').remove();
Sort_Image.init();
	 
	  }
	  ,
error : function()
{
alert('error');
}
});

}


var Sort_Image = function () {

    var initSort_Image = function () {

sort_ul = $('#sortable');
itemsCount = $('#sortable #sort').length;

function updateIndexes(){
    $('#sort input').each(function(i){
              $(this).val(i+1);
			  $(this).attr('id', 'hiden_input'+(i+1));
          });
}

updateIndexes();
      
sort_ul.sortable({handle:'span',
                  stop:function(event,ui){ updateIndexes(); }
});

$('#sort input').keyup(function(event) {
  if(event.keyCode == '13'){      
    event.preventDefault();
      
    order = parseInt($(this).val());
      
    div = $(this).parent();
    if(order>=1 && order <= itemsCount){      
        
        div.effect('drop', function(){
            div.detach();
                
            if(order == itemsCount)
                sort_ul.append(div);
            else
                div.insertBefore($('#sortable #sort:eq('+(order-1)+')'));
            
            updateIndexes();
            div.effect('slide');
        });
    }else{
        div.effect('highlight');
    }
  }    
});

    }

    return {

        //main function to initiate the module
        init: function () {
            initSort_Image();
                 
        }

    };

}();



