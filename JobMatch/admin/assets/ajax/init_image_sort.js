var SortProduct = function () {

    var initSortImage = function () {
      
 sort_ul = $('#sortable');
itemsCount = $('#sortable #sort').length;       
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
            
            //updateIndexes();
            div.effect('slide');
        });
    }else{
        div.effect('highlight');
    }
  }    
});
      
    }
 ////// 
     var updateIndexes = function () {
      
 $('#sort input').each(function(i){
              $(this).val(i+1);
          });
    }
 //////   
    

    return {

        //main function to initiate the module
        init: function () {
            initSortImage();
            updateIndexes();

        
        }
        

    };

}();



