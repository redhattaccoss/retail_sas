<?php
/**
 * Shopping Bag used in ordering ...
 * @author Ryan Henderson
 * @copyright 2011 - Inform8
 *
 */
  class ShoppingBag { 

    private $items = array();
    private $lastSubCategory = NULL;

    private $billingAddress = NULL;
    private $deliveryAddress = NULL;
    private $deliveryOption = NULL;
    

    public function clear() {
      $this->items = array();
      $this->billingAddress = NULL;
      $this->deliveryAddress = NULL;
      $this->deliveryOption = NULL;
    }

    public function setBillingAddress($billingAddress) {
      $this->billingAddress = $billingAddress;
    }
    
    public function setDeliveryAddress($deliveryAddress) {
      $this->deliveryAddress = $deliveryAddress;
    }
    
    public function setDeliveryOption($deliveryOption) {
      $this->deliveryOption = $deliveryOption;
    }
    
    /**
     * Returns the billing address ...
     * @return WholesalerAddress
     */
    public function getBillingAddress() {
      return $this->billingAddress;
    }
    
    public function getDeliveryAddress() {
      return $this->deliveryAddress;
    }
    
    public function getDeliveryOption() {
      return $this->deliveryOption;
    }
    
    public function setLastSubCategory($subCat) {
      $this->lastSubCategory = $subCat;
    }
    
    public function getLastSubCategory() {
      if ($this->lastSubCategory != NULL) {
        return '/collection/' . $this->lastSubCategory . '.htm';
      }else {
        return '/collection.htm';
      }
    }
    
    
    public function getItems() {
      return $this->items;
    }

    public function getItemCount() {
      $icount = 0;
      foreach($this->items as $item) {
        $icount += $item->getQuantity();
      }
      return $icount;
    }
    
    public function getSubTotal() {
      $cost = 0;
    	if ($this->getItemCount() > 0) {
        foreach($this->items as $item) {
          $cost += $item->getSubtotal();
        }
      }
      return $cost;
    }
    
    public function getSubTotalExGst() {
      $total = $this->getSubTotal();
      $gst = floatval($total) / floatval(11);
      return round($total-$gst, 2);
    }      
    
    
    public function getTotal() {
      $cost = 0;
      $cost += $this->getSubTotal();
//      if ($this->getDeliveryOption() != NULL) {
        $cost += $this->getDeliveryOption()->getBasePrice();
 //     }
      return $cost;
    }   
    
    public function getDeliveryExGst() {
      $total = $this->getDeliveryOption()->getBasePrice();
      $gst = floatval($total) / floatval(11);
      return round($total-$gst, 2);
    }    
    
    public function getTotalExGst() {
      $total = $this->getTotal();
      $gst = floatval($total) / floatval(11);
      return round($total-$gst, 2);
    }   
    
    public function getTotalGst() {
      $gst = floatval($this->getTotal()) / floatval(11);
      return round($gst, 2);
    }  
    
    public function addProductOption($po, $quantity) {
      if (isset($this->items[$po->getPk()])) {
        $item = &$this->items[$po->getPk()];
        $item->addQuantity($quantity);
      }else {
        $this->items[$po->getPk()] = new LineItem($po, $quantity);
      } 
    }
    
    public function addPromoCode($code) {
      // lookup + lookup valid product ids
      // store
      // apply to line items
    }
    
    
    public function removeProductOption($poid) {
      if (isset($this->items[$poid])) {
        unset($this->items[$poid]);
      } 
    }
    
    public function setQuantity($poid, $qty) {
      if ($qty <= 0) {
        $this->removeProductOption($poid);
      }else if (isset($this->items[$poid])) {
        $this->items[$poid]->setQuantity($qty);
      } 
    }    
    
    public function toJSON() {
      //$sbText = parseFile('includes/menushoppingbag.inc.php');
      $obj = array(
        "itemcount"=>$this->getItemCount(),
        "total"=> $this->getSubTotal(),
        "subTotalExGst"=> $this->getSubTotalExGst(),
        //'sbText'=> $sbText
        );
      
      return $obj;
    }
    
    /**
     * Get instance of the shopping bag ...
     * @return ShoppingBag
     */
    public static function getInstance(){
    	if (!(isset($_SESSION["shoppingBag"])&&($_SESSION["shoppingBag"]!=null))){
    		$_SESSION["shoppingBag"] = new ShoppingBag();
    	}
    	$shoppingBag = $_SESSION["shoppingBag"];
    	return $shoppingBag;
    } 
    
    
    

  }