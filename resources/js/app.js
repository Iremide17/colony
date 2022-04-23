require('./bootstrap');

import Choices from 'choices.js';
import persist from '@alpinejs/persist';
import Alpine from 'alpinejs';
import millify from "millify";

Alpine.plugin(persist);
Alpine.data('demo', () => ({
    open: false,

    toggle() {
        this.open = !this.open
    }
}))
window.Alpine = Alpine;
// should be last
Alpine.start();

window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 5,
        removeItemButton: true,
    });
};

