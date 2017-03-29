//****
//* DRAG N DROP FUNCTIONS
//****


function dragNDrop() {
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
        const target_is_paletteChange = $target.parent().hasClass('palette__change');
        const src_is_bracelet = $src.parents('.ball_container').hasClass('bracelet_ball');
        const src_is_palette = $src.parents('.ball_container').hasClass('palette_ball');

        //Statements:
        const palette_to_bracelet = src_is_palette && target_is_bracelet;
        const palette_to_palette = src_is_palette && target_is_palette;
        const bracelet_to_bracelet = src_is_bracelet && target_is_bracelet;
        const bracelet_to_palette = src_is_bracelet && target_is_palette;
        const palette_to_paletteChange = src_is_palette && target_is_paletteChange;


        // Keine Aktion wenn Target = Source
        if (dragSrcEl != this) {
            // Entscheidung von wo nach wo gedropped wird
            if (palette_to_bracelet) {
                this.innerHTML = e.dataTransfer.getData('text/html');
            } else if (palette_to_palette) {

            } else if (bracelet_to_bracelet) {
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
            } else if (bracelet_to_palette) {

            } else if (palette_to_paletteChange) {
                console.log("change all bidde");
                $('#bracelet').find('.ball').each(function(i, obj) {
                    this.innerHTML = e.dataTransfer.getData('text/html');
                });
            }
        }

        const bracelet = $('#bracelet');
        const braceletprice = $('#braceletprice');
        calcPrice(bracelet, braceletprice);

        return false;
    }

    function handleDragEnd(e) {
        // this/e.target is the source node.

        [].forEach.call(bracelet_balls, function (col) {
            col.classList.remove('over');
        });

        [].forEach.call(paletteBalls, function (col) {
            col.classList.remove('over');
        });
    }

    //FindParentBySelector Method
    function findParentBySelector(elm, selector) {
        var all = document.querySelectorAll(selector);
        var cur = elm.parentNode;
        while (cur && !collectionHas(all, cur)) { //keep going up until you find a match
            cur = cur.parentNode; //go up
        }
        return cur; //will return null if not found
    }

    var bracelet_balls = document.querySelectorAll('#bracelet .ball');
    [].forEach.call(bracelet_balls, function (col) {
        col.addEventListener('dragstart', handleDragStart, false);
        col.addEventListener('dragenter', handleDragEnter, false)
        col.addEventListener('dragover', handleDragOver, false);
        col.addEventListener('dragleave', handleDragLeave, false);
        col.addEventListener('drop', handleDrop, false);
        col.addEventListener('dragend', handleDragEnd, false);
    });

    var paletteBalls = document.querySelectorAll('#palette .ball');
    [].forEach.call(paletteBalls, function (col) {
        col.addEventListener('dragstart', handleDragStart, false);
        col.addEventListener('dragenter', handleDragEnter, false)
        col.addEventListener('dragover', handleDragOver, false);
        col.addEventListener('dragleave', handleDragLeave, false);
        col.addEventListener('drop', handleDrop, false);
        col.addEventListener('dragend', handleDragEnd, false);
    });

    var paletteChange = document.querySelectorAll('#palette .palette__change');
    [].forEach.call(paletteChange, function (col) {
        col.addEventListener('dragstart', handleDragStart, false);
        col.addEventListener('dragenter', handleDragEnter, false)
        col.addEventListener('dragover', handleDragOver, false);
        col.addEventListener('dragleave', handleDragLeave, false);
        col.addEventListener('drop', handleDrop, false);
        col.addEventListener('dragend', handleDragEnd, false);
    });
};