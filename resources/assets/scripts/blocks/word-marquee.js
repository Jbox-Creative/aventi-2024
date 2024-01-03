export default () => {
  const blocks = $('.word-marquee');
  blocks.each(function(index, block){
    block = $(block);    
    const blockWords = block.find('.word-marquee__word').clone();
    const blockInner = block.find('.word-marquee__inner');

    block.data('progressX',0);
    setInterval(function(){
      const blockW = blockInner.width();
      const winW = $(window).width();
      const progressX = block.data('progressX');
      const newX = progressX - 50;
      blockInner.css('transform','translateX('+newX+'px)');
      block.data('progressX',newX);

      // add more words if necessary
      if (blockW + newX < winW) {
        blockInner.append(blockWords.clone());
      }
    }, 400);
  });
}