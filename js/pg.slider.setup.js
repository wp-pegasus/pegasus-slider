/**
 * Created by DEVSCREENCAST on 1/26/2019.
 */

jQuery(function() {
    jQuery('.main-carousel').flickity({
        cellAlign: option.cellAlign,
        contain: option.contain,
        autoPlay: option.autoPlay,
        pauseAutoPlayOnHover: option.pauseAutoPlayOnHover,
        adaptiveHeight: option.adaptiveHeight,
        groupCells: option.groupCells,
        draggable: option.draggable
    });
});