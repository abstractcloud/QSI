console.log('QSI messanger');



$(document).ready(function () {
    var errors=$('span.help-block')
    $("[data-toggle='modal']").click(function(){
       if (errors.length>0){
          $(errors).remove()
        }
    })
    
    if (errors.length>0){
         $(errors[0]).parents('div.modal').modal()
     }
    
     $('#deletePhoto').on('show.bs.modal', function (event) {
        var id = $(event.relatedTarget).data('id') 
        $(this).find('#delete-photo-submit').data('id',id)
 
      })
        
      $('#delete-photo-submit').click(function(){
        var id = $(this).data('id')
        $("form[data-id='"+id+"']").submit()
      })
      
});