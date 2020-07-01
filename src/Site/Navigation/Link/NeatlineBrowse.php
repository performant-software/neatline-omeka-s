<?php
namespace Neatline\Site\Navigation\Link;

use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Site\Navigation\Link\LinkInterface;
use Omeka\Stdlib\ErrorStore;

class NeatlineBrowse implements LinkInterface
{
    public function getName()
    {
        return 'Neatline Browse'; // @translate
    }

    public function getFormTemplate()
    {
        return 'common/navigation-link-form/neatline-browse';
    }

    public function isValid(array $data, ErrorStore $errorStore)
    {
        return true;
    }

    public function getLabel(array $data, SiteRepresentation $site)
    {
        return isset($data['label']) && '' !== trim($data['label'])
            ? $data['label'] : $this->getName();
    }

    public function toZend(array $data, SiteRepresentation $site)
    {
        return [
            'route' => 'site/neatline-browse',
            'params' => [
                'site-slug' => $site->slug(),
            ],
        ];
    }

    public function toJstree(array $data, SiteRepresentation $site)
    {
        return [
            'label' => $data['label'],
        ];
    }
}
