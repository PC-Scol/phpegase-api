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
- Le nom de l'environnement Pégase sur lequel vous souhaitez travailler. Dans ce document, l'environnement est `bas-esup`. Il faudra changer cette valeur pour la faire correspondre à votre environnement.

## Récupération des sources

```bash
git clone git@github.com:PC-Scol/phpegase-api
cd phpegase-api
```

## Prise en main APIs Swagger :

- Visiter <https://pegase-swagger-ui.bas-esup.pc-scol.fr/>
- Récupération token via curl : 

```bash
curl -d "username=svc-api&password=???&token=true" \
-H "Content-Type: application/x-www-form-urlencoded" \
-X POST https://authn-app.bas-esup.pc-scol.fr/cas/v1/tickets
```

- Appel du endpoint "lecture d'un établissement par code pegase"
- (Optionnel) Appel du endpoint "création d'un nouvel établissement"
- (Optionnel) Exploration des autres APIs

## Prise en main de l'outil de génération de code OpenApiGenerator :

- Explorer [la page Github de l'outil](https://github.com/OpenAPITools/openapi-generator/blob/master/README.md)
- Identifier [la dernière version publiée de l'outil](https://github.com/OpenAPITools/openapi-generator/blob/master/README.md#11---compatibility) et modifier la version utilisée dans le document si besoin.
- Télécharger :

```bash
wget https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/5.3.0/openapi-generator-cli-5.3.0.jar -O openapi-generator-cli.jar
```

```bash
alias open-api-generator="java -jar $PWD/openapi-generator-cli.jar"
```

- Explorer l'outil : 
    - `open-api-generator --help`
    - `open-api-generator help generate`
    - `open-api-generator list` − [voir la documentation des générateurs disponibles](https://github.com/OpenAPITools/openapi-generator/blob/v5.3.0/docs/generators)
    - `open-api-generator config-help -g python` − [voir la documentation des paramètres spécifiques à Python](https://github.com/OpenAPITools/openapi-generator/blob/v5.3.0/docs/generators/php.md)


- Créer un alias pour faciliter la génération de clients php

```bash
alias php-client-generator="open-api-generator generate -g php"
```

- Générer un client PHP pour REF :

Vérifier au préalable de récupérer la dernière version de fichier open-api en consultant [pegase-swagger-ui](https://pegase-swagger-ui.bas-esup.pc-scol.fr/)

```bash
php-client-generator -i https://pegase-swagger-ui.bas-esup.pc-scol.fr/fr.pcscol/ref-api/ref-api-2.2.0.yml -o generated/pegase-ref --package-name ref-client --additional-properties composerPackageName=pegase/ref-client

```

- Générer un client Python pour MOF :

Vérifier au préalable de récupérer la dernière version de fichier open-api en consultant [pegase-swagger-ui](https://pegase-swagger-ui.bas-esup.pc-scol.fr/)

```bash
php-client-generator -i https://pegase-swagger-ui.bas-esup.pc-scol.fr/fr.pcscol.mof-api/mof-application-api-v1/mof-application-api-v1-2.2.0.yml -o generated/pegase-mof --package-name mof-client --skip-validate-spec --additional-properties composerPackageName=pegase/mof-client
```

## Exercice
### Installation de l'environnement de développement

```bash
> composer install
```

### Configuration

- Dans le fichier `conf.php`, changer la valeur pour la clé `$env` pour qu'elle corresponde au nom de votre environnement.
- Pour l'authentification, deux façons de faire :
  - définissez la valeur pour les clés `$username` et `$password` dans le fichier `conf.php`.
  - utilisez des variables d'environnement pour définir les identifiants comme ceci :

```bash
export PEGASE_USERNAME=mon-compte
export PEGASE_PASSWORD=mon-mot-de-passe
```

### Récupérer les nomenclatures disponibles

```bash
php lire_nomenclature_disponibles.php
```

### Extraire les arbres de formation

Les paramètres en dur dans le script sont :

- établissement : `ETAB0`
- période : `PER-2021`

Changez ces valeurs au besoin.

```bash
php extraire_arbre_formation.php
```
