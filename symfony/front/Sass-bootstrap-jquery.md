# Sass, Bootstrap, Jquery

First of all, pull the documentation. This supporting issue:

<https://symfony.com/doc/current/frontend/encore/installation.html>
<https://symfony.com/doc/4.4/frontend/encore/bootstrap.html>

Install encore bundle, bootstrap, jquery and the necessary dependencies:

```bash
composer require symfony/webpack-encore-bundle
yarn add bootstrap --dev # instala la ^5 si queremos al 4 yarn add bootstrap@4.6 --dev
yarn add jquery popper.js --dev
yarn add sass-loader@^11.0.0 sass --dev
yarn add @fortawesome/fontawesome-free --dev
yarn add sweetalert2 --dev
yarn add datatables.net-bs4
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
@import "~bootstrap/scss/bootstrap";
@import "~@fortawesome/fontawesome-free/css/all.min.css";
```

Inside *assets/app.js* we inclde dependencies

```js

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';

// start the Stimulus application
import '../bootstrap';

/* jquery */
const $ = require('jquery');

/* Popper */
require('popper.js');

/* Boostrap */
require('bootstrap');

/* Fontawesome */
import '@fortawesome/fontawesome-free/js/all.min.js';

/* SweetAlert2*/
const Swal = require('sweetalert2');
window.Swal = Swal;

/* DataTable */
require('datatables.net-bs4');
import './handlerDataTable.js';

```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
