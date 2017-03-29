//generate XML for validation:



    function generateXML()
    {
        var xmlHeader = '\<\?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

        var test = $('#orbSize').val();

        var orbGroup = '';


        //ORBSTYLE AUS IMAGE HOLEN

        $('.orbStyle').each(function(i, obj) {
            const $orbStyle = $(obj).val()
            var braceletOrb = '<orb size="'+ $('#orbSize').val() +'" style="'+ $(obj).val() +'"/>';
            orbGroup += braceletOrb;
        });

        var braceletOrbs = '<orbs>'+ orbGroup +'</orbs>';
        var braceletPendant = '<pendant color="'+$('#pendantColor').val()+'" model="'+$('#pendantModel').val()+'"></pendant>';
        var braceletModel = '<bracelet name="Löwe Schwarz" model="'+ $('#braceletModel').val() +'" size="'+ $('#braceletSize').val() +'">';

        var braceletXML = xmlHeader + braceletModel + braceletOrbs + braceletPendant + '</bracelet>';
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
