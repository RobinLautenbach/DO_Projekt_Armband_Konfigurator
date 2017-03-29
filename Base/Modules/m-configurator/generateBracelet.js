//*****
//* GENERATE BRACELET
//*****

function generateBracelet(container, kugelanzahl, standardkugel, kugelgroesse)
{
    var html = container.innerHTML;

    // Generate Bracelet HTML Code
    for (var i = 0; i < kugelanzahl; i++) {
        html += "<div class='ball_container bracelet_ball' id='ball" + i + "'>" + i + "<div class='ball' draggable='true' data-position='" + i + "'><img src='" + standardkugel + "' width='40px' data-model='standard' data-price='0'/></div></div>";
    }

    // Insert html in container
    container.innerHTML = html;

    // Calc Degree
    var degree = 360 / kugelanzahl;
    var degree_total = 0;

    // Rotate Bracelet Balls
    for (var i = 0; i < kugelanzahl; i++) {
        degree_total = degree_total + degree;
        $('#ball' + i).css({'transform': 'rotate(' + degree_total + 'deg)'});
    }
}