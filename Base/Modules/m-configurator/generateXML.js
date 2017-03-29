//generate XML for validation:



    function generateXML()
    {
        var xmlHeader = '\<\?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

        var test = $('#orbSize').val();

        var orbGroup = '';

        //ORBSTYLE AUS IMAGE HOLEN
        $('#bracelet').find('.ball').each(function(i, obj) {
            const orbModel = $(obj).find('img').data("model");
            const orbPrice = $(obj).find('img').data("price");
            const orbPosition = $(obj).data("position");

            //if orb is premium
            if (orbPrice != 0){
                const premiumTag = '<premium unit="Euro">'+orbPrice+'</premium>';
                var braceletOrb = '<orb position="'+ orbPosition +'" size="'+ $('#orbSize').val() +'" style="'+ orbModel +'">' + premiumTag + '</orb>';
            } else {
                var braceletOrb = '<orb position="'+ orbPosition +'" size="'+ $('#orbSize').val() +'" style="'+ orbModel +'"/>';
            }
            orbGroup += braceletOrb;
        });

        //GET PENDANT STYLE AND PRICE

        var pendantPrice;
        var pendantModel;
        var pendantColor;

        $('.pendant').find('.pendant__content').each(function(i, content) {
            if ($(content).css('display') == 'block'){
                pendantPrice = $(content).find('img').data("price");
                pendantModel = $(content).find('img').data("model");
                pendantColor = $(content).find('img').data("color");
            }
        });

        //if prendant is premium
        var braceletPendant;
        if (pendantPrice != 0){
            braceletPendant = '<pendant color="'+ pendantColor +'" model="'+pendantModel+'"><premium unit="Euro">'+ pendantPrice +'</premium></pendant>';
        } else {
            braceletPendant = '<pendant color="'+ pendantColor +'" model="'+pendantModel+'" />';
        };

        var braceletOrbs = '<orbs>'+ orbGroup +'</orbs>';
        var braceletModel = '<bracelet name="Löwe Schwarz" model="'+ $('#braceletModel').val() +'" size="'+ $('#braceletSize').val() +'">';
        var braceletPrice = '<price unit="Euro">'+ $('#price_total').find('.counter').html() +'</price>';

        var braceletXML = xmlHeader + braceletModel + braceletPrice + braceletOrbs + braceletPendant + '</bracelet>';
        console.log(braceletXML);


        $.ajax({
            type : "POST",
            url : "http://localhost:8080/BraceletConfiguratorRestfulService/resources/bracelets",
            data : braceletXML,
            contentType: "application/xml",
            success : function() {
                console.log("erfolgreich");
            },
            error : function(error) {
                console.log("das war nix");
            }
        });
    };
