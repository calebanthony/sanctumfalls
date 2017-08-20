import Tooltip from 'tooltip.js';

/**
 * Initialize the tooltips
 */
document.addEventListener('DOMContentLoaded', function() {
    var tooltips = document.querySelectorAll('[tooltip-title]');
    for (var i = 0; i < tooltips.length; i++) {
        new Tooltip(tooltips[i], {
            placement: 'bottom',
            title: tooltips[i].getAttribute('tooltip-title'),
            html: true,
        })
    }
})
