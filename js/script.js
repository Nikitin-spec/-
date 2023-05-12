  document.addEventListener("DOMContentLoaded", () => {
    let documentheight=document.documentElement.clientHeight;
    document.getElementById("conteiner-feedback").style.height=documentheight+"px";
  });
  


 $(document).ready(function(){
     $('#feedback_submeet').click(function(){
     event.preventDefault();
     var feedback_fio=$('#fio').val().match(/^[А-Яа-я. ]+$/g);
     var telnumber=$('#tel').val().match(/^[0-9()-]+$/g);
     var adress=$('#adress').val().match(/^[0-9()А-Яа-я-. ]+$/g);
     var feedback_mail=$('#mail').val().match(/^[^ ]+@[^ ]+\.[a-z]{2,3}$/);
    
    
     
     
     
     if (feedback_fio==null) {
         $('#fio').css('border', '1px solid #ff0000');
         $('#text-fio').css('display', 'block');
     }
     else {
        $('#fio').css('border', '1px solid #DEDED2');
        $('#text-fio').css('display', 'none');
        
        
     }
     
     if (telnumber==null) {
         $('#tel').css('border', '1px solid #ff0000');
         $('#text-telephone').css('display', 'block');
     }
     else {
        $('#tel').css('border', '1px solid #DEDED2');
        $('#text-telephone').css('display', 'none');
     }
     
       if (adress==null) {
         $('#adress').css('border', '1px solid #ff0000');
         $('#text-address').css('display', 'block');
         
     }
     else {
        $('#adress').css('border', '1px solid #DEDED2');
        $('#text-address').css('display', 'none');
        
        
     }
     
           if (feedback_mail==null) {
         $('#mail').css('border', '1px solid #ff0000');
         $('#text-mail').css('display', 'block');
     }
     else {
        $('#mail').css('border', '1px solid #DEDED2');
        $('#text-mail').css('display', 'none');
     }
     
    
   if (feedback_fio!=null && telnumber!=null && adress!=null && feedback_mail!=null) {
       

     
     
    
    
    $('.modal-title').css('display', 'block');
    
    
   
     
 $.ajax({
	url: '/feedback.php',
	method: 'post',
	dataType: 'html',
	data: $('#feedback_form').serialize(),
	success: function(data){
		$('#feedback_result').html(data);
	}
});
}
});
});

