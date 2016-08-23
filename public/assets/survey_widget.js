/**
 * Created by ThinkPad on 8/20/2016.
 */
$(function () {
    FN_App = {
        answerWrapper: $(".answer-wrapper").clone(),
        questionWrapper: $(".question-wrapper").clone(),
        configWrapper: $(".config-wrapper").clone(),
        currentSurveyId: -1
    };

    $('#question-handler').on('click', '#add_answer', function ($event) {
        $event.preventDefault();

        FN_App.answerWrapper.clone().insertBefore($(this).parent());
    });
    $('#question-handler').on('click', '#add_question', function ($event) {
        $event.preventDefault();
        FN_App.questionWrapper.clone().appendTo($(this).parent().parent().siblings('.question-wrapper').children('form'));
    });
    $('#config-handler').on('click', '#add_config', function ($event) {
        $event.preventDefault();
        FN_App.configWrapper.clone().appendTo($(this).parent().parent().siblings('.config-wrapper').children('form'));
    });

    $('form.currSurvey').ajaxForm(function (data) {
        FN_App.currentSurveyId = data.id;
        $('.question-wrapper .curr-survey').val(FN_App.currentSurveyId);
        FN_App.questionWrapper = $(".question-wrapper").clone();
    $('.config-wrapper .curr-survey').val(FN_App.currentSurveyId);
        FN_App.configWrapper = $(".config-wrapper").clone();

    });

    $('.question_form').ajaxForm(function (data) {
        console.log($(this), data.id);

        $(this).find('.answer-wrapper').each(
            function (i, v) {
                console.log($(v).children('input[name=question_id]').val(data.id))
            });


    });

    $('.config_form').ajaxForm(function(data){

    });
})