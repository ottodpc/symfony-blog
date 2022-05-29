<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('tailleDuTableau', [$this, 'taille_du_tableau']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('addition', [$this, 'additionne']),
        ];
    }

    public function taille_du_tableau($value)
    {
        return "Voici la taille du tableau: ". count($value);
    }
    public function additionne(int $chiffre1, int $chiffre2)
    {
        return $chiffre1 + $chiffre2;
    }
}
