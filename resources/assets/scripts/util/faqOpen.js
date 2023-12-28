export default () => {
    $('.faqOverview__item__head').on('click',function(){
        console.log('faq item clicked!');
        $(this).toggleClass('active');
        $(this).siblings().slideToggle();
    });
};
