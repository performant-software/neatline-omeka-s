<?php
namespace Neatline\Api\Adapter;

use DateTime;
use Doctrine\ORM\QueryBuilder;
use Omeka\Api\Adapter\AbstractEntityAdapter;
use Omeka\Api\Request;
use Omeka\Entity\EntityInterface;
use Omeka\Stdlib\ErrorStore;
use Omeka\Api\Adapter\SiteSlugTrait;
use CrEOF\Spatial\PHP\Types\Geometry\Point;

class RecordAdapter extends AbstractEntityAdapter
{
    use SiteSlugTrait;

    public function getEntityClass()
    {
        return 'Neatline\Entity\NeatlineRecord';
    }

    public function getResourceName()
    {
        return 'neatline_records';
    }

    public function getRepresentationClass()
    {
        return 'Neatline\Api\Representation\RecordRepresentation';
    }

    public function buildQuery(QueryBuilder $qb, array $query)
    {
        if (isset($query['exhibit_id'])) {
            $qb->andWhere($qb->expr()->eq(
                $this->getEntityClass() . '.exhibit',
                $this->createNamedParameter($qb, $query['exhibit_id']))
            );
        }
        if (isset($query['slug'])) {
            $qb->andWhere($qb->expr()->eq(
                $this->getEntityClass() . '.slug',
                $this->createNamedParameter($qb, $query['slug']))
            );
        }
    }

