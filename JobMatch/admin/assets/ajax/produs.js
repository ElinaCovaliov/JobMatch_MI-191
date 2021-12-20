var Add_produs = function (start) {

var initAdd_produs = function (start) {

var produs=$('.product').length;


$(".delete_this_option").click(function()
{
	var show=$(this);
var id = $(this).parent().parent().find('input').val();	
	$.ajax(
	{
		url: "http://apartera.md/admin/delete_option",
		type: "POST",
		//dataType: 'json',
		data : {id : id},
		success:function() 
		{
		show.parent().parent().parent().remove();	
		}
});

});

$("#add_produs_data").click(function()
{
debugger
produs=produs+1	

var last_produs=produs;
$('.col-md-12').last().after('<div class="form-group product" style=" clear: both;"><label for="denumirea_marfii" class="col-sm-2 control-label">Option Ro</label><div class="col-sm-4"><input type="text" name="optiuni_ro'+last_produs+'"  class="form-control"  placeholder="Option Ro"> </div> <label for="suma_marfii'+last_produs+'" class="col-sm-2 control-label">Option Ru</label><div class="col-sm-3"><input type="text" name="optiuni_ru'+last_produs+'"  class="form-control suma_calc"  placeholder="Option Ru"> </div> <div class="col-sm-1"><i class="fa fa-times delete_produs"></i></div></div>');

$(".delete_produs").click(function()
{ 
if($('.product').length!=1)
{
$(this).parent().parent().remove();

}
});
});  

$('#regiune_id').change(function() {
if($('#regiune_id').val()==1)
{
$('#sector_id').show();
}
else
{
$('#sector_id').hide();
}
});
  
$('#category_id').change(function() {
if($('#category_id').val()==1 || $('#category_id').val()==2 || $('#category_id').val()==4)
{
$('#tip_oferta_id').show();
$('#camere_id').show();
$('#tip_teren_id').hide();
$('#tip_teren_id').val('');
$('#tip_spatiu_comercial_id').hide();
$('#tip_spatiu_comercial_id').val('');
$('#stare_id').show();
$('#tip_constructie_id').show();
$('#etaje_id').show();
}


if($('#category_id').val()==3)
{
$('#tip_oferta_id').show();
$('#camere_id').hide();
$('#camere_id').val('');
$('#tip_teren_id').hide();
$('#tip_teren_id').val('');
$('#tip_spatiu_comercial_id').hide();
$('#stare_id').hide();
$('#stare_id').val('');
$('#tip_constructie_id').hide();
$('#etaje_id').hide();
}

if($('#category_id').val()==5)
{
$('#tip_oferta_id').show();
$('#camere_id').hide();
$('#camere_id').val('');
$('#tip_teren_id').show();
$('#tip_spatiu_comercial_id').hide();
$('#tip_spatiu_comercial_id').val('');
$('#stare_id').hide();
$('#stare_id').val('');
$('#tip_constructie_id').hide();
$('#tip_constructie_id').val('');
$('#etaje_id').hide();
}

}); 
   



if($('#regiune_id').val()==1)
{
$('#sector_id').show();
}
else
{
$('#sector_id').hide();
$('#sector_id').val('');
}

  

if($('#category_id').val()==1 || $('#category_id').val()==2 || $('#category_id').val()==4)
{
$('#tip_oferta_id').show();
$('#camere_id').show();
$('#tip_teren_id').hide();
$('#tip_teren_id').val('');
$('#tip_spatiu_comercial_id').hide();
$('#tip_spatiu_comercial_id').val('');
$('#stare_id').show();
$('#tip_constructie_id').show();
$('#etaje_id').show();
}


if($('#category_id').val()==3)
{
$('#tip_oferta_id').show();
$('#camere_id').hide();
$('#camere_id').val('');
$('#tip_teren_id').hide();
$('#tip_teren_id').val('');
$('#tip_spatiu_comercial_id').hide();
$('#stare_id').hide();
$('#stare_id').val('');
$('#tip_constructie_id').hide();
$('#etaje_id').hide();
}

if($('#category_id').val()==5)
{
$('#tip_oferta_id').show();
$('#camere_id').hide();
$('#camere_id').val('');
$('#tip_teren_id').show();
$('#tip_spatiu_comercial_id').hide();
$('#tip_spatiu_comercial_id').val('');
$('#stare_id').hide();
$('#stare_id').val('');
$('#tip_constructie_id').hide();
$('#tip_constructie_id').val('');
$('#etaje_id').hide();
}


$(".delete_produs").click(function()
{ 
if($('.product').length!=1)
{
$(this).parent().parent().remove();

}
});
                                
} 


    return {

        //main function to initiate the module
        init: function (start) {
            initAdd_produs(start);                 
        }

    };

}();
