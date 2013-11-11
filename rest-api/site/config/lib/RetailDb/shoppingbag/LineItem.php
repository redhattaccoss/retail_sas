<?php
/**
 * Represents a Line Item ...
 * @author Ryan Henderson
 * @copyright 2011 - Inform8
 *
 */
 class LineItem {
    
    private $quantity = 0;
    private $productOption;
    
    function __construct($productOption, $quantity) {
      $this->productOption = $productOption;
      $this->quantity = $quantity;
    }

    public function addQuantity($quantity) {
      $this->quantity += $quantity;
    }
    
    public function setQuantity($quantity) {
      $this->quantity = $quantity;
    }
    
    /**
     * @return ProductOption
     */
    public function getProductOption() {
      return $this->productOption;
    }

    public function getQuantity() {
      return $this->quantity;
    }
    
    public function getPrice() {
      $cost = floatval($this->productOption->getWholesalePrice());
      $specialCost = floatval($this->productOption->getSaleWholesalePrice());
      
      if($specialCost != NULL && $specialCost > 0) {
       return $specialCost;
      }
      return $cost;
    }
    
    public function getPriceExGst() {
      $total = $this->getPrice();
      $gst = floatval($total) / floatval(11);
      return round($total-$gst, 2);
    }      

    public function getSubtotal() {
      return $this->getQuantity() * $this->getPrice();
    }
    
    public function getSubtotalExGst() {
      $total = $this->getSubtotal();
      $gst = floatval($total) / floatval(11);
      return round($total-$gst, 2);
    }     
    
    
}