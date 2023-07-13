require(['jquery'], function($){
    $('.question-title').on('click', function(){
        var _this = $(this);
        var _parent = _this.parents('.question-body');
        var _answer = _parent.find('.question-answer');
        if(!_parent.hasClass('active')){
            _this.addClass('active');
            _parent.addClass('active');
            _answer.addClass('active');
        }else{
            _this.removeClass('active');
            _parent.removeClass('active');
            _answer.removeClass('active');
        }
    });
});