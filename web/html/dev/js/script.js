// Slick
// $('.slider').slick();
$('.slick-reviews').slick();
//
$('.first-bold').each(function(index, el) {
    $(this).boldFirstWord();
});
//
$('.titleh2').each(function(index, el) {
    $(this).lightFirstWord();
});
//
$('.d-item img').each(function(index, el) {
    var name = $(this).attr('src');
    name = name.split('img/');
    name = name[1].split('.');
    $(this).addClass(name[0] + '-img move-img');
});
//
$('.wrp-header-page h1').each(function(index, el) {
    $(this).bigFirstWord();
});
// Submit from checked drop-dl
$('.drop-dl').on('change', function(event) {
    $('#cargoForm').submit();
});
// Parent Menu
$('.nav-menu > li > ul a + ul').each(function(index, el) {
    $(this).parent('li').addClass('parent');
});

var maxheight = 0;
$('.page .team').each(function() {
  if($(this).height() > maxheight) {
      maxheight = $(this).height() + 20;
  }
});
$('.page .team').height(maxheight);
