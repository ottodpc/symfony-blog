<h3  align="center">
Symfony Blog
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