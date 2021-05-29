( function( $ ) {

$(window).load(function () {
        var e = digi_store_slider_value.digi_store_transition_effect, t = digi_store_slider_value.digi_store_transition_delay, i = digi_store_slider_value.digi_store_transition_duration;
        jQuery(".layer-slider").cycle({
                timeout: t,
                fx: e,
                activePagerClass: "active",
                pager: ".slider-button",
                pause: 1,
                pauseOnPagerHover: 1,
                width: "100%",
                containerResize: 0,
                fit: 1,
                next: "#next2",
                prev: "#prev2",
                speed: i,
                after: function () {
                    jQuery(this).parent().css("height", jQuery(this).height())
                }
                ,
                cleartypeNoBg: !0
            }
        )
    }
);
} )( jQuery );