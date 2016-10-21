$(document).ready(function(e) {

// Find
$("#find").submit(function(){    
    q = $("#q").val();
    $.ajax({
    	type: "GET",
    	url: "mhs.php",
    	data: "q="+q,
    	beforeSend: function(){
    		$("#isi").fadeOut('fast');
    		$("#isi").html("");
    		$("#isi").fadeIn('fast');
    		$(".loader").fadeIn('slow');
    	},
    	success: function(data){
    		$(".loader").hide();
    		if(data == undefined){
    			$("#isi").html("Not found!");
    		}
    		// response = $.parseJSON(data);
    		$.each(data, function(i, item) {
    			var nim = data[i].title.split(" ");
		        $("<tr>").html("<td class='btn btn-block' data-toggle='modal' data-target='.detail' data-nim='"+nim[0]+"' data-title='"+data[i].title+"' >" + data[i].title + "</td>").appendTo('#isi');
		    });
    	}
    })

    return false;
});

// Modal
$('.detail').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var nim = button.data('nim')
  var title = button.data('title')
  $.ajax({
      type: "GET",
      url: "mhs.php",
      data: "q="+nim+"parents",
      beforeSend: function(){
        $("#parents").fadeOut('fast');
        $("#parents").html("Loading...");
        $("#parents").fadeIn('fast');
      },
      success: function(data){
        if(data == undefined){
          $("#parents").html("Not found!");
        }else{
          var datanya = data[0].title.split(" ");
          var bokap = "";
          for (var i = 2; i <= datanya.length - 1; i++) {
            bokap += datanya[i];
            bokap += " ";
          };
          $("#parents").html(bokap);
        }
      }
    })
  
  var modal = $(this)
  modal.find('.modal-title').text('Detail ' + title)
})

})