var cnt=0, texts=[];

$('.stuff').each(function() {
  texts[cnt++]=$(this).text();
});

function slide() {
  if (cnt>=texts.length) cnt=0;
  $('#space').html(texts[cnt++]);
  $('#space')
    .fadeIn('slow').delay(3300).fadeOut(300,
      function(){
        return slide()
    });
}
slide()