# phpegase-api

## Prérequis

- IDE pour développement PHP
- PHP >= 7.3 installé sur la machine
- Composer installé sur sa machine
- Extensions suivantes :
  * php-curl
  * php-mbstring
  * php-xml
- Connaître la librairie `GuzzleHttp`

## Prise en main APIs Swagger :

- Visiter <https://pegase-swagger-ui.bas-esup.pc-scol.fr/>
- Récupération token via curl : `curl -d "username=svc-api&password=???&token=true" -H "Content-Type: application/x-www-form-urlencoded" -X POST https://authn-app.bas-esup.pc-scol.fr/cas/v1/tickets`
- Appel du endpoint "lecture d'un établissement par code pegase"
- (Optionnel) Appel du endpoint "création d'un nouvel établissement"
- (Optionnel) Exploration des autres APIs

## Prise en main de l'outil de génération de code OpenApiGenerator :

- Visiter <https://github.com/OpenAPITools/openapi-generator/blob/master/README.md>
- Télécharger : `wget https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/5.3.0/openapi-generator-cli-5.3.0.jar  -O openapi-generator-cli.jar`
- Créer alias : `alias open-api-generator="java -jar $PWD/openapi-generator-cli.jar"`
- Créer alias : `alias php-api-gen="open-api-generator generate -g php"
- Explorer l'outil : 
    - `open-api-generator --help`
    - `open-api-generator help generate`
    - `open-api-generator list` (https://github.com/OpenAPITools/openapi-generator/blob/v5.3.0/docs/generators)
    - `open-api-generator config-help -g php` (https://github.com/OpenAPITools/openapi-generator/blob/v5.3.0/docs/generators/php.md)
- Générer un client PHP : `php-api-gen -i ./apis/ref-api-2.2.0.yml -o generated`

## Exercice

### Récupération des APIs

```bash
> mkdir apis
> wget https://pegase-swagger-ui.bas-esup.pc-scol.fr/fr.pcscol/ref-api/ref-api-2.2.0.yml -o apis/ref-api-2.2.0.yml
> wget https://pegase-swagger-ui.bas-esup.pc-scol.fr/fr.pcscol.mof-api/mof-application-api-v1/mof-application-api-v1-2.2.0.yml -o apis/mof-application-api-2.2.0.yml
```

### Installation

```bash
> php-api-gen -i ./apis/ref-api-2.2.0.yml -o generated/ref
> cd generated/ref
> composer install
> php-api-gen -i ./apis/mof-application-api-2.2.0.yml
```

### Créer un module récupérant le token

### Créer un module client API Ref

### Créer un module client API Mof