    public function hydrate(Request $request, EntityInterface $entity,
        ErrorStore $errorStore
    ) {
        $this->hydrateOwner($request, $entity);

        $data = $request->getContent();
        if (isset($data['o:exhibit']['o:id'])) {
            $exhibit = $this->getAdapter('neatline_exhibits')->findEntity($data['o:exhibit']['o:id']);
            $entity->setExhibit($exhibit);
        }

        $is_coverage = $entity->getIsCoverage();
        $coverage = $entity->getCoverage();
        if (isset($data['o:coverage'])) {
            $is_coverage = true;
            if (isset($data['o:coverage']['coordinates'])) {
                $coverage = new Point($data['o:coverage']['coordinates'][0],
                                      $data['o:coverage']['coordinates'][1]);
            }
        }
        if ($coverage === null) {
            $coverage = new Point(0, 0);
        }
        $entity->setCoverage($coverage);

        $is_wms = $entity->getIsWms();
        if (isset($data['o:wms_address'])) {
            $is_wms = true;
        }

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

        if ($this->shouldHydrate($request, 'o:is_coverage')) {
        	$entity->setIsCoverage($request->getValue('o:is_coverage', $is_coverage));
        }

        if ($this->shouldHydrate($request, 'o:is_wms')) {
        	$entity->setIsWms($request->getValue('o:is_wms', $is_wms));
        }

        if ($this->shouldHydrate($request, 'o:slug')) {
        	$entity->setSlug($request->getValue('o:slug'));
        }

        if ($this->shouldHydrate($request, 'o:title')) {
        	$entity->setTitle($request->getValue('o:title'));
        }

        if ($this->shouldHydrate($request, 'o:item_title')) {
        	$entity->setItemTitle($request->getValue('o:item_title'));
        }

        if ($this->shouldHydrate($request, 'o:body')) {
        	$entity->setBody($request->getValue('o:body'));
        }

        if ($this->shouldHydrate($request, 'o:tags')) {
        	$entity->setTags($request->getValue('o:tags'));
        }

        if ($this->shouldHydrate($request, 'o:widgets')) {
        	$entity->setWidgets($request->getValue('o:widgets'));
        }

        if ($this->shouldHydrate($request, 'o:presenter')) {
        	$entity->setPresenter($request->getValue('o:presenter'));
        }

        if ($this->shouldHydrate($request, 'o:fill_color')) {
        	$entity->setFillColor($request->getValue('o:fill_color'));
        }

        if ($this->shouldHydrate($request, 'o:fill_color_select')) {
        	$entity->setFillColorSelect($request->getValue('o:fill_color_select'));
        }

        if ($this->shouldHydrate($request, 'o:stroke_color')) {
        	$entity->setStrokeColor($request->getValue('o:stroke_color'));
        }

        if ($this->shouldHydrate($request, 'o:stroke_color_select')) {
        	$entity->setStrokeColorSelect($request->getValue('o:stroke_color_select'));
        }

        if ($this->shouldHydrate($request, 'o:fill_opacity')) {
        	$entity->setFillOpacity($request->getValue('o:fill_opacity'));
        }

        if ($this->shouldHydrate($request, 'o:fill_opacity_select')) {
        	$entity->setFillOpacitySelect($request->getValue('o:fill_opacity_select'));
        }

        if ($this->shouldHydrate($request, 'o:stroke_opacity')) {
        	$entity->setStrokeOpacity($request->getValue('o:stroke_opacity'));
        }

        if ($this->shouldHydrate($request, 'o:stroke_opacity_select')) {
        	$entity->setStrokeOpacitySelect($request->getValue('o:stroke_opacity_select'));
        }

        if ($this->shouldHydrate($request, 'o:stroke_width')) {
        	$entity->setStrokeWidth($request->getValue('o:stroke_width'));
        }

        if ($this->shouldHydrate($request, 'o:point_radius')) {
        	$entity->setPointRadius($request->getValue('o:point_radius'));
        }

        if ($this->shouldHydrate($request, 'o:zindex')) {
        	$entity->setZindex($request->getValue('o:zindex'));
        }

        if ($this->shouldHydrate($request, 'o:weight')) {
        	$entity->setWeight($request->getValue('o:weight'));
        }

        if ($this->shouldHydrate($request, 'o:start_date')) {
        	$entity->setStartDate($request->getValue('o:start_date'));
        }

        if ($this->shouldHydrate($request, 'o:end_date')) {
        	$entity->setEndDate($request->getValue('o:end_date'));
        }

        if ($this->shouldHydrate($request, 'o:after_date')) {
        	$entity->setAfterDate($request->getValue('o:after_date'));
        }

        if ($this->shouldHydrate($request, 'o:before_date')) {
        	$entity->setBeforeDate($request->getValue('o:before_date'));
        }

        if ($this->shouldHydrate($request, 'o:point_image')) {
        	$entity->setPointImage($request->getValue('o:point_image'));
        }

        if ($this->shouldHydrate($request, 'o:wms_address')) {
        	$entity->setWmsAddress($request->getValue('o:wms_address'));
        }

        if ($this->shouldHydrate($request, 'o:wms_layers')) {
        	$entity->setWmsLayers($request->getValue('o:wms_layers'));
        }

        if ($this->shouldHydrate($request, 'o:min_zoom')) {
        	$entity->setMinZoom($request->getValue('o:min_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:max_zoom')) {
        	$entity->setMaxZoom($request->getValue('o:max_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:map_zoom')) {
        	$entity->setMapZoom($request->getValue('o:map_zoom'));
        }

        if ($this->shouldHydrate($request, 'o:map_focus')) {
        	$entity->setMapFocus($request->getValue('o:map_focus'));
        }
    }

    public function validateEntity(EntityInterface $entity, ErrorStore $errorStore)
    {
        // $slug = $entity->getSlug();
        // $exhibit = $entity->getExhibit();
        // if (preg_match('/[^a-zA-Z0-9_-]/u', $slug)) {
        //     $errorStore->addError('o:slug', 'A slug can only contain letters, numbers, underscores, and hyphens.'); // @translate
        // }
        // if (!$this->isUnique($entity, ['slug' => $slug, 'exhibit_id' => $exhibit->getId()])) {
        //     $errorStore->addError('o:slug', new Message(
        //         'The slug "%s" is already taken for this exhibit.', // @translate
        //         $slug
        //     ));
        // }
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
