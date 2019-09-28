
var resizeableImage = function(image_target) {
  // Some variable and settings
  var $container,
      orig_src = new Image(),
      image_target = $(image_target).get(0),
      event_state = {},
      constrain = false,
      min_width = 60, // Change as required
      min_height = 60,
      max_width = 800, // Change as required
      max_height = 900,
      resize_canvas = document.createElement('canvas');

  init = function(){
    // When resizing, we will always use this copy of the original as the base
    orig_src.src=image_target.src;
    //orig_src=image_target;
    // Wrap the image with the container and add resize handles
    $(image_target).wrap('<div class="resize-container"></div>')
    .before('<span class="resize-handle resize-handle-nw"></span>')
    .before('<span class="resize-handle resize-handle-ne"></span>')
    .after('<span class="resize-handle resize-handle-se"></span>')
    .after('<span class="resize-handle resize-handle-sw"></span>');

    // Assign the container to a variable
    $container =  $(image_target).parent('.resize-container');

    // Add events
    $container.on('mousedown touchstart', '.resize-handle', startResize);
    $container.on('mousedown touchstart', 'img', startMoving);
    $('#firmaCrop').on('click', crop);
  };

  startResize = function(e){
    e.preventDefault();
    e.stopPropagation();
    saveEventState(e);
    $(document).on('mousemove touchmove', resizing);
    $(document).on('mouseup touchend', endResize);
  };

  endResize = function(e){
    e.preventDefault();
    $(document).off('mouseup touchend', endResize);
    $(document).off('mousemove touchmove', resizing);
  };

  saveEventState = function(e){
    // Save the initial event details and container state
    event_state.container_width = $container.width();
    event_state.container_height = $container.height();
    event_state.container_left = $container.offset().left; 
    event_state.container_top = $container.offset().top;
    event_state.mouse_x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft(); 
    event_state.mouse_y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();
	
	// This is a fix for mobile safari
	// For some reason it does not allow a direct copy of the touches property
	if(typeof e.originalEvent.touches !== 'undefined'){
		event_state.touches = [];
		$.each(e.originalEvent.touches, function(i, ob){
		  event_state.touches[i] = {};
		  event_state.touches[i].clientX = 0+ob.clientX;
		  event_state.touches[i].clientY = 0+ob.clientY;
		});
	}
    event_state.evnt = e;
  };

  resizing = function(e){
    var mouse={},width,height,left,top,offset=$container.offset();
    mouse.x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft(); 
    mouse.y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();
    
    // Position image differently depending on the corner dragged and constraints
    if( $(event_state.evnt.target).hasClass('resize-handle-se') ){
      width = mouse.x - event_state.container_left;
      height = mouse.y  - event_state.container_top;
      left = event_state.container_left;
      top = event_state.container_top;
    } else if($(event_state.evnt.target).hasClass('resize-handle-sw') ){
      width = event_state.container_width - (mouse.x - event_state.container_left);
      height = mouse.y  - event_state.container_top;
      left = mouse.x;
      top = event_state.container_top;
    } else if($(event_state.evnt.target).hasClass('resize-handle-nw') ){
      width = event_state.container_width - (mouse.x - event_state.container_left);
      height = event_state.container_height - (mouse.y - event_state.container_top);
      left = mouse.x;
      top = mouse.y;
      if(constrain || e.shiftKey){
        top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
      }
    } else if($(event_state.evnt.target).hasClass('resize-handle-ne') ){
      width = mouse.x - event_state.container_left;
      height = event_state.container_height - (mouse.y - event_state.container_top);
      left = event_state.container_left;
      top = mouse.y;
      if(constrain || e.shiftKey){
        top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
      }
    }
	
    // Optionally maintain aspect ratio
    if(constrain || e.shiftKey){
      height = width / orig_src.width * orig_src.height;
    }

    if(width > min_width && height > min_height /*&& width < max_width && height < max_height*/){
      // To improve performance you might limit how often resizeImage() is called
      resizeImage(width, height);  
      // Without this Firefox will not re-calculate the the image dimensions until drag end
      $container.offset({'left': left, 'top': top});
    }
  }

  resizeImage = function(width, height){
    resize_canvas.width = width;
    resize_canvas.height = height;
    resize_canvas.getContext('2d').drawImage(orig_src, 0, 0, width, height);   
    $(image_target).attr('src', resize_canvas.toDataURL("image/png"));  
  };

  startMoving = function(e){
    e.preventDefault();
    e.stopPropagation();
    saveEventState(e);
    $(document).on('mousemove touchmove', moving);
    $(document).on('mouseup touchend', endMoving);
  };

  endMoving = function(e){
    e.preventDefault();
    $(document).off('mouseup touchend', endMoving);
    $(document).off('mousemove touchmove', moving);
  };

  moving = function(e){
    var  mouse={}, touches;
    e.preventDefault();
    e.stopPropagation();
    
    touches = e.originalEvent.touches;
    
    mouse.x = (e.clientX || e.pageX || touches[0].clientX) + $(window).scrollLeft(); 
    mouse.y = (e.clientY || e.pageY || touches[0].clientY) + $(window).scrollTop();
    $container.offset({
      'left': mouse.x - ( event_state.mouse_x - event_state.container_left ),
      'top': mouse.y - ( event_state.mouse_y - event_state.container_top ) 
    });
    // Watch for pinch zoom gesture while moving
    if(event_state.touches && event_state.touches.length > 1 && touches.length > 1){
      var width = event_state.container_width, height = event_state.container_height;
      var a = event_state.touches[0].clientX - event_state.touches[1].clientX;
      a = a * a; 
      var b = event_state.touches[0].clientY - event_state.touches[1].clientY;
      b = b * b; 
      var dist1 = Math.sqrt( a + b );
      
      a = e.originalEvent.touches[0].clientX - touches[1].clientX;
      a = a * a; 
      b = e.originalEvent.touches[0].clientY - touches[1].clientY;
      b = b * b; 
      var dist2 = Math.sqrt( a + b );

      var ratio = dist2 /dist1;

      width = width * ratio;
      height = height * ratio;
      // To improve performance you might limit how often resizeImage() is called
      resizeImage(width, height);
    }
  };

  crop = function(){
    //Find the part of the image that is inside the crop box
    var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
		
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    document.getElementById("imgfirmaguardar").src=crop_canvas.toDataURL("image/png");
    cambiar('cropImg','guardarImg');
   // window.open(crop_canvas.toDataURL("image/png"));
  }

  init();
};

