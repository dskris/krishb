$(function () {
  $(document).scroll(function () {
    var $nav = $(".l-navbar.l-navbar_expand.l-navbar_t-dark-trans.js-navbar-sticky");
    $(".l-navbar.l-navbar_expand.l-navbar_t-dark-trans.js-navbar-sticky").toggleClass('scrolled', $(this).scrollTop() > $(".l-navbar.l-navbar_expand.l-navbar_t-dark-trans.js-navbar-sticky").height());
  });
});

$(document).ready(function() {
$('.thumbnail').click(function(){
      $('.modal-body').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#gallery-modal').modal({show:true});
});
});