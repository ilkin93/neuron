<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><p class="copy">Copyright © 2018 Neuron Technologies</p></div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/pagination.min.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/particles.min.js"></script>
<script src="js/jquery.flip.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.vide.js"></script>
<script src="js/jquery.ba-resize.min.js"></script>

<script>
    if($("#map").length) {
        function initMap() {
            var uluru = {lat: 40.3774315, lng: 49.8541149};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    } else {
        function initMap() {
            return false;
        }
    }
    if($("#videoBlock").length) {
        $('#videoBlock').vide({
            mp4: 'neuron.mp4'
        },{
            muted: false,
            posterType: 'none'
        })
    }

    var duration   = 500,
        transition = 200;

    drawDonutChart(
        '#donut',
        $('#donut').data('donut'),
        100,
        100,
        ".35em"
    );

    function drawDonutChart(element, percent, width, height, text_y) {
        width = typeof width !== 'undefined' ? width : 100;
        height = typeof height !== 'undefined' ? height : 100;
        text_y = typeof text_y !== 'undefined' ? text_y : "-.10em";

        var dataset = {
                lower: calcPercent(0),
                upper: calcPercent(percent)
            },
            radius = Math.min(width, height) / 2,
            pie = d3.layout.pie().sort(null),
            format = d3.format(".0%");

        var arc = d3.svg.arc()
            .innerRadius(radius - 15)
            .outerRadius(radius);

        var svg = d3.select(element).append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

        var path = svg.selectAll("path")
            .data(pie(dataset.lower))
            .enter().append("path")
            .attr("class", function(d, i) { return "color" + i })
            .attr("d", arc)
            .each(function(d) { this._current = d; }); // store the initial values

        var text = svg.append("text")
            .attr("text-anchor", "middle")
            .attr("dy", text_y);

        if (typeof(percent) === "string") {
            text.text(percent);
        }
        else {
            var progress = 0;
            var timeout = setTimeout(function () {
                clearTimeout(timeout);
                path = path.data(pie(dataset.upper)); // update the data
                path.transition().duration(duration).attrTween("d", function (a) {
                    // Store the displayed angles in _current.
                    // Then, interpolate from _current to the new angles.
                    // During the transition, _current is updated in-place by d3.interpolate.
                    var i  = d3.interpolate(this._current, a);
                    var i2 = d3.interpolate(progress, percent)
                    this._current = i(0);
                    return function(t) {
                        text.text( format(i2(t) / 100) );
                        return arc(i(t));
                    };
                }); // redraw the arcs
            }, 200);
        }
    };

    function calcPercent(percent) {
        return [percent, 100-percent];
    };




</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFFWyV2FPc9tufglElIrpsM2x0agqKGwE&callback=initMap" async defer></script>
</body>
</html>