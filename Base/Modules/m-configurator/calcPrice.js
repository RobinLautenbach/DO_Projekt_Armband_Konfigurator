//******
//* CALC PRIZE FUNCTION
//*****

function calcPrice(bracelet_container, price_container){
    const balls = bracelet_container.find(".ball").find("img");


    var price_basis = bracelet_container.data("price");
    var price_pendant = bracelet_container.parent().find(".pendant").data("price");
    console.log(price_basis, price_pendant);
    var price_balls = 0;

    balls.each(function(i, ball) {
        var price_ball = $(this).data("price");
        price_balls = parseFloat(price_balls + price_ball);
    });

    var price_total = price_basis + price_balls + price_pendant;

    //Set Price Total at Dataattribute
    //bracelet_container.dataset.priceTotal = price_total;

    console.log(price_balls)
    console.log("preis total:" + price_total);



    // Price Container Selectors
    var $price_total_container = price_container.find("#price_total").find(".counter");
    var $price_balls_container = price_container.find("#price_balls").find(".counter");
    var $price_pendant_container = price_container.find("#price_pendant").find(".counter");

    // Insert Content in HTML
    $price_total_container.html(price_total);
    $price_balls_container.html(price_balls);
    $price_pendant_container.html(price_pendant);



    //this.dataset.model = srcModel;

}