$(function(){
    var numCommentBtn;
    var numCloseBtn;
    $('.post-list').on('click', '.comment-btn', function() {
        numCommentBtn= $('.post-list .comment-btn').index(this);
        $('.post-list .comment-form').eq(numCommentBtn).removeClass('comment__form__hidden');
        $('.post-list .comment-form').eq(numCommentBtn).addClass('comment__form__show');
    });
    $('.post-list').on('click', '.comment-form-close-btn', function() {
        numCloseBtn = $('.post-list .comment-form-close-btn').index(this);
        $('.post-list .comment-form').eq(numCloseBtn).removeClass('comment__form__show');
        $('.post-list .comment-form').eq(numCloseBtn).addClass('comment__form__hidden');
    })
});
