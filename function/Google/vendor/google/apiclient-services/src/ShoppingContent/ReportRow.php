<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ShoppingContent;

class ReportRow extends \Google\Model
{
  protected $bestSellersType = BestSellers::class;
  protected $bestSellersDataType = '';
  public $bestSellers;
  protected $brandType = Brand::class;
  protected $brandDataType = '';
  public $brand;
  protected $metricsType = Metrics::class;
  protected $metricsDataType = '';
  public $metrics;
  protected $priceCompetitivenessType = PriceCompetitiveness::class;
  protected $priceCompetitivenessDataType = '';
  public $priceCompetitiveness;
  protected $priceInsightsType = PriceInsights::class;
  protected $priceInsightsDataType = '';
  public $priceInsights;
  protected $productClusterType = ProductCluster::class;
  protected $productClusterDataType = '';
  public $productCluster;
  protected $productViewType = ProductView::class;
  protected $productViewDataType = '';
  public $productView;
  protected $segmentsType = Segments::class;
  protected $segmentsDataType = '';
  public $segments;

  /**
   * @param BestSellers
   */
  public function setBestSellers(BestSellers $bestSellers)
  {
    $this->bestSellers = $bestSellers;
  }
  /**
   * @return BestSellers
   */
  public function getBestSellers()
  {
    return $this->bestSellers;
  }
  /**
   * @param Brand
   */
  public function setBrand(Brand $brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return Brand
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param Metrics
   */
  public function setMetrics(Metrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metrics
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param PriceCompetitiveness
   */
  public function setPriceCompetitiveness(PriceCompetitiveness $priceCompetitiveness)
  {
    $this->priceCompetitiveness = $priceCompetitiveness;
  }
  /**
   * @return PriceCompetitiveness
   */
  public function getPriceCompetitiveness()
  {
    return $this->priceCompetitiveness;
  }
  /**
   * @param PriceInsights
   */
  public function setPriceInsights(PriceInsights $priceInsights)
  {
    $this->priceInsights = $priceInsights;
  }
  /**
   * @return PriceInsights
   */
  public function getPriceInsights()
  {
    return $this->priceInsights;
  }
  /**
   * @param ProductCluster
   */
  public function setProductCluster(ProductCluster $productCluster)
  {
    $this->productCluster = $productCluster;
  }
  /**
   * @return ProductCluster
   */
  public function getProductCluster()
  {
    return $this->productCluster;
  }
  /**
   * @param ProductView
   */
  public function setProductView(ProductView $productView)
  {
    $this->productView = $productView;
  }
  /**
   * @return ProductView
   */
  public function getProductView()
  {
    return $this->productView;
  }
  /**
   * @param Segments
   */
  public function setSegments(Segments $segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Segments
   */
  public function getSegments()
  {
    return $this->segments;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRow::class, 'Google_Service_ShoppingContent_ReportRow');
