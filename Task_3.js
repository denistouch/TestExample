/* 
* @author denistouch <denistouch@gmail.com>
 * @version 1.0a
 */
$(document).keydown(function (event) {
    switch (event.which) {
        case 37:
            alert('left arrow');
            break;
        case 38:
            alert('up arrow');
            break;
        case 39:
            alert('right arrow');
            break;
        case 40:
            alert('down arrow');
            break;
        default :
            break;
    }
    console.log("key " + event.which + " down");
});

