$(document).ready(function () {
 /* Ajax Using For Sending Id To Edit Modal */
    $(document).on('click', '.edit2', function(){
      var id2 = $(this).attr('id');
  //    //alert(id);
      $.ajax({
        
        url: "../agency_files/edit.php",
        type: "post",
        data:{id2:id2},
        success:function(data){
          $("#info_update").html(data);
          $("#modal1").modal('show');
        }     
      });
    });
/* Ajax End */
/* Javascript For Search Button */
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#search tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
/* Javascript For Search Button */
});
