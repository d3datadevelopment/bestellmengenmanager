[{capture name="doNotShow"}]
    <script type="text/javascript">
        [{capture name="javaScript"}]

        function d3OqmChangeAmount(targets) {
            $(targets).bind('click', function (e) {
                e.preventDefault();
                let calcFactor = 1000;
                let target = "#" + $(this).attr('data-target');
                let type = $(this).attr('data-type');
                let currentAmount = parseFloat($(target).val()) * calcFactor;
                let minimum = parseFloat($(target).attr('data-min'));
                let maximum = parseFloat($(target).attr('data-max'));
                let step = parseFloat($(target).attr('data-step'));

                if (false === isNaN(minimum)) {
                    minimum = minimum * calcFactor;
                }
                if (false === isNaN(maximum)) {
                    maximum = maximum * calcFactor;
                }
                if (false === isNaN(step)) {
                    step = step * calcFactor;
                }
                if ((isNaN(step) || step === 'any') || step === 0 ) {
                    step = calcFactor;
                }

                if (type === "+") {
                    currentAmount += step;
                } else {
                    currentAmount -= step;
                }

                if (false === isNaN(minimum) && currentAmount < minimum && minimum > 0) {
                    $(target).val(minimum / calcFactor);
                    return;
                }

                if (false === isNaN(maximum) && currentAmount > maximum && maximum > 0) {
                    $(target).val(maximum / calcFactor);
                    return;
                }

                $(target).val(currentAmount / calcFactor);
            })
        }
        [{/capture}]
    </script>
[{/capture}]
[{oxscript add=$smarty.capture.javaScript}]
