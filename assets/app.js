/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './css/app.scss'
//import './css/bootstrap1.min.css';




// start the Stimulus applications
const $ = require('jquery');
window.$ = $;
global.$ = global.jQuery = $;
//import './bootstrap';
require('bootstrap');
require('select2');
import './js/consommation'



