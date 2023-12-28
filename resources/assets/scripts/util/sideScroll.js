export default () => {
  const sliders = $('.side-scroll');
  let isDown = false;
  let startX;
  let scrollLeft;

  sliders.on('mousedown',function(e){
    isDown = true;
    $(this).addClass('active');
    startX = e.pageX - $(this).offset().left;
    scrollLeft = $(this).scrollLeft();
  });
  sliders.on('mouseleave',function(){
    isDown = false;
    $(this).removeClass('active');
  });
  sliders.on('mouseup',function(){
    isDown = false;
    $(this).removeClass('active');
  });
  sliders.on('mousemove',function(e){
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - $(this).offset().left;
    const walk = (x - startX); //scroll-fast
    $(this).scrollLeft(scrollLeft - walk);
  });
}
