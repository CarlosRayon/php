# Sass, Bootstrap, Jquery

First of all, pull the documentation. This supporting issue:

<https://symfony.com/doc/current/frontend/encore/installation.html>
<https://symfony.com/doc/4.4/frontend/encore/bootstrap.html>

Install encore bundle, bootstrap, jquery and the necessary dependencies:

```bash
composer require symfony/webpack-encore-bundle
yarn add bootstrap --dev # instala la ^5 si queremos al 4 yarn add bootstrap@4.6 --dev

# yarn add jquery popper.js --dev #BS4
yarn add jquery @popperjs/core --dev # BS5

yarn add sass-loader@^11.0.0 sass --dev

yarn add @fortawesome/fontawesome-free --dev

yarn add sweetalert2 --dev

#yarn add datatables.net-bs4 # BS4
yarn add datatables.net-bs5 # BS5

yarn install
```

Inside *webpack.config.js*

```js
  // enables Sass/SCSS support
    .enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery();
```

Inside  *assets/styles/app.scss* y añadimos

```scss
/* Fontawesome */
@import "~@fortawesome/fontawesome-free/css/all.min.css";

/* Boostrap */
@import "~bootstrap/scss/bootstrap";

/* Datatables */
// @import "~datatables.net-bs4"; /* BS4*/
@import "~datatables.net-bs5"; /* BS5*/

```

Inside *assets/app.js* we include dependencies

```js

/* any CSS you import will output into a single css file (app.css in this case) */
import '../styles/app.scss';

/* jquery */
const $ = require('jquery');

/* Popper */
// require('popper.js'); /* BS4*/
import '@popperjs/core/dist/esm/popper.js'; /* BS5*/

/* Boostrap */
// require('bootstrap'); /* BS4*/
window.bootstrap = require('bootstrap'); /* BS5*/

/* Fontawesome */
import '@fortawesome/fontawesome-free/js/all.min.js';

/* SweetAlert2*/
window.Swal = require('sweetalert2');

/* DataTable */
// require('datatables.net-bs4'); /* BS4*/
require('datatables.net-bs5'); /* BS5*/









// start the Stimulus application
import '../bootstrap';

```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
