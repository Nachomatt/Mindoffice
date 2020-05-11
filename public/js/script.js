new WOW().init();

$( document ).ready(function() {
    $('[timer="true"]').each(function(_, timer) {
        timer = $(timer);
        var time = timer.find('.values');

        timer.runner = new Timer();
        timer.runner.start({startValues: {seconds: timer.data('seconds')}});
        timer.runner.addEventListener('secondsUpdated', function () {
            time.html(timer.runner.getTimeValues().toString());
        });
    });
});
