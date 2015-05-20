$(document).ready(function(){
  // $(".edit-quote").one('click',function(){
  //   $this = $(this);
  //   $this
  //     .removeClass("light-green accent-2 edit-quote")
  //     .addClass("light-green accent-2 save-quote")
  //       .find("i")
  //         .removeClass("mdi-editor-mode-edit")
  //         .addClass("mdi-content-save");
  //   var quoteField = $this.parent().siblings(".text-quote");
  //   var text = quoteField.text();
  //   quoteField.html("<input type='text' value='"+text+"'>");
  // });

  $(".delete-quote").click(function(e){
    $this = $(this);
    var dataid = $this.attr("data-id");

    $.post("ajax/delete.php",{id:dataid},function(data){
      var data = $.parseJSON(data);
      Materialize.toast(data.message, 4000);
      $this.parent().parent().fadeOut();
    });
  });


});
