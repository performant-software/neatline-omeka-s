<?php
namespace Neatline\Site\Navigation\Link;

use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Stdlib\ErrorStore;
use Omeka\Site\Navigation\Link\LinkInterface;

class Neatline implements LinkInterface
{
    public function getName()
    {
        return 'Neatline';
    }

    public function getFormTemplate()
    {
        return 'common/navigation-link-form/neatline';
    }

    public function isValid(array $data, ErrorStore $errorStore)
    {
        return true;
    }

    public function getLabel(array $data, SiteRepresentation $site)
    {
        return isset($data['label']) && '' !== trim($data['label'])
            ? $data['label'] : null;
    }

    public function toZend(array $data, SiteRepresentation $site)
    {
        return [
            'route' => 'site/neatline',
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
