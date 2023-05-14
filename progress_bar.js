// on page load...
moveProgressBar();
// on browser resize...
$(window).resize(function() {
    moveProgressBar();
});

// SIGNATURE PROGRESS
function moveProgressBar() {
  console.log("moveProgressBar");
    var getPercent = ($('.nav-tracker-progress').data('progress-percent') / <?php echo $find['InitTime']?> );
    var getProgressWrapWidth = $('.nav-tracker-progress').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;
    
    // on page load, animate percentage bar to data percentage length
    // .stop() used to prevent animation queueing
    $('.nav-tracker-progress-bar').stop().animate({
        left: progressTotal
    }, animationLength);
}