// Kick everything off with the target image
//resizeableImage($('.resize-image'));

//--this is for the drawwww image-------------------------------------------------
$(document).ready(function () {

    //User Variables
    var canvasWidth = 300;                           //canvas width
    var canvasHeight = 300;                           //canvas height
    var canvas = document.getElementById('canvasdraw');  //canvas element
    var context = canvas.getContext("2d");           //context element
    var copycontext = canvas.getContext("2d");           //context element
    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;

    canvas.addEventListener("mousedown", mouseDown, false);
    canvas.addEventListener("mousemove", mouseXY, false);
    document.body.addEventListener("mouseup", mouseUp, false);

    //For mobile
    canvas.addEventListener("touchstart", mouseDown, false);
    canvas.addEventListener("touchmove", mouseXY, true);
    canvas.addEventListener("touchend", mouseUp, false);
    document.body.addEventListener("touchcancel", mouseUp, false);

    function draw() { //this renders every time you move the mose
        context.clearRect(0, 0, canvas.width, canvas.height); // Clears the canvas

        context.strokeStyle = "#000000";  //set the "ink" color
        context.lineJoin = "miter";       //line join
        context.lineWidth = 1;            //"ink" width

        for (var i = 0; i < clickX.length; i++) { //redrawing all for any move
        context.beginPath();                               //create a path
        if (clickDrag[i] && i) {//ask if tis not the first time
                context.moveTo(clickX[i - 1], clickY[i - 1]);  //move to
        } else {
                context.moveTo(clickX[i] - 1, clickY[i]);      //move to
        }
        context.lineTo(clickX[i], clickY[i]);              //draw a line
        context.stroke();                                  //filled with "ink"
        context.closePath();                               //close path
        }
    }

    //Save the Sig
    $("#guardarDib").click(function saveSig() {          
      
        document.getElementById("imgfirmaguardar").src=canvas.toDataURL("image/png");   
        resize_image( $( "#imgfirmaguardar" )[0], $( "#imgfirmaguardar" )[0] );
        cambiar('dibujarImg','guardarImg');
    });
    function resize_image( src, dst, type, quality ) {
        var tmp = new Image(),
            canvas, context, cW, cH;

        type = type || 'image/png';
        quality = quality || 0.92;

        cW = src.naturalWidth;
        cH = src.naturalHeight;

        tmp.src = src.src;
        tmp.onload = function() {

           canvas = document.createElement( 'canvas' );

           cW /= 2;
           cH /= 2;

           if ( cW < src.width ) cW = src.width;
           if ( cH < src.height ) cH = src.height;

           canvas.width = cW;
           canvas.height = cH;
           context = canvas.getContext( '2d' );
           context.drawImage( tmp, 0, 0, cW, cH );

           dst.src = canvas.toDataURL( type, quality );

           if ( cW <= src.width || cH <= src.height )
              return;

           tmp.src = dst.src;
        }

     }
    

    //Clear the Sig
    $('#borrarDib').click(
    function clearSig() {
            clickX = new Array();
            clickY = new Array();
            clickDrag = new Array();
            context.clearRect(0, 0, canvas.width, canvas.height);
            $("#imgData").html('');
      });

    function addClick(x, y, dragging) {

        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }

    function mouseXY(e) {
       if (paint) {
            addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            draw();
       }
    }

    function mouseUp() {
            paint = false;
    }

    function mouseDown(e)
    {
        var mouseX = e.pageX - this.offsetLeft;//the x the body minus the canvas x
        var mouseY = e.pageY - this.offsetTop;//the y the body minus the canvas y

        paint = true;//public variable to set the paint on true
        addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
        draw();
    }
    
});