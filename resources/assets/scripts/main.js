// import external dependencies
import 'jquery';
// Import everything from autoload
import './autoload/**/*'
// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import templateFaq from './routes/faq';
import blog from './routes/blog';
/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // FAQ page
  templateFaq,
  // Blog page
  blog,
});
// Load Events
jQuery(document).ready(() => routes.loadEvents());
