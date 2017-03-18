<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>

<body>



    <div id="bracelet">
        <div id="palette">

            <div class='ball_container palette_ball' id='ball_tiger'>
                #Tiger
                <div class="ball" draggable='true'>
                    <img src='../../img/tiger.png' width='50px'/>
                </div>
            </div>

            <div class='ball_container palette_ball' id='ball_blue'>
                #Blue
                <div class="ball" draggable='true'>
                    <img src='../../img/blue.png' width='50px'/>
                </div>
            </div>

            <div class='ball_container palette_ball' id='ball_moon'>
                #Moon
                <div class="ball" draggable='true'>
                    <img src='../../img/moon.png' width='50px'/>
                </div>
            </div>

            <div class='ball_container palette_ball' id='ball_turquoise'  >
                #Turquoise
                <div class="ball" draggable='true'>
                    <img src='../../img/turquoise.png' width='50px'/>
                </div>
            </div>
        </div>


    </div>


    <div id="orbsAll">

    </div>


</body>

<!-- jQuery -->
<script src="../../vendor/jquery/jquery.min.js"></script>

<script>
    // Vars
    var stadardKugel = '../../img/grey.png';
    var kugelgroesse = '8mm';
    var kugelanzahl =22 ;

    var degree = 360/ kugelanzahl;
    var degree_total = 0;

    const bracelet = document.querySelector('#bracelet');
    var html = bracelet.innerHTML;


    // Generate Bracelet HTML Code
    for(var i=0; i < kugelanzahl; i++){
    html += "<div class='ball_container bracelet_ball' id='ball"+i+"'>"+i+"<div class='ball' draggable='true'><img src='"+stadardKugel+"' width='50px'/></div></div>";
    }

    bracelet.innerHTML = html;


    // Generate Kugelformularfelder HTML Code
    var htmlOrbsAll =''
    for(var i=0; i < kugelanzahl; i++){
    htmlOrbsAll += '<input type="text" class="form-control" id="orbStyle'+i+'" value="'+stadardKugel+'">';
    }

    const orbsAll = document.querySelector('#orbsAll');
    orbsAll.innerHTML = htmlOrbsAll;


    // Rotate Bracelet Balls
    for(var i=0; i < kugelanzahl; i++){
        degree_total = degree_total + degree;
        $('#ball'+i).css({ 'transform': 'rotate(' + degree_total + 'deg)'});
    }
</script>



<script>
    var dragSrcEl = null;

    function handleDragStart(e) {
        // Target (this) element is the source node.
        //this.style.opacity = '0.4';

        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';

        //innerHTML von Draggable in Data
        e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault(); // Necessary. Allows us to drop.
        }

        e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

        return false;
    }

    function handleDragEnter(e) {
        // this / e.target is the current hover target.
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over');  // this / e.target is previous target element.
    }

    function handleDrop(e) {
        // this/e.target is current target element.

        if (e.stopPropagation) {
            e.stopPropagation(); // Stops some browsers from redirecting.
        }

        this.classList.remove('over');  // this / e.target is previous target element.

        //Target and Source Variables
        const $target = $(e.target);
        const $src = $(dragSrcEl);

        //Target and Source Categories
        const target_is_bracelet = $target.parents('.ball_container').hasClass('bracelet_ball');
        const target_is_palette = $target.parents('.ball_container').hasClass('palette_ball');
        const src_is_bracelet =  $src.parents('.ball_container').hasClass('bracelet_ball');
        const src_is_palette = $src.parents('.ball_container').hasClass('palette_ball');

        //Statements:
        const palette_to_bracelet = src_is_palette && target_is_bracelet;
        const palette_to_palette = src_is_palette && target_is_palette;
        const bracelet_to_bracelet = src_is_bracelet && target_is_bracelet;
        const bracelet_to_palette = src_is_bracelet && target_is_palette;


        // Keine Aktion wenn Target = Source
        if (dragSrcEl != this) {
            if (palette_to_bracelet){
                this.innerHTML = e.dataTransfer.getData('text/html');
            } else if (palette_to_palette) {
                return;
            } else if (bracelet_to_bracelet) {
                dragSrcEl.innerHTML = this.innerHTML;;
                this.innerHTML = e.dataTransfer.getData('text/html');
            } else if (bracelet_to_palette) {
                return;
            }
        }

        return false;
    }

    function handleDragEnd(e) {
        // this/e.target is the source node.

        [].forEach.call(cols, function (col) {
            col.classList.remove('over');
        });
    }

    //FindParentBySelector Method
    function findParentBySelector(elm, selector) {
        var all = document.querySelectorAll(selector);
        var cur = elm.parentNode;
        while(cur && !collectionHas(all, cur)) { //keep going up until you find a match
            cur = cur.parentNode; //go up
        }
        return cur; //will return null if not found
    }

    var cols = document.querySelectorAll('#bracelet .ball');
    [].forEach.call(cols, function(col) {
        col.addEventListener('dragstart', handleDragStart, false);
        col.addEventListener('dragenter', handleDragEnter, false)
        col.addEventListener('dragover', handleDragOver, false);
        col.addEventListener('dragleave', handleDragLeave, false);
        col.addEventListener('drop', handleDrop, false);
        col.addEventListener('dragend', handleDragEnd, false);
    });




</script>
</html>