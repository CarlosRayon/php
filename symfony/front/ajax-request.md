# Ajax request

Complete example of ajax

## Ajax example with form create from controller

From a controller we can create a form. In this case with an input and a button that we pass to the view in a normal way.

```php
//src/controller/product

//......
 $promoCodeForm = $this->createFormBuilder()
            ->add('code', TextType::class, [
                'attr' => ['class' => 'input-code']
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary btn-lg btn-block validate-promo-code',
                    'data-ajax-validate-path' => $this->generateUrl('ajax_front_validate_promo_code')
                ],
                'label' => 'Validate promo code'
            ])
            ->getForm();

//....
```

Front js file we take a event to button. get the path frond data atribute and do the ajax(We can use [fetch de js](https://github.com/CarlosRayon/javascript/blob/master/javascript/fetch/complete/index.html)) // TODO link correct repo

```js
$(function () {
    $('.validate-promo-code').on('click', function (e) {
        e.preventDefault();

        const path = $('.validate-promo-code').data('ajax-validate-path');
        const code = $('.input-code').val();

        if (code.trim()) {
            $.ajax({
                type: 'POST',
                url: path,
                data: { promoCode: code },
                dataType: 'json',
            })
                .done(function (result) {
                    if (result.code == 'success') {
                        console.log(result);
                    } else {
                        console.log(result);
                    }
                })
                .fail(function (xhr, status, error) {
                    console.log(xhr + '\n' + status + '\n' + '\n' + error);
                })
                .always(function (xhr, status) {
                    console.log('Request status: ' + status);
                });
        }
    });
});
```

Front controller get the request

```php
  /**
     * Validate the promo code
     *
     * @Route("/validate_promo_code", name="validate_promo_code",  methods={"POST"})
     * @IsGranted({"IS_AUTHENTICATED_ANONYMOUSLY"})
     *
     * @param Request $request
     * @return void
     */
    public function validatePromoCode(
        Request $request,
        PromoCodeValidator $promoCodeValidator,
        SessionInterface $sessionInterface
    ) {
        if (!$request->isXmlHttpRequest()) {
            return $this->json(['code' => 'error', 'msg' => 'Method Not Allowed'], 405);
        }

        $promoCode = trim($request->request->get('promoCode'));

        if (!$validCode = $promoCodeValidator->validCode($promoCode)) {
            return $this->json(['code' => 'error', 'msg' => 'Error!']);
        } else {
            $sessionInterface->set('promo_code', $validCode);
            return $this->json(['code' => 'success', 'msg' => 'Correct']);
        }
    }
```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
