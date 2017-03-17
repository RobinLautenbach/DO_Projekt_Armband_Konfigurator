<html>
<head>
    <link href="style.css" rel="stylesheet">
</head>

<body>


<style>
    .ball.over {
        border: 2px dashed #000;
    }
</style>


    <div id="bracelet">
        <div class="ball" id="quadrat1" draggable="true"><header>A</header>
            <img src="../../img/blue.png" width="50px">
        </div>
        <div class="ball" id="quadrat2" draggable="true"><header>B</header>
            <img src="../../img/tiger.png" width="50px">
        </div>
        <div class="ball" id="quadrat3" draggable="true"><header>C</header>
            <img src="../../img/grey.png" width="50px">
        </div>
    </div>

<div id="orbsAll">

</div>


</body>

<!-- jQuery -->
<script src="../../vendor/jquery/jquery.min.js"></script>

<script>
    //Generate Platzhalter:var kugelanzahl = 24;
    var stadardKugel = '../../img/grey.png';
    var kugelgroesse = '8mm';
    var kugelanzahl =22 ;

    var degree = 360/ kugelanzahl;
    var html = '';
    var degree_total = 0;

    for(var i=0; i < kugelanzahl; i++){
    html += "<div class='ball' id='ball"+i+"' draggable='true' data-ball-number='"+i+"' data-toggle='modal' data-target='.bs-example-modal-sm'>"+i+"<img src='"+stadardKugel+"' width='3%'/></div>";
    }

    const bracelet = document.querySelector('#bracelet');
    bracelet.innerHTML = html;

    //Generate Kugelformularfelder
    var htmlOrbsAll =''
    for(var i=0; i < kugelanzahl; i++){
    htmlOrbsAll += '<input type="text" class="form-control" id="orbStyle'+i+'" value="'+stadardKugel+'">';
    }

    const orbsAll = document.querySelector('#orbsAll');
    orbsAll.innerHTML = htmlOrbsAll;
</script>



<script>

    var dragSrcEl = null;

    function handleDragStart(e) {
        // Target (this) element is the source node.
        //this.style.opacity = '0.4';

        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';
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

        // Don't do anything if dropping the same column we're dragging.
        if (dragSrcEl != this) {
            // Set the source column's HTML to the HTML of the columnwe dropped on.
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }

        return false;
    }

    function handleDragEnd(e) {
        // this/e.target is the source node.

        [].forEach.call(cols, function (col) {
            col.classList.remove('over');
        });
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