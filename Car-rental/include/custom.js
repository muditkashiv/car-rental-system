$(document).ready(function () {

  /* Ajax Using For Sending Id To Modal */
  $(document).on('click', '.lead', function(){
    var id = $(this).attr('id');
     //alert(id);
    $.ajax({
      url: "../modal.php",
      type: "post",
      data:{id:id},
      success:function(data){
        $(".info").html(data);
        $("#book").modal('show');
      }     
    });
  });
/* Ajax End */

});