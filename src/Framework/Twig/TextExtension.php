<?php

namespace Framework\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Série d'extensions concernant les textes
 *
 * @package Framework\Twig
 */
class TextExtension extends AbstractExtension
{
    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('excerpt', [$this, 'excerpt'])
        ];
    }

    /**
     * Renvoie un extrait du contenu
     * 
     * @param string $content
     * @param int $maxLength
     * @return string
     */
    public function excerpt(string $content, int $maxLength = 100): string
    {
        if (mb_strlen($content) > $maxLength) {
            $excerpt = mb_substr($content, 0, $maxLength);
            $lastSpace = mb_strrpos($excerpt, ' ');
            if ($lastSpace !== false) {
                return mb_substr($excerpt, 0, $lastSpace) . '...';
            }
            return $excerpt . '...'; // si pas d'espace trouvé, couper au maxLength
        }
        return $content;
    }
}
