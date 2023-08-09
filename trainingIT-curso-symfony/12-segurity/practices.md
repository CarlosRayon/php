
# Practices

Practices

[security_basico.zip](/symfony/trainingIT/12-segurity/security_basico.zip)

## Practice 12.1

Implementar un Voter para prohibir el acceso a la web a cualquier IP de las contenidas en un fichero de texto.

La ubicación del fichero de texto se podrá configurar en un parámetro de la sección parameters del fichero services.yaml.

El formato del fichero de texto consiste simplemente en un fichero con una lista de direcciones IPs. Cada línea del fichero tendrá una dirección IP.

Ejemplo de fichero:

123.54.32.6
98.43.79.111
231.45.76.78
Subir un fichero zip con el proyecto excluyendo las carpetas var, vendor y node_modules.

[12.1_codigo.zip](/symfony/trainingIT/12-segurity/12.1_codigo.zip)

### Personalizar codigos error login

Tienes el servicio de traducciones que te puedes inyectar en el constructor del Authenticator

```php
src/Security/LoginFormAuthenticator.php

use Symfony\Contracts\Translation\TranslatorInterface;

public function __construct(
        EntityManagerInterface $entityManager,
        UrlGeneratorInterface $urlGenerator,
        CsrfTokenManagerInterface $csrfTokenManager,
        UserPasswordEncoderInterface $passwordEncoder,
         TranslatorInterface $translator
) { $this->entityManager = $entityManager; $this->urlGenerator = $urlGenerator; $this->csrfTokenManager = $csrfTokenManager; $this->passwordEncoder = $passwordEncoder;
        $this->translator = $translator;
}
```

Y entonces podrías cambiar la línea 78 del authenticator

```php
throw new CustomUserMessageAuthenticationException('Email could not be found.');
```

por

```php
$translated = $translator->trans('Email could not be found.');
throw new CustomUserMessageAuthenticationException($translated);
```

Y si quieres cambiar el del password, tendrías que lanzar excepción en la línea 86 en vez de un return false si el password es incorrecto.

---

[<-- index-section](/symfony/trainingIT/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)
