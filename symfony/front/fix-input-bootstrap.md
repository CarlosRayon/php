# Fix input bootstrap 4
## JQuery

```javascript

 'use strict';
 $(function () {
     /* Fixed pre-view file in input */
     $('.custom-file-input').on('change', function (event) {
         var inputFile = event.currentTarget;
         $(inputFile).parent()
             .find('.custom-file-label')
             .html(inputFile.files[0].name);
     });
     $('form').on('submit', function () {
         $('#loader-modal').modal('show');
     })
 })
```

## Javascript

```javascript
'use strict'
window.addEventListener('load', function() {
  document.querySelector('.custom-file-input').addEventListener('change', function(event) {
    const inputFile = event.currentTarget;
    inputFile.parentNode.querySelector('.custom-file-label').innerHTML = inputFile.files[0].name;
  })
})
```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
