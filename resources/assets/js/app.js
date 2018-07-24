
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./flipform.js');
require('./gallery.js');


window.Particles = require('particlesjs');

console.log('QSI messanger');

window.onload = function() {
    Particles.init({
        selector: '.background',
        color: '#000999',
        maxParticles: 100,
        connectParticles: true,
    });
}