<?php
namespace Neatline\Api\Adapter;

use DateTime;
use Doctrine\ORM\QueryBuilder;
use Omeka\Api\Adapter\AbstractEntityAdapter;
use Omeka\Api\Request;
use Omeka\Entity\EntityInterface;
use Omeka\Stdlib\ErrorStore;
use Omeka\Api\Adapter\SiteSlugTrait;

class ExhibitAdapter extends AbstractEntityAdapter
{
    use SiteSlugTrait;

    public function getEntityClass()
    {
        return 'Neatline\Entity\NeatlineExhibit';
    }

    public function getResourceName()
    {
        return 'neatline_exhibits';
    }

    public function getRepresentationClass()
    {
        return 'Neatline\Api\Representation\ExhibitRepresentation';
    }

    public function buildQuery(QueryBuilder $qb, array $query)
    {
        if (isset($query['slug'])) {
            $qb->andWhere($qb->expr()->eq(
                // $this->getEntityClass() . '.slug',
                'omeka_root.slug',
                $this->createNamedParameter($qb, $query['slug']))
            );
        }
        if (isset($query['public'])) {
            $qb->andWhere($qb->expr()->eq(
                // $this->getEntityClass() . '.public',
                'omeka_root.public',
                $this->createNamedParameter($qb, $query['public']))
            );
        }
    }

    public function hydrate(Request $request, EntityInterface $entity,
        ErrorStore $errorStore
    ) {
        $this->hydrateOwner($request, $entity);

        if ($this->shouldHydrate($request, 'o:title')) {
            $title = trim($request->getValue('o:title', ''));
            $entity->setTitle($title);
        }

        if ($this->shouldHydrate($request, 'o:slug')) {
            $default = null;
            $slug = trim($request->getValue('o:slug', ''));
            if ($slug === ''
                && $request->getOperation() === Request::CREATE
                && is_string($title)
                && $title !== ''
            ) {
                $slug = $this->getAutomaticSlug($title);
            }
            $entity->setSlug($slug);
        }

        if ($this->shouldHydrate($request, 'o:item_query')) {
        	$entity->setItemQuery($request->getValue('o:item_query'));
        }

        if ($this->shouldHydrate($request, 'o:spatial_layers')) {
        	$entity->setSpatialLayers($request->getValue('o:spatial_layers'));
        }

        if ($this->shouldHydrate($request, 'o:spatial_layer')) {
        	$entity->setSpatialLayer($request->getValue('o:spatial_layer'));
        }

        if ($this->shouldHydrate($request, 'o:image_layer')) {
        	$entity->setImageLayer($request->getValue('o:image_layer'));
        }

        if ($this->shouldHydrate($request, 'o:image_height')) {
        	$entity->setImageHeight($request->getValue('o:image_height'));
        }

        if ($this->shouldHydrate($request, 'o:image_width')) {
        	$entity->setImageWidth($request->getValue('o:image_width'));
        }

        if ($this->shouldHydrate($request, 'o:zoom_levels')) {
        	$entity->setZoomLevels($request->getValue('o:zoom_levels'));
        }

        if ($this->shouldHydrate($request, 'o:wms_address')) {
        	$entity->setWmsAddress($request->getValue('o:wms_address'));
        }

        if ($this->shouldHydrate($request, 'o:wms_layers')) {
        	$entity->setWmsLayers($request->getValue('o:wms_layers'));
        }

        if ($this->shouldHydrate($request, 'o:widgets')) {
        	$entity->setWidgets($request->getValue('o:widgets'));
        }

        if ($this->shouldHydrate($request, 'o:narrative')) {
        	$entity->setNarrative($request->getValue('o:narrative'));
        }

        if ($this->shouldHydrate($request, 'o:spatial_querying')) {
        	$entity->setSpatialQuerying($request->getValue('o:spatial_querying', true));
        }

        if ($this->shouldHydrate($request, 'o:public')) {
        	$entity->setPublic($request->getValue('o:public', false));
        }

        if ($this->shouldHydrate($request, 'o:styles')) {
        	$entity->setStyles($request->getValue('o:styles'));
        }

        if ($this->shouldHydrate($request, 'o:map_focus')) {
        	$entity->setMapFocus($request->getValue('o:map_focus'));
        }

        if ($this->shouldHydrate($request, 'o:map_zoom')) {
        	$entity->setMapZoom($request->getValue('o:map_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:map_min_zoom')) {
        	$entity->setMapMinZoom($request->getValue('o:map_min_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:map_max_zoom')) {
        	$entity->setMapMaxZoom($request->getValue('o:map_max_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:map_restricted_extent')) {
        	$entity->setMapRestrictedExtent($request->getValue('o:map_restricted_extent'));
        }

        if ($this->shouldHydrate($request, 'o:accessible_url')) {
        	$entity->setAccessibleUrl($request->getValue('o:accessible_url'));
        }

        if ($this->shouldHydrate($request, 'o:tile_address')) {
        	$entity->setTileAddress($request->getValue('o:tile_address'));
        }

        if ($this->shouldHydrate($request, 'o:image_attribution')) {
        	$entity->setImageAttribution($request->getValue('o:image_attribution'));
        }

        if ($this->shouldHydrate($request, 'o:wms_attribution')) {
        	$entity->setWmsAttribution($request->getValue('o:wms_attribution'));
        }

        if ($this->shouldHydrate($request, 'o:tile_attribution')) {
        	$entity->setTileAttribution($request->getValue('o:tile_attribution'));
        }

		if ($this->shouldHydrate($request, 'o:exhibit_type')) {
        	$entity->setExhibitType($request->getValue('o:exhibit_type'));
        }

        $this->updateTimestamps($request, $entity);
    }

    public function validateEntity(EntityInterface $entity, ErrorStore $errorStore)
    {
        $title = $entity->getTitle();
        if (!is_string($title) || $title === '') {
            $errorStore->addError('o:title', 'An exhibit must have a title.'); // @translate
        }
        $slug = $entity->getSlug();
        if (!is_string($slug) || $slug === '') {
            $errorStore->addError('o:slug', 'The exhibit slug cannot be empty.'); // @translate
        }
        if (preg_match('/[^a-zA-Z0-9_-]/u', $slug)) {
            $errorStore->addError('o:slug', 'A slug can only contain letters, numbers, underscores, and hyphens.'); // @translate
        }
        if (!$this->isUnique($entity, ['slug' => $slug])) {
            $errorStore->addError('o:slug', new Message(
                'The slug "%s" is already taken.', // @translate
                $slug
            ));
        }
    }

    public function updateTimestamps(Request $request, EntityInterface $entity)
    {
        if (Request::CREATE === $request->getOperation()) {
            $entity->setAdded(new DateTime('now'));
        }

        $entity->setModified(new DateTime('now'));

        if (is_null($entity->getPublished()) && (bool) $request->getValue('o:public', false) == true) {
            $entity->setPublished(new DateTime('now'));
        }
    }
}
