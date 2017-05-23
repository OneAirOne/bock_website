/*jQuery(function($){
    
   
    
    $('#content a').mouseover(function(){
        
       $(this).find('span.bg').hide().fadeTo(500,0.7);
       
   });
});*/
jQuery(function($){
$('#content a').each(function(){
var photo = $(this);
var bg = photo.find('span.bg');
// Le reste des variables déclarées t, l ...
photo.hover(function(){
// Ici on écrit les instructions à faire pour le mouseover
bg.fadeTo(500,0.7);
// Le reste de l'animation pour le titre et la description sans utiliser stop() 
}, function(){
// Ici on écrit les instructions à faire pour le mouseout
bg.stop().fadeOut(700);
// Le reste de l'animation pour le titre et la description comme s'est écrit dans le tuto
});
});
});
