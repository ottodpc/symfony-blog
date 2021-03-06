<h3  align="center">
Symfony Blog - simple project to learn symfony
</h3>

<p align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/ottodpc/symfony-blog">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/ottodpc/symfony-blog">

  <a href="https://github.com/NVGallery/poc_ambiance/commits/main">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/ottodpc/symfony-blog">
  </a>

</p>


CMD:
1 - $ `brew install composer`
2 - $ `brew install symfony-cli/tap/symfony-cli`
3 - $ `symfony new blogsymfony --full`

- `symfony new blogsymfony --version=lts`
  // use the 'next' Symfony version to be released (still in development)
- $ `symfony new blogsymfony --version=next`
  // you can also select an exact specific Symfony versio
- $ `symfony new blogsymfony --version=5.4`

4 - $ `cd blogsymfony` && `symfony serve` // `symfony serve -d` // `symfony serve:log` // `symfony server:ca:install` for the web server with TLS

<!-- CMD -->

- `symfony console` / `symfony console make` ~ `cmd --help`: manuel

5 - Create a controller, conviention always "Controller" sufix
$ `symfony console make:controller`

6 - Lister toutes les routes
$ `symfony console debug:router`

7 - create function/filter
$ `symfony console make:twig-extension`

8 - php admin "http://127.0.0.1/phpmyadmin/"

9 - start mysql `brew services start mysql` & `brew services list` ( manuel: `brew services mysql --help` )

10 - mysql connect `mysql -uroot -proot`
- `SHOW DATABASES`;

11 - create db `symfony console doctrine:database:create`

12- create entity `symfony console make:entity`

13 - Creation of migration `symfony console make:migration` & migration `symfony console doctrine:migrations:migrate`
14 - generate dump data: 1 `symfony composer require orm-fixtures --dev`; 2 `symfony console make:fixtures` ( convention: fixtures name suffix end with "Fixtures" ; 3 put in db `symfony console doctrine:fixtures:load`
15 - request db thx to repos
16 - Collection/Table relation ManyToOne/OneToMany 1 `symfony console make:entity` 2 `symfony console make:migration` 3 `symfony console doctrine:migrations:list` 4 `symfony console doctrine:migrations:migrate`
17 - create form `symfony console make:form`
18 - Services ~ = utils list. Php class with functions and this class could be use by dependencies injection. Create custom in src/Service/ServiceNameFile.php
19 - create user table 1 `symfony console make:user` 2 `symfony console make:migration` 3 migration `symfony console doctrine:migrations:migrate` 4 fixtures etc `symfony console security:encode-password` / `symfony console security:encode-password` 5 `symfony console doctrine:fixtures:load` 6 `symfony console make:auth`