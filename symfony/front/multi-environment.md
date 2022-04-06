# Multi environment

Within assets we create two directories for each environment and within each environment a configuration file *webpack.config.js.* We will have something like this:

![structure](/resources/img/multi-environment-structure.png)

We configure the webpack.config.js of each environment (example for back environment, for front change routes):

```js
const Encore = require('@symfony/webpack-encore');
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/assets/back/')
    .setPublicPath('/assets/back')
    .addEntry('back', './assets/back/js/app.js')
    .enableStimulusBridge('./assets/controllers.json')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .enableSassLoader()
    .autoProvidejQuery();

const config = Encore.getWebpackConfig();
config.name = 'back';
module.exports = config;
```

We configure the **webpack.config.js** of the root directory of the project to load each environment separately:

```js
const Encore = require('@symfony/webpack-encore');
const front = require('./assets/front/webpack.config');
Encore.reset();
const back = require('./assets/back/webpack.config');
module.exports = [front,back];
```

We also have to configure the configuration file **webpack_encore.yaml**

```yaml
webpack_encore:
    output_path: false
    builds:
        front: "%kernel.project_dir%/public/assets/front"
        back: "%kernel.project_dir%/public/assets/back"

    # Set attributes that will be rendered on all script and link tags
    script_attributes:
        defer: true
```

And the file **assets.yaml**

```yaml
framework:
   assets:
        packages:
            front:
                json_manifest_path: '%kernel.project_dir%/public/assets/front/manifest.json'
            office:
                json_manifest_path: '%kernel.project_dir%/public/assets/office/manifest.json'
```

The files **app.js and app.scss** of each environment will look like this:

```scss
@import "~bootstrap/scss/bootstrap";
@import "~@fortawesome/fontawesome-free/css/all.min.css";
```

```js
import '../sass/app.scss';
const $ = require('jquery');
// start the Stimulus application
import '../../bootstrap';
```

We compile and in the *public* directory we must have:

![structure public](/resources/img/multi-environment-struture-public.png)

From branch we load each file as follows:

```php
     {% block stylesheets %}
            {{ encore_entry_link_tags('back', null, 'back') }}
        {% endblock %}

     {% block javascripts %}
            {{ encore_entry_script_tags('back', null, 'back') }}
        {% endblock %}
```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
