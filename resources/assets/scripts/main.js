// import external dependencies
import 'jquery';
// Import everything from autoload
import './autoload/**/*'
// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import templateFaq from './routes/faq';
import singleLocation from './routes/single-location';
import blog from './routes/blog';
import getAQuote from './routes/getAQuote';
/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // FAQ page
  templateFaq,
  // Blog page
  blog,
  // Locations detail
  singleLocation,
  // Get a Quote page
  getAQuote,
});
// Load Events
jQuery(document).ready(() => routes.loadEvents());
