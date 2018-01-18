<?php
namespace Neatline\Api\Representation;

use Omeka\Api\Representation\AbstractEntityRepresentation;
use Neatline\Api\Representation\ExhibitRepresentation;
use Neatline\Entity\NeatlineExhibit;

class RecordRepresentation extends AbstractEntityRepresentation
{
    public function getJsonLd()
    {
        $exhibit = null;
        if ($this->exhibit()) {
            $exhibit = $this->exhibit()->getReference();
        }

        $owner = null;
        if ($this->owner()) {
            $owner = $this->owner()->getReference();
        }

        $added = [
            '@value' => $this->getDateTime($this->added()),
            '@type' => 'http://www.w3.org/2001/XMLSchema#dateTime',
        ];
        $modified = null;
        if ($this->modified()) {
            $modified = [
                '@value' => $this->getDateTime($this->modified()),
                '@type' => 'http://www.w3.org/2001/XMLSchema#dateTime',
            ];
        }

        $coverage = null;
        if ($this->coverage()) {
            $coverage = $this->coverage()->toJson();
        }

        return [
            'o:exhibit' => $exhibit,
            'o:owner' => $owner,
            'o:added' => $added,
            'o:modified' => $modified,
            'o:is_coverage' => $this->isCoverage(),
            'o:is_wms' => $this->isWms(),
            'o:slug' => $this->slug(),
            'o:title' => $this->title(),
            'o:item_title' => $this->itemTitle(),
            'o:body' => $this->body(),
            'o:coverage' => $coverage,
            'o:tags' => $this->tags(),
            'o:widgets' => $this->widgets(),
            'o:presenter' => $this->presenter(),
            'o:fill_color' => $this->fillColor(),
            'o:fill_color_select' => $this->fillColorSelect(),
            'o:stroke_color' => $this->strokeColor(),
            'o:stroke_color_select' => $this->strokeColorSelect(),
            'o:fill_opacity' => $this->fillOpacity(),
            'o:fill_opacity_select' => $this->fillOpacitySelect(),
            'o:stroke_opacity' => $this->strokeOpacity(),
            'o:stroke_opacity_select' => $this->strokeOpacitySelect(),
            'o:stroke_width' => $this->strokeWidth(),
            'o:point_radius' => $this->pointRadius(),
            'o:zindex' => $this->zindex(),
            'o:weight' => $this->weight(),
            'o:start_date' => $this->startDate(),
            'o:end_date' => $this->endDate(),
            'o:after_date' => $this->afterDate(),
            'o:before_date' => $this->beforeDate(),
            'o:point_image' => $this->pointImage(),
            'o:wms_address' => $this->wmsAddress(),
            'o:wms_layers' => $this->wmsLayers(),
            'o:min_zoom' => $this->minZoom(),
            'o:max_zoom' => $this->maxZoom(),
            'o:map_zoom' => $this->mapZoom(),
            'o:map_focus' => $this->mapFocus(),
        ];
    }

    public function getJsonLdType()
    {
        return 'o:NeatlineRecord';
    }

    /**
     * Get the exhibit representation for this record.
     *
     * @return ExhibitRepresentation
     */
    public function exhibit()
    {
        return $this->getAdapter('neatline_exhibits')
            ->getRepresentation($this->resource->getExhibit());
    }

    /**
     * Get the owner representation of this resource.
     *
     * @return UserRepresentation
     */
    public function owner()
    {
        return $this->getAdapter('users')
            ->getRepresentation($this->resource->getOwner());
    }

    public function added()
    {
    	return $this->resource->getAdded();
    }

    public function modified()
    {
    	return $this->resource->getModified();
    }

    public function isCoverage()
    {
    	return $this->resource->getIsCoverage();
    }

    public function isWms()
    {
    	return $this->resource->getIsWms();
    }

    public function slug()
    {
    	return $this->resource->getSlug();
    }

    public function title()
    {
    	return $this->resource->getTitle();
    }

    public function itemTitle()
    {
    	return $this->resource->getItemTitle();
    }

    public function body()
    {
    	return $this->resource->getBody();
    }

    public function coverage()
    {
    	return $this->resource->getCoverage();
    }

    public function tags()
    {
    	return $this->resource->getTags();
    }

    public function widgets()
    {
    	return $this->resource->getWidgets();
    }

    public function presenter()
    {
    	return $this->resource->getPresenter();
    }

    public function fillColor()
    {
    	return $this->resource->getFillColor();
    }

    public function fillColorSelect()
    {
    	return $this->resource->getFillColorSelect();
    }

    public function strokeColor()
    {
    	return $this->resource->getStrokeColor();
    }

    public function strokeColorSelect()
    {
    	return $this->resource->getStrokeColorSelect();
    }

    public function fillOpacity()
    {
    	return $this->resource->getFillOpacity();
    }

    public function fillOpacitySelect()
    {
    	return $this->resource->getFillOpacitySelect();
    }

    public function strokeOpacity()
    {
    	return $this->resource->getStrokeOpacity();
    }

    public function strokeOpacitySelect()
    {
    	return $this->resource->getStrokeOpacitySelect();
    }

    public function strokeWidth()
    {
    	return $this->resource->getStrokeWidth();
    }

    public function pointRadius()
    {
    	return $this->resource->getPointRadius();
    }

    public function zindex()
    {
    	return $this->resource->getZindex();
    }

    public function weight()
    {
    	return $this->resource->getWeight();
    }

    public function startDate()
    {
    	return $this->resource->getStartDate();
    }

    public function endDate()
    {
    	return $this->resource->getEndDate();
    }

    public function afterDate()
    {
    	return $this->resource->getAfterDate();
    }

    public function beforeDate()
    {
    	return $this->resource->getBeforeDate();
    }

    public function pointImage()
    {
    	return $this->resource->getPointImage();
    }

    public function wmsAddress()
    {
    	return $this->resource->getWmsAddress();
    }

    public function wmsLayers()
    {
    	return $this->resource->getWmsLayers();
    }

    public function minZoom()
    {
    	return $this->resource->getMinZoom();
    }

    public function maxZoom()
    {
    	return $this->resource->getMaxZoom();
    }

    public function mapZoom()
    {
    	return $this->resource->getMapZoom();
    }

    public function mapFocus()
    {
    	return $this->resource->getMapFocus();
    }
}
